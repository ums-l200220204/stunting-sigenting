@extends('components.main')

@section('title', 'Input Data Perkembangan')

@section('content')

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<div class="w-full min-h-screen bg-[#F0F4F9] px-4 py-6 sm:py-8 md:py-12 md:px-8 font-['Plus_Jakarta_Sans']">

    {{-- PAGE HEADER --}}
    <div class="max-w-2xl mx-auto mb-6 sm:mb-8 animate-card-enter">

        <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
            {{-- Icon --}}
            <div class="shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-[#005BA9] to-[#0078C1] flex items-center justify-center shadow-lg shadow-blue-200">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-black text-slate-800 leading-tight">
                    Input Data Perkembangan
                </h1>
                <p class="text-slate-500 sm:text-slate-400 text-xs sm:text-sm md:text-base mt-1.5 sm:mt-1">
                    Masukkan data perkembangan anak untuk mengetahui status gizi.
                </p>
            </div>
        </div>
    </div>

    {{-- ALERT MESSAGES --}}
    @if(session('success'))
    <div class="max-w-2xl mx-auto mb-5 animate-card-enter">
        <div class="flex items-start sm:items-center gap-3 px-4 sm:px-5 py-3 sm:py-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-semibold text-xs sm:text-sm">
            <div class="shrink-0 w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-emerald-100 flex items-center justify-center mt-0.5 sm:mt-0">
                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <p class="leading-relaxed sm:leading-normal">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-2xl mx-auto mb-5 animate-card-enter">
        <div class="flex items-start sm:items-center gap-3 px-4 sm:px-5 py-3 sm:py-4 rounded-2xl bg-red-50 border border-red-200 text-red-600 font-semibold text-xs sm:text-sm">
            <div class="shrink-0 w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-red-100 flex items-center justify-center mt-0.5 sm:mt-0">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </div>
            <p class="leading-relaxed sm:leading-normal">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    {{-- MAIN CARD --}}
    <div class="max-w-2xl mx-auto animate-card-enter [animation-delay:0.1s]">
        <div class="bg-white rounded-[1.5rem] sm:rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">

            {{-- TOP ACCENT BAR --}}
            <div class="h-1.5 w-full bg-[linear-gradient(90deg,#005BA9,#0078C1,#FD4BC7,#005BA9)] bg-[length:300%_100%] animate-gradient-shift"></div>

            {{-- CHILD INFO STRIP --}}
            <div class="px-5 md:px-8 pt-5 pb-4 sm:pt-6 sm:pb-5 bg-gradient-to-r from-[#EEF5FD] to-[#F5F0FF] border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#005BA9]/10 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#005BA9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-[10px] sm:text-xs font-semibold text-slate-400 uppercase tracking-widest truncate">Data Anak</p>
                        <p class="text-sm sm:text-base font-bold text-slate-700 truncate">{{ $anak->nama_anak ?? 'Nama Anak' }} &mdash; {{ $anak->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                    </div>
                </div>
            </div>

            {{-- FORM --}}
            <form action="{{ route('kader.perkembangan.store') }}" method="POST" class="px-5 md:px-8 py-6 sm:py-8 space-y-6 sm:space-y-7">
                @csrf
                <input type="hidden" name="anak_id" value="{{ $anak->id }}">

                {{-- SECTION: Waktu --}}
                <div>
                    <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 sm:mb-4">Informasi Waktu</p>
                    <div>
                        <label class="block text-xs sm:text-sm font-bold text-slate-600 mb-2">
                            Tanggal Pengukuran
                        </label>
                        <div class="relative">
                            <div class="absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-[#005BA9]/10 flex items-center justify-center pointer-events-none">
                                <svg class="w-4 h-4 text-[#005BA9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            </div>
                            <input type="date"
                                   id="tanggal"
                                   name="tanggal_pengukuran"
                                   value="{{ date('Y-m-d') }}"
                                   readonly
                                   class="w-full h-12 sm:h-14 rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 pl-14 pr-4 sm:pl-16 sm:pr-5 text-sm sm:text-base font-semibold text-slate-600 cursor-not-allowed outline-none transition-all duration-200">
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                {{-- SECTION: Pengukuran --}}
                <div>
                    <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 sm:mb-4">Data Pengukuran</p>

                    <div class="space-y-4 sm:space-y-5">
                        {{-- BERAT BADAN --}}
                        <div>
                            <label class="block text-xs sm:text-sm font-bold text-slate-600 mb-2">
                                Berat Badan
                            </label>
                            <div class="flex gap-2 sm:gap-3">
                                <input type="number"
                                       id="berat"
                                       name="berat_badan"
                                       step="0.1"
                                       required
                                       min="0"
                                       placeholder="Contoh : 12"
                                       class="non-scroll-number flex-1 w-full h-12 sm:h-14 rounded-xl sm:rounded-2xl border border-slate-200 bg-white px-4 sm:px-5 text-sm sm:text-base font-semibold text-slate-700 placeholder-slate-300 transition-all duration-200 focus:outline-none focus:border-[#005BA9] focus:ring-4 focus:ring-[#005BA9]/10 focus:bg-white [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none [appearance:textfield]">
                                <div class="shrink-0 w-16 sm:w-20 h-12 sm:h-14 rounded-xl sm:rounded-2xl text-white flex items-center justify-center font-black text-xs sm:text-sm tracking-widest shadow-md transition-transform duration-150"
                                     style="background: #005BA9;">
                                    KG
                                </div>
                            </div>
                        </div>

                        {{-- TINGGI BADAN --}}
                        <div>
                            <label class="block text-xs sm:text-sm font-bold text-slate-600 mb-2">
                                Tinggi Badan
                            </label>
                            <div class="flex gap-2 sm:gap-3">
                                <input type="number"
                                       id="tinggi"
                                       name="tinggi_badan"
                                       step="0.1"
                                       required
                                       min="0"
                                       placeholder="Contoh : 88"
                                       class="non-scroll-number flex-1 w-full h-12 sm:h-14 rounded-xl sm:rounded-2xl border border-slate-200 bg-white px-4 sm:px-5 text-sm sm:text-base font-semibold text-slate-700 placeholder-slate-300 transition-all duration-200 focus:outline-none focus:border-[#005BA9] focus:ring-4 focus:ring-[#005BA9]/10 focus:bg-white [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none [appearance:textfield]">
                                <div class="shrink-0 w-16 sm:w-20 h-12 sm:h-14 rounded-xl sm:rounded-2xl text-white flex items-center justify-center font-black text-xs sm:text-sm tracking-widest shadow-md transition-transform duration-150"
                                     style="background: #FD4BC7;">
                                    CM
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-6"></div>

                {{-- SECTION: Info Anak (Readonly) --}}
                <div>
                    <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 sm:mb-4">Info Anak</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        {{-- USIA --}}
                        @php
                            $umurBulan = (int) \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(\Carbon\Carbon::now());
                        @endphp
                        <div>
                            <label class="block text-xs sm:text-sm font-bold text-slate-600 mb-2">Usia</label>
                            <div class="flex gap-2">
                                <input type="text"
                                       readonly
                                       value="{{ intval($umurBulan) }}"
                                       class="flex-1 min-w-0 h-12 sm:h-14 rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm sm:text-base font-black text-[#0078C1] text-center cursor-not-allowed outline-none transition-all duration-200">
                                <div class="shrink-0 w-20 h-12 sm:h-14 rounded-xl sm:rounded-2xl text-white flex items-center justify-center font-black text-[10px] sm:text-xs tracking-widest shadow-md transition-transform duration-150"
                                     style="background: #005BA9;">
                                    BULAN
                                </div>
                            </div>
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div>
                            <label class="block text-xs sm:text-sm font-bold text-slate-600 mb-2">Jenis Kelamin</label>
                            <div class="h-12 sm:h-14 rounded-xl sm:rounded-2xl border border-slate-200 bg-slate-50 px-3 sm:px-4 flex items-center gap-2.5">
                                @if($anak->jenis_kelamin == 'L')
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-blue-100 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#005BA9]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="font-bold text-slate-600 text-xs sm:text-sm truncate">Laki-Laki</span>
                                @else
                                <div class="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-pink-100 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#FD4BC7]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                                </div>
                                <span class="font-bold text-slate-600 text-xs sm:text-sm truncate">Perempuan</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                <div class="h-px bg-slate-100"></div>

                {{-- SECTION: Preview Hasil --}}
                <div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-3 sm:mb-4 gap-1">
                        <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">Preview Hasil</p>
                        <span id="preview-hint" class="text-[10px] sm:text-xs text-slate-400 italic">Isi berat & tinggi untuk preview</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        {{-- Z-SCORE --}}
                        <div class="relative overflow-hidden rounded-xl sm:rounded-2xl border border-[#D6E4F0] bg-gradient-to-br from-[#EEF5FD] to-[#E8F2FF] p-4 sm:p-5">
                            <div class="absolute top-3 right-3 w-7 h-7 sm:w-8 sm:h-8 rounded-[10px] sm:rounded-xl bg-[#005BA9]/10 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#005BA9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            </div>
                            <p class="text-[10px] sm:text-xs font-bold text-[#005BA9]/60 uppercase tracking-widest mb-1 sm:mb-2">Z-Score</p>
                            <input type="text"
                                   id="preview_zscore"
                                   readonly
                                   placeholder="—"
                                   class="w-full bg-transparent border-none outline-none text-xl sm:text-2xl font-black text-[#005BA9] placeholder-[#005BA9]/30 p-0">
                        </div>

                        {{-- STATUS GIZI --}}
                        <div class="relative overflow-hidden rounded-xl sm:rounded-2xl border border-[#F7D0ED] bg-gradient-to-br from-[#FFF0FA] to-[#FFE8F5] p-4 sm:p-5">
                            <div class="absolute top-3 right-3 w-7 h-7 sm:w-8 sm:h-8 rounded-[10px] sm:rounded-xl bg-[#FD4BC7]/10 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#FD4BC7]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p class="text-[10px] sm:text-xs font-bold text-[#FD4BC7]/60 uppercase tracking-widest mb-1 sm:mb-2">Status Gizi</p>
                            <input type="text"
                                   id="preview_status"
                                   readonly
                                   placeholder="—"
                                   class="w-full bg-transparent border-none outline-none text-lg sm:text-xl font-black text-[#FD4BC7] placeholder-[#FD4BC7]/30 p-0 leading-tight">
                        </div>
                    </div>
                </div>

                {{-- SUBMIT BUTTON --}}
                <div class="pt-2">
                    <button type="submit"
                            class="w-full h-12 sm:h-14 rounded-xl sm:rounded-2xl bg-gradient-to-r from-[#005BA9] to-[#0078C1] text-white text-sm sm:text-base font-black tracking-wide shadow-lg shadow-blue-200 flex items-center justify-center gap-2 sm:gap-3 transition-all duration-150 hover:-translate-y-0.5 hover:shadow-[0_12px_28px_rgba(0,91,169,0.35)] active:translate-y-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>

        {{-- FOOTER HINT --}}
        <p class="text-center text-[10px] sm:text-xs text-slate-400 mt-5 mb-6 sm:mb-8 px-4">
            Data akan disimpan secara otomatis dan dapat dilihat di riwayat perkembangan.
        </p>
    </div>

</div>

{{-- SCRIPT --}}
<script>

    async function previewGizi() {
        let tinggi = document.getElementById('tinggi').value;
        let berat  = document.getElementById('berat').value;
        let hint   = document.getElementById('preview-hint');

        if (!tinggi || !berat) {
            hint.textContent = 'Isi berat & tinggi untuk preview';
            document.getElementById('preview_zscore').value = '';
            document.getElementById('preview_status').value = '';
            return;
        }

        hint.textContent = 'Menghitung...';

        try {
            let response = await fetch("{{ route('kader.preview.gizi') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    anak_id: '{{ $anak->id }}',
                    tinggi_badan: tinggi,
                    berat_badan: berat,
                    tanggal_pengukuran: document.getElementById('tanggal').value
                })
            });

            let data = await response.json();

            const zscore = document.getElementById('preview_zscore');
            const status = document.getElementById('preview_status');

            zscore.value = data.z_score;
            status.value = data.status_gizi;

            // Pulse animation menggunakan Tailwind Utility yang baru didaftarkan
            [zscore, status].forEach(el => {
                el.classList.remove('animate-preview-pulse');
                void el.offsetWidth;
                el.classList.add('animate-preview-pulse');
            });

            hint.textContent = 'Hasil preview ditampilkan';
        } catch(e) {
            hint.textContent = 'Gagal menghitung, coba lagi';
        }
    }

    document.getElementById('tinggi').addEventListener('input', previewGizi);
    document.getElementById('berat').addEventListener('input', previewGizi);

    // Disable scroll on number inputs
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.non-scroll-number').forEach(function (input) {
            input.addEventListener('wheel', function (e) {
                e.preventDefault();
            }, { passive: false });
        });
    });

</script>

@endsection