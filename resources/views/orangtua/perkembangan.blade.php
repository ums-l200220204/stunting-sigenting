{{-- resources/views/orangtua/perkembangan.blade.php --}}

@extends('components.main')

@section('title', 'Cek Perkembangan Anak')

@section('content')

{{-- ════════════════════════════════════════════════════════════════
     PAGE WRAPPER
════════════════════════════════════════════════════════════════ --}}
<div class="min-h-screen bg-[#F0F4F9] px-4 py-8 sm:px-6 sm:py-10 space-y-6"
     style="font-family:'DM Sans',sans-serif;">

    {{-- ══════════════════════════════════════
         HERO HEADER BANNER
    ══════════════════════════════════════ --}}
    <div class="relative overflow-hidden rounded-[1.75rem] px-6 py-8 sm:px-10 sm:py-11"
         style="background:#003E7A;">

        {{-- Radial glow --}}
        <div class="pointer-events-none absolute inset-0"
             style="background:
                radial-gradient(ellipse 55% 75% at 110% 50%, rgba(253,75,199,0.28) 0%, transparent 60%),
                radial-gradient(ellipse 40% 55% at -5% 30%,  rgba(0,120,193,0.45)  0%, transparent 55%);"></div>

        {{-- Stripe texture --}}
        <div class="pointer-events-none absolute inset-0"
             style="background-image:repeating-linear-gradient(-45deg,rgba(255,255,255,0.02) 0px,rgba(255,255,255,0.02) 1px,transparent 1px,transparent 12px);"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-7">

            {{-- ── Left: Title ── --}}
            <div>
                {{-- Eyebrow badge --}}
                <div class="inline-flex items-center gap-2 mb-4 px-3.5 py-1.5 rounded-full text-[10px] sm:text-[11px] font-semibold tracking-[0.1em] uppercase select-none"
                     style="background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.15); color:rgba(255,255,255,0.8);">
                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#FD4BC7;"></span>
                    Grafik Pertumbuhan WHO
                </div>

                <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-3 text-[1.75rem] sm:text-[2.25rem]"
                    style="font-family:'Sora',sans-serif;">
                    Cek Perkembangan<br>
                    <span style="color:#FD4BC7;">Anak</span>
                </h1>

                <p class="text-sm sm:text-[15px] leading-relaxed max-w-sm"
                   style="color:rgba(255,255,255,0.6);">
                    Pantau grafik pertumbuhan anak berdasarkan data perkembangan terbaru dibanding standar WHO.
                </p>
            </div>

            {{-- ── Right: Stat cards ── --}}
            <div class="flex flex-row gap-3 flex-wrap lg:flex-nowrap lg:flex-shrink-0">

                {{-- Status Gizi --}}
                <div class="flex-1 min-w-[130px] rounded-2xl px-4 py-4 sm:px-5"
                     style="background:rgba(255,255,255,0.09); border:1px solid rgba(255,255,255,0.14); backdrop-filter:blur(16px);">
                    <p class="text-[9px] sm:text-[10px] font-semibold tracking-[0.1em] uppercase mb-1.5"
                       style="color:rgba(255,255,255,0.45);">Status Terakhir</p>
                    <p class="font-bold text-white text-base sm:text-lg leading-tight"
                       style="font-family:'Sora',sans-serif;">
                        {{ $terakhir->status_gizi ?? 'Belum Ada Data' }}
                    </p>
                </div>

                {{-- Z-Score --}}
                <div class="flex-1 min-w-[110px] rounded-2xl px-4 py-4 sm:px-5"
                     style="background:rgba(253,75,199,0.12); border:1px solid rgba(253,75,199,0.25); backdrop-filter:blur(16px);">
                    <p class="text-[9px] sm:text-[10px] font-semibold tracking-[0.1em] uppercase mb-1.5"
                       style="color:rgba(253,75,199,0.7);">Z-Score</p>
                    <p class="font-bold text-base sm:text-lg leading-tight"
                       style="color:#FD4BC7; font-family:'Sora',sans-serif;">
                        {{ $terakhir->z_score ?? '—' }}
                        <span class="text-xs sm:text-sm font-semibold" style="color:rgba(253,75,199,0.6);">SD</span>
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════════
         CHART SECTION WRAPPER
    ══════════════════════════════════════ --}}
    <div class="bg-white rounded-[1.75rem] overflow-hidden shadow-sm"
         style="border:1px solid #E4EBF4;">

        {{-- Top accent bar --}}
        <div class="h-[3px] w-full" style="background:linear-gradient(90deg,#003E7A 0%,#0078C1 45%,#FD4BC7 100%);"></div>

        <div class="px-4 py-6 sm:px-8 sm:py-10 space-y-8 sm:space-y-10">

            {{-- ════════════════════════════
                 GRAFIK BERAT BADAN
            ════════════════════════════ --}}
            <div>
                {{-- Chart header --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 sm:mb-5">
                    <div class="flex items-center gap-3">
                        {{-- Icon badge --}}
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                             style="background:rgba(255,122,0,0.1); border:1px solid rgba(255,122,0,0.2);">
                            <svg class="w-5 h-5" style="color:#FF7A00;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-[16px] sm:text-[17px]" style="color:#1e293b; font-family:'Sora',sans-serif;">
                                Grafik Berat Badan
                            </h2>
                            <p class="text-[11px] sm:text-[12px]" style="color:#94a3b8;">kg · dibanding standar median WHO</p>
                        </div>
                    </div>

                    {{-- Legend note --}}
                    <div class="flex items-center gap-2 px-3 py-1.5 sm:py-2 rounded-xl self-start sm:self-auto"
                         style="background:#F8FAFC; border:1px solid #EEF2F8;">
                        <span class="flex-shrink-0 w-4 sm:w-5 border-t-2 border-dashed" style="border-color:#94a3b8;"></span>
                        <span class="text-[10px] sm:text-[11px] font-medium" style="color:#64748b;">Standar Median WHO</span>
                    </div>
                </div>

                {{-- Chart canvas container (TINGGI HARUS DI-FIX AGAR MUNCUL DI HP) --}}
                <div class="rounded-2xl p-2 sm:p-6 overflow-hidden"
                     style="background:#F8FAFC; border:1px solid #EEF2F8;">
                    {{-- h-[300px] untuk HP, sm:h-[380px] untuk PC agar grafik lebih tinggi --}}
                    <div class="relative w-full h-[300px] sm:h-[380px]">
                        <canvas id="beratChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- ── Divider ── --}}
            <div class="h-px w-full" style="background:#EEF2F8;"></div>

            {{-- ════════════════════════════
                 GRAFIK TINGGI BADAN
            ════════════════════════════ --}}
            <div>
                {{-- Chart header --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4 sm:mb-5">
                    <div class="flex items-center gap-3">
                        {{-- Icon badge --}}
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0"
                             style="background:rgba(0,201,81,0.1); border:1px solid rgba(0,201,81,0.2);">
                            <svg class="w-5 h-5" style="color:#00C951;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-[16px] sm:text-[17px]" style="color:#1e293b; font-family:'Sora',sans-serif;">
                                Grafik Tinggi Badan
                            </h2>
                            <p class="text-[11px] sm:text-[12px]" style="color:#94a3b8;">cm · dibanding standar median WHO</p>
                        </div>
                    </div>

                    {{-- Legend note --}}
                    <div class="flex items-center gap-2 px-3 py-1.5 sm:py-2 rounded-xl self-start sm:self-auto"
                         style="background:#F8FAFC; border:1px solid #EEF2F8;">
                        <span class="flex-shrink-0 w-4 sm:w-5 border-t-2 border-dashed" style="border-color:#94a3b8;"></span>
                        <span class="text-[10px] sm:text-[11px] font-medium" style="color:#64748b;">Standar Median WHO</span>
                    </div>
                </div>

                {{-- Chart canvas container --}}
                <div class="rounded-2xl p-2 sm:p-6 overflow-hidden"
                     style="background:#F8FAFC; border:1px solid #EEF2F8;">
                    <div class="relative w-full h-[300px] sm:h-[380px]">
                        <canvas id="tinggiChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ══════════════════════════════════════
         BOTTOM INFO STRIP
    ══════════════════════════════════════ --}}
    <div class="flex items-start gap-3 rounded-2xl px-5 py-4"
         style="background:rgba(0,62,122,0.04); border:1px solid rgba(0,62,122,0.1);">
        <svg class="w-4 h-4 mt-0.5 flex-shrink-0" style="color:#0078C1;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="16" x2="12" y2="12"/>
            <line x1="12" y1="8" x2="12.01" y2="8"/>
        </svg>
        <p class="text-[11px] sm:text-[12px] leading-relaxed font-medium" style="color:#0078C1;">
            Data grafik diperbarui otomatis setiap kali Anda menginput data perkembangan baru melalui menu <strong>Input Data</strong>.
        </p>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════════════
     CHART.JS SCRIPTS
════════════════════════════════════════════════════════════════ --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>

<script>
    Chart.register(ChartDataLabels);

    const labels      = @json($labels);
    const beratData   = @json($beratData);
    const tinggiData  = @json($tinggiData);
    const beratAcuan  = @json($beratAcuan);
    const tinggiAcuan = @json($tinggiAcuan);

    const isMobile = window.innerWidth < 640;

    /* ══════════════════════════════════════
       SHARED BASE OPTIONS
    ══════════════════════════════════════ */
    function buildOptions(unit) {
        return {
            responsive: true,
            // maintainAspectRatio diset false agar grafik mengikuti height class di HTML
            maintainAspectRatio: false, 
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                    align: 'end',
                    labels: {
                        boxWidth: 8,
                        boxHeight: 8,
                        usePointStyle: true, // Menggunakan bentuk titik bulat, lebih rapi di mobile
                        padding: isMobile ? 12 : 20,
                        font: { family: "'DM Sans', sans-serif", size: isMobile ? 10 : 12, weight: '600' },
                        color: '#64748b',
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(255, 255, 255, 0.95)',
                    titleColor: '#1e293b',
                    bodyColor: '#475569',
                    borderColor: '#E4EBF4',
                    borderWidth: 1,
                    padding: isMobile ? 10 : 14,
                    cornerRadius: 8,
                    titleFont: { family: "'Sora', sans-serif", weight: '700', size: isMobile ? 12 : 13 },
                    bodyFont:  { family: "'DM Sans', sans-serif", size: isMobile ? 11 : 12 },
                    callbacks: {
                        label: function(ctx) {
                            return `  ${ctx.dataset.label}: ${ctx.parsed.y ?? '—'} ${unit}`;
                        }
                    }
                },
                // Datalabels config global, logic tampil ditangani di masing-masing dataset
                datalabels: {
                    font: { weight: '700', size: isMobile ? 9 : 10, family: "'DM Sans', sans-serif" },
                    // Sembunyikan label Standar WHO di mobile agar tidak semrawut (opsional tapi disarankan)
                    formatter: (val, context) => {
                        if (val == null) return '';
                        if (isMobile && context.datasetIndex === 1) return ''; // Sembunyikan label WHO di HP
                        return val;
                    },
                }
            },
            layout: { padding: { top: 20, right: isMobile ? 5 : 15, bottom: 0, left: 0 } },
            scales: {
                x: {
                    grid: { display: false },
                    border: { display: false },
                    ticks: {
                        font: { family: "'DM Sans', sans-serif", size: isMobile ? 9 : 11 },
                        color: '#94a3b8',
                        padding: 8,
                        maxRotation: isMobile ? 45 : 0, // Miringkan teks di HP
                        autoSkip: true, // Otomatis lompati label jika terlalu rapat
                        maxTicksLimit: isMobile ? 6 : 12 // Batasi jumlah label bulan di bawah grafik saat di HP
                    }
                },
                y: {
                    beginAtZero: false,
                    grid: { color: 'rgba(0,0,0,0.03)', drawTicks: false },
                    border: { display: false, dash: [4, 4] },
                    ticks: {
                        font: { family: "'DM Sans', sans-serif", size: isMobile ? 9 : 11 },
                        color: '#94a3b8',
                        padding: 8,
                        callback: (val) => `${val} ${unit}`,
                        maxTicksLimit: isMobile ? 5 : 8 // Kurangi jumlah step angka di Y-axis saat di HP
                    }
                }
            }
        };
    }

    /* ══════════════════════════════════════
       CHART: BERAT BADAN
    ══════════════════════════════════════ */
    new Chart(document.getElementById('beratChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Berat Anak',
                    data: beratData,
                    borderColor: '#FF7A00',
                    backgroundColor: 'rgba(255,122,0,0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: isMobile ? 2 : 3,
                    pointRadius: isMobile ? 3 : 5,
                    pointHoverRadius: isMobile ? 5 : 7,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#FF7A00',
                    pointBorderWidth: 2,
                    datalabels: { 
                        display: true, 
                        color: '#FF7A00',
                        align: 'top', // Angka ditaruh di atas garis
                        anchor: 'center',
                        offset: isMobile ? 4 : 6
                    }
                },
                {
                    label: 'Standar WHO',
                    data: beratAcuan,
                    borderColor: '#94a3b8',
                    borderDash: [5, 5],
                    borderWidth: isMobile ? 1.5 : 2,
                    fill: false,
                    pointRadius: 0, // Sembunyikan titik WHO untuk desain yang lebih bersih
                    pointHoverRadius: 0,
                    datalabels: { 
                        display: !isMobile, // Hanya tampil di layar besar
                        color: '#94a3b8', // Warna abu-abu yang lebih redup
                        align: 'bottom', // Angka WHO ditaruh di bawah agar tidak tumpah tindih dengan angka anak
                        anchor: 'center',
                        offset: 6
                    }
                }
            ]
        },
        options: buildOptions('kg')
    });

    /* ══════════════════════════════════════
       CHART: TINGGI BADAN
    ══════════════════════════════════════ */
    new Chart(document.getElementById('tinggiChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Tinggi Anak',
                    data: tinggiData,
                    borderColor: '#00C951',
                    backgroundColor: 'rgba(0,201,81,0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: isMobile ? 2 : 3,
                    pointRadius: isMobile ? 3 : 5,
                    pointHoverRadius: isMobile ? 5 : 7,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#00C951',
                    pointBorderWidth: 2,
                    datalabels: { 
                        display: true, 
                        color: '#00C951',
                        align: 'top', 
                        anchor: 'center',
                        offset: isMobile ? 4 : 6
                    }
                },
                {
                    label: 'Standar WHO',
                    data: tinggiAcuan,
                    borderColor: '#94a3b8',
                    borderDash: [5, 5],
                    borderWidth: isMobile ? 1.5 : 2,
                    fill: false,
                    pointRadius: 0, // Sembunyikan titik WHO
                    pointHoverRadius: 0,
                    datalabels: { 
                        display: !isMobile, // Hanya tampil di layar besar
                        color: '#94a3b8', 
                        align: 'bottom', // Angka WHO ditaruh di bawah 
                        anchor: 'center',
                        offset: 6
                    }
                }
            ]
        },
        options: buildOptions('cm')
    });
</script>

@endsection