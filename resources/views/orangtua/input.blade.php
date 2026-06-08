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
             BOTTOM TIP
        ══════════════════════════════════════ --}}
        <p class="text-center text-[12px] mt-5 leading-relaxed" style="color:#94a3b8;">
            Pastikan data yang dimasukkan sudah benar sebelum menekan tombol.
        </p>

    </div>
</div>

{{-- ════════════════════════════════════════════════════════════════
     MODAL HASIL
════════════════════════════════════════════════════════════════ --}}
@if(session('success'))

{{-- ── Modal styles ── --}}
<style>
    /* Deteksi tinggi navbar secara CSS — sesuaikan nilai --navbar-h jika berbeda */
    :root { --navbar-h: 64px; }

    #resultModal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: flex-end;       /* mobile: muncul dari bawah */
        justify-content: center;
        /* Overlay gelap */
        background: rgba(0, 20, 50, 0.60);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        /* Pastikan tidak tertimpa/tertutup navbar */
        padding-top: var(--navbar-h);
    }

    @media (min-width: 640px) {
        #resultModal {
            align-items: center;     /* desktop: tengah vertikal */
            padding-top: var(--navbar-h);
            padding-bottom: 1rem;
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    /* Sheet card */
    #resultModal .modal-card {
        position: relative;
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 2rem 2rem 0 0;
        box-shadow: 0 -8px 48px rgba(0,20,50,0.18);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        /* Maksimal tinggi = viewport dikurangi navbar + sedikit padding */
        max-height: calc(100vh - var(--navbar-h) - 8px);
    }

    @media (min-width: 640px) {
        #resultModal .modal-card {
            border-radius: 2rem;
            box-shadow: 0 24px 80px rgba(0,20,50,0.22);
            max-height: calc(100vh - var(--navbar-h) - 2rem);
        }
    }

    /* Animasi masuk */
    #resultModal .modal-card {
        animation: modalSlideUp .32s cubic-bezier(.32,.72,0,1) both;
    }
    @media (min-width: 640px) {
        #resultModal .modal-card {
            animation: modalFadeScale .22s cubic-bezier(.32,.72,0,1) both;
        }
    }

    @keyframes modalSlideUp {
        from { transform: translateY(100%); opacity: 0; }
        to   { transform: translateY(0);    opacity: 1; }
    }
    @keyframes modalFadeScale {
        from { transform: scale(.96) translateY(8px); opacity: 0; }
        to   { transform: scale(1)   translateY(0);   opacity: 1; }
    }

    /* Scroll body konten modal */
    #resultModal .modal-body {
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: contain;
    }
</style>

<div id="resultModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">

    <div class="modal-card">

        {{-- Accent bar --}}
        <div class="h-[4px] w-full flex-shrink-0"
             style="background: linear-gradient(90deg, #003E7A 0%, #0078C1 45%, #FD4BC7 100%);"></div>

        {{-- Drag handle (mobile) --}}
        <div class="flex justify-center pt-3 pb-1 sm:hidden flex-shrink-0">
            <div class="w-12 h-1.5 rounded-full" style="background:#DDE5F0;"></div>
        </div>

        {{-- Close button --}}
        <button onclick="closeModal()"
                aria-label="Tutup"
                class="absolute top-4 right-4 z-20 w-8 h-8 rounded-full flex items-center justify-center transition-colors duration-150"
                style="background:#F0F4F9; color:#64748b;"
                onmouseenter="this.style.background='#DDE5F0';"
                onmouseleave="this.style.background='#F0F4F9';">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Scrollable body --}}
        <div class="modal-body px-6 py-6 sm:px-8 sm:py-8 text-center flex-1">

            {{-- Status icon --}}
            <div class="w-14 h-14 mx-auto rounded-[1rem] flex items-center justify-center shadow-lg mb-5"
                 style="background:linear-gradient(135deg,#003E7A 0%,#0060BB 100%);">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            {{-- Label --}}
            <p class="text-[10px] font-bold tracking-[0.14em] uppercase mb-1"
               style="color:#94a3b8; font-family:'DM Sans',sans-serif;" id="modalTitle">
                Hasil Perhitungan
            </p>

            {{-- Z-Score --}}
            <div class="flex items-baseline justify-center gap-2 mt-1 mb-2">
                <span class="font-black leading-none tracking-tight"
                      style="font-size: clamp(2.8rem, 10vw, 4rem); color:#003E7A; font-family:'Sora',sans-serif;">
                    {{ session('zscore') }}
                </span>
                <span class="text-xl font-bold" style="color:#94a3b8; font-family:'Sora',sans-serif;">SD</span>
            </div>

            {{-- Divider --}}
            <div class="h-px my-5 max-w-[160px] mx-auto" style="background:#EEF2F8;"></div>

            {{-- Status Gizi label --}}
            <p class="text-[10px] font-bold tracking-[0.14em] uppercase mb-3"
               style="color:#94a3b8; font-family:'DM Sans',sans-serif;">
                Status Gizi
            </p>

            {{-- Status badge --}}
            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full text-sm font-bold"
                  style="background:rgba(253,75,199,0.08); border:1.5px solid rgba(253,75,199,0.25); color:#c2005c; font-family:'Sora',sans-serif;">
                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" style="background:#FD4BC7;"></span>
                {{ session('status') }}
            </span>

            {{-- Note --}}
            <p class="mt-5 text-xs leading-relaxed max-w-[280px] mx-auto" style="color:#64748b;">
                SD (Standar Deviasi) adalah satuan WHO untuk mengukur penyimpangan tinggi badan anak dari rata-rata normal.
            </p>

            {{-- Close button --}}
            <button onclick="closeModal()"
                    class="mt-6 w-full h-[3rem] rounded-2xl text-white font-bold text-sm tracking-wide shadow-md hover:shadow-lg transition-all duration-200 active:scale-[0.98]"
                    style="background:linear-gradient(135deg,#003E7A 0%,#0060BB 100%); font-family:'Sora',sans-serif;">
                Tutup
            </button>

            {{-- Safe-area spacer iOS --}}
            <div class="h-safe-bottom" style="height: env(safe-area-inset-bottom, 8px);"></div>

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
            // Coba selector umum; sesuaikan jika tag navbar berbeda di project Anda
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
            card.style.transition = 'transform .22s cubic-bezier(.32,.72,0,1), opacity .22s';
            card.style.transform  = window.innerWidth < 640 ? 'translateY(100%)' : 'scale(.95) translateY(8px)';
            card.style.opacity    = '0';
        }
        modal.style.transition = 'opacity .25s';
        modal.style.opacity    = '0';
        setTimeout(() => modal.style.display = 'none', 260);
    }

    /* ── Dismiss modal on backdrop click ── */
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