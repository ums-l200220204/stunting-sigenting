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

        $berat = $request->berat_badan;

        $tinggi = $request->tinggi_badan;

        $usia = (int) Carbon::parse($anak->tanggal_lahir)
        ->diffInMonths(now());

        $jk = $anak->jenis_kelamin;

        // =========================
        // AMBIL STANDAR WHO
        // =========================
        $standarTinggi = DB::table('standar_tinggi')
            ->where('usia_bulan', $usia)
            ->where('jenis_kelamin', $jk)
            ->first();

        // =========================
        // CEK DATA WHO
        // =========================
        if (!$standarTinggi) {

            return back()->with(

                'error',
                'Data standar WHO tidak ditemukan'

            );

        }

        // =========================
        // HITUNG Z SCORE
        // =========================
        $sd = $standarTinggi->sd_plus_1
            - $standarTinggi->median;

        $zscore = ($tinggi
            - $standarTinggi->median) / $sd;

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

            'anak_id' => $anak->id,

            'tanggal_pengukuran' => now(),

            'usia_bulan' => $usia,

            'berat_badan' => $berat,

            'tinggi_badan' => $tinggi,

            'z_score' => round($zscore, 2),

            'status_gizi' => $status,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        return redirect()
            ->route('orangtua.input')
            ->with([

                'success' => true,

                'zscore' => round($zscore, 2),

                'status' => $status

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

}