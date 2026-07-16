<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        // 1. Mengambil data statistik untuk ditampilkan
        $totalAnak = DB::table('anak')->count();
        $totalKader = DB::table('users')->where('role', 'kader')->count();
        
        // 2. Mengirim data ke view landing page
        return view('landing', compact('totalAnak', 'totalKader'));
    }
}