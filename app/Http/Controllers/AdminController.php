<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // =========================
    // KELOLA PENGGUNA
    // =========================
    public function kelolaPengguna(Request $request)
    {
        // =========================
        // QUERY USERS
        // =========================
        $query = DB::table('users')

            ->leftJoin(
                'anak',
                'users.id',
                '=',
                'anak.user_id'
            )

            ->select(
                'users.*',
                'anak.nama_anak'
            );

        // =========================
        // FILTER ROLE
        // =========================
        if ($request->role) {

            $query->where(
                'users.role',
                $request->role
            );
        }

        // =========================
        // SEARCH
        // =========================
        if ($request->search) {

            $query->where(function ($q)
                use ($request) {

                $q->where(
                    'users.nama',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'users.email',
                    'like',
                    '%' . $request->search . '%'
                )

                ->orWhere(
                    'anak.nama_anak',
                    'like',
                    '%' . $request->search . '%'
                );
            });
        }

        // =========================
        // USERS
        // =========================
        $users = $query

            ->orderBy(
                'users.id',
                'asc'
            )

            ->paginate(10);

        // =========================
        // TOTAL ADMIN
        // =========================
        $totalAdmin = DB::table('users')

            ->where(
                'role',
                'admin'
            )

            ->count();

        // =========================
        // TOTAL KADER
        // =========================
        $totalKader = DB::table('users')

            ->where(
                'role',
                'kader'
            )

            ->count();

        // =========================
        // TOTAL ORANG TUA
        // =========================
        $totalOrangTua = DB::table('users')

            ->where(
                'role',
                'orang_tua'
            )

            ->count();

        // =========================
        // AJAX REQUEST
        // =========================
        if ($request->ajax()) {

            return view(
                'admin.partials.tablepengguna',
                compact('users')
            )->render();
        }

        // =========================
        // RETURN VIEW
        // =========================
        return view(
            'admin.kelolapengguna',
            compact(
                'users',
                'totalAdmin',
                'totalKader',
                'totalOrangTua'
            )
        );
    }

    // =========================
    // DETAIL PENGGUNA
    // =========================
    public function detailPengguna($id)
    {
        // =========================
        // USER
        // =========================
        $user = DB::table('users')

            ->where(
                'id',
                $id
            )

            ->first();

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->where(
                'user_id',
                $id
            )

            ->first();

        // =========================
        // RETURN VIEW
        // =========================
        return view(
            'admin.detailpengguna',
            compact(
                'user',
                'anak'
            )
        );
    }

    // =========================
    // FORM TAMBAH PENGGUNA
    // =========================
    public function createPengguna()
    {
        return view(
            'admin.tambahpengguna'
        );
    }

    // =========================
    // SIMPAN PENGGUNA
    // =========================
    public function storePengguna(Request $request)
    {
        // =========================
        // VALIDASI ADMIN/KADER
        // =========================
        if (
            $request->role == 'admin' ||
            $request->role == 'kader'
        ) {

            $request->validate([

                'role' =>
                    'required',

                'nama' =>
                    'required|max:255',

                'email' =>
                    'required|email|unique:users,email',

                'nomor_hp' =>
                    'required',

                'alamat' =>
                    'required',

                'password' =>
                    'required|min:6|confirmed',

            ]);
        }

        // =========================
        // VALIDASI ORANG TUA
        // =========================
        if (
            $request->role == 'orang_tua'
        ) {

            $request->validate([

                'role' =>
                    'required',

                'nama' =>
                    'required|max:255',

                'nama_anak' =>
                    'required|max:255',

                'jenis_kelamin' =>
                    'required',

                'tanggal_lahir' =>
                    'required|date',

                'email' =>
                    'required|email|unique:users,email',

                'nomor_hp' =>
                    'required',

                'alamat' =>
                    'required',

                'password' =>
                    'required|min:6|confirmed',

            ]);
        }

        // =========================
        // INSERT USER
        // =========================
        $userId = DB::table('users')

            ->insertGetId([

                'nama' =>
                    $request->nama,

                'email' =>
                    $request->email,

                'role' =>
                    $request->role,

                'nomor_hp' =>
                    $request->nomor_hp,

                'alamat' =>
                    $request->alamat,

                'password' =>
                    Hash::make(
                        $request->password
                    ),

                'created_at' =>
                    now(),

                'updated_at' =>
                    now(),
            ]);

        // =========================
        // INSERT DATA ANAK
        // =========================
        if (
            $request->role == 'orang_tua'
        ) {

            DB::table('anak')->insert([

                'user_id' =>
                    $userId,

                'nama_anak' =>
                    $request->nama_anak,

                'jenis_kelamin' =>
                    $request->jenis_kelamin,

                'tanggal_lahir' =>
                    $request->tanggal_lahir,

                'created_at' =>
                    now(),

                'updated_at' =>
                    now(),
            ]);
        }

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route('admin.pengguna')

            ->with(
                'success',
                'Pengguna berhasil ditambahkan.'
            );
    }

    // =========================
    // FORM EDIT PENGGUNA
    // =========================
    public function editPengguna($id)
    {
        // =========================
        // USER
        // =========================
        $user = DB::table('users')

            ->where(
                'id',
                $id
            )

            ->first();

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->where(
                'user_id',
                $id
            )

            ->first();

        // =========================
        // RETURN VIEW
        // =========================
        return view(
            'admin.editpengguna',
            compact(
                'user',
                'anak'
            )
        );
    }

    // =========================
    // UPDATE PENGGUNA
    // =========================
    public function updatePengguna(
        Request $request,
        $id
    ) {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'nama' =>
                'required|max:255',

            'email' =>
                'required|email|unique:users,email,' . $id,

            'nomor_hp' =>
                'required',

            'alamat' =>
                'required',

        ]);

        // =========================
        // UPDATE USER
        // =========================
        DB::table('users')

            ->where(
                'id',
                $id
            )

            ->update([

                'nama' =>
                    $request->nama,

                'email' =>
                    $request->email,

                'nomor_hp' =>
                    $request->nomor_hp,

                'alamat' =>
                    $request->alamat,

                'updated_at' =>
                    now(),
            ]);

        // =========================
        // GET USER
        // =========================
        $user = DB::table('users')

            ->where(
                'id',
                $id
            )

            ->first();

        // =========================
        // UPDATE DATA ANAK
        // =========================
        if ($user->role == 'orang_tua') {

            DB::table('anak')

                ->where(
                    'user_id',
                    $id
                )

                ->update([

                    'nama_anak' =>
                        $request->nama_anak,

                    'jenis_kelamin' =>
                        $request->jenis_kelamin,

                    'tanggal_lahir' =>
                        $request->tanggal_lahir,

                    'updated_at' =>
                        now(),
                ]);
        }

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route(
                'admin.pengguna.detail',
                $id
            )

            ->with(
                'success',
                'Data pengguna berhasil diperbarui.'
            );
    }

    // =========================
    // RESET PASSWORD
    // =========================
    public function resetPassword(
        Request $request,
        $id
    ) {

        $request->validate([

            'password' =>
                'required|min:6|confirmed',

        ]);

        DB::table('users')

            ->where(
                'id',
                $id
            )

            ->update([

                'password' =>
                    Hash::make(
                        $request->password
                    ),

                'updated_at' =>
                    now(),
            ]);

        return redirect()

            ->back()

            ->with(
                'success',
                'Password berhasil direset.'
            );
    }

    // =========================
    // HAPUS PENGGUNA
    // =========================
    public function hapusPengguna($id)
    {
        // =========================
        // USER
        // =========================
        $user = DB::table('users')

            ->where(
                'id',
                $id
            )

            ->first();

        // =========================
        // HAPUS DATA ANAK
        // =========================
        if ($user && $user->role == 'orang_tua') {

            DB::table('anak')

                ->where(
                    'user_id',
                    $id
                )

                ->delete();
        }

        // =========================
        // HAPUS USER
        // =========================
        DB::table('users')

            ->where(
                'id',
                $id
            )

            ->delete();

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route('admin.pengguna')

            ->with(
                'success',
                'Pengguna berhasil dihapus.'
            );
    }

    // =========================
    // HALAMAN LAPORAN
    // =========================
    public function laporan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $semuaAnak = DB::table('anak')
            ->leftJoin(
                DB::raw('(
                    SELECT dp1.*
                    FROM data_pertumbuhan dp1
                    INNER JOIN (
                        SELECT anak_id, MAX(id) as last_id
                        FROM data_pertumbuhan
                        GROUP BY anak_id
                    ) dp2 ON dp1.id = dp2.last_id
                ) as perkembangan'),
                'anak.id',
                '=',
                'perkembangan.anak_id'
            )
            ->when($bulan, function ($query) use ($bulan) {
                $query->whereMonth('perkembangan.tanggal_pengukuran', $bulan);
            })
            ->when($tahun, function ($query) use ($tahun) {
                $query->whereYear('perkembangan.tanggal_pengukuran', $tahun);
            })
            ->select(
                'anak.id',
                'anak.jenis_kelamin',
                'perkembangan.status_gizi',
                'perkembangan.usia_bulan'
            )
            ->get();

        $totalAnak = $semuaAnak->count();

        $laki = $semuaAnak->where('jenis_kelamin', 'L')->count();
        $perempuan = $semuaAnak->where('jenis_kelamin', 'P')->count();

        $normal = 0;
        $stunting = 0;
        $stuntingBerat = 0;
        $tinggi = 0;
        $belumDicek = 0;

        foreach ($semuaAnak as $item) {
            if ($item->status_gizi == 'Normal') {
                $normal++;
            } elseif ($item->status_gizi == 'Stunting') {
                $stunting++;
            } elseif ($item->status_gizi == 'Stunting Berat') {
                $stuntingBerat++;
            } elseif ($item->status_gizi == 'Tinggi') {
                $tinggi++;
            } else {
                $belumDicek++;
            }
        }

        $usia0_6 = 0;
        $usia7_12 = 0;
        $usia13_18 = 0;
        $usia19_24 = 0;
        $usia25_36 = 0;
        $usia37_48 = 0;
        $usia49_60 = 0;

        foreach ($semuaAnak as $item) {
            if ($item->usia_bulan === null) {
                continue;
            }

            if ($item->usia_bulan <= 6) {
                $usia0_6++;
            } elseif ($item->usia_bulan <= 12) {
                $usia7_12++;
            } elseif ($item->usia_bulan <= 18) {
                $usia13_18++;
            } elseif ($item->usia_bulan <= 24) {
                $usia19_24++;
            } elseif ($item->usia_bulan <= 36) {
                $usia25_36++;
            } elseif ($item->usia_bulan <= 48) {
                $usia37_48++;
            } else {
                $usia49_60++;
            }
        }

        // =========================================================
        // TAMBAHAN: JIKA REQUEST BERASAL DARI AJAX, KEMBALIKAN JSON
        // =========================================================
        if ($request->ajax()) {
            return response()->json([
                'totalAnak'     => $totalAnak,
                'laki'          => $laki,
                'perempuan'     => $perempuan,
                'normal'        => $normal,
                'stunting'      => $stunting,
                'stuntingBerat' => $stuntingBerat,
                'tinggi'        => $tinggi,
                'belumDicek'    => $belumDicek,
                'usia0_6'       => $usia0_6,
                'usia7_12'      => $usia7_12,
                'usia13_18'     => $usia13_18,
                'usia19_24'     => $usia19_24,
                'usia25_36'     => $usia25_36,
                'usia37_48'     => $usia37_48,
                'usia49_60'     => $usia49_60
            ]);
        }

        // JIKA BUKAN AJAX (PERTAMA KALI HALAMAN DIBUKA), KEMBALIKAN VIEW
        return view('admin.laporan', compact(
            'bulan', 'tahun', 'totalAnak', 'laki', 'perempuan',
            'normal', 'stunting', 'stuntingBerat', 'tinggi', 'belumDicek',
            'usia0_6', 'usia7_12', 'usia13_18', 'usia19_24', 'usia25_36', 'usia37_48', 'usia49_60'
        ));
    }

    // =========================
    // CETAK LAPORAN PDF
    // =========================
    public function cetakLaporan(Request $request)
    {

        // =========================
        // FILTER BULAN
        // =========================
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // =========================
        // DATA ANAK TERBARU
        // =========================
        $anak = DB::table('anak')

            ->join(
                'users',
                'anak.user_id',
                '=',
                'users.id'
            )

            ->leftJoin(

                DB::raw('(

                    SELECT
                        dp1.*

                    FROM data_pertumbuhan dp1

                    INNER JOIN (

                        SELECT
                            anak_id,
                            MAX(id) as last_id

                        FROM data_pertumbuhan

                        GROUP BY anak_id

                    ) dp2

                    ON dp1.id = dp2.last_id

                ) as perkembangan'),

                'anak.id',
                '=',
                'perkembangan.anak_id'

            )

            ->when($bulan, function ($query) use ($bulan) {

                $query->whereMonth(

                    'perkembangan.tanggal_pengukuran',

                    $bulan

                );
            })

            ->when($tahun, function ($query) use ($tahun) { 
                
                $query->whereYear( 
                    'perkembangan.tanggal_pengukuran', 
                    $tahun 
                    
                );

            })

            ->select(

                'anak.nama_anak',

                'anak.jenis_kelamin',

                'users.nama as nama_orangtua',

                'perkembangan.usia_bulan',

                'perkembangan.berat_badan',

                'perkembangan.tinggi_badan',

                'perkembangan.z_score',

                'perkembangan.status_gizi',

                'perkembangan.tanggal_pengukuran'

            )

            ->get();

        // =========================
        // RINGKASAN
        // =========================
        $totalAnak = $anak->count();

        $laki = $anak

            ->where('jenis_kelamin', 'L')

            ->count();

        $perempuan = $anak

            ->where('jenis_kelamin', 'P')

            ->count();

        $tinggi = $anak

            ->where('status_gizi', 'Tinggi')

            ->count();

        $normal = $anak

            ->where('status_gizi', 'Normal')

            ->count();

        $stunting = $anak

            ->where('status_gizi', 'Stunting')

            ->count();

        $stuntingBerat = $anak

            ->where('status_gizi', 'Stunting Berat')

            ->count();

        // =========================
        // NAMA BULAN
        // =========================
        $namaBulan = [

            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'

        ];

        // =========================
        // PDF
        // =========================
        $pdf = Pdf::loadView(

            'admin.laporan-pdf',

            compact(

                'anak',

                'bulan',

                'tahun',

                'namaBulan',

                'totalAnak',

                'laki',

                'perempuan',

                'tinggi',

                'normal',

                'stunting',

                'stuntingBerat'

            )

        )->setPaper('a4', 'portrait');

        // =========================
        // DOWNLOAD PDF
        // =========================
        return $pdf->stream(

            'laporan-sigenting.pdf'

        );

    }
}