<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrangTuaController extends Controller
{

    // =========================
    // DASHBOARD
    // =========================
    public function dashboard()
    {

        $anak = DB::table('anak')
            ->where('user_id', Auth::id())
            ->first();

        $perkembangan = DB::table('data_pertumbuhan')
            ->where('anak_id', $anak->id ?? 0)
            ->latest('id')
            ->first();

        return view('orangtua.dashboard', compact(

            'anak',
            'perkembangan'

        ));

    }

    // =========================
    // HALAMAN INPUT
    // =========================
    public function input()
    {

        $anak = DB::table('anak')
            ->where('user_id', Auth::id())
            ->first();

        return view('orangtua.input', compact('anak'));

    }

    // =========================
    // PROSES HITUNG Z SCORE
    // =========================
    public function prosesInput(Request $request)
    {
        $request->validate([
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
        ]);

        $anak = DB::table('anak')
            ->where('user_id', Auth::id())
            ->first();

        // Tambahan keamanan: Cek apakah data anak ditemukan
        if (!$anak) {
            return back()->with('error', 'Data profil anak belum ditemukan.');
        }

        $berat = $request->berat_badan;
        $tinggi = $request->tinggi_badan;
        
        $usia = (int) Carbon::parse($anak->tanggal_lahir)->diffInMonths(now());
        $jk = $anak->jenis_kelamin;

        // =========================
        // AMBIL STANDAR WHO
        // =========================
        // 1. Ambil Standar Tinggi
        $standarTinggi = DB::table('standar_tinggi')
            ->where('usia_bulan', $usia)
            ->where('jenis_kelamin', $jk)
            ->first();

        // 2. Ambil Standar Berat (TAMBAHAN BARU)
        $standarBerat = DB::table('standar_berat')
            ->where('usia_bulan', $usia)
            ->where('jenis_kelamin', $jk)
            ->first();

        // =========================
        // CEK DATA WHO
        // =========================
        // Pengecekan diperbarui untuk memastikan kedua standar ditemukan
        if (!$standarTinggi || !$standarBerat) {
            return back()->with('error', 'Data standar WHO tidak ditemukan untuk usia dan jenis kelamin ini.');
        }

        // =========================
        // HITUNG Z SCORE (Sesuai Standar WHO)
        // =========================
        $selisih = $tinggi - $standarTinggi->median;

        // Tentukan nilai simpang baku (SD) berdasarkan posisi tinggi anak
        if ($selisih < 0) {
            // Di bawah median
            $sd = $standarTinggi->median - $standarTinggi->sd_minus_1;
        } else {
            // Di atas atau sama dengan median
            $sd = $standarTinggi->sd_plus_1 - $standarTinggi->median;
        }

        // Hindari division by zero (meski sangat jarang pada tabel rujukan)
        $zscore = ($sd != 0) ? ($selisih / $sd) : 0;

        // =========================
        // STATUS GIZI
        // =========================
        if ($zscore < -3) {
            $status = 'Stunting Berat'; // Sesuai Kemenkes: Sangat Pendek
        } elseif ($zscore < -2) {
            $status = 'Stunting';       // Sesuai Kemenkes: Pendek
        } elseif ($zscore <= 2) {
            $status = 'Normal';         // Sesuai Kemenkes: Normal
        } else {
            $status = 'Tinggi';         // Sesuai Kemenkes: Tinggi
        }

        // =========================
        // SIMPAN DATA
        // =========================
        DB::table('data_pertumbuhan')->insert([
            'anak_id'            => $anak->id,
            'tanggal_pengukuran' => now(),
            'usia_bulan'         => $usia,
            'berat_badan'        => $berat,
            'tinggi_badan'       => $tinggi,
            // TAMBAHAN BARU: Simpan ID dari tabel referensi
            'standar_berat_id'   => $standarBerat->id,
            'standar_tinggi_id'  => $standarTinggi->id,
            'z_score'            => round($zscore, 2),
            'status_gizi'        => $status,
            'created_at'         => now(),
            'updated_at'         => now()
        ]);

        return redirect()
            ->route('orangtua.input')
            ->with([
                'success' => true,
                'zscore'  => round($zscore, 2),
                'status'  => $status
            ]);
    }

    // =========================
    // HALAMAN PERKEMBANGAN
    // =========================
    // Update fungsi perkembangan()
    public function perkembangan()
    {
        $anak = DB::table('anak')->where('user_id', Auth::id())->first();
        if (!$anak) return redirect()->back();

        $data = DB::table('data_pertumbuhan')
            ->where('anak_id', $anak->id)
            ->orderBy('tanggal_pengukuran', 'asc')
            ->get();

        $labels = [];
        $beratData = [];
        $tinggiData = [];
        $beratAcuan = []; // Baru
        $tinggiAcuan = []; // Baru

        foreach ($data as $item) {
            $labels[] = Carbon::parse($item->tanggal_pengukuran)->format('d M');
            $beratData[] = $item->berat_badan;
            $tinggiData[] = $item->tinggi_badan;

            // Ambil data standar WHO untuk usia tersebut
            $acuanTinggi = DB::table('standar_tinggi')
                ->where('usia_bulan', $item->usia_bulan)
                ->where('jenis_kelamin', $anak->jenis_kelamin)
                ->value('median');
            
            $acuanBerat = DB::table('standar_berat')
                ->where('usia_bulan', $item->usia_bulan)
                ->where('jenis_kelamin', $anak->jenis_kelamin)
                ->value('median');

            $tinggiAcuan[] = $acuanTinggi;
            $beratAcuan[] = $acuanBerat;
        }

        $terakhir = DB::table('data_pertumbuhan')->where('anak_id', $anak->id)->latest('id')->first();

        return view('orangtua.perkembangan', compact(
            'labels', 'beratData', 'tinggiData', 'beratAcuan', 'tinggiAcuan', 'terakhir'
        ));
    }

    // =========================
    // HALAMAN LIST REKOMENDASI
    // =========================
    public function rekomendasi()
    {

        // =========================
        // AMBIL SEMUA KATEGORI
        // =========================
        $kategori = DB::table('rekomendasi_nutrisi')
            ->select('kategori_usia')
            ->distinct()
            ->get();

        return view(

            'orangtua.rekomendasi',
            compact('kategori')

        );

    }

    // =========================
    // DETAIL REKOMENDASI
    // =========================
    public function detailRekomendasi($kategori)
    {

        // =========================
        // AMBIL DATA ANAK
        // =========================
        $anak = DB::table('anak')
            ->where('user_id', Auth::id())
            ->first();

        // =========================
        // DATA TERAKHIR
        // =========================
        $perkembangan = DB::table('data_pertumbuhan')
            ->where('anak_id', $anak->id ?? 0)
            ->latest('id')
            ->first();

        // =========================
        // AMBIL REKOMENDASI
        // =========================
        $rekomendasi = DB::table('rekomendasi_nutrisi')
            ->where('kategori_usia', $kategori)
            ->get();

        return view(

            'orangtua.detailrekomendasi',

            compact(

                'kategori',
                'rekomendasi',
                'perkembangan'

            )

        );

    }

    // =========================
    // HALAMAN EDIT PROFIL
    // =========================
    public function editProfil()
    {
        $user = Auth::user();
        
        $anak = DB::table('anak')
            ->where('user_id', $user->id)
            ->first();

        return view('orangtua.profil', compact('user', 'anak'));
    }

    // =========================
    // UPDATE PROFIL
    // =========================
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi input form
        $request->validate([
            // Data Orang Tua
            'nama'          => 'required',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'nomor_hp'      => 'required',
            'alamat'        => 'required',
            
            // Data Anak
            'nama_anak'     => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
        ], [
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir anak tidak boleh melebihi hari ini.',
        ]);

        // 2. Proses Update dengan Try-Catch
        try {
            // Update Data User (Orang Tua)
            $userData = [
                'nama'       => $request->nama,
                'email'      => $request->email,
                'nomor_hp'   => $request->nomor_hp,
                'alamat'     => $request->alamat,
                'updated_at' => now(),
            ];

            DB::table('users')->where('id', $user->id)->update($userData);

            // Update Data Anak
            DB::table('anak')->where('user_id', $user->id)->update([
                'nama_anak'     => $request->nama_anak,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'updated_at'    => now(),
            ]);

            return back()->with('success', 'Profil dan data anak berhasil diperbarui!');

        } catch (\Exception $e) {
            // Jika terjadi kegagalan (misal database error), kembalikan dengan pesan error
            return back()->with('error', 'Terjadi kesalahan sistem saat memperbarui profil. Silakan coba lagi.')->withInput();
        }
    }

}