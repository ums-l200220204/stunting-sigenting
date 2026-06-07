@extends('components.main')

@section('title', 'Dashboard Orang Tua')

@section('content')

{{-- Penyesuaian padding utama: p-4 untuk mobile, md:p-8 untuk desktop --}}
<div class="min-h-screen bg-slate-100 flex flex-col gap-8 md:gap-12 p-4 sm:p-6 md:p-8"
     style="font-family: 'DM Sans', sans-serif;">

    {{-- ══════════════════════════════════════
         HERO
    ══════════════════════════════════════ --}}
    {{-- Penyesuaian padding & border-radius hero: px-5 py-8 untuk mobile --}}
    <section class="relative overflow-hidden rounded-3xl md:rounded-[2rem]
                    px-5 py-8 sm:px-8 sm:py-10 md:px-16 md:py-16
                    grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-8 md:gap-10 items-center"
             style="background: #003E7A;">

        {{-- Radial glow overlay --}}
        <div class="pointer-events-none absolute inset-0"
             style="background:
                radial-gradient(ellipse 60% 80% at 110% 50%, rgba(253,75,199,0.25) 0%, transparent 60%),
                radial-gradient(ellipse 40% 60% at -10% 30%, rgba(0,120,193,0.4) 0%, transparent 55%);"></div>

        {{-- Stripe texture --}}
        <div class="pointer-events-none absolute inset-0"
             style="background-image: repeating-linear-gradient(-45deg,rgba(255,255,255,0.018) 0px,rgba(255,255,255,0.018) 1px,transparent 1px,transparent 12px);"></div>

        {{-- ── LEFT ── --}}
        <div class="relative z-10 text-center lg:text-left flex flex-col items-center lg:items-start">

            {{-- Eyebrow --}}
            <div class="inline-flex items-center gap-2 mb-5 md:mb-7 px-3 py-1.5 md:px-4 md:py-1.5 rounded-full
                        border text-[10px] md:text-xs font-semibold tracking-widest uppercase select-none text-center"
                 style="background:rgba(255,255,255,0.1); border-color:rgba(255,255,255,0.15); color:rgba(255,255,255,0.8);">
                <span class="w-1.5 h-1.5 rounded-full inline-block flex-shrink-0" style="background:#FD4BC7;"></span>
                Platform Pemantauan Pertumbuhan Anak
            </div>

            {{-- Headline (Ukuran font dikecilkan untuk mobile: text-3xl) --}}
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-4 md:mb-6
                       text-3xl sm:text-4xl md:text-5xl xl:text-[3.5rem]"
                style="font-family:'Sora',sans-serif;">
                Ciptakan Generasi<br>
                <span style="color:#FD4BC7;">Tanpa Stunting</span>
            </h1>

            {{-- Desc --}}
            <p class="text-sm sm:text-base md:text-lg leading-relaxed max-w-lg"
               style="color:rgba(255,255,255,0.62);">
                Pantau perkembangan anak secara mudah, modern, dan terintegrasi.
                Monitor pertumbuhan, status gizi, dan kebutuhan nutrisi anak secara berkala.
            </p>

        </div>

        {{-- ── STATS CARD ── --}}
        {{-- Padding diturunkan menjadi p-5 untuk mobile --}}
        <div class="relative z-10 rounded-3xl p-5 sm:p-6 md:p-7 w-full max-w-sm mx-auto lg:max-w-none lg:mx-0"
             style="background:rgba(255,255,255,0.09);
                    border:1px solid rgba(255,255,255,0.14);
                    backdrop-filter:blur(24px);
                    -webkit-backdrop-filter:blur(24px);">

            {{-- Header --}}
            <div class="flex items-start justify-between mb-5 md:mb-6 gap-2">
                <div>
                    <p class="text-[10px] md:text-[11px] font-semibold tracking-[0.1em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.45);">
                        Status Pertumbuhan Terakhir
                    </p>
                    <p class="font-bold text-white text-lg md:text-xl leading-tight"
                       style="font-family:'Sora',sans-serif;">
                        {{ optional($perkembangan)->status_gizi ?? 'Belum Ada Data' }}
                    </p>
                </div>
                <div class="w-10 h-10 md:w-11 md:h-11 flex-shrink-0 rounded-xl flex items-center justify-center"
                     style="background:rgba(253,75,199,0.2); border:1px solid rgba(253,75,199,0.3);">
                    <svg class="w-4 h-4 md:w-5 md:h-5" style="color:#FD4BC7;" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            {{-- Divider --}}
            <div class="h-px mb-4 md:mb-5" style="background:rgba(255,255,255,0.1);"></div>

            {{-- Stat grid (Tetap 2 kolom tapi dengan padding lebih efisien di mobile) --}}
            <div class="grid grid-cols-2 gap-2 md:gap-2.5">

                <div class="rounded-2xl px-3 py-3 md:px-4 md:py-3.5"
                     style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.09);">
                    <p class="text-[9px] md:text-[10px] font-semibold tracking-[0.07em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.4);">Tinggi Badan</p>
                    <p class="font-bold text-white text-base md:text-lg leading-none"
                       style="font-family:'Sora',sans-serif;">
                        {{ optional($perkembangan)->tinggi_badan ?? '—' }}
                        <span class="text-[10px] md:text-xs font-medium" style="opacity:.6;">cm</span>
                    </p>
                </div>

                <div class="rounded-2xl px-3 py-3 md:px-4 md:py-3.5"
                     style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.09);">
                    <p class="text-[9px] md:text-[10px] font-semibold tracking-[0.07em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.4);">Berat Badan</p>
                    <p class="font-bold text-white text-base md:text-lg leading-none"
                       style="font-family:'Sora',sans-serif;">
                        {{ optional($perkembangan)->berat_badan ?? '—' }}
                        <span class="text-[10px] md:text-xs font-medium" style="opacity:.6;">kg</span>
                    </p>
                </div>

                <div class="rounded-2xl px-3 py-3 md:px-4 md:py-3.5"
                     style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.09);">
                    <p class="text-[9px] md:text-[10px] font-semibold tracking-[0.07em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.4);">Z-Score</p>
                    <p class="font-bold text-white text-base md:text-lg leading-none"
                       style="font-family:'Sora',sans-serif;">
                        {{ optional($perkembangan)->z_score ?? '—' }}
                        <span class="text-[10px] md:text-xs font-medium" style="opacity:.6;">SD</span>
                    </p>
                </div>

                <div class="rounded-2xl px-3 py-3 md:px-4 md:py-3.5"
                     style="background:rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.09);">
                    <p class="text-[9px] md:text-[10px] font-semibold tracking-[0.07em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.4);">Pengukuran</p>
                    <p class="font-bold text-white text-sm leading-snug truncate"
                       style="font-family:'Sora',sans-serif;">
                        {{ optional($perkembangan)->tanggal_pengukuran
                            ? \Carbon\Carbon::parse($perkembangan->tanggal_pengukuran)->format('d M Y')
                            : '—' }}
                    </p>
                </div>

            </div>

        </div>

    </section>

    {{-- ══════════════════════════════════════
         FITUR UTAMA
    ══════════════════════════════════════ --}}
    <section>

        <div class="mb-6 md:mb-8 text-center md:text-left">
            <h2 class="font-bold text-slate-900 text-xl md:text-3xl tracking-tight mb-2 md:mb-1.5"
                style="font-family:'Sora',sans-serif;">
                Fitur Utama
            </h2>
            <p class="text-slate-500 text-sm md:text-base">
                Kelola tumbuh kembang anak dengan mudah melalui fitur berikut.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">

            {{-- ── CARD 1 — Input Data ── --}}
            {{-- Padding p-6 untuk mobile, p-8 untuk layar besar --}}
            <div class="group relative overflow-hidden bg-white rounded-3xl p-6 md:p-8
                        border border-slate-200
                        transition-all duration-300
                        hover:-translate-y-1.5"
                 style="transition: transform .3s ease, box-shadow .3s ease;"
                 onmouseenter="this.style.boxShadow='0 16px 48px -12px rgba(0,91,169,0.18)'"
                 onmouseleave="this.style.boxShadow='none'">

                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full pointer-events-none"
                     style="background:#005BA9; opacity:.05;"></div>

                <div class="relative z-10">

                    <div class="w-12 h-12 md:w-[52px] md:h-[52px] mb-5 md:mb-6 flex items-center justify-center rounded-2xl"
                         style="background:#EBF3FF; color:#005BA9;">
                        <svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 17v-2m3 2v-4m3 4V7m3 10V5M5 19h14"/>
                        </svg>
                    </div>

                    <span class="inline-block mb-3 text-[10px] md:text-[11px] font-semibold tracking-[0.07em]
                                 uppercase px-2.5 py-1 rounded-full"
                          style="background:#EBF3FF; color:#0046A3;">
                        Data &amp; Rekam
                    </span>

                    <h3 class="font-bold text-slate-900 text-lg md:text-xl tracking-tight mb-2 md:mb-2.5"
                        style="font-family:'Sora',sans-serif;">
                        Input Data Perkembangan
                    </h3>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6 md:mb-7">
                        Tambahkan data tinggi badan, berat badan, dan perkembangan anak
                        secara berkala untuk pemantauan yang optimal.
                    </p>

                    <a href="{{ route('orangtua.input') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 rounded-full
                              text-white text-xs md:text-sm font-semibold
                              transition-all duration-200 hover:gap-3 w-fit"
                       style="background:#005BA9;">
                        Mulai Input
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                </div>
            </div>

            {{-- ── CARD 2 — Cek Perkembangan ── --}}
            <div class="group relative overflow-hidden bg-white rounded-3xl p-6 md:p-8
                        border border-slate-200
                        transition-all duration-300
                        hover:-translate-y-1.5"
                 onmouseenter="this.style.boxShadow='0 16px 48px -12px rgba(253,75,199,0.2)'"
                 onmouseleave="this.style.boxShadow='none'">

                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full pointer-events-none"
                     style="background:#FD4BC7; opacity:.05;"></div>

                <div class="relative z-10">

                    <div class="w-12 h-12 md:w-[52px] md:h-[52px] mb-5 md:mb-6 flex items-center justify-center rounded-2xl"
                         style="background:#FDE8F8; color:#C4219B;">
                        <svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>

                    <span class="inline-block mb-3 text-[10px] md:text-[11px] font-semibold tracking-[0.07em]
                                 uppercase px-2.5 py-1 rounded-full"
                          style="background:#FDE8F8; color:#A0198A;">
                        Analisis &amp; Pantau
                    </span>

                    <h3 class="font-bold text-slate-900 text-lg md:text-xl tracking-tight mb-2 md:mb-2.5"
                        style="font-family:'Sora',sans-serif;">
                        Cek Perkembangan Anak
                    </h3>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6 md:mb-7">
                        Lihat hasil analisis perkembangan dan pemantauan kondisi anak
                        berdasarkan data terbaru yang telah diinput.
                    </p>

                    <a href="{{ route('orangtua.perkembangan') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 rounded-full
                              text-white text-xs md:text-sm font-semibold
                              transition-all duration-200 hover:gap-3 w-fit"
                       style="background:#FD4BC7;">
                        Lihat Hasil
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                </div>
            </div>

            {{-- ── CARD 3 — Rekomendasi Nutrisi ── --}}
            <div class="group relative overflow-hidden bg-white rounded-3xl p-6 md:p-8
                        border border-slate-200
                        transition-all duration-300
                        hover:-translate-y-1.5"
                 onmouseenter="this.style.boxShadow='0 16px 48px -12px rgba(0,120,193,0.18)'"
                 onmouseleave="this.style.boxShadow='none'">

                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full pointer-events-none"
                     style="background:#0078C1; opacity:.05;"></div>

                <div class="relative z-10">

                    <div class="w-12 h-12 md:w-[52px] md:h-[52px] mb-5 md:mb-6 flex items-center justify-center rounded-2xl"
                         style="background:#E6F4FF; color:#0078C1;">
                        <svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>

                    <span class="inline-block mb-3 text-[10px] md:text-[11px] font-semibold tracking-[0.07em]
                                 uppercase px-2.5 py-1 rounded-full"
                          style="background:#E6F4FF; color:#005A96;">
                        Nutrisi &amp; Gizi
                    </span>

                    <h3 class="font-bold text-slate-900 text-lg md:text-xl tracking-tight mb-2 md:mb-2.5"
                        style="font-family:'Sora',sans-serif;">
                        Rekomendasi Nutrisi
                    </h3>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6 md:mb-7">
                        Dapatkan rekomendasi makanan dan nutrisi yang disesuaikan
                        dengan kebutuhan tumbuh kembang anak Anda.
                    </p>

                    <a href="{{ route('orangtua.rekomendasi') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 rounded-full
                              text-white text-xs md:text-sm font-semibold
                              transition-all duration-200 hover:gap-3 w-fit"
                       style="background:#0078C1;">
                        Lihat Rekomendasi
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                </div>
            </div>

        </div>

    </section>

</div>

@endsection