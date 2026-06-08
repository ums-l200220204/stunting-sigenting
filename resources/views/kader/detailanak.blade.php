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

<style>
    body, * { font-family: 'Plus Jakarta Sans', sans-serif; }

    .gradient-header {
        background: linear-gradient(135deg, #003D7A 0%, #0062A3 40%, #0088D1 70%, #C0369E 100%);
        position: relative;
        overflow: hidden;
    }
    .gradient-header::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 320px; height: 320px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(253,75,199,0.25) 0%, transparent 70%);
    }
    .gradient-header::after {
        content: '';
        position: absolute;
        bottom: -60px; left: 10%;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0,136,209,0.3) 0%, transparent 70%);
    }

    .stat-pill {
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    .status-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.18);
    }

    .info-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    }

    .divider-line {
        height: 1px;
        background: linear-gradient(to right, transparent, #E2EAF4, transparent);
    }

    .section-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 100px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .chart-container {
        transition: box-shadow 0.2s ease;
    }
    .chart-container:hover {
        box-shadow: 0 16px 48px rgba(0,0,0,0.07);
    }

    .avatar-ring {
        background: rgba(255,255,255,0.15);
        border: 2px solid rgba(255,255,255,0.3);
        box-shadow: 0 8px 32px rgba(0,0,0,0.2), inset 0 1px 0 rgba(255,255,255,0.3);
    }

    /* ── CHART SCROLL WRAPPER ── */
    .chart-scroll-wrapper {
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: #DDE5F0 transparent;
        padding-bottom: 4px;
    }
    .chart-scroll-wrapper::-webkit-scrollbar {
        height: 4px;
    }
    .chart-scroll-wrapper::-webkit-scrollbar-track {
        background: transparent;
    }
    .chart-scroll-wrapper::-webkit-scrollbar-thumb {
        background: #DDE5F0;
        border-radius: 99px;
    }

    /* Scroll hint fade untuk mobile */
    .chart-scroll-hint {
        position: absolute;
        top: 0; right: 0;
        width: 48px;
        height: 100%;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.9));
        pointer-events: none;
        border-radius: 0 0 16px 0;
        transition: opacity 0.3s;
    }
    .chart-scroll-hint.hidden {
        opacity: 0;
    }

    /* Scroll indicator badge */
    .scroll-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 10px;
        font-weight: 700;
        color: #94A3B8;
        padding: 3px 8px;
        background: #F1F5F9;
        border-radius: 99px;
        border: 1px solid #E2E8F0;
    }
</style>

<div class="w-full min-h-screen bg-[#F0F4FA] space-y-6 sm:space-y-8 p-4 sm:px-6 pb-12">

    {{-- ══════════ PAGE HEADER ══════════ --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 pt-2">
        <div>
            <div class="section-tag bg-blue-100 text-[#0062A3] mb-3">
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
        <div class="gradient-header p-6 sm:p-8 lg:p-10">
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 sm:gap-8">

                {{-- Profile Side --}}
                <div class="flex items-center gap-4 sm:gap-6">
                    <div class="avatar-ring w-20 h-20 sm:w-24 sm:h-24 rounded-2xl flex items-center justify-center text-4xl sm:text-5xl flex-shrink-0">
                        {{ $isLaki ? '👦' : '👧' }}
                    </div>
                    <div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-tight tracking-tight">
                            {{ $anak->nama_anak }}
                        </h2>
                        <p class="mt-1 text-white/70 text-xs sm:text-sm font-medium">
                            Anak dari <span class="text-white font-semibold">{{ $anak->nama_orangtua }}</span>
                        </p>
                    </div>
                </div>

                {{-- Status Side --}}
                <div class="status-card rounded-2xl p-5 sm:p-6 lg:min-w-[280px]">
                    <p class="text-white/60 text-[10px] sm:text-xs font-semibold uppercase tracking-widest mb-1">
                        Status Pertumbuhan Terakhir
                    </p>
                    <h3 class="text-xl sm:text-2xl font-black text-white mt-1">
                        {{ $terakhir->status_gizi ?? 'Belum Ada Data' }}
                    </h3>
                    <div class="mt-4 sm:mt-5 space-y-3">
                        @foreach([
                            ['label' => 'Berat Badan', 'value' => ($terakhir->berat_badan ?? 0).' KG', 'icon' => '⚖️'],
                            ['label' => 'Tinggi Badan', 'value' => ($terakhir->tinggi_badan ?? 0).' CM', 'icon' => '📏'],
                            ['label' => 'Z-Score',      'value' => ($terakhir->z_score ?? 0).' SD',    'icon' => '📊'],
                        ] as $stat)
                        <div class="flex items-center justify-between">
                            <span class="text-white/60 text-xs sm:text-sm flex items-center gap-2">
                                <span>{{ $stat['icon'] }}</span>{{ $stat['label'] }}
                            </span>
                            <span class="text-white font-bold text-xs sm:text-sm">{{ $stat['value'] }}</span>
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

            {{-- Info Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                {{-- Nama Anak --}}
                <div class="info-card bg-gradient-to-br from-[#F0F6FF] to-[#E8F0FD] rounded-2xl p-4 sm:p-5 border border-[#D4E4F7]">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-[#0062A3]/10 flex items-center justify-center text-sm">👤</div>
                        <p class="text-[10px] sm:text-xs font-semibold text-[#64748B] uppercase tracking-wide">Nama Anak</p>
                    </div>
                    <p class="text-lg sm:text-xl font-black text-[#0D1B2E] leading-tight">{{ $anak->nama_anak }}</p>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="info-card bg-gradient-to-br from-[#FFF0FA] to-[#FCE8F6] rounded-2xl p-4 sm:p-5 border border-[#F2C8EA]">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-[#FD4BC7]/10 flex items-center justify-center text-sm">
                            {{ $isLaki ? '♂' : '♀' }}
                        </div>
                        <p class="text-[10px] sm:text-xs font-semibold text-[#64748B] uppercase tracking-wide">Jenis Kelamin</p>
                    </div>
                    <p class="text-lg sm:text-xl font-black text-[#C4178E] leading-tight">{{ $isLaki ? 'Laki-Laki' : 'Perempuan' }}</p>
                </div>

                {{-- Usia --}}
                <div class="info-card bg-gradient-to-br from-[#EEF7FF] to-[#E0EFFC] rounded-2xl p-4 sm:p-5 border border-[#C6DFFA]">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-[#0078C1]/10 flex items-center justify-center text-sm">🎂</div>
                        <p class="text-[10px] sm:text-xs font-semibold text-[#64748B] uppercase tracking-wide">Usia</p>
                    </div>
                    <p class="text-lg sm:text-xl font-black text-[#004F87] leading-tight">
                        @if($tahun > 0)
                            {{ $tahun }} Tahun @if($bulan > 0) {{ $bulan }} Bulan @endif
                        @else
                            {{ $bulan }} Bulan
                        @endif
                    </p>
                </div>

                {{-- Tanggal Lahir --}}
                <div class="info-card bg-gradient-to-br from-[#F0FFF8] to-[#E0FAF0] rounded-2xl p-4 sm:p-5 border border-[#B8EED6]">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-lg bg-[#00A86B]/10 flex items-center justify-center text-sm">📅</div>
                        <p class="text-[10px] sm:text-xs font-semibold text-[#64748B] uppercase tracking-wide">Tanggal Lahir</p>
                    </div>
                    <p class="text-lg sm:text-xl font-black text-[#007A4D] leading-tight">
                        {{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d M Y') }}
                    </p>
                </div>

            </div>

            <div class="divider-line"></div>

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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                    @foreach([
                        ['label' => 'Nama Orang Tua', 'value' => $anak->nama_orangtua, 'icon' => '👤'],
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

            <div class="divider-line"></div>

            {{-- ─ Section: Grafik Perkembangan ─ --}}
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-1 h-5 sm:h-6 rounded-full bg-[#FD4BC7]"></div>
                    <h2 class="text-xl sm:text-2xl font-black text-[#0D1B2E] tracking-tight">Grafik Perkembangan</h2>
                </div>
                <p class="ml-4 sm:ml-5 text-xs sm:text-sm text-[#64748B]">
                    Riwayat berat dan tinggi badan anak beserta acuan standar WHO.
                    <span class="scroll-badge ml-2 sm:hidden">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                        Geser untuk data lama
                    </span>
                </p>
            </div>

            {{-- ══ Chart: Berat Badan ══ --}}
            <div class="chart-container bg-white rounded-2xl border border-[#FFE0CC] shadow-sm overflow-hidden">
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

                {{-- Scroll wrapper dengan fade hint --}}
                <div class="p-3 sm:p-6">
                    <div class="relative">
                        <div class="chart-scroll-wrapper" id="beratScrollWrapper">
                            {{-- Canvas lebar dinamis, tinggi fixed --}}
                            <div id="beratCanvasWrap" style="height:260px; min-width:100%;">
                                <canvas id="beratChart" style="height:260px !important;"></canvas>
                            </div>
                        </div>
                        {{-- Fade hint kanan --}}
                        <div class="chart-scroll-hint" id="beratScrollHint"></div>
                    </div>
                    {{-- Dots indicator --}}
                    <div id="beratDots" class="flex justify-center gap-1.5 mt-3 sm:hidden"></div>
                </div>
            </div>

            {{-- ══ Chart: Tinggi Badan ══ --}}
            <div class="chart-container bg-white rounded-2xl border border-[#C2EED8] shadow-sm overflow-hidden">
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
                        <div class="chart-scroll-wrapper" id="tinggiScrollWrapper">
                            <div id="tinggiCanvasWrap" style="height:260px; min-width:100%;">
                                <canvas id="tinggiChart" style="height:260px !important;"></canvas>
                            </div>
                        </div>
                        <div class="chart-scroll-hint" id="tinggiScrollHint"></div>
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

    const labels      = @json($labels);
    const beratData   = @json($beratData);
    const tinggiData  = @json($tinggiData);
    const beratAcuan  = @json($beratAcuan ?? []);
    const tinggiAcuan = @json($tinggiAcuan ?? []);

    const isMobile = window.innerWidth < 640;

    // ── Hitung lebar canvas berdasar jumlah data point ──
    // Setiap titik diberi jarak minimal 56px di mobile, 80px di desktop
    const MIN_POINT_WIDTH = isMobile ? 56 : 80;
    const dataCount       = labels.length;
    const CHART_HEIGHT    = isMobile ? 260 : 350;

    function calcCanvasWidth(containerEl) {
        const containerW = containerEl.parentElement.clientWidth;
        const neededW    = dataCount * MIN_POINT_WIDTH + 60; // +60 untuk padding y-axis
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
            hint.classList.toggle('hidden', atEnd);
        }

        wrapper.addEventListener('scroll', update, { passive: true });
        // Scroll ke paling kanan (data terbaru) saat load
        wrapper.scrollLeft = wrapper.scrollWidth;
        update();
    }

    // ── Dots indicator (mobile) ──
    function setupDots(wrapperId, dotsId) {
        const wrapper = document.getElementById(wrapperId);
        const dotsEl  = document.getElementById(dotsId);
        if (!isMobile || !dotsEl) return;

        const totalPages = Math.ceil(dataCount / 5); // ~5 titik per "halaman"
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
        // Set dot aktif ke kanan dulu (index terakhir)
        setTimeout(() => {
            wrapper.scrollLeft = wrapper.scrollWidth;
            updateDots();
        }, 50);
    }

    // ── Options Chart ──
    const commonOptions = {
        responsive: false,          // false karena kita atur lebar manual
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(13,27,46,0.85)',
                titleFont: { family: "'Plus Jakarta Sans', sans-serif", weight: '700', size: 13 },
                bodyFont:  { family: "'Plus Jakarta Sans', sans-serif", size: 12 },
                padding: 12,
                cornerRadius: 10,
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
                    maxTicksLimit: isMobile ? 999 : 999, // tampilkan semua label
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
                    label: 'Berat Anak (KG)',
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
        options: commonOptions
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
                    label: 'Tinggi Anak (CM)',
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
        options: commonOptions
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