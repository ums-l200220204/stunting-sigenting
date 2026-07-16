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

            {{-- Headline --}}
            <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-4 md:mb-6
                       text-3xl sm:text-4xl md:text-5xl xl:text-[3.5rem]"
                style="font-family:'Sora',sans-serif;">
                Ciptakan Generasi Ngunggahan<br>
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
        <div class="relative z-10 rounded-3xl p-5 sm:p-6 md:p-7 w-full max-w-sm mx-auto lg:max-w-none lg:mx-0"
             style="background:rgba(255,255,255,0.09);
                    border:1px solid rgba(255,255,255,0.14);
                    backdrop-filter:blur(24px);
                    -webkit-backdrop-filter:blur(24px);">

            {{-- ==============================================
                 IDENTITAS ANAK (BARU DITAMBAHKAN)
            =============================================== --}}
            <div class="flex items-center gap-3.5 mb-4 md:mb-5">
                <div class="flex-1 min-w-0">
                    <p class="text-[9px] md:text-[10px] font-semibold tracking-[0.1em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.45);">
                        Nama Anak
                    </p>
                    <p class="font-bold text-white text-sm md:text-base leading-tight truncate"
                       style="font-family:'Sora',sans-serif;">
                        {{-- Ganti $anak->nama_anak dengan variabel yang sesuai di Controller Anda --}}
                        {{ optional($anak)->nama_anak ?? 'Data Anak Belum Diinput' }}
                    </p>
                </div>
            </div>

            {{-- Divider Pemisah Identitas --}}
            <div class="h-px w-full mb-4 md:mb-5" style="background:rgba(255,255,255,0.1);"></div>
            {{-- ============================================== --}}


            {{-- Header Status Gizi --}}
            <div class="flex items-start justify-between mb-4 md:mb-5 gap-2">
                <div>
                    <p class="text-[10px] md:text-[11px] font-semibold tracking-[0.1em] uppercase mb-1"
                       style="color:rgba(255,255,255,0.45);">
                        Status Pertumbuhan
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

            {{-- Stat grid (Tetap 2 kolom) --}}
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

            {{-- ── CARD 1 — Input Data (Pena/Form) ── --}}
            <div class="group relative overflow-hidden bg-white rounded-3xl p-6 md:p-8 border border-slate-200 transition-all duration-300 hover:-translate-y-1.5"
                 style="transition: transform .3s ease, box-shadow .3s ease;"
                 onmouseenter="this.style.boxShadow='0 16px 48px -12px rgba(0,91,169,0.18)'"
                 onmouseleave="this.style.boxShadow='none'">

                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full pointer-events-none" style="background:#005BA9; opacity:.05;"></div>

                <div class="relative z-10">
                    <div class="w-12 h-12 md:w-[52px] md:h-[52px] mb-5 md:mb-6 flex items-center justify-center rounded-2xl"
                         style="background:#EBF3FF; color:#005BA9;">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>

                    <span class="inline-block mb-3 text-[10px] md:text-[11px] font-semibold tracking-[0.07em] uppercase px-2.5 py-1 rounded-full"
                          style="background:#EBF3FF; color:#0046A3;">Data &amp; Rekam</span>

                    <h3 class="font-bold text-slate-900 text-lg md:text-xl tracking-tight mb-2 md:mb-2.5" style="font-family:'Sora',sans-serif;">Input Data Perkembangan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 md:mb-7">Tambahkan data tinggi badan, berat badan, dan perkembangan anak secara berkala.</p>

                    <a href="{{ route('orangtua.input') }}" class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 rounded-full text-white text-xs md:text-sm font-semibold transition-all duration-200 hover:gap-3 w-fit" style="background:#005BA9;">
                        Mulai Input <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- ── CARD 2 — Cek Perkembangan (Grafik Anak) ── --}}
            <div class="group relative overflow-hidden bg-white rounded-3xl p-6 md:p-8 border border-slate-200 transition-all duration-300 hover:-translate-y-1.5"
                 onmouseenter="this.style.boxShadow='0 16px 48px -12px rgba(253,75,199,0.2)'"
                 onmouseleave="this.style.boxShadow='none'">

                <div class="absolute -top-8 -right-8 w-36 h-36 rounded-full pointer-events-none" style="background:#FD4BC7; opacity:.05;"></div>

                <div class="relative z-10">
                    <div class="w-12 h-12 md:w-[52px] md:h-[52px] mb-5 md:mb-6 flex items-center justify-center rounded-2xl"
                         style="background:#FDE8F8; color:#C4219B;">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>

                    <span class="inline-block mb-3 text-[10px] md:text-[11px] font-semibold tracking-[0.07em] uppercase px-2.5 py-1 rounded-full"
                          style="background:#FDE8F8; color:#A0198A;">Analisis &amp; Pantau</span>

                    <h3 class="font-bold text-slate-900 text-lg md:text-xl tracking-tight mb-2 md:mb-2.5" style="font-family:'Sora',sans-serif;">Cek Perkembangan Anak</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 md:mb-7">Lihat hasil analisis perkembangan dan pemantauan kondisi anak secara visual.</p>

                    <a href="{{ route('orangtua.perkembangan') }}" class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-2.5 rounded-full text-white text-xs md:text-sm font-semibold transition-all duration-200 hover:gap-3 w-fit" style="background:#FD4BC7;">
                        Lihat Hasil <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- ── CARD 3 — Rekomendasi Nutrisi (Ikon Mangkuk Makanan) ── --}}
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
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 11h16a8 8 0 01-16 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 19h12"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 4c0 1.5-1.5 2-1.5 3.5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c0 1.5-1.5 2-1.5 3.5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 4c0 1.5-1.5 2-1.5 3.5"/>
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
                        Dapatkan rekomendasi menu harian yang kaya gizi untuk mendukung tumbuh kembang optimal si kecil.
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