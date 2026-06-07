@extends('components.main')

@section('title', 'Dashboard Kader')

@section('content')

<div class="min-h-screen -m-6 p-6 sm:p-10" style="background: #f0f4f8;">

    {{-- HERO HEADER --}}
    <div class="rounded-2xl sm:rounded-3xl overflow-hidden mb-6"
         style="background: linear-gradient(135deg, #0D2B6B 0%, #1A4A9A 50%, #0D2B6B 100%);">

        <div class="px-7 py-8 sm:px-12 sm:py-10">

            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full
                        border border-white/20 bg-white/10">
                <span class="w-2 h-2 rounded-full bg-pink-400"></span>
                <span class="text-white/80 text-xs font-semibold tracking-widest uppercase">
                    Dashboard Kader
                </span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-black text-white leading-tight">
                Selamat Datang,
                <span style="color: #F472B6;">Kader</span>
            </h1>
            <p class="mt-3 text-white/60 text-sm sm:text-base leading-relaxed max-w-md">
                Kelola dan pantau seluruh data anak pada sistem SIGENTING.
            </p>

        </div>

        <div class="h-1"
             style="background: linear-gradient(90deg, #3B82F6, #F472B6, #8B5CF6);">
        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

        {{-- TOTAL ANAK --}}
        <div class="bg-white rounded-2xl px-6 py-6 border border-slate-100 shadow-sm
                    flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center
                        flex-shrink-0 text-2xl shadow-md"
                 style="background: linear-gradient(135deg, #0D2B6B, #1A4A9A);">
                👶
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">
                    Total Anak
                </p>
                <p class="text-4xl font-black text-slate-800 leading-none">
                    {{ $totalAnak }}
                </p>
            </div>
        </div>

        {{-- LAKI-LAKI --}}
        <div class="bg-white rounded-2xl px-6 py-6 border border-slate-100 shadow-sm
                    flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center
                        flex-shrink-0 text-2xl shadow-md"
                 style="background: linear-gradient(135deg, #005BA9, #0EA5E9);">
                👦
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">
                    Anak Laki-Laki
                </p>
                <p class="text-4xl font-black text-slate-800 leading-none">
                    {{ $totalLaki }}
                </p>
            </div>
        </div>

        {{-- PEREMPUAN --}}
        <div class="bg-white rounded-2xl px-6 py-6 border border-slate-100 shadow-sm
                    flex items-center gap-5">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center
                        flex-shrink-0 text-2xl shadow-md"
                 style="background: linear-gradient(135deg, #FD4BC7, #e0289e);">
                👧
            </div>
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">
                    Anak Perempuan
                </p>
                <p class="text-4xl font-black text-slate-800 leading-none">
                    {{ $totalPerempuan }}
                </p>
            </div>
        </div>

    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="flex items-center gap-3 px-5 py-4 rounded-2xl mb-6 text-sm font-medium"
             style="background: #EAF3DE; color: #3B6D11; border: 0.5px solid #97C459;">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-100
                shadow-sm overflow-hidden">

        {{-- TOP BAR --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between
                    gap-4 px-6 py-5 sm:px-8 sm:py-6"
             style="border-bottom: 1px solid #f1f5f9;">

            <div>
                <h2 class="text-xl sm:text-2xl font-black text-slate-800">
                    Data Anak
                </h2>
                <p class="mt-1 text-sm text-slate-400">
                    Daftar seluruh data anak yang terdaftar pada sistem.
                </p>
            </div>

            {{-- SEARCH --}}
            <div class="relative w-full sm:w-auto">
                <span class="absolute left-4 top-1/2 -translate-y-1/2
                             text-slate-400 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </span>
                <input type="text"
                       id="searchInput"
                       placeholder="Cari nama, orang tua, email..."
                       class="w-full sm:w-72 h-11 pl-10 pr-4 rounded-xl text-sm
                              border border-slate-200 bg-slate-50
                              focus:outline-none focus:border-blue-400
                              focus:ring-2 focus:ring-blue-100
                              transition-all duration-200">
            </div>

        </div>

        {{-- TABLE — desktop only --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr style="background: #F8FAFF;">
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">#</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">Nama Anak</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">Orang Tua</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">JK</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">Usia</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">Tanggal Lahir</th>
                        <th class="px-8 py-4 text-left text-xs font-bold
                                   uppercase tracking-wider text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($anak as $item)
                        @php
                            $jk     = strtolower($item->jenis_kelamin);
                            $isLaki = in_array($jk, ['laki-laki','l','lakilaki']);
                            $umurBulan = \Carbon\Carbon::parse($item->tanggal_lahir)
                                            ->diffInMonths(now());
                            $tahun  = floor($umurBulan / 12);
                            $bulan  = $umurBulan % 12;
                        @endphp
                        <tr onclick="window.location='{{ route('kader.detailanak', $item->id) }}'"
                            class="border-t border-slate-50 hover:bg-blue-50/40
                                   cursor-pointer transition-colors duration-150">

                            <td class="px-8 py-5 text-sm text-slate-400">
                                {{ ($anak->currentPage() - 1) * $anak->perPage() + $loop->iteration }}
                            </td>

                            <td class="px-8 py-5">
                                <span class="font-bold text-slate-800 text-sm">
                                    {{ $item->nama_anak }}
                                </span>
                            </td>

                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-700 text-sm">
                                    {{ $item->nama_orangtua }}
                                </p>
                                <p class="text-xs text-slate-400 mt-0.5">
                                    {{ $item->email }}
                                </p>
                            </td>

                            <td class="px-8 py-5">
                                @if($isLaki)
                                    <span class="px-3 py-1 rounded-lg text-xs font-bold"
                                          style="background:#EEF4FF; color:#1A4A9A;">
                                        Laki-laki
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-lg text-xs font-bold"
                                          style="background:#FFF0FA; color:#FD4BC7;">
                                        Perempuan
                                    </span>
                                @endif
                            </td>

                            <td class="px-8 py-5 text-sm font-semibold text-slate-700">
                                @if($tahun > 0)
                                    {{ $tahun }} Tahun {{ $bulan > 0 ? ' '.$bulan.' Bulan' : '' }}
                                @else
                                    {{ $bulan }} Bulan
                                @endif
                            </td>

                            <td class="px-8 py-5 text-sm text-slate-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d M Y') }}
                            </td>

                            <td class="px-8 py-5">
                                <a href="{{ route('kader.edit', $item->id) }}"
                                   onclick="event.stopPropagation()"
                                   class="inline-flex items-center justify-center
                                          w-9 h-9 rounded-xl transition-colors duration-150"
                                   style="background:#FFF0FA; color:#FD4BC7;"
                                   onmouseover="this.style.background='#FFD8F1'"
                                   onmouseout="this.style.background='#FFF0FA'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                         fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0
                                                 002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L11.828
                                                 17H9v-2.828l8.414-8.586z"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-20 text-center">
                                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl
                                            flex items-center justify-center text-3xl"
                                     style="background:#EEF4FF;">
                                    👶
                                </div>
                                <p class="font-bold text-slate-700">Data Tidak Ditemukan</p>
                                <p class="text-sm text-slate-400 mt-1">
                                    Belum ada data anak yang tersedia.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- CARD LIST — mobile only --}}
        <div class="sm:hidden divide-y divide-slate-100" id="mobileList">
            @forelse($anak as $item)
                @php
                    $jk     = strtolower($item->jenis_kelamin);
                    $isLaki = in_array($jk, ['laki-laki','l','lakilaki']);
                    $umurBulan = \Carbon\Carbon::parse($item->tanggal_lahir)
                                    ->diffInMonths(now());
                    $tahun  = floor($umurBulan / 12);
                    $bulan  = $umurBulan % 12;
                @endphp

                <div class="flex items-center gap-3 px-4 py-4
                            hover:bg-blue-50/40 transition-colors duration-150">

                    {{-- Avatar --}}
                    <a href="{{ route('kader.detailanak', $item->id) }}"
                       class="w-11 h-11 rounded-xl flex items-center justify-center
                              flex-shrink-0 text-xl"
                       style="{{ $isLaki ? 'background:#EEF4FF;' : 'background:#FFF0FA;' }}">
                        {{ $isLaki ? '👦' : '👧' }}
                    </a>

                    {{-- Info --}}
                    <a href="{{ route('kader.detailanak', $item->id) }}"
                       class="flex-1 min-w-0">
                        <p class="font-bold text-slate-800 text-sm truncate leading-snug">
                            {{ $item->nama_anak }}
                        </p>
                        <p class="text-xs text-slate-400 truncate mt-0.5">
                            {{ $item->nama_orangtua }} ·
                            @if($tahun > 0)
                                {{ $tahun }} Th{{ $bulan > 0 ? ' '.$bulan.' Bl' : '' }}
                            @else
                                {{ $bulan }} Bulan
                            @endif
                        </p>
                    </a>

                    {{-- Badge JK --}}
                    <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold flex-shrink-0"
                          style="{{ $isLaki
                              ? 'background:#EEF4FF;color:#1A4A9A;'
                              : 'background:#FFF0FA;color:#FD4BC7;' }}">
                        {{ $isLaki ? 'L' : 'P' }}
                    </span>

                    {{-- Tombol Edit --}}
                    <a href="{{ route('kader.edit', $item->id) }}"
                       class="w-9 h-9 rounded-xl flex items-center justify-center
                              flex-shrink-0 transition-colors duration-150"
                       style="background:#FFF0FA; color:#FD4BC7;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                             fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0
                                     002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L11.828
                                     17H9v-2.828l8.414-8.586z"/>
                        </svg>
                    </a>

                </div>

            @empty
                <div class="py-16 text-center px-6">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-2xl
                                flex items-center justify-center text-2xl"
                         style="background:#EEF4FF;">👶</div>
                    <p class="font-bold text-slate-700 text-sm">Data Tidak Ditemukan</p>
                    <p class="text-xs text-slate-400 mt-1">
                        Belum ada data anak yang tersedia.
                    </p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div id="paginationWrapper"
             class="px-6 py-5 sm:px-8"
             style="border-top: 1px solid #f1f5f9;">
            {{ $anak->links() }}
        </div>

    </div>

</div>

{{-- SEARCH + AJAX PAGINATION --}}
<script>
    const searchInput       = document.getElementById('searchInput');
    const tableBody         = document.getElementById('tableBody');
    const mobileList        = document.getElementById('mobileList');
    const paginationWrapper = document.getElementById('paginationWrapper');
    let timeout = null;

    function showLoading() {
        if (tableBody) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="py-16 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-10 h-10 border-4 border-t-transparent
                                        rounded-full animate-spin"
                                 style="border-color:#1A4A9A;
                                        border-top-color:transparent;">
                            </div>
                            <span class="text-sm text-slate-400">Memuat data...</span>
                        </div>
                    </td>
                </tr>`;
        }
        if (mobileList) {
            mobileList.innerHTML = `
                <div class="py-16 flex flex-col items-center gap-3 text-center">
                    <div class="w-10 h-10 border-4 border-t-transparent
                                rounded-full animate-spin"
                         style="border-color:#1A4A9A;
                                border-top-color:transparent;">
                    </div>
                    <span class="text-sm text-slate-400">Memuat data...</span>
                </div>`;
        }
    }

    function loadData(url) {
        showLoading();
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(r => r.text())
            .then(data => {
                const parser  = new DOMParser();
                const htmlDoc = parser.parseFromString(data, 'text/html');

                const newTbody = htmlDoc.querySelector('#tableBody');
                if (newTbody && tableBody)
                    tableBody.innerHTML = newTbody.innerHTML;

                const newMobile = htmlDoc.querySelector('#mobileList');
                if (newMobile && mobileList)
                    mobileList.innerHTML = newMobile.innerHTML;

                const newPag = htmlDoc.querySelector('#paginationWrapper');
                if (newPag)
                    paginationWrapper.innerHTML = newPag.innerHTML;

                bindPaginationLinks();
            })
            .catch(console.error);
    }

    searchInput.addEventListener('keyup', function () {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            loadData(`{{ route('kader.dashboard') }}?search=${this.value}`);
        }, 300);
    });

    function bindPaginationLinks() {
        paginationWrapper.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                loadData(link.href);
            });
        });
    }

    bindPaginationLinks();
</script>

@endsection