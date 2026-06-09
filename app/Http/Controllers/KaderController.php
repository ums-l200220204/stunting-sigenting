<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class KaderController extends Controller
{

    // =========================
    // DASHBOARD KADER
    // =========================
    public function dashboard(Request $request)
    {

        // =========================
        // SEARCH
        // =========================
        $search = $request->search;

        // =========================
        // AMBIL DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->join(
                'users',
                'anak.user_id',
                '=',
                'users.id'
            )

            ->select(

                'anak.*',

                'users.nama as nama_orangtua',

                'users.email',

                'users.nomor_hp'

            )

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'anak.nama_anak',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'users.nama',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'users.email',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'users.nomor_hp',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'anak.jenis_kelamin',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            ->orderBy('anak.id', 'asc')

            ->paginate(10)

            ->withQueryString();

        // =========================
        // TOTAL DATA
        // =========================
        $totalAnak = DB::table('anak')->count();

        // =========================
        // TOTAL LAKI
        // =========================
        $totalLaki = DB::table('anak')

            ->where(function ($query) {

                $query->where('jenis_kelamin', 'L')
                    ->orWhere('jenis_kelamin', 'Laki-Laki')
                    ->orWhere('jenis_kelamin', 'laki-laki');

            })

            ->count();

        // =========================
        // TOTAL PEREMPUAN
        // =========================
        $totalPerempuan = DB::table('anak')

            ->where(function ($query) {

                $query->where('jenis_kelamin', 'P')
                    ->orWhere('jenis_kelamin', 'Perempuan')
                    ->orWhere('jenis_kelamin', 'perempuan');

            })

            ->count();

        // =========================
        // RETURN VIEW
        // =========================
        return view('kader.dashboard', compact(

            'anak',

            'totalAnak',

            'totalLaki',

            'totalPerempuan',

            'search'

        ));

    }

    // =========================
    // DETAIL ANAK
    // =========================
    public function detailAnak($id)
    {

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->join(
                'users',
                'anak.user_id',
                '=',
                'users.id'
            )

            ->select(

                'anak.*',

                'users.nama as nama_orangtua',

                'users.email',

                'users.nomor_hp',

                'users.alamat'

            )

            ->where('anak.id', $id)

            ->first();

        // =========================
        // DATA TERAKHIR
        // =========================
        $terakhir = DB::table('data_pertumbuhan')

            ->where('anak_id', $id)

            ->latest('id')

            ->first();

        // =========================
        // RIWAYAT PERTUMBUHAN
        // =========================
        $pertumbuhan = DB::table('data_pertumbuhan')

            ->where('anak_id', $id)

            ->orderBy('tanggal_pengukuran', 'asc')

            ->get();

        // =========================
        // CHART
        // =========================
        $labels = [];

        $beratData = [];

        $tinggiData = [];

        foreach ($pertumbuhan as $item) {

            $labels[] = date(
                'd M',
                strtotime($item->tanggal_pengukuran)
            );

            $beratData[] = $item->berat_badan;

            $tinggiData[] = $item->tinggi_badan;

        }

        $labels = [];
        $beratData = [];
        $tinggiData = [];
        $beratAcuan = []; // Data untuk WHO
        $tinggiAcuan = []; // Data untuk WHO

        foreach ($pertumbuhan as $item) {
            $labels[] = date('d M', strtotime($item->tanggal_pengukuran));
            $beratData[] = $item->berat_badan;
            $tinggiData[] = $item->tinggi_badan;

            // Mengambil median WHO berdasarkan usia dan jenis kelamin anak
            $jk = $anak->jenis_kelamin;
            
            $standarTinggi = DB::table('standar_tinggi')
                ->where('usia_bulan', $item->usia_bulan)
                ->where(function($q) use ($jk) {
                    $q->where('jenis_kelamin', $jk)->orWhere('jenis_kelamin', strtoupper(substr($jk, 0, 1)));
                })->value('median');

            $standarBerat = DB::table('standar_berat')
                ->where('usia_bulan', $item->usia_bulan)
                ->where(function($q) use ($jk) {
                    $q->where('jenis_kelamin', $jk)->orWhere('jenis_kelamin', strtoupper(substr($jk, 0, 1)));
                })->value('median');

            $tinggiAcuan[] = $standarTinggi ?? 0;
            $beratAcuan[] = $standarBerat ?? 0;
        }

        return view('kader.detailanak', compact(
            'anak', 'terakhir', 'labels', 'beratData', 'tinggiData', 'beratAcuan', 'tinggiAcuan'
        ));

        // =========================
        // RETURN VIEW
        // =========================
        return view('kader.detailanak', compact(

            'anak',

            'terakhir',

            'labels',

            'beratData',

            'tinggiData'

        ));

    }

    // =========================
    // HALAMAN INPUT PERKEMBANGAN
    // =========================
    public function inputPerkembangan($id)
    {

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->where('id', $id)

            ->first();

        // =========================
        // RETURN VIEW
        // =========================
        return view(

            'kader.inputperkembangan',

            compact('anak')

        );

    }

    // =========================
    // SIMPAN PERKEMBANGAN
    // =========================
public function storePerkembangan(Request $request)
    {
        $request->validate([
            'anak_id' => 'required',
            'tanggal_pengukuran' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
        ]);

        // =========================
        // AMBIL DATA ANAK
        // =========================
        $anak = DB::table('anak')
            ->where('id', $request->anak_id)
            ->first();

        if (!$anak) {
            return back()->with('error', 'Data anak tidak ditemukan');
        }

        // =========================
        // HITUNG USIA BULAN
        // =========================
        $usiaBulan = (int) Carbon::parse($anak->tanggal_lahir)
            ->diffInMonths(Carbon::parse($request->tanggal_pengukuran));

        // BATASI MAX 60
        if ($usiaBulan > 60) {
            $usiaBulan = 60;
        }

        // =========================
        // KONVERSI JK
        // =========================
        $jk = strtoupper(trim($anak->jenis_kelamin));

        // =========================
        // AMBIL DATA WHO
        // =========================
        $standarTinggi = DB::table('standar_tinggi')
            ->where('usia_bulan', $usiaBulan)
            ->where(function ($query) use ($jk) {
                if ($jk == 'L') {
                    $query->whereIn('jenis_kelamin', [
                        'L', 'LAKI-LAKI', 'Laki-laki', 'Laki-Laki'
                    ]);
                } else {
                    $query->whereIn('jenis_kelamin', [
                        'P', 'PEREMPUAN', 'Perempuan'
                    ]);
                }
            })
            ->first();

        // Failsafe: Pastikan standar WHO ditemukan sebelum dihitung
        if (!$standarTinggi) {
            return back()->with('error', 'Data standar WHO tidak ditemukan untuk usia dan jenis kelamin ini.');
        }

        // =========================
        // HITUNG Z SCORE (Standar WHO)
        // =========================
        $tinggi = $request->tinggi_badan;
        $selisih = $tinggi - $standarTinggi->median;

        // Tentukan nilai simpang baku (SD) berdasarkan posisi tinggi anak
        if ($selisih < 0) {
            // Jika di bawah median
            $sd = $standarTinggi->median - $standarTinggi->sd_min_1;
        } else {
            // Jika di atas atau sama dengan median
            $sd = $standarTinggi->sd_plus_1 - $standarTinggi->median;
        }

        // Hindari division by zero
        $zscore = ($sd != 0) ? ($selisih / $sd) : 0;

        // =========================
        // STATUS GIZI
        // =========================
        if ($zscore < -3) {
            $status = 'Stunting Berat';
        } elseif ($zscore < -2) {
            $status = 'Stunting';
        } elseif ($zscore <= 2) {
            $status = 'Normal';
        } else {
            $status = 'Tinggi';
        }

        // =========================
        // SIMPAN DATA
        // =========================
        DB::table('data_pertumbuhan')->insert([
            'anak_id'            => $request->anak_id,
            'tanggal_pengukuran' => $request->tanggal_pengukuran,
            'usia_bulan'         => $usiaBulan,
            'berat_badan'        => $request->berat_badan,
            'tinggi_badan'       => $request->tinggi_badan,
            'z_score'            => round($zscore, 2),
            'status_gizi'        => $status,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Data perkembangan berhasil disimpan');
    }

    public function previewGizi(Request $request)
    {
        $anak = DB::table('anak')
            ->where('id', $request->anak_id)
            ->first();

        // =========================
        // HITUNG USIA BULAN
        // =========================
        $usiaBulan = (int) Carbon::parse(
            $anak->tanggal_lahir
        )->diffInMonths(
            Carbon::parse($request->tanggal_pengukuran)
        );

        // MAX 60 BULAN
        $usiaBulan = min($usiaBulan, 60);

        // =========================
        // NORMALISASI JK
        // =========================
        $jk = strtoupper(
            trim($anak->jenis_kelamin)
        );

        // =========================
        // QUERY WHO
        // =========================
        $standarTinggi = DB::table('standar_tinggi')
            ->where('usia_bulan', $usiaBulan)
            ->where(function ($query) use ($jk) {

                if ($jk == 'L') {

                    $query->whereIn(
                        'jenis_kelamin',
                        [
                            'L',
                            'Laki-laki',
                            'Laki-Laki',
                            'LAKI-LAKI'
                        ]
                    );

                } else {

                    $query->whereIn(
                        'jenis_kelamin',
                        [
                            'P',
                            'Perempuan',
                            'PEREMPUAN'
                        ]
                    );
                }
            })
            ->first();

        // =========================
        // JIKA DATA TIDAK ADA
        // =========================
        if (!$standarTinggi) {

            return response()->json([

                'z_score' => '-',

                'status_gizi' =>
                    'Data WHO tidak ditemukan',

                'debug' => [
                    'usia_bulan' => $usiaBulan,
                    'jenis_kelamin' => $jk
                ]
            ]);
        }

        // =========================
        // HITUNG SD
        // =========================
        $sd = $standarTinggi->sd_plus_1
            - $standarTinggi->median;

        // =========================
        // HITUNG Z SCORE
        // =========================
        $zscore = (
            $request->tinggi_badan
            - $standarTinggi->median
        ) / $sd;

        // =========================
        // STATUS
        // =========================
        if ($zscore < -3) {

            $status = 'Stunting Berat';

        } elseif ($zscore < -2) {

            $status = 'Stunting';

        } elseif ($zscore <= 2) {

            $status = 'Normal';

        } else {

            $status = 'Tinggi';
        }

        return response()->json([

            'z_score' => round($zscore, 2),

            'status_gizi' => $status
        ]);
    }

    // =========================
    // HALAMAN REKOMENDASI
    // =========================
    // =========================
    public function rekomendasi(Request $request)
    {
        // 1. Tangkap kata kunci pencarian
        $search = $request->query('search');

        // 2. Ambil data (sekaligus lakukan filter jika ada kata kunci)
        $rekomendasi = DB::table('rekomendasi_nutrisi')
            ->when($search, function ($query) use ($search) {
                // WAJIB dibungkus function($q) agar orWhere tidak error
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%")
                      ->orWhere('kategori_usia', 'like', "%{$search}%");
                });
            })
            ->latest('id')
            ->get();

        // 3. Kembalikan tampilan HANYA DI SINI (paling bawah)
        return view('kader.rekomendasi', compact('rekomendasi'));
    }

    // =========================
    // SIMPAN REKOMENDASI
    // =========================
    public function storeRekomendasi(Request $request)
    {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([
            'kategori_usia'   => 'required',
            'judul'           => 'required',
            'deskripsi'       => 'required',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg|max:10000', // Tambahkan validasi gambar
        ]);

        // =========================
        // UPLOAD GAMBAR
        // =========================
        $imagePath = null;
        if ($request->hasFile('gambar')) {
            // Gambar akan disimpan di storage/app/public/rekomendasi
            $imagePath = $request->file('gambar')->store('rekomendasi', 'public');
        }

        // =========================
        // SIMPAN DATABASE
        // =========================
        DB::table('rekomendasi_nutrisi')->insert([
            'user_id'         => auth()->id(),
            'kategori_usia'   => $request->kategori_usia,
            'judul'           => $request->judul,
            'deskripsi'       => $request->deskripsi,
            'gambar'          => $imagePath, // Simpan path gambar
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        // =========================
        // REDIRECT
        // =========================
        return redirect()
            ->route('kader.rekomendasi')
            ->with(
                'success',
                'Rekomendasi nutrisi berhasil ditambahkan'
            );

    }

    // =========================
    // UPDATE REKOMENDASI
    // =========================
    public function updateRekomendasi(Request $request, $id)
    {
        $request->validate([
            'kategori_usia'   => 'required',
            'judul'           => 'required',
            'deskripsi'       => 'required',
            'gambar'          => 'nullable|image|mimes:jpeg,png,jpg,heic|max:10000',
        ]);

        $rekomendasi = DB::table('rekomendasi_nutrisi')->where('id', $id)->first();
        $imagePath = $rekomendasi->gambar;

        // Jika user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('rekomendasi', 'public');
        }

        DB::table('rekomendasi_nutrisi')->where('id', $id)->update([
            'kategori_usia'   => $request->kategori_usia,
            'judul'           => $request->judul,
            'deskripsi'       => $request->deskripsi,
            'gambar'          => $imagePath,
            'updated_at'      => now(),
        ]);

        return redirect()->route('kader.rekomendasi')->with('success', 'Rekomendasi nutrisi berhasil diperbarui');
    }

    // =========================
    // HAPUS REKOMENDASI
    // =========================
    public function destroyRekomendasi($id)
    {
        $rekomendasi = DB::table('rekomendasi_nutrisi')->where('id', $id)->first();

        // Hapus file gambar fisik dari storage
        if ($rekomendasi->gambar && Storage::disk('public')->exists($rekomendasi->gambar)) {
            Storage::disk('public')->delete($rekomendasi->gambar);
        }

        // Hapus data dari database
        DB::table('rekomendasi_nutrisi')->where('id', $id)->delete();

        return redirect()->route('kader.rekomendasi')->with('success', 'Rekomendasi nutrisi berhasil dihapus');
    }

    // =========================
    // HALAMAN TAMBAH REKOMENDASI
    // =========================
    public function createRekomendasi()
    {
        return view('kader.tambah-rekomendasi');
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
        return view('kader.laporan', compact(
            'bulan', 'tahun', 'totalAnak', 'laki', 'perempuan',
            'normal', 'stunting', 'stuntingBerat', 'tinggi', 'belumDicek',
            'usia0_6', 'usia7_12', 'usia13_18', 'usia19_24', 'usia25_36', 'usia37_48', 'usia49_60'
        ));
    }


    // =========================
    // HALAMAN TAMBAH
    // =========================
    public function create()
    {

        return view('kader.tambah');

    }

    // =========================
    // SIMPAN DATA
    // =========================
    public function store(Request $request)
    {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'nama_anak'             => 'required',

            'jenis_kelamin'         => 'required',

            'tanggal_lahir'         => 'required|date',

            'nama'                  => 'required',

            'email'                 => 'required|email|unique:users,email',

            'nomor_hp'              => 'required',

            'alamat'                => 'required',

            'password'              => 'required|min:6|confirmed',

        ]);

        // =========================
        // HITUNG USIA BULAN
        // =========================
        $usiaBulan = Carbon::parse(

            $request->tanggal_lahir

        )->diffInMonths(now());

        // =========================
        // SIMPAN USER
        // =========================
        $userId = DB::table('users')->insertGetId([

            'nama'              => $request->nama,

            'email'             => $request->email,

            'nomor_hp'          => $request->nomor_hp,

            'alamat'            => $request->alamat,

            'password'          => bcrypt($request->password),

            'role'              => 'orang_tua',

            'created_at'        => now(),

            'updated_at'        => now(),

        ]);

        // =========================
        // SIMPAN ANAK
        // =========================
        DB::table('anak')->insert([

            'user_id'           => $userId,

            'nama_anak'         => $request->nama_anak,

            'jenis_kelamin'     => $request->jenis_kelamin,

            'tanggal_lahir'     => $request->tanggal_lahir,

            'usia_bulan'        => $usiaBulan,

            'created_at'        => now(),

            'updated_at'        => now(),

        ]);

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route('kader.dashboard')

            ->with(

                'success',

                'Data anak berhasil ditambahkan'

            );

    }

    // =========================
    // HALAMAN EDIT
    // =========================
    public function edit($id)
    {

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->join(
                'users',
                'anak.user_id',
                '=',
                'users.id'
            )

            ->select(

                'anak.*',

                'users.nama',

                'users.email',

                'users.nomor_hp',

                'users.alamat'

            )

            ->where('anak.id', $id)

            ->first();

        // =========================
        // DATA ORANG TUA
        // =========================
        $orangtua = DB::table('users')

            ->where('role', 'orang_tua')

            ->orderBy('nama', 'asc')

            ->get();

        // =========================
        // RETURN VIEW
        // =========================
        return view('kader.edit', compact(

            'anak',

            'orangtua'

        ));

    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'nama_anak'         => 'required',

            'jenis_kelamin'     => 'required',

            'tanggal_lahir'     => 'required|date',

            'nama'              => 'required',

            'email'             => 'required|email',

            'nomor_hp'          => 'required',

            'alamat'            => 'required',

        ]);

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->where('id', $id)

            ->first();

        // =========================
        // UPDATE USER
        // =========================
        DB::table('users')

            ->where('id', $anak->user_id)

            ->update([

                'nama'          => $request->nama,

                'email'         => $request->email,

                'nomor_hp'      => $request->nomor_hp,

                'alamat'        => $request->alamat,

                'updated_at'    => now(),

            ]);

        // =========================
        // UPDATE ANAK
        // =========================
        DB::table('anak')

            ->where('id', $id)

            ->update([

                'nama_anak'         => $request->nama_anak,

                'jenis_kelamin'     => $request->jenis_kelamin,

                'tanggal_lahir'     => $request->tanggal_lahir,

                'updated_at'        => now(),

            ]);

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route('kader.dashboard')

            ->with(

                'success',

                'Data anak berhasil diupdate'

            );

    }

    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {

        // =========================
        // DATA ANAK
        // =========================
        $anak = DB::table('anak')

            ->where('id', $id)

            ->first();

        // =========================
        // HAPUS PERTUMBUHAN
        // =========================
        DB::table('data_pertumbuhan')

            ->where('anak_id', $id)

            ->delete();

        // =========================
        // HAPUS ANAK
        // =========================
        DB::table('anak')

            ->where('id', $id)

            ->delete();

        // =========================
        // HAPUS USER
        // =========================
        DB::table('users')

            ->where('id', $anak->user_id)

            ->delete();

        // =========================
        // REDIRECT
        // =========================
        return redirect()

            ->route('kader.dashboard')

            ->with(

                'success',

                'Data anak berhasil dihapus'

            );

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

            'kader.laporan-pdf',

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