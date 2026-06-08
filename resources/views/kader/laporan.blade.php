@extends('components.main')

@section('title', 'Data Laporan')

@section('content')

{{--
    Tambahkan di <head> layout utama jika belum ada:
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
--}}

<div class="min-h-screen pb-12" style="background:#F0F4FA; font-family:'DM Sans',sans-serif;">

    {{-- ══════════════════════════════════════
         HEADER
    ══════════════════════════════════════ --}}
    <div class="mb-8 flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">

        <div>
            <p class="text-xs font-semibold tracking-[0.1em] uppercase mb-2"
               style="color:#005BA9;">
                Kader — Statistik
            </p>
            <h1 class="font-extrabold text-slate-900 leading-tight tracking-tight
                       text-3xl md:text-4xl"
                style="font-family:'Sora',sans-serif;">
                Data Laporan
            </h1>
            <p class="mt-2 text-slate-500 text-base">
                Ringkasan statistik pertumbuhan anak, status gizi, dan perkembangan stunting.
            </p>
        </div>

        {{-- Filter + Button --}}
        <div class="flex flex-wrap items-center gap-3">

            {{-- Filter Bulan --}}
            <select id="filter-bulan"
                    class="bg-white border border-slate-200 rounded-2xl
                           px-4 py-2.5 text-sm text-slate-700
                           focus:outline-none focus:ring-2"
                    style="focus:ring-color:#005BA9;">
                <option value="">Semua Bulan</option>
                <option value="1"  {{ request('bulan') == '1'  ? 'selected' : '' }}>Januari</option>
                <option value="2"  {{ request('bulan') == '2'  ? 'selected' : '' }}>Februari</option>
                <option value="3"  {{ request('bulan') == '3'  ? 'selected' : '' }}>Maret</option>
                <option value="4"  {{ request('bulan') == '4'  ? 'selected' : '' }}>April</option>
                <option value="5"  {{ request('bulan') == '5'  ? 'selected' : '' }}>Mei</option>
                <option value="6"  {{ request('bulan') == '6'  ? 'selected' : '' }}>Juni</option>
                <option value="7"  {{ request('bulan') == '7'  ? 'selected' : '' }}>Juli</option>
                <option value="8"  {{ request('bulan') == '8'  ? 'selected' : '' }}>Agustus</option>
                <option value="9"  {{ request('bulan') == '9'  ? 'selected' : '' }}>September</option>
                <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
            </select>

            {{-- Filter Tahun --}}
            <select id="filter-tahun"
                    class="bg-white border border-slate-200 rounded-2xl
                           px-4 py-2.5 text-sm text-slate-700
                           focus:outline-none">
                <option value="">Semua Tahun</option>
                @for($i = date('Y'); $i >= 2020; $i--)
                    <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>

            {{-- Download PDF --}}
            <a id="btn-cetak-pdf"
               href="{{ route('kader.laporan.cetak', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}"
               target="_blank"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl
                      text-white text-sm font-semibold
                      transition-all duration-200 hover:opacity-90 hover:-translate-y-px"
               style="background:#005BA9;">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 10v6m0 0l-3-3m3 3l3-3M3 17v3a1 1 0 001 1h16a1 1 0 001-1v-3"/>
                </svg>
                Preview Laporan PDF
            </a>

        </div>

    </div>

    {{-- ══════════════════════════════════════
         STAT CARDS
    ══════════════════════════════════════ --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        {{-- Total Anak --}}
        <div class="relative overflow-hidden bg-white rounded-3xl p-7 border border-slate-200"
             style="box-shadow:0 4px 24px -6px rgba(0,91,169,0.08);">
            <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full pointer-events-none"
                 style="background:#005BA9; opacity:.05;"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 text-xl"
                     style="background:#EBF3FF;">
                    👶
                </div>
                <p class="text-xs font-semibold tracking-[0.08em] uppercase text-slate-400 mb-1">
                    Total Anak
                </p>
                <h2 id="text-totalAnak"
                    class="font-extrabold text-slate-900 text-4xl leading-none"
                    style="font-family:'Sora',sans-serif;">
                    {{ $totalAnak }}
                </h2>
            </div>
        </div>

        {{-- Laki-laki --}}
        <div class="relative overflow-hidden bg-white rounded-3xl p-7 border border-slate-200"
             style="box-shadow:0 4px 24px -6px rgba(0,120,193,0.08);">
            <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full pointer-events-none"
                 style="background:#0078C1; opacity:.05;"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 text-xl"
                     style="background:#E6F4FF;">
                    👦
                </div>
                <p class="text-xs font-semibold tracking-[0.08em] uppercase text-slate-400 mb-1">
                    Anak Laki-Laki
                </p>
                <h2 id="text-laki"
                    class="font-extrabold text-slate-900 text-4xl leading-none"
                    style="font-family:'Sora',sans-serif;">
                    {{ $laki }}
                </h2>
            </div>
        </div>

        {{-- Perempuan --}}
        <div class="relative overflow-hidden bg-white rounded-3xl p-7 border border-slate-200"
             style="box-shadow:0 4px 24px -6px rgba(253,75,199,0.08);">
            <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full pointer-events-none"
                 style="background:#FD4BC7; opacity:.05;"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 text-xl"
                     style="background:#FDE8F8;">
                    👧
                </div>
                <p class="text-xs font-semibold tracking-[0.08em] uppercase text-slate-400 mb-1">
                    Anak Perempuan
                </p>
                <h2 id="text-perempuan"
                    class="font-extrabold text-slate-900 text-4xl leading-none"
                    style="font-family:'Sora',sans-serif;">
                    {{ $perempuan }}
                </h2>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════════════
         GRAFIK ROW 1 — Status Gizi + Gender
    ══════════════════════════════════════ --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5 mb-5">

        {{-- Status Gizi --}}
        <div class="bg-white rounded-3xl border border-slate-200 p-5 sm:p-7"
             style="box-shadow:0 4px 24px -6px rgba(0,91,169,0.06);">

            <div class="flex items-start justify-between mb-4 sm:mb-6 gap-3">
                <div>
                    <h2 class="font-bold text-slate-900 text-base sm:text-lg tracking-tight"
                        style="font-family:'Sora',sans-serif;">
                        Status Gizi Anak
                    </h2>
                    <p class="mt-0.5 text-xs text-slate-400">
                        Berdasarkan data pemeriksaan terbaru.
                    </p>
                </div>
                {{-- Legend pills — hidden on xs, shown sm+ --}}
                <div class="hidden sm:flex flex-wrap gap-1.5 justify-end max-w-[220px]">
                    @foreach([
                        ['Belum Dicek','#94A3B8'],
                        ['Stunting Berat','#FF4D4F'],
                        ['Stunting','#FFB200'],
                        ['Normal','#00C951'],
                        ['Tinggi','#8B5CF6'],
                    ] as [$label, $color])
                    <span class="inline-flex items-center gap-1 text-[10px] font-medium px-2 py-0.5 rounded-full"
                          style="background:{{ $color }}18; color:{{ $color }};">
                        <span class="w-1.5 h-1.5 rounded-full inline-block" style="background:{{ $color }};"></span>
                        {{ $label }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- Legend pills mobile (xs only, horizontal scroll) --}}
            <div class="flex sm:hidden gap-1.5 overflow-x-auto pb-2 mb-3 no-scrollbar">
                @foreach([
                    ['Belum Dicek','#94A3B8'],
                    ['Stunting Berat','#FF4D4F'],
                    ['Stunting','#FFB200'],
                    ['Normal','#00C951'],
                    ['Tinggi','#8B5CF6'],
                ] as [$label, $color])
                <span class="inline-flex flex-shrink-0 items-center gap-1 text-[10px] font-medium px-2 py-0.5 rounded-full"
                      style="background:{{ $color }}18; color:{{ $color }};">
                    <span class="w-1.5 h-1.5 rounded-full inline-block" style="background:{{ $color }};"></span>
                    {{ $label }}
                </span>
                @endforeach
            </div>

            {{-- Responsive canvas wrapper (Pure Tailwind) --}}
            <div class="relative w-full h-[220px] sm:h-[280px] lg:h-[320px]">
                <canvas id="statusChart"></canvas>
            </div>

        </div>

        {{-- Gender --}}
        <div class="bg-white rounded-3xl border border-slate-200 p-5 sm:p-7"
             style="box-shadow:0 4px 24px -6px rgba(0,91,169,0.06);">

            <div class="mb-4 sm:mb-6">
                <h2 class="font-bold text-slate-900 text-base sm:text-lg tracking-tight"
                    style="font-family:'Sora',sans-serif;">
                    Distribusi Jenis Kelamin
                </h2>
                <p class="mt-0.5 text-xs text-slate-400">
                    Perbandingan jumlah anak.
                </p>
            </div>

            {{-- Donut + legend side by side --}}
            <div class="flex items-center gap-6 sm:gap-8">
                {{-- Pure Tailwind wrapper --}}
                <div class="shrink-0 w-[140px] min-[480px]:w-[180px]">
                    <canvas id="genderChart"></canvas>
                </div>
                <div class="flex flex-col gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-3 h-3 rounded-full inline-block" style="background:#0078C1;"></span>
                            <span class="text-xs font-medium text-slate-500">Laki-Laki</span>
                        </div>
                        <p id="legend-laki"
                           class="font-extrabold text-2xl text-slate-900"
                           style="font-family:'Sora',sans-serif;">
                            {{ $laki }}
                        </p>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-3 h-3 rounded-full inline-block" style="background:#FD4BC7;"></span>
                            <span class="text-xs font-medium text-slate-500">Perempuan</span>
                        </div>
                        <p id="legend-perempuan"
                           class="font-extrabold text-2xl text-slate-900"
                           style="font-family:'Sora',sans-serif;">
                            {{ $perempuan }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- ══════════════════════════════════════
         GRAFIK ROW 2 — Kelompok Usia
    ══════════════════════════════════════ --}}
    <div class="bg-white rounded-3xl border border-slate-200 p-5 sm:p-7"
         style="box-shadow:0 4px 24px -6px rgba(0,91,169,0.06);">

        <div class="flex items-start justify-between mb-4 sm:mb-6 gap-3">
            <div>
                <h2 class="font-bold text-slate-900 text-base sm:text-lg tracking-tight"
                    style="font-family:'Sora',sans-serif;">
                    Kelompok Usia Anak
                </h2>
                <p class="mt-0.5 text-xs text-slate-400">
                    Distribusi usia anak berdasarkan data pertumbuhan terbaru (bulan).
                </p>
            </div>
            <span class="inline-flex flex-shrink-0 items-center gap-1.5 text-xs font-semibold px-3 py-1 rounded-full"
                  style="background:#EBF3FF; color:#005BA9;">
                <span class="w-2 h-2 rounded-full inline-block" style="background:#005BA9;"></span>
                <span class="hidden sm:inline">Jumlah Anak</span>
                <span class="sm:hidden">Anak</span>
            </span>
        </div>

        {{-- Responsive canvas wrapper (Pure Tailwind) --}}
        <div class="relative w-full h-[260px] sm:h-[300px] lg:h-[340px] pt-6">
            <canvas id="usiaChart"></canvas>
        </div>

    </div>

</div>

{{-- ── SCRIPTS ── --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>

<script>
Chart.register(ChartDataLabels);

// ── Helper: detect mobile ─────────────────────────────
function isMobile() {
    return window.innerWidth < 640;
}

// ── Shared datalabels config ──────────────────────────
const dlBase = {
    color: '#ffffff',
    font: { weight: 'bold', size: 13 },
    formatter: v => v > 0 ? v : ''
};

// ── STATUS GIZI ───────────────────────────────────────
let statusChartInstance = new Chart(document.getElementById('statusChart'), {
    type: 'bar',
    data: {
        labels: ['Belum Dicek', 'Stunting Berat', 'Stunting', 'Normal', 'Tinggi'],
        datasets: [{
            data: [{{ $belumDicek }}, {{ $stuntingBerat }}, {{ $stunting }}, {{ $normal }}, {{ $tinggi }}],
            backgroundColor: ['#94A3B8','#FF4D4F','#FFB200','#00C951','#8B5CF6'],
            borderRadius: 10,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,          // ← kunci responsif
        plugins: {
            legend: { display: false },
            datalabels: {
                ...dlBase,
                anchor: 'center',
                align: 'center',
                font: {
                    weight: 'bold',
                    // font lebih kecil di mobile
                    size: isMobile() ? 10 : 13
                }
            }
        },
        layout: { padding: { top: 16 } },
        scales: {
            x: {
                grid: { display: false },
                border: { display: false },
                ticks: {
                    color: '#94A3B8',
                    font: { size: isMobile() ? 9 : 11 },
                    // Rotate label agar tidak tumpuk di mobile
                    maxRotation: isMobile() ? 35 : 0,
                    minRotation: isMobile() ? 35 : 0,
                    // Sederhanakan label panjang di mobile
                    callback: function(val, idx) {
                        const labels = ['Belum\nDicek', 'Stunt.\nBerat', 'Stunting', 'Normal', 'Tinggi'];
                        const labelsMobile = ['B.Dicek', 'S.Berat', 'Stunting', 'Normal', 'Tinggi'];
                        return isMobile() ? labelsMobile[idx] : this.getLabelForValue(val);
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    precision: 0,
                    color: '#94A3B8',
                    font: { size: isMobile() ? 9 : 11 }
                },
                grid: { color: '#F1F5F9' },
                border: { display: false }
            }
        }
    }
});

// ── GENDER ────────────────────────────────────────────
let genderChartInstance = new Chart(document.getElementById('genderChart'), {
    type: 'doughnut',
    data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{
            data: [{{ $laki }}, {{ $perempuan }}],
            backgroundColor: ['#0078C1','#FD4BC7'],
            borderWidth: 0,
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        cutout: '75%',
        plugins: {
            legend: { display: false },
            datalabels: {
                ...dlBase,
                color: '#fff',
                font: { weight: 'bold', size: 12 },
                formatter: v => v > 0 ? v : ''
            }
        }
    }
});

// ── KELOMPOK USIA ─────────────────────────────────────
let usiaChartInstance = new Chart(document.getElementById('usiaChart'), {
    type: 'line',
    data: {
        labels: ['0-6', '7-12', '13-18', '19-24', '25-36', '37-48', '49-60'],
        datasets: [{
            label: 'Jumlah Anak',
            data: [
                {{ $usia0_6 ?? 0 }}, {{ $usia7_12 ?? 0 }}, {{ $usia13_18 ?? 0 }},
                {{ $usia19_24 ?? 0 }}, {{ $usia25_36 ?? 0 }}, {{ $usia37_48 ?? 0 }},
                {{ $usia49_60 ?? 0 }}
            ],
            borderColor: '#005BA9',
            backgroundColor: 'rgba(0,91,169,0.08)',
            fill: true,
            tension: 0.4,
            borderWidth: isMobile() ? 2.5 : 4,
            pointRadius: isMobile() ? 4 : 5,
            pointHoverRadius: isMobile() ? 6 : 7,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,          // ← kunci responsif
        plugins: {
            legend: { display: false },
            datalabels: {
                color: '#005BA9',
                font: {
                    weight: 'bold',
                    size: isMobile() ? 10 : 12
                },
                anchor: 'end',
                align: 'top',
                offset: isMobile() ? 2 : 4,
                formatter: v => v > 0 ? v : ''
            }
        },
        layout: {
            // Padding top lebih besar agar label nilai tidak terpotong di mobile
            padding: { top: isMobile() ? 40 : 32, right: 8, left: 4 }
        },
        scales: {
            x: {
                grid: { display: false },
                border: { display: false },
                ticks: {
                    color: '#94A3B8',
                    font: { size: isMobile() ? 9 : 11 },
                    maxRotation: 0,
                    minRotation: 0
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                    precision: 0,
                    color: '#94A3B8',
                    font: { size: isMobile() ? 9 : 11 }
                },
                grid: { color: '#F1F5F9' },
                border: { display: false }
            }
        }
    }
});

// ── Redraw on resize (update responsive options) ──────
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        // Update font sizes based on new viewport
        const mobile = isMobile();

        statusChartInstance.options.plugins.datalabels.font.size = mobile ? 10 : 13;
        statusChartInstance.options.scales.x.ticks.font.size     = mobile ? 9  : 11;
        statusChartInstance.options.scales.x.ticks.maxRotation   = mobile ? 35 : 0;
        statusChartInstance.options.scales.x.ticks.minRotation   = mobile ? 35 : 0;
        statusChartInstance.options.scales.y.ticks.font.size     = mobile ? 9  : 11;
        statusChartInstance.update();

        usiaChartInstance.options.plugins.datalabels.font.size   = mobile ? 10 : 12;
        usiaChartInstance.options.plugins.datalabels.offset       = mobile ? 2  : 4;
        usiaChartInstance.options.layout.padding.top              = mobile ? 40 : 32;
        usiaChartInstance.options.scales.x.ticks.font.size       = mobile ? 9  : 11;
        usiaChartInstance.options.scales.y.ticks.font.size       = mobile ? 9  : 11;
        usiaChartInstance.data.datasets[0].borderWidth            = mobile ? 2.5 : 4;
        usiaChartInstance.data.datasets[0].pointRadius            = mobile ? 4  : 5;
        usiaChartInstance.update();
    }, 200);
});

// ── FILTER AJAX ───────────────────────────────────────
const filterBulan  = document.getElementById('filter-bulan');
const filterTahun  = document.getElementById('filter-tahun');
const btnCetakPdf  = document.getElementById('btn-cetak-pdf');

function updateDataLaporan() {
    const bulan = filterBulan.value;
    const tahun = filterTahun.value;

    btnCetakPdf.href = `{{ route('kader.laporan.cetak') }}?bulan=${bulan}&tahun=${tahun}`;

    const url = new URL(window.location.href);
    url.searchParams.set('bulan', bulan);
    url.searchParams.set('tahun', tahun);

    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById('text-totalAnak').innerText  = data.totalAnak;
        document.getElementById('text-laki').innerText       = data.laki;
        document.getElementById('text-perempuan').innerText  = data.perempuan;
        document.getElementById('legend-laki').innerText     = data.laki;
        document.getElementById('legend-perempuan').innerText = data.perempuan;

        statusChartInstance.data.datasets[0].data = [
            data.belumDicek, data.stuntingBerat, data.stunting, data.normal, data.tinggi
        ];
        statusChartInstance.update();

        genderChartInstance.data.datasets[0].data = [data.laki, data.perempuan];
        genderChartInstance.update();

        usiaChartInstance.data.datasets[0].data = [
            data.usia0_6, data.usia7_12, data.usia13_18, data.usia19_24,
            data.usia25_36, data.usia37_48, data.usia49_60
        ];
        usiaChartInstance.update();
    })
    .catch(err => console.error('Gagal mengambil data:', err));
}

filterBulan.addEventListener('change', updateDataLaporan);
filterTahun.addEventListener('change', updateDataLaporan);

window.addEventListener('pageshow', e => { if (e.persisted) window.location.reload(); });
</script>

@endsection