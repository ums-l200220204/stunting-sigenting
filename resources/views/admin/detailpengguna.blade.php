{{-- resources/views/admin/detailpengguna.blade.php --}}

@extends('components.main')

@section('title', 'Detail Pengguna')

@section('content')

<div class="w-full min-h-screen bg-[#F4F7FB] px-4 sm:px-6 lg:px-8 py-8">

    {{-- ══════════════════════════════
         HEADER
    ══════════════════════════════ --}}
    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-800 tracking-tight"
                style="font-family:'Outfit',sans-serif">
                Detail Pengguna
            </h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Informasi lengkap data pengguna.</p>
        </div>

        {{-- Header icon --}}
        <div class="hidden sm:flex items-center justify-center w-14 h-14 lg:w-16 lg:h-16
                    rounded-2xl flex-shrink-0
                    bg-gradient-to-br from-[#005BA9] to-[#0ea5e9]
                    shadow-lg shadow-[#005BA9]/25">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
    </div>

    {{-- ══════════════════════════════
         SUCCESS ALERT
    ══════════════════════════════ --}}
    @if(session('success'))
        <div class="flex items-start gap-3 mb-6 bg-emerald-50 border border-emerald-200 rounded-2xl px-5 py-4">
            <div class="w-7 h-7 rounded-xl bg-emerald-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div>
                <p class="text-emerald-800 font-bold text-sm" style="font-family:'Outfit',sans-serif">Berhasil!</p>
                <p class="text-emerald-700 text-sm mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════
         MAIN CARD
    ══════════════════════════════ --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-5">

        {{-- ── Profile Banner ── --}}
        <div class="relative bg-gradient-to-r from-[#004f94] via-[#005BA9] to-[#0ea5e9]
                    px-6 sm:px-8 py-8 overflow-hidden">

            {{-- Decorative blobs --}}
            <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-white/8 pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-28 h-28 rounded-full bg-white/5 pointer-events-none"></div>

            <div class="relative z-10 flex flex-col sm:flex-row items-center sm:items-start gap-5">

                {{-- Avatar --}}
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl flex-shrink-0
                            bg-white/15 border-2 border-white/25
                            flex items-center justify-center
                            text-white font-black text-3xl sm:text-4xl shadow-lg"
                     style="font-family:'Outfit',sans-serif">
                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                </div>

                {{-- Identity --}}
                <div class="text-center sm:text-left flex-1 min-w-0">
                    <h2 class="text-2xl sm:text-3xl font-black text-white truncate"
                        style="font-family:'Outfit',sans-serif">
                        {{ $user->nama }}
                    </h2>
                    <p class="text-white/60 text-sm mt-0.5 mb-4">{{ $user->email }}</p>

                    <div class="flex flex-wrap justify-center sm:justify-start gap-2">

                        {{-- Role badge --}}
                        @if($user->role == 'admin')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                         bg-white text-[#1E3A8A] text-xs font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E3A8A]"></span>
                                Admin
                            </span>
                        @elseif($user->role == 'kader')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                         bg-white text-[#0078C1] text-xs font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#0078C1]"></span>
                                Kader
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                         bg-white text-[#10B981] text-xs font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span>
                                Orang Tua
                            </span>
                        @endif

                        {{-- ID badge --}}
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                     bg-white/15 border border-white/20
                                     text-white text-xs font-semibold">
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2"/>
                            </svg>
                            ID: {{ $user->id }}
                        </span>

                        {{-- Joined date --}}
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl
                                     bg-white/15 border border-white/20
                                     text-white text-xs font-semibold">
                            <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Bergabung {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                        </span>

                    </div>
                </div>

            </div>
        </div>

        {{-- ── Body ── --}}
        <div class="p-5 sm:p-6 lg:p-8">

            {{-- Section title --}}
            <div class="flex items-center gap-3 mb-5">
                <div class="w-1 h-5 rounded-full bg-gradient-to-b from-[#005BA9] to-[#0ea5e9]"></div>
                <h3 class="text-base font-black text-slate-800" style="font-family:'Outfit',sans-serif">
                    Informasi Pengguna
                </h3>
            </div>

            {{-- Info grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">

                {{-- Email --}}
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100
                            hover:border-[#005BA9]/20 hover:bg-[#F0F7FF] transition-colors duration-200">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded-lg bg-[#EEF5FD] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-[#0078C1]" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Email</span>
                    </div>
                    <p class="text-sm font-bold text-slate-800 truncate">{{ $user->email }}</p>
                </div>

                {{-- Nomor HP --}}
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100
                            hover:border-[#005BA9]/20 hover:bg-[#F0F7FF] transition-colors duration-200">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded-lg bg-[#EEF5FD] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-[#0078C1]" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nomor HP</span>
                    </div>
                    <p class="text-sm font-bold text-slate-800">{{ $user->nomor_hp ?? '—' }}</p>
                </div>

                {{-- Role --}}
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100
                            hover:border-[#005BA9]/20 hover:bg-[#F0F7FF] transition-colors duration-200">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded-lg bg-[#EEF5FD] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-[#0078C1]" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Role</span>
                    </div>
                    <p class="text-sm font-bold text-slate-800">
                        {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                    </p>
                </div>

                {{-- Dibuat pada --}}
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100
                            hover:border-[#005BA9]/20 hover:bg-[#F0F7FF] transition-colors duration-200">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded-lg bg-[#EEF5FD] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-[#0078C1]" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Dibuat Pada</span>
                    </div>
                    <p class="text-sm font-bold text-slate-800">
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, H:i') }}
                    </p>
                </div>

                {{-- Alamat (full width) --}}
                <div class="sm:col-span-2 bg-slate-50 rounded-xl p-4 border border-slate-100
                            hover:border-[#005BA9]/20 hover:bg-[#F0F7FF] transition-colors duration-200">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-6 rounded-lg bg-[#EEF5FD] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-[#0078C1]" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alamat</span>
                    </div>
                    <p class="text-sm font-semibold text-slate-800 leading-relaxed">
                        {{ $user->alamat ?? '—' }}
                    </p>
                </div>

            </div>

            {{-- ── Data Anak ── --}}
            @if($user->role == 'orang_tua' && $anak)

                <div class="bg-emerald-50 rounded-xl p-5 border border-emerald-100 mb-6">

                    {{-- Section title --}}
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-xl bg-emerald-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-black text-emerald-800" style="font-family:'Outfit',sans-serif">
                            Data Anak
                        </h3>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">

                        {{-- Nama Anak --}}
                        <div class="bg-white rounded-xl p-3.5 border border-emerald-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">
                                Nama Anak
                            </p>
                            <p class="text-sm font-bold text-slate-800">{{ $anak->nama_anak }}</p>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="bg-white rounded-xl p-3.5 border border-emerald-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">
                                Jenis Kelamin
                            </p>
                            <div class="flex items-center gap-1.5">
                                <span class="text-base">
                                    {{ $anak->jenis_kelamin == 'L' ? '👦' : '👧' }}
                                </span>
                                <p class="text-sm font-bold text-slate-800">
                                    {{ $anak->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </p>
                            </div>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="bg-white rounded-xl p-3.5 border border-emerald-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">
                                Tanggal Lahir
                            </p>
                            <p class="text-sm font-bold text-slate-800">
                                {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d M Y') }}
                            </p>
                        </div>

                        {{-- Usia --}}
                        <div class="bg-white rounded-xl p-3.5 border border-emerald-100">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">
                                Usia
                            </p>
                            <div class="flex items-baseline gap-1">
                                <p class="text-lg font-black text-emerald-600" style="font-family:'Outfit',sans-serif">
                                    {{ (int) \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(now()) }}
                                </p>
                                <p class="text-xs font-semibold text-slate-500">bulan</p>
                            </div>
                        </div>

                    </div>

                </div>

            @endif

            {{-- ── Action Buttons ── --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-2">

                {{-- Reset Password --}}
                <button onclick="openModal()"
                        class="inline-flex items-center justify-center gap-2
                               h-10 px-5 rounded-xl
                               bg-red-50 text-red-500
                               border border-red-200
                               text-sm font-bold
                               hover:bg-red-500 hover:text-white hover:border-red-500
                               hover:shadow-md hover:shadow-red-500/25
                               hover:-translate-y-0.5
                               transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Reset Password
                </button>

                {{-- Edit --}}
                <a href="{{ route('admin.pengguna.edit', $user->id) }}"
                   class="inline-flex items-center justify-center gap-2
                          h-10 px-5 rounded-xl
                          bg-[#EEF5FD] text-[#0078C1]
                          border border-[#0078C1]/20
                          text-sm font-bold
                          hover:bg-[#0078C1] hover:text-white hover:border-[#0078C1]
                          hover:shadow-md hover:shadow-[#0078C1]/25
                          hover:-translate-y-0.5
                          transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L11.828 17H9v-2.828l8.414-8.586z"/>
                    </svg>
                    Edit Pengguna
                </a>

                {{-- Kembali --}}
                <a href="{{ route('admin.pengguna') }}"
                   class="inline-flex items-center justify-center gap-2
                          h-10 px-5 rounded-xl sm:ml-auto
                          bg-slate-100 text-slate-500
                          border border-slate-200
                          text-sm font-bold
                          hover:bg-slate-200 hover:text-slate-700
                          hover:-translate-y-0.5
                          transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>

            </div>

        </div>
    </div>

</div>


{{-- ══════════════════════════════
     MODAL RESET PASSWORD
══════════════════════════════ --}}
<div id="resetModal"
     class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm
            hidden items-center justify-center z-50 p-4">

    <div class="bg-white rounded-2xl w-full max-w-md
                shadow-2xl shadow-slate-900/20
                border border-slate-100
                overflow-hidden">

        {{-- Modal header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center">
                    <svg class="w-4.5 h-4.5 text-red-500" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-black text-slate-800" style="font-family:'Outfit',sans-serif">
                        Reset Password
                    </h2>
                    <p class="text-xs text-slate-400">untuk {{ $user->nama }}</p>
                </div>
            </div>
            <button onclick="closeModal()"
                    class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200
                           flex items-center justify-center
                           text-slate-400 hover:text-slate-600
                           transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Modal body --}}
        <form method="POST" action="{{ route('admin.pengguna.resetpassword', $user->id) }}"
              class="px-6 py-6">
            @csrf

            {{-- Password Baru --}}
            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-700 mb-2">
                    Password Baru
                </label>
                <div class="relative">
                    <input type="password"
                           name="password"
                           id="newPassword"
                           required
                           placeholder="Masukkan password baru"
                           class="w-full h-10 px-4 pr-10 rounded-xl text-sm
                                  border border-slate-200 bg-slate-50
                                  focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                  focus:border-[#005BA9]/40 focus:bg-white
                                  placeholder-slate-400 transition-all duration-200">
                    <button type="button"
                            onclick="togglePwd('newPassword', this)"
                            class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">
                <label class="block text-xs font-bold text-slate-700 mb-2">
                    Konfirmasi Password
                </label>
                <div class="relative">
                    <input type="password"
                           name="password_confirmation"
                           id="confirmPassword"
                           required
                           placeholder="Ulangi password baru"
                           class="w-full h-10 px-4 pr-10 rounded-xl text-sm
                                  border border-slate-200 bg-slate-50
                                  focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                  focus:border-[#005BA9]/40 focus:bg-white
                                  placeholder-slate-400 transition-all duration-200">
                    <button type="button"
                            onclick="togglePwd('confirmPassword', this)"
                            class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Info note --}}
            <div class="flex items-start gap-2.5 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 mb-6">
                <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <p class="text-xs text-amber-700 font-medium leading-relaxed">
                    Password baru akan langsung berlaku. Pengguna perlu login ulang menggunakan password baru.
                </p>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="submit"
                        class="flex-1 h-10 rounded-xl text-sm font-bold text-white
                               bg-gradient-to-r from-red-500 to-red-600
                               shadow-sm shadow-red-500/25
                               hover:shadow-md hover:shadow-red-500/30
                               hover:-translate-y-0.5 transition-all duration-200">
                    Simpan Password
                </button>
                <button type="button"
                        onclick="closeModal()"
                        class="flex-1 h-10 rounded-xl text-sm font-bold text-slate-600
                               bg-slate-100 border border-slate-200
                               hover:bg-slate-200 hover:-translate-y-0.5
                               transition-all duration-200">
                    Batal
                </button>
            </div>

        </form>
    </div>
</div>


{{-- ══ Script ══ --}}
<script>
    function openModal() {
        const m = document.getElementById('resetModal');
        m.classList.remove('hidden');
        m.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const m = document.getElementById('resetModal');
        m.classList.remove('flex');
        m.classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Close on backdrop click
    document.getElementById('resetModal').addEventListener('click', function (e) {
        if (e.target === this) closeModal();
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });

    // Toggle show/hide password
    function togglePwd(inputId, btn) {
        const input = document.getElementById(inputId);
        input.type = input.type === 'password' ? 'text' : 'password';
        btn.classList.toggle('text-[#005BA9]');
    }
</script>

@endsection