<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{

    // =========================
    // HALAMAN LOGIN
    // =========================
    public function login()
    {

        return view('auth.login');

    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function authenticate(Request $request)
    {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'login' => 'required',

            'password' => 'required'

        ], [

            'login.required' => 'Email atau Nomor HP wajib diisi.',

            'password.required' => 'Password wajib diisi.'

        ]);

        // =========================
        // CARI USER
        // =========================
        $user = User::where(

                'email',
                $request->login

            )

            ->orWhere(

                'nomor_hp',
                $request->login

            )

            ->first();

        // =========================
        // CEK USER
        // =========================
        if ($user) {

            // =========================
            // CEK PASSWORD
            // =========================
            if (Hash::check(

                $request->password,
                $user->password

            )) {

                // =========================
                // LOGIN BERDASARKAN ROLE
                // =========================

                // ADMIN
                if ($user->role == 'admin') {

                    Auth::guard('admin')
                        ->login($user);

                    $request->session()
                        ->regenerate();

                    return redirect('/admin');

                }

                // KADER
                elseif ($user->role == 'kader') {

                    Auth::guard('kader')
                        ->login($user);

                    $request->session()
                        ->regenerate();

                    return redirect('/kader');

                }

                // ORANG TUA
                else {

                    Auth::guard('orangtua')
                        ->login($user);

                    $request->session()
                        ->regenerate();

                    return redirect('/orangtua');

                }

            } else {

                // =========================
                // PASSWORD SALAH
                // =========================
                return back()->withErrors([

                    'password' => 'Password yang Anda masukkan salah.'

                ])->onlyInput('login');

            }

        } else {

            // =========================
            // EMAIL / NOMOR HP SALAH
            // =========================
            return back()->withErrors([

                'login' => 'Email atau Nomor HP tidak terdaftar.'

            ])->onlyInput('login');

        }

    }

    // =========================
    // HALAMAN REGISTER
    // =========================
    public function register()
    {

        return view('auth.register');

    }

    // =========================
    // PROSES REGISTER
    // =========================
    public function storeRegister(Request $request)
    {

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'nama' => 'required',

            'email' => 'required|email|unique:users,email',

            'nomor_hp' => 'required',

            'alamat' => 'required',

            'password' => 'required|min:6',

            'nama_anak' => 'required',

            'tanggal_lahir' => 'required',

            'jenis_kelamin' => 'required'

        ]);

        // =========================
        // SIMPAN USER
        // =========================
        $user = User::create([

            'nama' => $request->nama,

            'email' => $request->email,

            'nomor_hp' => $request->nomor_hp,

            'alamat' => $request->alamat,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'orang_tua'

        ]);

        // =========================
        // HITUNG USIA BULAN
        // =========================
        $tanggalLahir = Carbon::parse(
            $request->tanggal_lahir
        );

        $usiaBulan = $tanggalLahir
            ->diffInMonths(Carbon::now());

        // =========================
        // SIMPAN DATA ANAK
        // =========================
        DB::table('anak')->insert([

            'user_id' => $user->id,

            'nama_anak' => $request->nama_anak,

            'tanggal_lahir' => $request->tanggal_lahir,

            'jenis_kelamin' => $request->jenis_kelamin,

            'usia_bulan' => $usiaBulan,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        // =========================
        // REDIRECT LOGIN
        // =========================
        return redirect('/login')->with(

            'success',
            'Registrasi berhasil'

        );

    }

    // =========================
    // HALAMAN LUPA PASSWORD
    // =========================
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // =========================
    // CEK AKUN & KIRIM EMAIL TOKEN
    // =========================
    public function checkForgotPassword(Request $request)
    {
        $request->validate([
            'login' => 'required'
        ], [
            'login.required' => 'Email atau Nomor HP wajib diisi'
        ]);

        // Cari user berdasarkan email atau nomor HP
        $user = User::where('email', $request->login)
                    ->orWhere('nomor_hp', $request->login)
                    ->first();

        if (!$user) {
            return back()->with('error', 'Email atau Nomor HP tidak ditemukan');
        }

        // Generate dan Kirim Email Token (bawaan Laravel)
        $status = Password::broker()->sendResetLink(
            ['email' => $user->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            // Sensor email sedikit untuk keamanan pesan
            $emailParts = explode("@", $user->email);
            $maskedEmail = substr($emailParts[0], 0, 2) . '***@' . end($emailParts);

            return back()->with('success', 'Link reset password telah dikirim ke email: ' . $maskedEmail);
        }

        return back()->with('error', 'Gagal mengirim link reset password. Coba lagi nanti.');
    }

    // =========================
    // HALAMAN RESET PASSWORD (DARI LINK EMAIL)
    // =========================
    public function resetPassword(Request $request, $token)
    {
        // Arahkan ke file blade reset password Anda dengan membawa token
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // =========================
    // SIMPAN PASSWORD BARU (DENGAN VALIDASI TOKEN)
    // =========================
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ], [
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai'
        ]);

        // Proses verifikasi token dan update password
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect('/login')->with('success', 'Password berhasil diperbarui! Silakan login.');
        }

        return back()->with('error', 'Token kadaluarsa atau email tidak valid.');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {

        // =========================
        // LOGOUT SEMUA GUARD
        // =========================
        Auth::guard('orangtua')->logout();

        Auth::guard('kader')->logout();

        Auth::guard('admin')->logout();

        // =========================
        // HAPUS SESSION
        // =========================
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // =========================
        // REDIRECT
        // =========================
        return redirect('/');

    }

}