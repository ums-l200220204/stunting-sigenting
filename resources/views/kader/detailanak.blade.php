@extends('components.main')

@section('title', 'Detail Data Anak')

@section('content')

@php
    $umurBulan = \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(now());
    $tahun = floor($umurBulan / 12);
    $bulan = $umurBulan % 12;
    $isLaki = strtolower($anak->jenis_kelamin) == 'l' || strtolower($anak->jenis_kelamin) == 'laki-laki';
@endphp

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<div class="w-full min-h-screen bg-[#F0F4FA] space-y-6 sm:space-y-8 p-4 sm:px-6 pb-12" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    {{-- ══════════ PAGE HEADER ══════════ --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 pt-2">
        <div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-[0.05em] uppercase bg-blue-100 text-[#0062A3] mb-3">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Manajemen Data
            </div>
            <h1 class="text-3xl sm:text-4xl font-black text-[#0D1B2E] tracking-tight leading-tight">
                Detail Data Anak
            </h1>
            <p class="mt-2 text-sm sm:text-base text-[#64748B] font-medium">
                Informasi lengkap dan grafik perkembangan pertumbuhan anak.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('kader.perkembangan', $anak->id) }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl
                       bg-[#0062A3] text-white text-sm font-bold
                       shadow-[0_4px_14px_rgba(0,98,163,0.4)]
                       hover:bg-[#004F87] hover:shadow-[0_6px_20px_rgba(0,98,163,0.5)]
                       transition-all duration-200 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Input Perkembangan
            </a>
            <a href="{{ route('kader.dashboard') }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl
                       bg-white border border-[#DDE5F0] text-[#1E293B] text-sm font-bold
                       shadow-sm hover:shadow-md hover:border-[#B8CAE0]
                       transition-all duration-200 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- ══════════ MAIN CARD ══════════ --}}
    <div class="bg-white rounded-3xl sm:rounded-[28px] border border-[#DDE5F0] shadow-[0_2px_24px_rgba(0,0,0,0.06)] overflow-hidden">

        {{-- ── GRADIENT HERO BANNER ── --}}
        <div class="relative overflow-hidden p-6 sm:p-8 lg:p-10 shadow-md"
             style="background: linear-gradient(90deg, #014380 0%, #0072C6 50%, #9B40A0 100%);">
            
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 sm:gap-8">

                {{-- Profile Side --}}
                <div class="flex items-center gap-5 sm:gap-6">
                    <div class="w-20 h-20 sm:w-[92px] sm:h-[92px] rounded-2xl flex items-center justify-center text-4xl sm:text-[44px] flex-shrink-0 bg-white/10 border border-white/20 backdrop-blur-sm shadow-inner">
                        {{ $isLaki ? '👦' : '👧' }}
                    </div>
                    <div class="flex flex-col justify-center">
                        <h2 class="text-3xl sm:text-[2.5rem] font-black text-white leading-tight tracking-tight mb-1">
                            {{ $anak->nama_anak }}
                        </h2>
                        <p class="text-white/80 text-sm sm:text-base font-medium">
                            Anak dari <span class="text-white font-bold">{{ $anak->nama_orangtua }}</span>
                        </p>
                    </div>
                </div>

                {{-- Status Side --}}
                <div class="rounded-2xl p-6 lg:min-w-[340px] bg-white/10 backdrop-blur-md border border-white/20 shadow-lg">
                    <p class="text-white/70 text-[11px] sm:text-xs font-bold uppercase tracking-widest mb-1.5">
                        Status Pertumbuhan Terakhir
                    </p>
                    <h3 class="text-2xl sm:text-3xl font-black text-white mb-5 tracking-tight">
                        {{ $terakhir->status_gizi ?? 'Belum Ada Data' }}
                    </h3>
                    <div class="space-y-3.5">
                        @foreach([
                            ['label' => 'Berat Badan', 'value' => number_format($terakhir->berat_badan ?? 0, 2, '.', '').' KG', 'icon' => '⚖️'],
                            ['label' => 'Tinggi Badan', 'value' => number_format($terakhir->tinggi_badan ?? 0, 2, '.', '').' CM', 'icon' => '📏'],
                            ['label' => 'Z-Score',      'value' => number_format($terakhir->z_score ?? 0, 2, '.', '').' SD',    'icon' => '📊'],
                        ] as $stat)
                        <div class="flex items-center justify-between">
                            <span class="text-white/80 text-[13px] sm:text-sm flex items-center gap-3 font-medium">
                                <span class="opacity-70">{{ $stat['icon'] }}</span> {{ $stat['label'] }}
                            </span>
                            <span class="text-white font-bold text-[13px] sm:text-sm tracking-wide">{{ $stat['value'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        {{-- ── BODY CONTENT ── --}}
        <div class="p-5 sm:p-8 lg:p-10 space-y-8 sm:space-y-10">

            {{-- ─ Section: Informasi Anak ─ --}}
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-1 h-5 sm:h-6 rounded-full bg-[#0062A3]"></div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#0D1B2E] tracking-tight">Informasi Anak</h2>
                </div>
                <p class="ml-4 sm:ml-5 text-xs sm:text-sm text-[#64748B]">Data identitas anak dan orang tua.</p>
            </div>

            {{-- Info Grid: 5 kartu, dibuat lebih compact namun tetap 1 baris rapi di layar besar --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-2.5 sm:gap-3">

                {{-- Nama Anak --}}
                <div class="bg-gradient-to-br from-[#F0F6FF] to-[#E8F0FD] rounded-xl p-3 sm:p-3.5 border border-[#D4E4F7] transition-all duration-200 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_8px_20px_rgba(0,0,0,0.07)]">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-[#0062A3]/10 flex items-center justify-center text-xs">👤</div>
                        <p class="text-[9px] sm:text-[10px] font-semibold text-[#64748B] uppercase tracking-wide">Nama Anak</p>
                    </div>
                    <p class="text-sm sm:text-base font-black text-[#0D1B2E] leading-tight break-words">{{ $anak->nama_anak }}</p>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="bg-gradient-to-br from-[#FFF0FA] to-[#FCE8F6] rounded-xl p-3 sm:p-3.5 border border-[#F2C8EA] transition-all duration-200 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_8px_20px_rgba(0,0,0,0.07)]">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-[#FD4BC7]/10 flex items-center justify-center text-xs">
                            {{ $isLaki ? '♂' : '♀' }}
                        </div>
                        <p class="text-[9px] sm:text-[10px] font-semibold text-[#64748B] uppercase tracking-wide">Jenis Kelamin</p>
                    </div>
                    <p class="text-sm sm:text-base font-black text-[#C4178E] leading-tight">{{ $isLaki ? 'Laki-Laki' : 'Perempuan' }}</p>
                </div>

                {{-- Usia --}}
                <div class="bg-gradient-to-br from-[#EEF7FF] to-[#E0EFFC] rounded-xl p-3 sm:p-3.5 border border-[#C6DFFA] transition-all duration-200 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_8px_20px_rgba(0,0,0,0.07)]">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-[#0078C1]/10 flex items-center justify-center text-xs">🎂</div>
                        <p class="text-[9px] sm:text-[10px] font-semibold text-[#64748B] uppercase tracking-wide">Usia</p>
                    </div>
                    <p class="text-sm sm:text-base font-black text-[#004F87] leading-tight">
                        @if($tahun > 0)
                            {{ $tahun }} Thn @if($bulan > 0) {{ $bulan }} Bln @endif
                        @else
                            {{ $bulan }} Bulan
                        @endif
                    </p>
                </div>

                {{-- Tanggal Lahir --}}
                <div class="bg-gradient-to-br from-[#F0FFF8] to-[#E0FAF0] rounded-xl p-3 sm:p-3.5 border border-[#B8EED6] transition-all duration-200 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_8px_20px_rgba(0,0,0,0.07)]">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-[#00A86B]/10 flex items-center justify-center text-xs">📅</div>
                        <p class="text-[9px] sm:text-[10px] font-semibold text-[#64748B] uppercase tracking-wide">Tanggal Lahir</p>
                    </div>
                    <p class="text-sm sm:text-base font-black text-[#007A4D] leading-tight">
                        {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d M Y') }}
                    </p>
                </div>

                {{-- NIK Anak --}}
                <div class="col-span-2 sm:col-span-1 bg-gradient-to-br from-[#F0F6FF] to-[#E8F0FD] rounded-xl p-3 sm:p-3.5 border border-[#D4E4F7] transition-all duration-200 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_8px_20px_rgba(0,0,0,0.07)]">
                    <div class="flex items-center gap-1.5 mb-2">
                        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-md bg-[#0062A3]/10 flex items-center justify-center text-xs">🆔</div>
                        <p class="text-[9px] sm:text-[10px] font-semibold text-[#64748B] uppercase tracking-wide">NIK Anak</p>
                    </div>
                    <p class="text-sm sm:text-base font-black text-[#0D1B2E] leading-tight break-all">{{ $anak->nik }}</p>
                </div>

            </div>

            <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-[#E2EAF4] to-transparent"></div>

            {{-- ─ Section: Data Orang Tua ─ --}}
            <div class="bg-[#F7FAFF] rounded-2xl border border-[#DDE8F6] p-5 sm:p-6 lg:p-8">
                <div class="flex items-center gap-4 mb-5 sm:mb-6">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#0062A3] flex items-center justify-center text-white text-lg sm:text-xl shadow-[0_4px_12px_rgba(0,98,163,0.3)]">
                        👨
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-black text-[#0D1B2E]">Data Orang Tua</h2>
                        <p class="text-[10px] sm:text-xs text-[#64748B]">Informasi kontak dan identitas wali</p>
                    </div>
                </div>
                {{-- 4 kartu -> dibuat 2 kolom di layar sedang, 4 kolom di layar besar 
                     supaya tidak ada kartu yang menggantung sendiri di baris terakhir --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6">
                    @foreach([
                        ['label' => 'Nama Orang Tua', 'value' => $anak->nama_orangtua, 'icon' => '👤'],
                        ['label' => 'NIK Orang Tua',  'value' => $anak->nik_orangtua, 'icon' => '🆔'],
                        ['label' => 'Email',          'value' => $anak->email,          'icon' => '✉️'],
                        ['label' => 'Nomor HP',       'value' => $anak->nomor_hp,       'icon' => '📱'],
                    ] as $item)
                    <div class="bg-white rounded-xl p-4 border border-[#E5EDF6]">
                        <p class="text-[10px] sm:text-xs text-[#94A3B8] font-semibold uppercase tracking-wide mb-1">
                            {{ $item['icon'] }} {{ $item['label'] }}
                        </p>
                        <p class="text-sm sm:text-base font-bold text-[#1E293B] truncate">{{ $item['value'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-[#E2EAF4] to-transparent"></div>

            {{-- ─ Section: Grafik Perkembangan ─ --}}
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-1 h-5 sm:h-6 rounded-full bg-[#FD4BC7]"></div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#0D1B2E] tracking-tight">Grafik Perkembangan</h2>
                </div>
                <p class="ml-4 sm:ml-5 text-xs sm:text-sm text-[#64748B] flex items-center">
                    Riwayat berat dan tinggi badan anak beserta acuan standar WHO.
                    <span class="ml-2 sm:hidden inline-flex items-center gap-1 text-[10px] font-bold text-[#94A3B8] px-2 py-[3px] bg-[#F1F5F9] rounded-full border border-[#E2E8F0]">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                        Geser untuk data lama
                    </span>
                </p>
            </div>

            {{-- ══ Chart: Berat Badan ══ --}}
            <div class="bg-white rounded-2xl border border-[#FFE0CC] shadow-sm overflow-hidden transition-shadow duration-200 ease-out hover:shadow-[0_16px_48px_rgba(0,0,0,0.07)]">
                <div class="px-5 sm:px-6 pt-5 sm:pt-6 pb-4 border-b border-[#FFF0E6]">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-base sm:text-lg"
                                 style="background:rgba(255,122,0,0.1)">⚖️</div>
                            <div>
                                <h3 class="text-base sm:text-lg font-black text-[#1E293B]">Berat Badan</h3>
                                <p class="text-[10px] sm:text-xs text-[#94A3B8]">Kilogram (KG)</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 sm:gap-4 text-[10px] sm:text-xs text-[#94A3B8]">
                            <span class="flex items-center gap-1.5">
                                <span class="inline-block w-4 sm:w-6 h-0.5 bg-[#FF7A00] rounded"></span>Data Anak
                            </span>
                            <span class="flex items-center gap-1.5">
                                <span class="inline-block w-4 sm:w-6 border-t-2 border-dashed border-[#94A3B8]"></span>Standar WHO
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-3 sm:p-6">
                    <div class="relative">
                        <div class="overflow-x-auto overflow-y-hidden pb-1 [-webkit-overflow-scrolling:touch] [scrollbar-width:thin] [scrollbar-color:#DDE5F0_transparent] [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-[#DDE5F0] [&::-webkit-scrollbar-thumb]:rounded-full" id="beratScrollWrapper">
                            <div id="beratCanvasWrap" style="height:260px; min-width:100%;">
                                <canvas id="beratChart" style="height:260px !important;"></canvas>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 w-12 h-full bg-gradient-to-r from-transparent to-white/90 pointer-events-none rounded-br-2xl transition-opacity duration-300 opacity-0" id="beratScrollHint"></div>
                    </div>
                    <div id="beratDots" class="flex justify-center gap-1.5 mt-3 sm:hidden"></div>
                </div>
            </div>

            {{-- ══ Chart: Tinggi Badan ══ --}}
            <div class="bg-white rounded-2xl border border-[#C2EED8] shadow-sm overflow-hidden transition-shadow duration-200 ease-out hover:shadow-[0_16px_48px_rgba(0,0,0,0.07)]">
                <div class="px-5 sm:px-6 pt-5 sm:pt-6 pb-4 border-b border-[#EAFAF2]">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl flex items-center justify-center text-base sm:text-lg"
                                 style="background:rgba(0,201,81,0.1)">📏</div>
                            <div>
                                <h3 class="text-base sm:text-lg font-black text-[#1E293B]">Tinggi Badan</h3>
                                <p class="text-[10px] sm:text-xs text-[#94A3B8]">Sentimeter (CM)</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 sm:gap-4 text-[10px] sm:text-xs text-[#94A3B8]">
                            <span class="flex items-center gap-1.5">
                                <span class="inline-block w-4 sm:w-6 h-0.5 bg-[#00C951] rounded"></span>Data Anak
                            </span>
                            <span class="flex items-center gap-1.5">
                                <span class="inline-block w-4 sm:w-6 border-t-2 border-dashed border-[#94A3B8]"></span>Standar WHO
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-3 sm:p-6">
                    <div class="relative">
                        <div class="overflow-x-auto overflow-y-hidden pb-1 [-webkit-overflow-scrolling:touch] [scrollbar-width:thin] [scrollbar-color:#DDE5F0_transparent] [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-[#DDE5F0] [&::-webkit-scrollbar-thumb]:rounded-full" id="tinggiScrollWrapper">
                            <div id="tinggiCanvasWrap" style="height:260px; min-width:100%;">
                                <canvas id="tinggiChart" style="height:260px !important;"></canvas>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 w-12 h-full bg-gradient-to-r from-transparent to-white/90 pointer-events-none rounded-br-2xl transition-opacity duration-300 opacity-0" id="tinggiScrollHint"></div>
                    </div>
                    <div id="tinggiDots" class="flex justify-center gap-1.5 mt-3 sm:hidden"></div>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- ══════════ SCRIPTS ══════════ --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>

<script>
    Chart.register(ChartDataLabels);

    let labels      = @json($labels);
    let beratData   = @json($beratData);
    let tinggiData  = @json($tinggiData);
    let beratAcuan  = @json($beratAcuan ?? []);
    let tinggiAcuan = @json($tinggiAcuan ?? []);

    // ── HAPUS RUANG KOSONG DI KANAN GRAFIK ──
    let lastValidIndex = -1;
    for (let i = labels.length - 1; i >= 0; i--) {
        if (beratData[i] !== null || tinggiData[i] !== null) {
            lastValidIndex = i;
            break;
        }
    }

    if (lastValidIndex !== -1 && lastValidIndex < labels.length - 1) {
        labels      = labels.slice(0, lastValidIndex + 1);
        beratData   = beratData.slice(0, lastValidIndex + 1);
        tinggiData  = tinggiData.slice(0, lastValidIndex + 1);
        beratAcuan  = beratAcuan.slice(0, lastValidIndex + 1);
        tinggiAcuan = tinggiAcuan.slice(0, lastValidIndex + 1);
    }
    // ─────────────────────────────────────────

    const isMobile = window.innerWidth < 640;

    // ── Hitung lebar canvas berdasar jumlah data point ──
    const MIN_POINT_WIDTH = isMobile ? 56 : 150;
    const dataCount       = labels.length;
    const CHART_HEIGHT    = isMobile ? 260 : 350;

    function calcCanvasWidth(containerEl) {
        const containerW = containerEl.parentElement.clientWidth;
        const neededW    = dataCount * MIN_POINT_WIDTH + 60;
        return Math.max(containerW, neededW);
    }

    // ── Resize canvas wrap sesuai kebutuhan ──
    function applyCanvasWidth(wrapId, scrollWrapperId) {
        const wrap   = document.getElementById(wrapId);
        const scroll = document.getElementById(scrollWrapperId);
        const w      = calcCanvasWidth(scroll);
        wrap.style.width  = w + 'px';
        wrap.style.height = CHART_HEIGHT + 'px';
    }

    applyCanvasWidth('beratCanvasWrap',  'beratScrollWrapper');
    applyCanvasWidth('tinggiCanvasWrap', 'tinggiScrollWrapper');

    // ── Scroll hint (fade kanan) & scroll-to-end ──
    function setupScrollHint(wrapperId, hintId) {
        const wrapper = document.getElementById(wrapperId);
        const hint    = document.getElementById(hintId);

        function update() {
            const atEnd = wrapper.scrollLeft + wrapper.clientWidth >= wrapper.scrollWidth - 4;
            hint.classList.toggle('opacity-0', atEnd);
        }

        wrapper.addEventListener('scroll', update, { passive: true });
        wrapper.scrollLeft = wrapper.scrollWidth;
        update();
    }

    // ── Dots indicator (mobile) ──
    function setupDots(wrapperId, dotsId) {
        const wrapper = document.getElementById(wrapperId);
        const dotsEl  = document.getElementById(dotsId);
        if (!isMobile || !dotsEl) return;

        const totalPages = Math.ceil(dataCount / 5); 
        if (totalPages <= 1) { dotsEl.style.display = 'none'; return; }

        for (let i = 0; i < totalPages; i++) {
            const d = document.createElement('span');
            d.style.cssText = `
                display:inline-block; width:6px; height:6px;
                border-radius:99px; background:#CBD5E1;
                transition: width 0.25s, background 0.25s;
            `;
            dotsEl.appendChild(d);
        }

        function updateDots() {
            const progress = wrapper.scrollLeft / (wrapper.scrollWidth - wrapper.clientWidth);
            const active   = Math.round(progress * (totalPages - 1));
            dotsEl.querySelectorAll('span').forEach((d, i) => {
                if (i === active) {
                    d.style.background = '#0062A3';
                    d.style.width = '18px';
                } else {
                    d.style.background = '#CBD5E1';
                    d.style.width = '6px';
                }
            });
        }

        wrapper.addEventListener('scroll', updateDots, { passive: true });
        setTimeout(() => {
            wrapper.scrollLeft = wrapper.scrollWidth;
            updateDots();
        }, 50);
    }

    // ── Options Chart ──
    function buildCommonOptions(unit) {
        return {
            responsive: false,          
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false, 
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(13,27,46,0.92)',
                    titleColor: '#ffffff',
                    bodyColor: '#e2e8f0',
                    borderColor: 'rgba(255,255,255,0.1)',
                    borderWidth: 1,
                    titleFont: { family: "'Plus Jakarta Sans', sans-serif", weight: '700', size: 13 },
                    bodyFont:  { family: "'Plus Jakarta Sans', sans-serif", weight: '500', size: 12 },
                    padding: 12,
                    cornerRadius: 12,
                    boxPadding: 5,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' ' + unit;
                            }
                            return ' ' + label;
                        }
                    }
                },
                datalabels: {
                    font: { family: "'Plus Jakarta Sans', sans-serif", weight: '700', size: isMobile ? 9 : 11 },
                    formatter: (val) => val ? val : '',
                }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                    ticks: {
                        font: { family: "'Plus Jakarta Sans', sans-serif", weight: '600', size: isMobile ? 9 : 11 },
                        color: '#94A3B8',
                        maxRotation: isMobile ? 30 : 0,
                        maxTicksLimit: 999, 
                    }
                },
                y: {
                    grid: { color: 'rgba(0,0,0,0.05)', drawBorder: false },
                    ticks: {
                        font: { family: "'Plus Jakarta Sans', sans-serif", weight: '600', size: isMobile ? 9 : 11 },
                        color: '#94A3B8'
                    }
                }
            },
            layout: { padding: { top: 28, right: 16, bottom: 8, left: 0 } },
            elements: { point: { hoverRadius: 8 } }
        };
    }

    // ── Render Berat Chart ──
    const beratCanvas = document.getElementById('beratChart');
    beratCanvas.width  = document.getElementById('beratCanvasWrap').clientWidth;
    beratCanvas.height = CHART_HEIGHT;

    new Chart(beratCanvas, {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: 'Berat Anak',
                    data: beratData,
                    borderColor: '#FF7A00',
                    backgroundColor: 'rgba(255,122,0,0.08)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: isMobile ? 2 : 3,
                    pointRadius: isMobile ? 4 : 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#FF7A00',
                    pointBorderWidth: 2.5,
                    datalabels: {
                        display: true,
                        color: '#E05D00',
                        align: 'top',
                        anchor: 'center',
                        offset: 4
                    }
                },
                {
                    label: 'Standar WHO (Median)',
                    data: beratAcuan,
                    borderColor: '#CBD5E1',
                    borderDash: [6, 5],
                    borderWidth: 2,
                    fill: false,
                    pointRadius: isMobile ? 2 : 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#CBD5E1',
                    datalabels: {
                        display: true,
                        color: '#94A3B8',
                        align: 'bottom',
                        anchor: 'center',
                        offset: 4
                    }
                }
            ]
        },
        options: buildCommonOptions('KG')
    });

    // ── Render Tinggi Chart ──
    const tinggiCanvas = document.getElementById('tinggiChart');
    tinggiCanvas.width  = document.getElementById('tinggiCanvasWrap').clientWidth;
    tinggiCanvas.height = CHART_HEIGHT;

    new Chart(tinggiCanvas, {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: 'Tinggi Anak',
                    data: tinggiData,
                    borderColor: '#00C951',
                    backgroundColor: 'rgba(0,201,81,0.08)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: isMobile ? 2 : 3,
                    pointRadius: isMobile ? 4 : 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#00C951',
                    pointBorderWidth: 2.5,
                    datalabels: {
                        display: true,
                        color: '#009C3F',
                        align: 'top',
                        anchor: 'center',
                        offset: 4
                    }
                },
                {
                    label: 'Standar WHO (Median)',
                    data: tinggiAcuan,
                    borderColor: '#CBD5E1',
                    borderDash: [6, 5],
                    borderWidth: 2,
                    fill: false,
                    pointRadius: isMobile ? 2 : 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#CBD5E1',
                    datalabels: {
                        display: true,
                        color: '#94A3B8',
                        align: 'bottom',
                        anchor: 'center',
                        offset: 4
                    }
                }
            ]
        },
        options: buildCommonOptions('CM')
    });

    // ── Init scroll hint & dots setelah chart render ──
    setTimeout(() => {
        setupScrollHint('beratScrollWrapper',  'beratScrollHint');
        setupScrollHint('tinggiScrollWrapper', 'tinggiScrollHint');
        setupDots('beratScrollWrapper',  'beratDots');
        setupDots('tinggiScrollWrapper', 'tinggiDots');
    }, 100);
</script>

@endsection