{{-- resources/views/orangtua/input.blade.php --}}

@extends('components.main')

@section('title', 'Input Data Perkembangan')

@section('content')

{{-- ════════════════════════════════════════════════════════════════
     PAGE WRAPPER
════════════════════════════════════════════════════════════════ --}}
<div class="min-h-screen bg-[#F0F4F9] px-4 py-8 sm:px-6 sm:py-12"
     style="font-family: 'DM Sans', sans-serif;">

    <div class="max-w-xl mx-auto">

        {{-- ══════════════════════════════════════
             HERO HEADER
        ══════════════════════════════════════ --}}
        <div class="relative overflow-hidden rounded-[1.75rem] px-7 py-9 sm:px-10 sm:py-11 mb-7"
             style="background: #003E7A;">

            {{-- Background radial glow --}}
            <div class="pointer-events-none absolute inset-0"
                 style="background:
                    radial-gradient(ellipse 55% 75% at 110% 50%, rgba(253,75,199,0.28) 0%, transparent 60%),
                    radial-gradient(ellipse 40% 55% at -5% 30%, rgba(0,120,193,0.45) 0%, transparent 55%);"></div>

            {{-- Diagonal stripe texture --}}
            <div class="pointer-events-none absolute inset-0"
                 style="background-image: repeating-linear-gradient(-45deg,rgba(255,255,255,0.02) 0px,rgba(255,255,255,0.02) 1px,transparent 1px,transparent 12px);"></div>

            {{-- Content --}}
            <div class="relative z-10">

                {{-- Eyebrow badge --}}
                <div class="inline-flex items-center gap-2 mb-5 px-3.5 py-1.5 rounded-full text-[11px] font-semibold tracking-[0.1em] uppercase select-none"
                     style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.8);">
                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#FD4BC7;"></span>
                    Pemantauan Tumbuh Kembang
                </div>

                {{-- Headline --}}
                <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-3 text-[1.85rem] sm:text-[2.25rem]"
                    style="font-family:'Sora',sans-serif;">
                    Input Data<br>
                    <span style="color:#FD4BC7;">Perkembangan</span>
                </h1>

                {{-- Description --}}
                <p class="text-sm sm:text-[15px] leading-relaxed max-w-sm"
                   style="color:rgba(255,255,255,0.6);">
                    Masukkan data perkembangan anak untuk mengetahui status gizi dan hasil pertumbuhan.
                </p>

            </div>
        </div>

        {{-- ══════════════════════════════════════
             ERROR ALERT
        ══════════════════════════════════════ --}}
        @if(session('error'))
        <div class="flex items-start gap-3 mb-5 px-4 py-4 rounded-2xl text-sm font-medium"
             style="background:#FFF1F0; border:1px solid #FECDD3; color:#be123c;">
            <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            {{ session('error') }}
        </div>
        @endif

        {{-- ══════════════════════════════════════
             FORM CARD
        ══════════════════════════════════════ --}}
        <div class="bg-white rounded-[1.75rem] shadow-sm overflow-hidden"
             style="border:1px solid #E4EBF4;">

            {{-- Top accent bar --}}
            <div class="h-[3px] w-full" style="background: linear-gradient(90deg, #003E7A 0%, #0078C1 45%, #FD4BC7 100%);"></div>

            <div class="px-6 py-8 sm:px-8 sm:py-10">
                <form action="{{ route('orangtua.input.proses') }}" method="POST" class="space-y-7">
                    @csrf

                    {{-- ── BERAT BADAN ── --}}
                    <div>
                        <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5"
                               style="color:#64748b;">
                            Berat Badan
                        </label>
                        <div class="flex gap-3 items-stretch">
                            <div class="relative flex-1">
                                <input
                                    type="number"
                                    name="berat_badan"
                                    required
                                    min="0"
                                    step="0.1"
                                    placeholder="Contoh: 12.5"
                                    class="non-scroll-number w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[15px] font-semibold placeholder-slate-300 outline-none transition-all duration-200"
                                    style="border-color:#DDE5F0; color:#1e293b;"
                                    onfocus="this.style.borderColor='#003E7A'; this.style.background='#fff'; this.style.boxShadow='0 0 0 3px rgba(0,62,122,0.08)';"
                                    onblur="this.style.borderColor='#DDE5F0'; this.style.background='#F8FAFC'; this.style.boxShadow='none';">
                            </div>
                            <div class="w-[4.25rem] h-[3.4rem] rounded-2xl flex items-center justify-center font-black text-sm tracking-widest text-white flex-shrink-0 shadow-sm select-none"
                                 style="background:#003E7A; letter-spacing:.1em;">
                                KG
                            </div>
                        </div>
                    </div>

                    {{-- ── TINGGI BADAN ── --}}
                    <div>
                        <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5"
                               style="color:#64748b;">
                            Tinggi Badan
                        </label>
                        <div class="flex gap-3 items-stretch">
                            <div class="relative flex-1">
                                <input
                                    type="number"
                                    name="tinggi_badan"
                                    step="0.1"
                                    required
                                    min="0"
                                    placeholder="Contoh: 85.0"
                                    class="non-scroll-number w-full h-[3.4rem] rounded-2xl border bg-[#F8FAFC] px-4 text-[15px] font-semibold placeholder-slate-300 outline-none transition-all duration-200"
                                    style="border-color:#DDE5F0; color:#1e293b;"
                                    onfocus="this.style.borderColor='#FD4BC7'; this.style.background='#fff'; this.style.boxShadow='0 0 0 3px rgba(253,75,199,0.1)';"
                                    onblur="this.style.borderColor='#DDE5F0'; this.style.background='#F8FAFC'; this.style.boxShadow='none';">
                            </div>
                            <div class="w-[4.25rem] h-[3.4rem] rounded-2xl flex items-center justify-center font-black text-sm tracking-widest text-white flex-shrink-0 shadow-sm select-none"
                                 style="background:#FD4BC7; letter-spacing:.1em;">
                                CM
                            </div>
                        </div>
                    </div>

                    {{-- ── DIVIDER ── --}}
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full h-px" style="background:#EEF2F8;"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-3 text-[11px] font-semibold tracking-widest uppercase bg-white"
                                  style="color:#94a3b8;">Data Otomatis</span>
                        </div>
                    </div>

                    {{-- ── USIA & JENIS KELAMIN ── --}}
                    <div class="grid grid-cols-2 gap-4">

                        {{-- Usia --}}
                        <div>
                            <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5"
                                   style="color:#64748b;">
                                Usia
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    readonly
                                    value="{{ $anak ? (int) \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(now()) : 0 }}"
                                    class="w-full h-[3.4rem] rounded-2xl border pl-4 pr-14 text-[15px] font-semibold cursor-not-allowed outline-none"
                                    style="border-color:#DDE5F0; background:#F0F4F9; color:#64748b;">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-black tracking-widest"
                                      style="color:#94a3b8;">BULAN</span>
                            </div>
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-[11px] font-bold tracking-[0.12em] uppercase mb-2.5"
                                   style="color:#64748b;">
                                Jenis Kelamin
                            </label>
                            <input
                                type="text"
                                readonly
                                value="{{ $anak ? ($anak->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}"
                                class="w-full h-[3.4rem] rounded-2xl border px-4 text-[15px] font-semibold cursor-not-allowed outline-none truncate"
                                style="border-color:#DDE5F0; background:#F0F4F9; color:#64748b;">
                        </div>
                    </div>

                    {{-- ── INFO NOTE ── --}}
                    <div class="flex items-start gap-3 rounded-2xl px-4 py-3.5"
                         style="background:rgba(0,62,122,0.04); border:1px solid rgba(0,62,122,0.1);">
                        <svg class="w-4 h-4 mt-0.5 flex-shrink-0" style="color:#0078C1;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="16" x2="12" y2="12"/>
                            <line x1="12" y1="8" x2="12.01" y2="8"/>
                        </svg>
                        <p class="text-xs leading-relaxed font-medium" style="color:#0078C1;">
                            Data usia dan jenis kelamin diambil otomatis dari profil anak yang terdaftar.
                        </p>
                    </div>

                    {{-- ── SUBMIT BUTTON ── --}}
                    <button
                        type="submit"
                        id="submitBtn"
                        class="w-full h-[3.4rem] rounded-2xl text-white text-[15px] font-bold tracking-wide shadow-md transition-all duration-200 flex items-center justify-center gap-2.5 active:scale-[0.98]"
                        style="background: linear-gradient(135deg, #003E7A 0%, #0060BB 100%); font-family:'Sora',sans-serif;">
                        <span id="submitText">Cek Status Gizi</span>
                        <svg id="submitArrow" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                        <svg id="submitSpinner" class="w-4 h-4 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                    </button>

                </form>
            </div>
        </div>

        {{-- ══════════════════════════════════════
             POJOK EDUKASI (ACCORDION PANDUAN)
        ══════════════════════════════════════ --}}
        <div class="mt-8 mb-4">
            
            {{-- Header Edukasi --}}
            <div class="flex items-center gap-3 mb-4 px-2">
                <div class="w-9 h-9 rounded-[0.85rem] flex items-center justify-center shadow-sm" 
                     style="background:linear-gradient(135deg, #FD4BC7 0%, #D81B60 100%);">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-[16px] font-extrabold tracking-tight leading-none" 
                        style="color:#003E7A; font-family:'Sora',sans-serif;">
                        Pojok Edukasi
                    </h2>
                    <p class="text-[11px] font-medium mt-1" style="color:#64748b;">
                        Tips akurasi data & info gizi anak
                    </p>
                </div>
            </div>

            {{-- Accordion List --}}
            <div class="space-y-3">
                
                {{-- Item 1 --}}
                <div class="bg-white rounded-[1.25rem] shadow-sm border transition-all duration-300" style="border-color:#E4EBF4;">
                    <button class="w-full px-5 py-4 flex items-center justify-between text-left focus:outline-none" 
                            onclick="toggleAccordion('edu1', 'icon1')">
                        <span class="font-bold text-[13px] pr-4" style="color:#1e293b; font-family:'Sora',sans-serif;">
                            Cara Mengukur Tinggi Badan yang Benar
                        </span>
                        <svg id="icon1" class="w-4 h-4 transform transition-transform duration-300 flex-shrink-0" style="color:#94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="edu1" class="hidden px-5 pb-4">
                        <div class="h-px w-full mb-3" style="background:#F0F4F9;"></div>
                        <p class="text-[12px] leading-relaxed" style="color:#64748b;">
                            Pastikan anak tidak memakai alas kaki. Jika anak sudah bisa berdiri tegak, pastikan tumit, bokong, punggung, dan kepala bagian belakang menempel rata pada dinding. Pandangan mata lurus ke depan.
                        </p>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="bg-white rounded-[1.25rem] shadow-sm border transition-all duration-300" style="border-color:#E4EBF4;">
                    <button class="w-full px-5 py-4 flex items-center justify-between text-left focus:outline-none" 
                            onclick="toggleAccordion('edu2', 'icon2')">
                        <span class="font-bold text-[13px] pr-4" style="color:#1e293b; font-family:'Sora',sans-serif;">
                            Kapan Waktu Terbaik Menimbang Anak?
                        </span>
                        <svg id="icon2" class="w-4 h-4 transform transition-transform duration-300 flex-shrink-0" style="color:#94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="edu2" class="hidden px-5 pb-4">
                        <div class="h-px w-full mb-3" style="background:#F0F4F9;"></div>
                        <p class="text-[12px] leading-relaxed" style="color:#64748b;">
                            Usahakan menimbang di pagi hari sebelum anak makan besar atau setelah buang air. Gunakan pakaian yang tipis dan lepaskan jaket, topi, atau popok (jika sangat basah) agar angka lebih akurat.
                        </p>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="bg-white rounded-[1.25rem] shadow-sm border transition-all duration-300" style="border-color:#E4EBF4;">
                    <button class="w-full px-5 py-4 flex items-center justify-between text-left focus:outline-none" 
                            onclick="toggleAccordion('edu3', 'icon3')">
                        <span class="font-bold text-[13px] pr-4" style="color:#1e293b; font-family:'Sora',sans-serif;">
                            Apa itu Indikator Z-Score?
                        </span>
                        <svg id="icon3" class="w-4 h-4 transform transition-transform duration-300 flex-shrink-0" style="color:#94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="edu3" class="hidden px-5 pb-4">
                        <div class="h-px w-full mb-3" style="background:#F0F4F9;"></div>
                        <p class="text-[12px] leading-relaxed" style="color:#64748b;">
                            Z-Score adalah acuan dari WHO untuk melihat apakah pertumbuhan anak Anda sesuai dengan anak-anak seusianya. Nilai 0 berarti sangat rata-rata (ideal). Rentang normal biasanya berada di antara -2 SD hingga +2 SD.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- ══════════════════════════════════════
             BOTTOM TIP
        ══════════════════════════════════════ --}}
        <p class="text-center text-[12px] mt-5 leading-relaxed" style="color:#94a3b8;">
            Pastikan data yang dimasukkan sudah benar sebelum menekan tombol.
        </p>

    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     MODAL HASIL (Responsive & Informative)
════════════════════════════════════════════════════════════════ --}}
@if(session('success'))

{{-- ── Modal styles ── --}}
<style>
    :root { --navbar-h: 64px; }

    #resultModal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: flex-end; /* Mobile: bottom sheet */
        justify-content: center;
        background: rgba(15, 23, 42, 0.65); /* Sedikit lebih gelap agar kontras */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        padding-top: var(--navbar-h);
        padding-inline: 0; /* Full width di mobile */
    }

    @media (min-width: 640px) {
        #resultModal {
            align-items: center; /* Desktop: center card */
            padding-inline: 1.5rem;
        }
    }

    #resultModal .modal-card {
        position: relative;
        width: 100%;
        max-width: 26rem; /* Sekitar 416px, ukuran ideal untuk modal pop-up */
        background: #ffffff;
        border-radius: 1.75rem 1.75rem 0 0;
        box-shadow: 0 -10px 40px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        max-height: calc(100vh - var(--navbar-h));
        animation: modalSlideUp .3s cubic-bezier(0.2, 0.8, 0.2, 1) both;
    }

    @media (min-width: 640px) {
        #resultModal .modal-card {
            border-radius: 1.75rem;
            box-shadow: 0 20px 60px -15px rgba(0,0,0,0.2);
            max-height: calc(100vh - var(--navbar-h) - 4rem);
            animation: modalFadeScale .3s cubic-bezier(0.2, 0.8, 0.2, 1) both;
        }
    }

    @keyframes modalSlideUp {
        from { transform: translateY(100%); opacity: 0; }
        to   { transform: translateY(0);    opacity: 1; }
    }
    @keyframes modalFadeScale {
        from { transform: scale(0.95) translateY(10px); opacity: 0; }
        to   { transform: scale(1)    translateY(0);    opacity: 1; }
    }

    #resultModal .modal-body {
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: contain;
    }
</style>

<div id="resultModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

    <div class="modal-card">

        {{-- Accent bar --}}
        <div class="h-1.5 w-full flex-shrink-0"
             style="background: linear-gradient(90deg, #003E7A 0%, #0078C1 45%, #FD4BC7 100%);"></div>

        {{-- Drag handle (mobile) --}}
        <div class="flex justify-center pt-3 sm:hidden flex-shrink-0">
            <div class="w-10 h-1.5 rounded-full bg-slate-200"></div>
        </div>

        {{-- Close button --}}
        <button onclick="closeModal()"
                aria-label="Tutup"
                class="absolute top-4 right-4 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center bg-slate-100 text-slate-500 hover:bg-slate-200 hover:text-slate-700 transition-colors duration-200">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Scrollable body --}}
        <div class="modal-body px-5 py-6 sm:px-8 sm:py-8 text-center flex-1 flex flex-col">

            {{-- Status icon --}}
            <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto rounded-2xl flex items-center justify-center shadow-md mb-4 sm:mb-5 shrink-0"
                 style="background:linear-gradient(135deg,#003E7A 0%,#0060BB 100%);">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            {{-- Label --}}
            <p class="text-[9px] sm:text-[10px] font-bold tracking-[0.15em] uppercase text-slate-400 mb-1"
               style="font-family:'DM Sans',sans-serif;" id="modalTitle">
                Hasil Perhitungan
            </p>

            {{-- Z-Score --}}
            <div class="flex items-baseline justify-center gap-1.5 sm:gap-2 mb-1">
                <span class="font-black leading-none tracking-tight text-[#003E7A]"
                      style="font-size: clamp(3rem, 12vw, 4.5rem); font-family:'Sora',sans-serif;">
                    {{ session('zscore') }}
                </span>
                <span class="text-lg sm:text-xl font-bold text-slate-400" style="font-family:'Sora',sans-serif;">SD</span>
            </div>

            {{-- Penjelasan SD --}}
            <p class="text-[10.5px] sm:text-[11.5px] text-slate-400 max-w-[260px] mx-auto mt-1 mb-2 leading-relaxed shrink-0" style="font-family:'DM Sans',sans-serif;">
                <span class="font-semibold text-slate-500">SD (Standar Deviasi)</span> adalah standar WHO untuk mengukur penyimpangan pertumbuhan anak dari rata-rata normal.
            </p>

            {{-- Divider --}}
            <div class="h-px my-4 sm:my-5 max-w-[120px] sm:max-w-[160px] mx-auto bg-slate-100 shrink-0"></div>

            {{-- Status Gizi label --}}
            <p class="text-[9px] sm:text-[10px] font-bold tracking-[0.15em] uppercase text-slate-400 mb-2 sm:mb-2.5 shrink-0"
               style="font-family:'DM Sans',sans-serif;">
                Status Gizi
            </p>

            {{-- ── DYNAMIC INSIGHT LOGIC ── --}}
            @php
                $statusStr = trim(strtolower(session('status', '')));
                
                $insightTheme = 'green';
                $insightTitle = 'Pertumbuhan Optimal';
                $insightText = 'Tinggi badan anak sesuai dengan usianya. Lanjutkan pola asuh dan pemberian gizi seimbang yang sudah baik ini.';
                
                if ($statusStr === 'stunting berat') {
                    $insightTheme = 'red';
                    $insightTitle = 'Perhatian Khusus!';
                    $insightText = 'Tinggi badan anak sangat kurang dari standar WHO. Segera konsultasikan dengan dokter anak atau petugas Puskesmas terdekat untuk intervensi.';
                } elseif ($statusStr === 'stunting') {
                    $insightTheme = 'yellow';
                    $insightTitle = 'Perlu Peningkatan Gizi';
                    $insightText = 'Tinggi badan anak di bawah rata-rata. Tingkatkan asupan nutrisi, terutama protein hewani (telur, ikan), dan pantau rutin di Posyandu.';
                } elseif ($statusStr === 'tinggi') {
                    $insightTheme = 'blue';
                    $insightTitle = 'Perawakan Tinggi';
                    $insightText = 'Tinggi badan anak berada di atas rata-rata seusianya. Tetap pertahankan aktivitas fisik dan rutinitas makan dengan gizi seimbang.';
                }
                
                $colors = [
                    'green'  => ['bg' => '#F0FDF4', 'border' => '#BBF7D0', 'title' => '#166534', 'text' => '#15803D', 'icon' => '#22C55E', 'badgeBg' => 'rgba(34,197,94,0.1)', 'badgeText' => '#166534', 'dot' => '#22C55E'],
                    'yellow' => ['bg' => '#FEFCE8', 'border' => '#FEF08A', 'title' => '#854D0E', 'text' => '#A16207', 'icon' => '#EAB308', 'badgeBg' => 'rgba(234,179,8,0.1)', 'badgeText' => '#A16207', 'dot' => '#EAB308'],
                    'red'    => ['bg' => '#FEF2F2', 'border' => '#FECACA', 'title' => '#991B1B', 'text' => '#B91C1C', 'icon' => '#EF4444', 'badgeBg' => 'rgba(253,75,199,0.08)', 'badgeText' => '#c2005c', 'dot' => '#FD4BC7'],
                    'blue'   => ['bg' => '#EFF6FF', 'border' => '#BFDBFE', 'title' => '#1E3A8A', 'text' => '#1D4ED8', 'icon' => '#3B82F6', 'badgeBg' => 'rgba(59,130,246,0.1)', 'badgeText' => '#1D4ED8', 'dot' => '#3B82F6'],
                ];
                
                $activeColor = $colors[$insightTheme] ?? $colors['green'];
            @endphp

            {{-- Status badge --}}
            <div class="flex justify-center shrink-0 mb-5 sm:mb-6">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full text-[13px] sm:text-sm font-bold"
                      style="background:{{ $activeColor['badgeBg'] }}; border:1px solid {{ $activeColor['border'] }}; color:{{ $activeColor['badgeText'] }}; font-family:'Sora',sans-serif;">
                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:{{ $activeColor['dot'] }};"></span>
                    {{ session('status') }}
                </span>
            </div>

            {{-- ── INSIGHT CARD ── --}}
            <div class="text-left rounded-2xl p-3.5 sm:p-4 mb-4 sm:mb-6 shadow-sm shrink-0"
                 style="background: {{ $activeColor['bg'] }}; border: 1px solid {{ $activeColor['border'] }};">
                <div class="flex items-center gap-2 mb-1.5 sm:mb-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 shrink-0" style="color: {{ $activeColor['icon'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h4 class="font-bold text-[13px] sm:text-sm tracking-wide leading-tight" style="color: {{ $activeColor['title'] }}; font-family:'Sora',sans-serif;">
                        {{ $insightTitle }}
                    </h4>
                </div>
                <p class="text-[12px] sm:text-[13px] leading-relaxed" style="color: {{ $activeColor['text'] }}; font-family:'DM Sans',sans-serif;">
                    {{ $insightText }}
                </p>
            </div>

            {{-- Spacer untuk mendorong tombol ke bawah jika konten sedikit --}}
            <div class="mt-auto"></div>

            {{-- Close button --}}
            <button onclick="closeModal()"
                    class="w-full h-12 sm:h-[3.2rem] rounded-2xl text-white font-bold text-[14px] sm:text-[15px] tracking-wide shadow-md hover:shadow-lg transition-all duration-200 active:scale-[0.98] shrink-0"
                    style="background:linear-gradient(135deg,#003E7A 0%,#0060BB 100%); font-family:'Sora',sans-serif;">
                Kembali ke Form
            </button>

            {{-- Safe-area spacer iOS --}}
            <div class="h-safe-bottom shrink-0" style="height: env(safe-area-inset-bottom, 8px);"></div>

        </div>
    </div>
</div>
@endif

{{-- ════════════════════════════════════════════════════════════════
     SCRIPTS
════════════════════════════════════════════════════════════════ --}}
<script>
    /* ── Deteksi tinggi navbar aktual & set CSS variable ── */
    (function () {
        function setNavbarHeight() {
            const navbar =
                document.querySelector('nav') ||
                document.querySelector('header') ||
                document.querySelector('[data-navbar]') ||
                document.querySelector('.navbar');

            const h = navbar ? navbar.getBoundingClientRect().height : 64;
            document.documentElement.style.setProperty('--navbar-h', h + 'px');
        }
        setNavbarHeight();
        window.addEventListener('resize', setNavbarHeight);
    })();

    /* ── Close modal ── */
    function closeModal() {
        const modal = document.getElementById('resultModal');
        if (!modal) return;
        const card = modal.querySelector('.modal-card');
        if (card) {
            card.style.transition = 'transform .3s cubic-bezier(0.2, 0.8, 0.2, 1), opacity .3s';
            card.style.transform  = window.innerWidth < 640 ? 'translateY(100%)' : 'scale(0.95) translateY(10px)';
            card.style.opacity    = '0';
        }
        modal.style.transition = 'opacity .3s';
        modal.style.opacity    = '0';
        setTimeout(() => modal.style.display = 'none', 300);
    }

    /* ── Fungsi Toggle Accordion Edukasi ── */
    function toggleAccordion(contentId, iconId) {
        const content = document.getElementById(contentId);
        const icon = document.getElementById(iconId);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
            icon.style.color = '#FD4BC7'; // Aktif
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
            icon.style.color = '#94a3b8'; // Tidak Aktif
        }
    }

    /* ── Init Scripts ── */
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('resultModal');
        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) closeModal();
            });
        }

        /* ── Prevent scroll-wheel changing number inputs ── */
        document.querySelectorAll('.non-scroll-number').forEach(function (input) {
            input.addEventListener('wheel', function (e) { e.preventDefault(); }, { passive: false });
        });

        /* ── Submit loading state ── */
        const form = document.querySelector('form');
        const btn  = document.getElementById('submitBtn');
        if (form && btn) {
            form.addEventListener('submit', function () {
                const txt     = document.getElementById('submitText');
                const arrow   = document.getElementById('submitArrow');
                const spinner = document.getElementById('submitSpinner');
                if (txt)     txt.textContent = 'Memproses…';
                if (arrow)   arrow.classList.add('hidden');
                if (spinner) spinner.classList.remove('hidden');
                btn.disabled      = true;
                btn.style.opacity = '.75';
            });
        }
    });
</script>

@endsection