@extends('components.main')

@section('title', 'Edit Profil')

@section('content')

<div class="min-h-screen bg-[#F0F4F9] px-4 py-8 sm:px-6 sm:py-12" style="font-family: 'DM Sans', sans-serif;">
    <div class="max-w-2xl mx-auto">

        {{-- ══════════════════════════════════════
             HERO HEADER
        ══════════════════════════════════════ --}}
        <div class="relative overflow-hidden rounded-[1.75rem] px-7 py-9 sm:px-10 sm:py-11 mb-7"
             style="background: #003E7A;">
            
            <div class="pointer-events-none absolute inset-0"
                 style="background: radial-gradient(ellipse 55% 75% at 110% 50%, rgba(14,165,233,0.28) 0%, transparent 60%), radial-gradient(ellipse 40% 55% at -5% 30%, rgba(0,120,193,0.45) 0%, transparent 55%);"></div>
            <div class="pointer-events-none absolute inset-0"
                 style="background-image: repeating-linear-gradient(-45deg,rgba(255,255,255,0.02) 0px,rgba(255,255,255,0.02) 1px,transparent 1px,transparent 12px);"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 mb-3 px-3.5 py-1.5 rounded-full text-[11px] font-semibold tracking-[0.1em] uppercase select-none"
                         style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.8);">
                        <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#0EA5E9;"></span>
                        Pengaturan Akun
                    </div>
                    <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-2 text-[1.85rem] sm:text-[2.25rem]"
                        style="font-family:'Sora',sans-serif;">
                        Edit Profil
                    </h1>
                    <p class="text-sm sm:text-[15px] leading-relaxed max-w-sm" style="color:rgba(255,255,255,0.6);">
                        Perbarui data diri Anda dan profil anak.
                    </p>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             ALERT MESSAGES
        ══════════════════════════════════════ --}}
        
        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="flex items-start gap-3 mb-5 px-4 py-4 rounded-2xl text-sm font-medium"
                 style="background:#F0FDF4; border:1px solid #BBF7D0; color:#15803D;">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan Error Sistem (Gagal Update/Database Error) --}}
        @if(session('error'))
            <div class="flex items-start gap-3 mb-5 px-4 py-4 rounded-2xl text-sm font-medium"
                 style="background:#FFF1F0; border:1px solid #FECDD3; color:#be123c;">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Pesan Error Validasi Input --}}
        @if($errors->any())
            <div class="flex items-start gap-3 mb-5 px-4 py-4 rounded-2xl text-sm font-medium"
                 style="background:#FFF1F0; border:1px solid #FECDD3; color:#be123c;">
                <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ══════════════════════════════════════
             FORM EDIT PROFIL
        ══════════════════════════════════════ --}}
        <div class="bg-white rounded-[1.75rem] shadow-sm overflow-hidden" style="border:1px solid #E4EBF4;">
            <div class="h-[3px] w-full" style="background: linear-gradient(90deg, #003E7A 0%, #0078C1 45%, #0EA5E9 100%);"></div>

            <form action="{{ route('orangtua.profil.update') }}" method="POST" class="px-6 py-8 sm:px-8 sm:py-10 space-y-8">
                @csrf
                @method('PUT')

                {{-- SECTION 1: DATA ANAK --}}
                <div>
                    <h2 class="text-sm font-bold tracking-widest uppercase mb-5" style="color:#003E7A; font-family:'Sora',sans-serif;">
                        Profil Anak
                    </h2>
                    <div class="space-y-5">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- NIK Anak --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">NIK Anak <span class="text-red-500">*</span></label>
                                <input type="text" name="nik_anak" required value="{{ old('nik_anak', $anak->nik ?? '') }}" 
                                       maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>

                            {{-- Nama Anak --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Nama Anak <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_anak" required value="{{ old('nama_anak', $anak->nama_anak ?? '') }}" 
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Jenis Kelamin Anak --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Jenis Kelamin <span class="text-red-500">*</span></label>
                                <select name="jenis_kelamin" required
                                        class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                                    <option value="L" {{ old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            
                            {{-- Tanggal Lahir --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Tanggal Lahir <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_lahir" required 
                                       value="{{ old('tanggal_lahir', $anak->tanggal_lahir ?? '') }}" 
                                       max="{{ date('Y-m-d') }}"
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DIVIDER --}}
                <div class="w-full h-px bg-slate-100"></div>

                {{-- SECTION 2: DATA ORANG TUA --}}
                <div>
                    <h2 class="text-sm font-bold tracking-widest uppercase mb-5" style="color:#003E7A; font-family:'Sora',sans-serif;">
                        Profil Orang Tua (Akun)
                    </h2>
                    <div class="space-y-5">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- NIK Orang Tua --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">NIK Orang Tua <span class="text-red-500">*</span></label>
                                <input type="text" name="nik" required value="{{ old('nik', $user->nik ?? '') }}" 
                                       maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>

                            {{-- Nama Orang Tua --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" required value="{{ old('nama', $user->nama ?? '') }}" 
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Email --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required value="{{ old('email', $user->email ?? '') }}" 
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>

                            {{-- No HP --}}
                            <div>
                                <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Nomor HP/WA <span class="text-red-500">*</span></label>
                                <input type="text" name="nomor_hp" required value="{{ old('nomor_hp', $user->nomor_hp ?? '') }}" 
                                       class="w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A]">
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div>
                            <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5 text-slate-500">Alamat Rumah <span class="text-red-500">*</span></label>
                            <textarea name="alamat" rows="3" required
                                      class="w-full rounded-2xl border bg-[#F8FAFC] p-4 text-[14px] font-semibold outline-none transition-all duration-200 focus:bg-white focus:ring-[3px] focus:ring-[#003E7A]/10 focus:border-[#003E7A] resize-none">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- SUBMIT BUTTON --}}
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full h-[3.4rem] rounded-2xl text-white text-[15px] font-bold tracking-wide shadow-md transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg active:scale-[0.98]"
                            style="background: linear-gradient(135deg, #003E7A 0%, #0060BB 100%); font-family:'Sora',sans-serif;">
                        Simpan Perubahan Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection