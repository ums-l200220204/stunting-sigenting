@extends('components.main')

@section('title', 'Rekomendasi Nutrisi')

@section('content')

<div class="space-y-6 pb-12">

    {{-- ── HERO ── --}}
    <div class="relative overflow-hidden rounded-2xl px-8 py-10
                bg-gradient-to-br from-[#1A2F6B] via-[#1E3A8A] to-[#2563EB]">

        {{-- Accent bottom bar --}}
        <div class="absolute bottom-0 left-0 right-0 h-[5px]
                    bg-gradient-to-r from-blue-400 via-purple-500 to-[#FD4BC7]"></div>

        {{-- Decorative circles --}}
        <div class="absolute -top-14 -right-14 w-56 h-56 rounded-full bg-white/[0.04] pointer-events-none"></div>
        <div class="absolute -bottom-20 right-28 w-48 h-48 rounded-full bg-white/[0.03] pointer-events-none"></div>
        <div class="absolute top-5 right-48 w-16 h-16 rounded-full bg-white/[0.04] pointer-events-none"></div>

        <div class="relative z-10">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 mb-4
                        bg-white/[0.12] border border-white/20
                        px-3 py-1.5 rounded-full">
                <span class="w-2 h-2 rounded-full bg-[#FD4BC7] flex-shrink-0"></span>
                <span class="text-[11px] font-bold tracking-[0.10em] uppercase text-white/90">
                    Manajemen Konten
                </span>
            </div>

            <h1 class="text-3xl md:text-4xl font-black text-white leading-tight tracking-tight">
                Rekomendasi <span class="text-[#FD4BC7]">Nutrisi</span>
            </h1>
            <p class="mt-2.5 text-sm text-white/60 max-w-md leading-relaxed">
                Kelola artikel dan panduan gizi untuk orang tua pada sistem SIGENTING.
            </p>

        </div>
    </div>

    {{-- ── ALERT ── --}}
    @if(session('success'))
        <div class="flex items-center gap-3 px-4 py-3
                    bg-emerald-50 border border-emerald-300 rounded-xl">
            <div class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                        bg-gradient-to-br from-emerald-400 to-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
        </div>
    @endif

    {{-- ── TOOLBAR ── --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h2 class="text-lg font-extrabold text-slate-900 tracking-tight">Data Artikel</h2>
            <p class="text-xs text-slate-400 font-medium mt-0.5">
                Daftar seluruh rekomendasi nutrisi yang tersedia.
            </p>
        </div>

        <div class="flex flex-col gap-2.5 sm:flex-row sm:items-center">

            {{-- Search --}}
            <div class="relative w-full sm:w-64">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="search"
                       id="searchInput"
                       placeholder="Cari judul, kategori…"
                       autocomplete="off"
                       class="w-full pl-10 pr-4 py-2.5 text-sm text-slate-800 font-medium
                              bg-white border border-slate-200 rounded-xl shadow-sm
                              placeholder:text-slate-400 placeholder:font-normal
                              focus:outline-none focus:border-blue-500
                              focus:ring-4 focus:ring-blue-500/10
                              transition-all duration-200">
            </div>

            {{-- Add button --}}
            <a href="{{ route('kader.rekomendasi.create') }}"
               class="inline-flex items-center justify-center gap-2
                      px-5 py-2.5 rounded-xl text-sm font-bold text-white
                      bg-blue-700 hover:bg-blue-800
                      shadow-lg shadow-blue-700/30 hover:shadow-blue-700/40
                      active:scale-95 transition-all duration-150
                      whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 flex-shrink-0">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
                </svg>
                Tambah Rekomendasi
            </a>

        </div>
    </div>

    {{-- ── LIST ── --}}
    <div class="relative min-h-[200px]">

        {{-- Loading overlay --}}
        <div id="loadingIndicator"
             class="hidden absolute inset-0 z-10 flex items-center justify-center
                    bg-blue-50/80 backdrop-blur-sm rounded-2xl">
            <div class="w-9 h-9 rounded-full border-[3px] border-blue-200 border-t-blue-600
                        animate-spin"></div>
        </div>

        <div id="rekomendasiListWrapper" class="space-y-3">

            @forelse ($rekomendasi as $item)

                <div class="group flex flex-col sm:flex-row
                            bg-white border border-slate-100 rounded-2xl overflow-hidden
                            shadow-sm hover:shadow-lg hover:border-blue-200 hover:-translate-y-px
                            transition-all duration-300">

                    {{-- IMAGE --}}
                    <div class="relative flex-shrink-0 w-full h-40 sm:w-40 sm:h-auto
                                bg-gradient-to-br from-blue-50 to-blue-100 overflow-hidden">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->judul }}"
                                 loading="lazy"
                                 class="w-full h-full object-cover
                                        group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.2" stroke="#93C5FD" class="w-9 h-9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                                <span class="text-[9.5px] font-bold tracking-widest uppercase text-blue-300">
                                    No Image
                                </span>
                            </div>
                        @endif
                    </div>

                    {{-- BODY --}}
                    <div class="flex-1 min-w-0 flex flex-col justify-between px-5 py-4">
                        <div>
                            <span class="inline-flex items-center px-2.5 py-0.5 mb-2
                                         bg-blue-50 text-blue-700
                                         text-[10px] font-bold tracking-wider uppercase rounded-md">
                                {{ $item->kategori_usia }}
                            </span>
                            <h2 class="text-[15px] font-extrabold text-slate-900 leading-snug
                                       line-clamp-2 mb-1.5">
                                {{ $item->judul }}
                            </h2>
                            <p class="text-xs leading-relaxed text-slate-400 line-clamp-2">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                        <div class="flex items-center gap-1.5 mt-3 text-[11px] text-slate-400 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd"/>
                            </svg>
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </div>
                    </div>

                    {{-- ACTIONS --}}
                    <div class="flex flex-row sm:flex-col items-center justify-end sm:justify-center
                                gap-2 px-4 py-3 sm:py-4
                                border-t sm:border-t-0 sm:border-l border-slate-100
                                bg-slate-50/60 sm:min-w-[96px]">

                        <button onclick="openEditModal(this)"
                            data-id="{{ $item->id }}"
                            data-judul="{{ $item->judul }}"
                            data-kategori="{{ $item->kategori_usia }}"
                            data-deskripsi="{{ $item->deskripsi }}"
                            class="flex-1 sm:flex-none sm:w-full
                                   inline-flex items-center justify-center gap-1.5
                                   px-3 py-2 rounded-lg text-xs font-bold
                                   bg-amber-50 text-amber-700 border border-amber-200
                                   hover:bg-amber-500 hover:text-white hover:border-amber-500
                                   active:scale-95 transition-all duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
                                <path d="M2.695 14.763l-1.262 3.152a.5.5 0 00.65.65l3.152-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z"/>
                            </svg>
                        </button>

                        <form action="{{ route('kader.rekomendasi.destroy', $item->id) }}" method="POST"
                              class="flex-1 sm:flex-none sm:w-full"
                              onsubmit="return confirm('Hapus rekomendasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-1.5
                                       px-3 py-2 rounded-lg text-xs font-bold
                                       bg-red-50 text-red-600 border border-red-200
                                       hover:bg-red-500 hover:text-white hover:border-red-500
                                       active:scale-95 transition-all duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <div class="flex flex-col items-center justify-center
                            py-16 px-6 text-center
                            bg-white border-2 border-dashed border-blue-100 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1" stroke="#BFDBFE" class="w-16 h-16 mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                    <h3 class="text-sm font-black text-blue-200 uppercase tracking-widest">
                        Tidak Ditemukan
                    </h3>
                    <p class="text-xs text-slate-400 font-medium mt-1.5">
                        Data rekomendasi tidak tersedia atau tidak cocok dengan pencarian.
                    </p>
                </div>

            @endforelse

        </div>
    </div>

</div>

{{-- ══════════════════════════════
     MODAL EDIT
══════════════════════════════ --}}
<div id="modalEdit"
     class="fixed inset-0 z-50 hidden
            bg-slate-900/60 backdrop-blur-sm
            flex items-center justify-center p-4
            opacity-0 transition-opacity duration-250">

    <div class="bg-white w-full max-w-lg rounded-2xl overflow-hidden
                shadow-2xl shadow-slate-900/20
                transform scale-95 transition-transform duration-250
                max-h-[92vh] overflow-y-auto">

        {{-- Modal Header --}}
        <div class="sticky top-0 z-10 bg-white flex items-center justify-between
                    px-6 py-4 border-b border-slate-100">
            <div>
                <p class="text-[10px] font-bold tracking-[0.12em] uppercase text-blue-600 mb-0.5">
                    Formulir
                </p>
                <h2 class="text-[17px] font-black text-slate-900 tracking-tight">
                    Edit Rekomendasi
                </h2>
            </div>
            <button onclick="closeModal()"
                    class="w-8 h-8 flex items-center justify-center rounded-xl
                           bg-slate-100 text-slate-400
                           hover:bg-red-100 hover:text-red-500
                           transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                </svg>
            </button>
        </div>

        {{-- Modal Form --}}
        <form id="formEdit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="px-6 py-5 space-y-4">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-[10.5px] font-bold tracking-[0.09em]
                                      uppercase text-slate-400 mb-1.5">
                            Kategori Usia
                        </label>
                        <select name="kategori_usia" id="editKategori" required
                                class="w-full px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-800
                                       bg-slate-50 border border-slate-200
                                       focus:outline-none focus:border-blue-500
                                       focus:ring-4 focus:ring-blue-500/10
                                       transition-all duration-200">
                            <option value="0-6 Bulan">0 – 6 Bulan</option>
                            <option value="6-12 Bulan">6 – 12 Bulan</option>
                            <option value="1-3 Tahun">1 – 3 Tahun</option>
                            <option value="4-5 Tahun">4 – 5 Tahun</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10.5px] font-bold tracking-[0.09em]
                                      uppercase text-slate-400 mb-1.5">
                            Ganti Gambar
                            <span class="normal-case font-normal text-slate-300">(opsional)</span>
                        </label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full px-3 py-2 rounded-xl text-sm text-slate-500
                                      bg-slate-50 border border-slate-200
                                      file:mr-3 file:py-1 file:px-3
                                      file:rounded-lg file:border-0
                                      file:text-xs file:font-bold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100
                                      focus:outline-none focus:border-blue-500
                                      focus:ring-4 focus:ring-blue-500/10
                                      transition-all duration-200">
                        <p class="text-[10.5px] text-slate-400 mt-1.5">
                            *Kosongkan jika tidak ingin mengganti
                        </p>
                    </div>

                </div>

                <div>
                    <label class="block text-[10.5px] font-bold tracking-[0.09em]
                                  uppercase text-slate-400 mb-1.5">
                        Judul Artikel
                    </label>
                    <input type="text" name="judul" id="editJudul" required
                           placeholder="Masukkan judul..."
                           class="w-full px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-800
                                  bg-slate-50 border border-slate-200
                                  placeholder:text-slate-300 placeholder:font-normal
                                  focus:outline-none focus:border-blue-500
                                  focus:ring-4 focus:ring-blue-500/10
                                  transition-all duration-200">
                </div>

                <div>
                    <label class="block text-[10.5px] font-bold tracking-[0.09em]
                                  uppercase text-slate-400 mb-1.5">
                        Isi Rekomendasi
                    </label>
                    <textarea name="deskripsi" id="editDeskripsi" required rows="5"
                              placeholder="Tulis deskripsi rekomendasi..."
                              class="w-full px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-800
                                     bg-slate-50 border border-slate-200 resize-none
                                     placeholder:text-slate-300 placeholder:font-normal
                                     focus:outline-none focus:border-blue-500
                                     focus:ring-4 focus:ring-blue-500/10
                                     transition-all duration-200"></textarea>
                </div>

            </div>

            {{-- Modal Footer --}}
            <div class="flex items-center justify-end gap-2.5 px-6 pb-6 pt-2
                        border-t border-slate-100">
                <button type="button" onclick="closeModal()"
                        class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-500
                               bg-slate-100 hover:bg-slate-200 hover:text-slate-700
                               transition-colors duration-150">
                    Batal
                </button>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                               text-sm font-bold text-white
                               bg-gradient-to-r from-amber-500 to-amber-400
                               shadow-lg shadow-amber-400/30 hover:shadow-amber-400/40
                               hover:-translate-y-px active:scale-97
                               transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
// ── MODAL ──
const modal    = document.getElementById('modalEdit');
const modalBox = modal.querySelector('div');

function openModal() {
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
        modalBox.classList.remove('scale-95');
        modalBox.classList.add('scale-100');
    });
    document.body.style.overflow = 'hidden';
}
function closeModal() {
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    modalBox.classList.remove('scale-100');
    modalBox.classList.add('scale-95');
    document.body.style.overflow = '';
    setTimeout(() => modal.classList.add('hidden'), 260);
}

modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
});

function openEditModal(btn) {
    document.getElementById('formEdit').action    = `/kader/rekomendasi/${btn.dataset.id}`;
    document.getElementById('editJudul').value    = btn.dataset.judul;
    document.getElementById('editKategori').value = btn.dataset.kategori;
    document.getElementById('editDeskripsi').value = btn.dataset.deskripsi;
    openModal();
}

// ── AJAX SEARCH ──
let searchTimeout;
const searchInput      = document.getElementById('searchInput');
const listWrapper      = document.getElementById('rekomendasiListWrapper');
const loadingIndicator = document.getElementById('loadingIndicator');

if (searchInput) {
    searchInput.addEventListener('input', function () {
        clearTimeout(searchTimeout);
        loadingIndicator.classList.remove('hidden');
        searchTimeout = setTimeout(() => {
            fetch(`{{ route('kader.rekomendasi') }}?search=${encodeURIComponent(this.value)}`)
                .then(r => { if (!r.ok) throw new Error(); return r.text(); })
                .then(html => {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    const el  = doc.getElementById('rekomendasiListWrapper');
                    if (el) listWrapper.innerHTML = el.innerHTML;
                    loadingIndicator.classList.add('hidden');
                })
                .catch(() => loadingIndicator.classList.add('hidden'));
        }, 450);
    });
}
</script>

@endsection