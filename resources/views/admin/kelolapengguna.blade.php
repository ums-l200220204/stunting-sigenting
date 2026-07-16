{{-- resources/views/admin/kelolapengguna.blade.php --}}

@extends('components.main')

@section('title', 'Kelola Pengguna')

@section('content')

<div class="w-full min-h-screen bg-[#F4F7FB] px-4 sm:px-6 lg:px-8 py-8">

    {{-- ══════════════════════════════
         HEADER
    ══════════════════════════════ --}}
    <div class="flex items-start justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-800 tracking-tight"
                style="font-family:'Outfit',sans-serif">
                Kelola Pengguna
            </h1>
            <p class="text-slate-400 text-sm mt-1 font-medium">
                Kelola data pengguna berdasarkan role Admin, Kader, dan Orang Tua.
            </p>
        </div>

        {{-- Header icon --}}
        <div class="hidden sm:flex items-center justify-center w-14 h-14 lg:w-16 lg:h-16
                    rounded-2xl flex-shrink-0
                    bg-gradient-to-br from-[#005BA9] to-[#0ea5e9]
                    shadow-lg shadow-[#005BA9]/25">
            <svg class="w-7 h-7 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor"
                 stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4" stroke-width="1.75"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
            </svg>
        </div>

    </div>

    {{-- ══════════════════════════════
         SUCCESS ALERT
    ══════════════════════════════ --}}
    @if(session('success'))
        <div class="flex items-start gap-3 mb-6
                    bg-emerald-50 border border-emerald-200
                    rounded-2xl px-5 py-4">
            <div class="w-7 h-7 rounded-xl bg-emerald-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                     stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div>
                <p class="text-emerald-800 font-bold text-sm" style="font-family:'Outfit',sans-serif">
                    Berhasil!
                </p>
                <p class="text-emerald-700 text-sm mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════
         STAT CARDS
    ══════════════════════════════ --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

        {{-- Admin --}}
        <div class="group bg-white rounded-2xl p-5 border border-slate-100
                    shadow-sm hover:shadow-md hover:-translate-y-0.5
                    transition-all duration-300 relative overflow-hidden">
            <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-[#EEF4FF]
                        group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Admin</p>
                    <p class="text-3xl font-black text-[#1E3A8A]" style="font-family:'Outfit',sans-serif">
                        {{ $totalAdmin }}
                    </p>
                    <p class="text-[11px] text-slate-400 mt-1">Administrator sistem</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-[#EEF4FF] border border-[#1E3A8A]/10
                            flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#1E3A8A]" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kader --}}
        <div class="group bg-white rounded-2xl p-5 border border-slate-100
                    shadow-sm hover:shadow-md hover:-translate-y-0.5
                    transition-all duration-300 relative overflow-hidden">
            <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-[#EEF5FD]
                        group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Kader</p>
                    <p class="text-3xl font-black text-[#0078C1]" style="font-family:'Outfit',sans-serif">
                        {{ $totalKader }}
                    </p>
                    <p class="text-[11px] text-slate-400 mt-1">Kader posyandu aktif</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-[#EEF5FD] border border-[#0078C1]/10
                            flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#0078C1]" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5V4H2v16h5m10 0v-5a3 3 0 00-3-3H10a3 3 0 00-3 3v5m10 0H7m5-12a3 3 0 110 6 3 3 0 010-6z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Orang Tua --}}
        <div class="group bg-white rounded-2xl p-5 border border-slate-100
                    shadow-sm hover:shadow-md hover:-translate-y-0.5
                    transition-all duration-300 relative overflow-hidden">
            <div class="absolute -top-8 -right-8 w-24 h-24 rounded-full bg-[#ECFDF5]
                        group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2">Total Orang Tua</p>
                    <p class="text-3xl font-black text-[#10B981]" style="font-family:'Outfit',sans-serif">
                        {{ $totalOrangTua }}
                    </p>
                    <p class="text-[11px] text-slate-400 mt-1">Wali anak terdaftar</p>
                </div>
                <div class="w-11 h-11 rounded-xl bg-[#ECFDF5] border border-[#10B981]/10
                            flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#10B981]" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- ══════════════════════════════
         TABLE CARD
    ══════════════════════════════ --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        {{-- ── Toolbar ── --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 px-5 py-4 border-b border-slate-100">

            {{-- Kiri: Filter tabs --}}
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mr-1 hidden sm:block">
                    Filter:
                </span>

                <a href="{{ route('admin.pengguna', ['search' => request('search')]) }}"
                   class="inline-flex items-center h-7 px-3 rounded-lg text-xs font-bold transition-all duration-200
                          {{ !request('role')
                                ? 'bg-[#005BA9] text-white shadow-sm'
                                : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                    Semua
                </a>

                <a href="{{ route('admin.pengguna', ['role' => 'admin', 'search' => request('search')]) }}"
                   class="inline-flex items-center gap-1 h-7 px-3 rounded-lg text-xs font-bold transition-all duration-200
                          {{ request('role') == 'admin'
                                ? 'bg-[#1E3A8A] text-white shadow-sm'
                                : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full
                                 {{ request('role') == 'admin' ? 'bg-white' : 'bg-[#1E3A8A]' }}"></span>
                    Admin
                </a>

                <a href="{{ route('admin.pengguna', ['role' => 'kader', 'search' => request('search')]) }}"
                   class="inline-flex items-center gap-1 h-7 px-3 rounded-lg text-xs font-bold transition-all duration-200
                          {{ request('role') == 'kader'
                                ? 'bg-[#0078C1] text-white shadow-sm'
                                : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full
                                 {{ request('role') == 'kader' ? 'bg-white' : 'bg-[#0078C1]' }}"></span>
                    Kader
                </a>

                <a href="{{ route('admin.pengguna', ['role' => 'orang_tua', 'search' => request('search')]) }}"
                   class="inline-flex items-center gap-1 h-7 px-3 rounded-lg text-xs font-bold transition-all duration-200
                          {{ request('role') == 'orang_tua'
                                ? 'bg-[#10B981] text-white shadow-sm'
                                : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full
                                 {{ request('role') == 'orang_tua' ? 'bg-white' : 'bg-[#10B981]' }}"></span>
                    Orang Tua
                </a>
            </div>

            {{-- Kanan: Search + Tambah --}}
            <div class="flex items-center gap-2 flex-shrink-0">

                <form action="{{ route('admin.pengguna') }}" method="GET" class="relative">
                    @if(request('role'))
                        <input type="hidden" name="role" value="{{ request('role') }}">
                    @endif
                    <div class="absolute inset-y-0 left-2.5 flex items-center pointer-events-none">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Cari pengguna..."
                           class="w-48 lg:w-56 h-8 pl-8 pr-3 text-xs rounded-lg
                                  border border-slate-200 bg-slate-50
                                  focus:outline-none focus:ring-2 focus:ring-[#005BA9]/20
                                  focus:border-[#005BA9]/40 focus:bg-white
                                  placeholder-slate-400 transition-all duration-200">
                </form>

                <a href="{{ route('admin.pengguna.create') }}"
                   class="inline-flex items-center gap-1.5 h-8 px-3.5 rounded-lg text-xs font-bold
                          text-white bg-gradient-to-r from-[#005BA9] to-[#0078C1]
                          shadow-sm hover:shadow-md hover:-translate-y-0.5
                          transition-all duration-200 whitespace-nowrap flex-shrink-0">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span class="hidden sm:inline">Tambah Pengguna</span>
                    <span class="sm:hidden">Tambah</span>
                </a>

            </div>

        </div>
        {{-- ── End Toolbar ── --}}

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[680px]">

                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100">
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest w-10">#</th>
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama</th>
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">NIK</th>
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Role</th>
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email</th>
                        <th class="text-left py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Anak</th>
                        <th class="text-center py-3 px-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest w-20">Aksi</th>
                    </tr>
                </thead>

                <tbody id="tableBody">

                    @forelse($users as $index => $user)

                        <tr onclick="window.location='{{ route('admin.pengguna.detail', $user->id) }}'"
                            class="border-b border-slate-50 hover:bg-blue-50/40
                                   cursor-pointer transition-colors duration-150 group">

                            {{-- No --}}
                            <td class="py-3.5 px-4 text-xs font-medium text-slate-400">
                                {{ $users->firstItem() + $index }}
                            </td>

                            {{-- Nama --}}
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl flex-shrink-0 flex items-center justify-center
                                                text-xs font-black text-white
                                                {{ $user->role == 'admin'
                                                    ? 'bg-gradient-to-br from-[#1E3A8A] to-[#2d4faa]'
                                                    : ($user->role == 'kader'
                                                        ? 'bg-gradient-to-br from-[#005BA9] to-[#0078C1]'
                                                        : 'bg-gradient-to-br from-[#059669] to-[#10B981]')
                                                }}"
                                         style="font-family:'Outfit',sans-serif">
                                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                                    </div>
                                    <span class="font-bold text-slate-800 text-sm
                                                 group-hover:text-[#005BA9] transition-colors duration-150">
                                        {{ $user->nama }}
                                    </span>
                                </div>
                            </td>

                            <td class="py-3.5 px-4">
                                {{ $user->nik ?? '-' }}
                            </td>


                            {{-- Role badge --}}
                            <td class="py-3.5 px-4">
                                @if($user->role == 'admin')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                                 bg-[#EEF4FF] text-[#1E3A8A] text-[11px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#1E3A8A]"></span>
                                        Admin
                                    </span>
                                @elseif($user->role == 'kader')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                                 bg-[#EEF5FD] text-[#0078C1] text-[11px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0078C1]"></span>
                                        Kader
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg
                                                 bg-[#ECFDF5] text-[#10B981] text-[11px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></span>
                                        Orang Tua
                                    </span>
                                @endif
                            </td>

                            {{-- Email --}}
                            <td class="py-3.5 px-4 text-xs text-slate-500">
                                {{ $user->email }}
                            </td>

                            {{-- Anak --}}
                            <td class="py-3.5 px-4">
                                @if($user->role == 'orang_tua')
                                    <span class="text-xs font-semibold text-slate-700">
                                        {{ $user->nama_anak ?? '—' }}
                                    </span>
                                @else
                                    <span class="text-xs text-slate-300">—</span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="py-3.5 px-4">
                                <div class="flex items-center justify-center gap-1.5">

                                    <a href="{{ route('admin.pengguna.edit', $user->id) }}"
                                       onclick="event.stopPropagation()"
                                       title="Edit"
                                       class="w-8 h-8 rounded-lg border border-slate-200 bg-white
                                              flex items-center justify-center
                                              text-[#0078C1]
                                              hover:bg-[#EEF5FD] hover:border-[#0078C1]/30
                                              hover:shadow-sm transition-all duration-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.586-9.414a2 2 0 112.828 2.828L11.828 17H9v-2.828l8.414-8.586z"/>
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.pengguna.hapus', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="event.stopPropagation()"
                                                title="Hapus"
                                                class="w-8 h-8 rounded-lg border border-slate-200 bg-white
                                                       flex items-center justify-center
                                                       text-red-400
                                                       hover:bg-red-50 hover:border-red-200
                                                       hover:shadow-sm transition-all duration-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                 stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"/>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="py-20 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center">
                                        <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                                            <circle cx="9" cy="7" r="4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-400 text-sm" style="font-family:'Outfit',sans-serif">
                                            Tidak ada data pengguna
                                        </p>
                                        @if(request('search'))
                                            <p class="text-slate-300 text-xs mt-1">
                                                Pencarian untuk "<strong>{{ request('search') }}</strong>" tidak ditemukan.
                                            </p>
                                            <a href="{{ route('admin.pengguna', ['role' => request('role')]) }}"
                                               class="text-[#005BA9] text-xs font-semibold hover:underline mt-2 inline-block">
                                                Hapus Pencarian
                                            </a>
                                        @else
                                            <p class="text-slate-300 text-xs mt-1">Coba ubah filter atau tambah pengguna baru</p>
                                        @endif
                                    </div>
                                    @if(!request('search'))
                                        <a href="{{ route('admin.pengguna.create') }}"
                                           class="mt-1 inline-flex items-center gap-1.5 h-8 px-4 rounded-lg text-xs font-bold
                                                  text-white bg-gradient-to-r from-[#005BA9] to-[#0078C1]
                                                  hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                                            + Tambah Pengguna
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        {{-- Pagination footer --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between
                    gap-3 px-5 py-3.5 border-t border-slate-100 bg-slate-50/50">
            <p class="text-xs text-slate-400 font-medium">
                Menampilkan
                <span class="font-bold text-slate-600">{{ $users->firstItem() ?? 0 }}</span>
                –
                <span class="font-bold text-slate-600">{{ $users->lastItem() ?? 0 }}</span>
                dari
                <span class="font-bold text-slate-600">{{ $users->total() }}</span>
                pengguna
            </p>
            <div>
                {{ $users->withQueryString()->links() }}
            </div>
        </div>

    </div>

</div>

@endsection