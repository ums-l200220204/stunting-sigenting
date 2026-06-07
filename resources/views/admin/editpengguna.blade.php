{{-- resources/views/admin/editpengguna.blade.php --}}

@extends('components.main')

@section('title', 'Edit Pengguna')

@section('content')

<div class="w-full min-h-screen bg-[#F4F7FB] px-4 sm:px-6 lg:px-8 py-8">

    {{-- ══════════════════════════════
         HEADER
    ══════════════════════════════ --}}
    <div class="flex items-start justify-between gap-4 mb-6">
        <div>
            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-3 flex-wrap">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('admin.pengguna') }}" class="hover:text-[#005BA9] transition-colors">Kelola Pengguna</a>
                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('admin.pengguna.detail', $user->id) }}"
                   class="hover:text-[#005BA9] transition-colors max-w-[120px] truncate">
                    {{ $user->nama }}
                </a>
                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-[#005BA9] font-bold">Edit</span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-800 tracking-tight"
                style="font-family:'Outfit',sans-serif">
                Edit Pengguna
            </h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">Perbarui data pengguna sistem.</p>
        </div>

        {{-- Header icon --}}
        <div class="hidden sm:flex items-center justify-center w-14 h-14 lg:w-16 lg:h-16
                    rounded-2xl flex-shrink-0
                    bg-gradient-to-br from-[#005BA9] to-[#0ea5e9]
                    shadow-lg shadow-[#005BA9]/25">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L11.828 17H9v-2.828l8.414-8.586z"/>
            </svg>
        </div>
    </div>

    {{-- ══════════════════════════════
         ERROR ALERT
    ══════════════════════════════ --}}
    @if ($errors->any())
        <div class="flex items-start gap-3 mb-6 bg-red-50 border border-red-200 rounded-2xl px-5 py-4">
            <div class="w-7 h-7 rounded-xl bg-red-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-red-700 font-bold text-sm mb-2" style="font-family:'Outfit',sans-serif">
                    Terjadi Kesalahan
                </p>
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600 text-xs flex items-start gap-1.5">
                            <span class="w-1 h-1 rounded-full bg-red-400 flex-shrink-0 mt-1.5"></span>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════
         FORM CARD
    ══════════════════════════════ --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        {{-- ── Banner ── --}}
        <div class="relative bg-gradient-to-r from-[#004f94] via-[#005BA9] to-[#0ea5e9]
                    px-6 sm:px-8 py-6 overflow-hidden">
            <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full bg-white/8 pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/4 w-24 h-24 rounded-full bg-white/5 pointer-events-none"></div>

            <div class="relative z-10 flex items-center gap-4">
                {{-- Avatar --}}
                <div class="w-14 h-14 rounded-2xl bg-white/15 border-2 border-white/25
                            flex items-center justify-center
                            text-white font-black text-2xl flex-shrink-0 shadow-lg"
                     style="font-family:'Outfit',sans-serif">
                    {{ strtoupper(substr($user->nama, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-black text-white leading-tight"
                        style="font-family:'Outfit',sans-serif">
                        {{ $user->nama }}
                    </h2>
                    <div class="flex items-center gap-2 mt-1.5 flex-wrap">
                        {{-- Role badge --}}
                        @if($user->role == 'admin')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                         bg-white text-[#1E3A8A] text-[11px] font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#1E3A8A]"></span>Admin
                            </span>
                        @elseif($user->role == 'kader')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                         bg-white text-[#0078C1] text-[11px] font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#0078C1]"></span>Kader
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                         bg-white text-[#10B981] text-[11px] font-bold shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span>Orang Tua
                            </span>
                        @endif
                        <span class="text-white/60 text-xs">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Form Body ── --}}
        <form action="{{ route('admin.pengguna.update', $user->id) }}"
              method="POST"
              class="p-5 sm:p-6 lg:p-8">

            @csrf
            @method('PUT')

            {{-- ─ Section: Data Akun ─ --}}
            <div class="flex items-center gap-3 mb-5">
                <div class="w-1 h-5 rounded-full bg-gradient-to-b from-[#005BA9] to-[#0ea5e9]"></div>
                <h3 class="text-sm font-black text-slate-800" style="font-family:'Outfit',sans-serif">
                    Data Akun
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">

                {{-- Role (readonly) --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                        Role
                    </label>
                    <div class="relative">
                        <input type="text"
                               value="{{ ucfirst(str_replace('_', ' ', $user->role)) }}"
                               readonly
                               class="w-full h-10 px-4 rounded-xl text-sm font-semibold
                                      border border-slate-200 bg-slate-100
                                      text-slate-500 cursor-not-allowed">
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">Role tidak dapat diubah melalui form ini.</p>
                </div>

                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                        Nama <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $user->nama) }}"
                           placeholder="Nama lengkap pengguna"
                           class="w-full h-10 px-4 rounded-xl text-sm
                                  border border-slate-200 bg-slate-50
                                  focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                  focus:border-[#005BA9]/40 focus:bg-white
                                  placeholder-slate-400 transition-all duration-200
                                  @error('nama') border-red-300 bg-red-50 @enderror">
                    @error('nama')
                        <p class="text-[11px] text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                        Email <span class="text-red-400">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           placeholder="contoh@email.com"
                           class="w-full h-10 px-4 rounded-xl text-sm
                                  border border-slate-200 bg-slate-50
                                  focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                  focus:border-[#005BA9]/40 focus:bg-white
                                  placeholder-slate-400 transition-all duration-200
                                  @error('email') border-red-300 bg-red-50 @enderror">
                    @error('email')
                        <p class="text-[11px] text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Nomor HP --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                        Nomor HP
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <input type="text"
                               name="nomor_hp"
                               value="{{ old('nomor_hp', $user->nomor_hp) }}"
                               placeholder="08xxxxxxxxxx"
                               class="w-full h-10 pl-9 pr-4 rounded-xl text-sm
                                      border border-slate-200 bg-slate-50
                                      focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                      focus:border-[#005BA9]/40 focus:bg-white
                                      placeholder-slate-400 transition-all duration-200
                                      @error('nomor_hp') border-red-300 bg-red-50 @enderror">
                    </div>
                    @error('nomor_hp')
                        <p class="text-[11px] text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                        Alamat
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <textarea name="alamat"
                                  rows="3"
                                  placeholder="Alamat lengkap pengguna"
                                  class="w-full pl-9 pr-4 py-2.5 rounded-xl text-sm
                                         border border-slate-200 bg-slate-50
                                         focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                         focus:border-[#005BA9]/40 focus:bg-white
                                         placeholder-slate-400 transition-all duration-200 resize-none
                                         @error('alamat') border-red-300 bg-red-50 @enderror">{{ old('alamat', $user->alamat) }}</textarea>
                    </div>
                    @error('alamat')
                        <p class="text-[11px] text-red-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- ─ Section: Data Anak ─ --}}
            @if($user->role == 'orang_tua' && $anak)

                {{-- Divider --}}
                <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-6"></div>

                {{-- Section header --}}
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-1 h-5 rounded-full bg-gradient-to-b from-emerald-500 to-emerald-400"></div>
                    <h3 class="text-sm font-black text-slate-800" style="font-family:'Outfit',sans-serif">
                        Data Anak
                    </h3>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg
                                 bg-emerald-50 text-emerald-600 text-[11px] font-bold border border-emerald-100">
                        <span class="text-base leading-none">
                            {{ $anak->jenis_kelamin == 'L' ? '👦' : '👧' }}
                        </span>
                        {{ $anak->nama_anak }}
                    </span>
                </div>

                <div class="bg-emerald-50/60 rounded-xl border border-emerald-100 p-5 mb-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- Nama Anak --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                                Nama Anak <span class="text-red-400">*</span>
                            </label>
                            <input type="text"
                                   name="nama_anak"
                                   value="{{ old('nama_anak', $anak->nama_anak) }}"
                                   placeholder="Nama lengkap anak"
                                   class="w-full h-10 px-4 rounded-xl text-sm
                                          border border-emerald-200 bg-white
                                          focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                          focus:border-emerald-400/60 focus:bg-white
                                          placeholder-slate-400 transition-all duration-200
                                          @error('nama_anak') border-red-300 bg-red-50 @enderror">
                            @error('nama_anak')
                                <p class="text-[11px] text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                                Jenis Kelamin <span class="text-red-400">*</span>
                            </label>
                            <select name="jenis_kelamin"
                                    class="w-full h-10 px-4 rounded-xl text-sm
                                           border border-emerald-200 bg-white
                                           focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                           focus:border-emerald-400/60
                                           text-slate-700 transition-all duration-200
                                           @error('jenis_kelamin') border-red-300 bg-red-50 @enderror">
                                <option value="L" {{ $anak->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                    👦 Laki-laki
                                </option>
                                <option value="P" {{ $anak->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                    👧 Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <p class="text-[11px] text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                                Tanggal Lahir <span class="text-red-400">*</span>
                            </label>
                            <input type="date"
                                   name="tanggal_lahir"
                                   id="tanggalLahir"
                                   value="{{ old('tanggal_lahir', $anak->tanggal_lahir) }}"
                                   onchange="hitungUsia()"
                                   class="w-full h-10 px-4 rounded-xl text-sm
                                          border border-emerald-200 bg-white
                                          focus:outline-none focus:ring-2 focus:ring-emerald-500/20
                                          focus:border-emerald-400/60
                                          text-slate-700 transition-all duration-200
                                          @error('tanggal_lahir') border-red-300 bg-red-50 @enderror">
                            @error('tanggal_lahir')
                                <p class="text-[11px] text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Usia (auto-calculated, readonly) --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1.5 uppercase tracking-wider">
                                Usia (Otomatis)
                            </label>
                            <div class="relative">
                                <input type="text"
                                       id="usiaDisplay"
                                       readonly
                                       value="{{ (int) \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(now()) }} Bulan"
                                       class="w-full h-10 px-4 rounded-xl text-sm font-semibold
                                              border border-emerald-200 bg-emerald-50/80
                                              text-emerald-700 cursor-not-allowed">
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor"
                                         stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1.5">Dihitung otomatis dari tanggal lahir.</p>
                        </div>

                    </div>
                </div>

            @endif

            {{-- ─ Action Buttons ─ --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-2 border-t border-slate-100">

                {{-- Simpan --}}
                <button type="submit"
                        class="inline-flex items-center justify-center gap-2
                               h-10 px-6 rounded-xl text-sm font-bold text-white
                               bg-gradient-to-r from-[#005BA9] to-[#0078C1]
                               shadow-sm shadow-[#005BA9]/25
                               hover:shadow-md hover:shadow-[#005BA9]/35
                               hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Perubahan
                </button>

                {{-- Kembali --}}
                <a href="{{ route('admin.pengguna.detail', $user->id) }}"
                   class="inline-flex items-center justify-center gap-2
                          h-10 px-5 rounded-xl text-sm font-bold
                          text-slate-500 bg-slate-100 border border-slate-200
                          hover:bg-slate-200 hover:text-slate-700
                          hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Batal
                </a>

                {{-- Info chip --}}
                <div class="sm:ml-auto flex items-center gap-1.5 text-[11px] text-slate-400 font-medium self-center">
                    <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Bidang bertanda <span class="text-red-400 font-bold">*</span> wajib diisi
                </div>

            </div>

        </form>
    </div>

</div>

{{-- Auto-calculate usia from tanggal lahir --}}
<script>
    function hitungUsia() {
        const tglInput = document.getElementById('tanggalLahir');
        const usiaInput = document.getElementById('usiaDisplay');
        if (!tglInput || !usiaInput || !tglInput.value) return;

        const lahir = new Date(tglInput.value);
        const now   = new Date();

        let bulan = (now.getFullYear() - lahir.getFullYear()) * 12
                  + (now.getMonth() - lahir.getMonth());
        if (now.getDate() < lahir.getDate()) bulan--;
        if (bulan < 0) bulan = 0;

        usiaInput.value = bulan + ' Bulan';
    }
</script>

@endsection