<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;

// ================= LANDING PAGE =================
Route::get('/', function () {

    return view('landing');

});

// ================= LOGIN =================
Route::get('/login', [

    AuthController::class,
    'login'

])->name('login');

Route::post('/login', [

    AuthController::class,
    'authenticate'

]);


// ================= REGISTER =================
Route::get('/register', [

    AuthController::class,
    'register'

])->name('register');

Route::post('/register', [

    AuthController::class,
    'storeRegister'

]);

// Rute Lupa Password
Route::get('/lupa-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('/lupa-password/check', [AuthController::class, 'checkForgotPassword'])->name('forgot.password.check');

// Rute Reset Password (Perhatikan /{token} dan name-nya WAJIB 'password.reset')
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

// ===================================================
// ADMIN
// ===================================================
Route::middleware('auth:admin')->group(function () {

    // REDIRECT /admin
    Route::get('/admin', function () {

        return redirect()->route(
            'admin.pengguna'
        );

    });

    // KELOLA PENGGUNA
    Route::get('/admin/pengguna', [

        AdminController::class,
        'kelolaPengguna'

    ])->name('admin.pengguna');

    // TAMBAH PENGGUNA
    Route::get('/admin/pengguna/create', [

        AdminController::class,
        'createPengguna'

    ])->name('admin.pengguna.create');

    // SIMPAN PENGGUNA
    Route::post('/admin/pengguna/store', [

        AdminController::class,
        'storePengguna'

    ])->name('admin.pengguna.store');

    // DETAIL PENGGUNA
    Route::get('/admin/pengguna/{id}', [

        AdminController::class,
        'detailPengguna'

    ])->name('admin.pengguna.detail');

    // RESET PASSWORD
    Route::post('/admin/pengguna/{id}/reset-password', [

        AdminController::class,
        'resetPassword'

    ])->name('admin.pengguna.resetpassword');

    // =========================
    // EDIT PENGGUNA
    // =========================
    Route::get(
        '/admin/pengguna/{id}/edit',
        [AdminController::class, 'editPengguna']
    )->name('admin.pengguna.edit');

    // =========================
    // UPDATE PENGGUNA
    // =========================
    Route::put(
        '/admin/pengguna/{id}',
        [AdminController::class, 'updatePengguna']
    )->name('admin.pengguna.update');

    // =========================
    // HAPUS PENGGUNA
    // =========================
    Route::delete(
        '/admin/pengguna/{id}',
        [AdminController::class, 'hapusPengguna']
    )->name('admin.pengguna.hapus');

    // =========================
    // LAPORAN ADMIN
    // =========================
    Route::get(
        '/admin/laporan',
        [AdminController::class, 'laporan']
    )->name('admin.laporan');

    // =========================
    // CETAK LAPORAN ADMIN
    // =========================
    Route::get(
        '/admin/laporan/cetak',
        [AdminController::class, 'cetakLaporan']
    )->name('admin.laporan.cetak');

});

// ===================================================
// KADER
// ===================================================
Route::middleware('auth:kader')->group(function () {

    // ================= DASHBOARD =================
    Route::get('/kader', [

        KaderController::class,
        'dashboard'

    ])->name('kader.dashboard');

    // ================= DETAIL ANAK =================
    Route::get('/kader/detail-anak/{id}', [

        KaderController::class,
        'detailAnak'

    ])->name('kader.detailanak');

    // ================= TAMBAH DATA ANAK =================
    Route::get('/kader/tambah', [

        KaderController::class,
        'create'

    ])->name('kader.create');

    Route::post('/kader/store', [

        KaderController::class,
        'store'

    ])->name('kader.store');

    // ================= EDIT DATA =================
    Route::get('/kader/edit/{id}', [

        KaderController::class,
        'edit'

    ])->name('kader.edit');

    Route::put('/kader/update/{id}', [

        KaderController::class,
        'update'

    ])->name('kader.update');

    // ================= HAPUS DATA =================
    Route::delete('/kader/delete/{id}', [

        KaderController::class,
        'destroy'

    ])->name('kader.destroy');

    // ================= INPUT PERKEMBANGAN =================
    Route::get('/kader/perkembangan/{id}', [

        KaderController::class,
        'inputPerkembangan'

    ])->name('kader.perkembangan');

    // ================= PREVIEW GIZI =================
    Route::post('/kader/preview-gizi', [

        KaderController::class,
        'previewGizi'

    ])->name('kader.preview.gizi');

    // ================= SIMPAN PERKEMBANGAN =================
    Route::post('/kader/perkembangan/store', [

        KaderController::class,
        'storePerkembangan'

    ])->name('kader.perkembangan.store');

   // ================= REKOMENDASI NUTRISI =================
    Route::get('/kader/rekomendasi', [KaderController::class, 'rekomendasi'])->name('kader.rekomendasi');
    
    // ROUTE BARU: Halaman Tambah
    Route::get('/kader/rekomendasi/tambah', [KaderController::class, 'createRekomendasi'])->name('kader.rekomendasi.create');
    Route::post('/kader/rekomendasi/store', [KaderController::class, 'storeRekomendasi'])->name('kader.rekomendasi.store');
    
    // Route Update & Delete
    Route::put('/kader/rekomendasi/{id}', [KaderController::class, 'updateRekomendasi'])->name('kader.rekomendasi.update');
    Route::delete('/kader/rekomendasi/{id}', [KaderController::class, 'destroyRekomendasi'])->name('kader.rekomendasi.destroy');
    
    // ================= DATA LAPORAN =================
    Route::get('/kader/laporan', [

        KaderController::class,
        'laporan'

    ])->name('kader.laporan');

    // ================= LAPORAN PDF =================
    Route::get('/kader/laporan/cetak', [

        KaderController::class,
        'cetakLaporan'

    ])->name('kader.laporan.cetak');

});

// ===================================================
// ORANG TUA
// ===================================================
Route::middleware('auth:orangtua')->group(function () {

    // ================= DASHBOARD =================
    Route::get('/orangtua', [

        OrangTuaController::class,
        'dashboard'

    ])->name('orangtua.dashboard');

    // ================= INPUT DATA =================
    Route::get('/orangtua/input', [

        OrangTuaController::class,
        'input'

    ])->name('orangtua.input');

    // ================= PROSES INPUT =================
    Route::post('/orangtua/input/proses', [

        OrangTuaController::class,
        'prosesInput'

    ])->name('orangtua.input.proses');

    // ================= PERKEMBANGAN =================
    Route::get('/orangtua/perkembangan', [

        OrangTuaController::class,
        'perkembangan'

    ])->name('orangtua.perkembangan');

    // ================= REKOMENDASI =================
    Route::get('/orangtua/rekomendasi', [

        OrangTuaController::class,
        'rekomendasi'

    ])->name('orangtua.rekomendasi');

    // ================= DETAIL REKOMENDASI =================
    Route::get('/orangtua/rekomendasi/{kategori}', [

        OrangTuaController::class,
        'detailRekomendasi'

    ])->name('orangtua.detailrekomendasi');

    // Tambahkan di dalam group route 'orang_tua'
    Route::get('/orangtua/profil', [App\Http\Controllers\OrangTuaController::class, 'editProfil'])->name('orangtua.profil');
    Route::put('/orangtua/profil', [App\Http\Controllers\OrangTuaController::class, 'updateProfil'])->name('orangtua.profil.update');

});

// ================= LOGOUT =================
Route::post('/logout', [

    AuthController::class,
    'logout'

])->name('logout');