@extends('components.main')

@section('title', 'Rekomendasi Nutrisi')

@section('content')

{{-- Menyelaraskan padding dan background dasar dengan halaman lain --}}
<div class="min-h-screen -m-6 p-4 sm:p-6 lg:p-10"
     style="background: #F0F4F9; font-family:'DM Sans',sans-serif;">

    {{-- ══════════════════════════════════════
         HERO HEADER BANNER (Gaya Disamakan)
    ══════════════════════════════════════ --}}
    <div class="relative overflow-hidden rounded-[1.75rem] px-6 py-8 sm:px-10 sm:py-11 mb-6 sm:mb-8"
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
                    Panduan Gizi Anak
                </div>

                <h1 class="font-extrabold text-white leading-[1.1] tracking-tight mb-3 text-[1.75rem] sm:text-[2.25rem]"
                    style="font-family:'Sora',sans-serif;">
                    Rekomendasi<br>
                    <span style="color:#FD4BC7;">Nutrisi</span>
                </h1>

                <p class="text-sm sm:text-[15px] leading-relaxed max-w-sm"
                   style="color:rgba(255,255,255,0.6);">
                    Pilih kategori usia untuk melihat panduan kebutuhan nutrisi harian yang tepat bagi anak Anda.
                </p>
            </div>

        </div>

    </div>

    {{-- ══════════════════════════════════════
         LIST KATEGORI
    ══════════════════════════════════════ --}}
    <div class="space-y-3 sm:space-y-4">

        @foreach($kategori as $item)

            <a href="{{ route('orangtua.detailrekomendasi', $item->kategori_usia) }}"
               class="group flex items-center justify-between
                      bg-white rounded-[1.25rem]
                      px-5 py-4 sm:px-8 sm:py-6
                      border border-[#E4EBF4]
                      shadow-sm hover:shadow-md
                      hover:border-blue-200 hover:bg-[#F8FAFC]
                      transition-all duration-300
                      focus:outline-none focus-visible:ring-2
                      focus-visible:ring-blue-500">

                {{-- Kiri: Ikon + Teks --}}
                <div class="flex items-center gap-4 sm:gap-5 min-w-0">

                    {{-- Ikon --}}
                    <div class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center transition-transform duration-300 group-hover:scale-105"
                         style="background: #EEF4FF; border: 1px solid #C7D9F8;">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 sm:w-7 sm:h-7"
                             style="color: #1A4A9A;"
                             fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018
                                     0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>

                    {{-- Teks --}}
                    <div class="min-w-0">
                        <h2 class="text-base sm:text-lg font-bold
                                   text-slate-800 leading-snug truncate
                                   group-hover:text-[#005BA9]
                                   transition-colors duration-200">
                            {{ $item->kategori_usia }}
                        </h2>
                        <p class="mt-0.5 text-xs sm:text-sm text-slate-500 truncate sm:whitespace-normal">
                            Lihat rekomendasi nutrisi berdasarkan kategori usia
                        </p>
                    </div>

                </div>

                {{-- Kanan: Tombol Panah --}}
                <div class="flex-shrink-0 ml-4
                            w-9 h-9 sm:w-10 sm:h-10
                            rounded-xl
                            flex items-center justify-center
                            group-hover:bg-[#005BA9]
                            transition-all duration-300"
                     style="background: #EEF4FF; border: 1px solid #C7D9F8;">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4 sm:w-5 sm:h-5 text-[#1A4A9A] group-hover:text-white group-hover:translate-x-0.5 transform transition-all duration-300"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>

            </a>

        @endforeach

        {{-- ══════════════════════════════════════
             EMPTY STATE (Jika Tidak Ada Data)
        ══════════════════════════════════════ --}}
        @if($kategori->isEmpty())
            <div class="bg-white rounded-3xl border border-slate-200 text-center py-16 px-6 shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center"
                     style="background: #EEF4FF; border: 1px solid #C7D9F8;">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-8 h-8" style="color: #1A4A9A;"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.5"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5
                                 a2 2 0 012-2h5.586a1 1 0 01.707.293
                                 l5.414 5.414a1 1 0 01.293.707V19
                                 a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-slate-800 font-bold text-lg mb-1">Belum Ada Kategori</h3>
                <p class="text-slate-500 text-sm font-medium">
                    Data rekomendasi nutrisi belum tersedia saat ini.
                </p>
            </div>
        @endif

    </div>

</div>

@endsection