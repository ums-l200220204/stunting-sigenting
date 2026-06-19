@extends('components.main')

@section('title', 'Tambah Rekomendasi Nutrisi')

@section('content')

<div class="w-full min-h-screen bg-gradient-to-br from-[#F0F7FF] via-[#F5F7FA] to-[#EFF6F2] space-y-8 pb-12">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 pt-2">
        <div>
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-[#0078C1] mb-2 bg-[#E0F0FF] px-3 py-1 rounded-full">Konten Baru</span>
            <h1 class="text-4xl font-black text-[#0D1B2E] leading-tight tracking-tight">Tambah <br><span class="text-[#0078C1]">Rekomendasi</span></h1>
            <p class="mt-2 text-sm text-gray-400 font-medium">Buat artikel edukasi atau resep nutrisi baru.</p>
        </div>

        <a href="{{ route('kader.rekomendasi') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-white border border-gray-200 text-[#0D1B2E] font-bold text-sm shadow-sm hover:shadow-md hover:border-[#C8DFF5] active:scale-95 transition-all duration-200">
            ← Kembali ke Daftar
        </a>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- FORM HEADER BAR --}}
        <div class="h-1.5 w-full bg-gradient-to-r from-[#0078C1] via-[#40A9FF] to-[#00C9A7]"></div>

        <form action="{{ route('kader.rekomendasi.store') }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-10 space-y-7">
            @csrf

            {{-- NOTIFIKASI ERROR GLOBAL --}}
            @if ($errors->any())
                <div class="p-5 bg-red-50 border border-red-200 rounded-2xl shadow-sm">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-red-500 text-lg">⚠️</span>
                        <h3 class="text-sm font-bold text-red-800">Gagal menyimpan rekomendasi. Silakan periksa kembali:</h3>
                    </div>
                    <ul class="list-disc list-inside text-xs text-red-600 space-y-1 ml-8 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- KATEGORI USIA --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Kategori Usia Sasaran <span class="text-red-400">*</span>
                </label>
                <select name="kategori_usia" required 
                    class="w-full px-5 py-3.5 rounded-2xl border @error('kategori_usia') border-red-400 ring-4 ring-red-400/10 @else border-gray-200 focus:border-[#0078C1] focus:ring-2 focus:ring-[#0078C1]/10 @enderror outline-none transition-all appearance-none bg-white text-[#0D1B2E] font-semibold text-sm cursor-pointer">
                    <option value="" disabled {{ old('kategori_usia') ? '' : 'selected' }}>— Pilih Kategori —</option>
                    <option value="0-6 Bulan" {{ old('kategori_usia') == '0-6 Bulan' ? 'selected' : '' }}>0 - 6 Bulan</option>
                    <option value="6-12 Bulan" {{ old('kategori_usia') == '6-12 Bulan' ? 'selected' : '' }}>6 - 12 Bulan</option>
                    <option value="1-3 Tahun" {{ old('kategori_usia') == '1-3 Tahun' ? 'selected' : '' }}>1 - 3 Tahun</option>
                    <option value="4-5 Tahun" {{ old('kategori_usia') == '4-5 Tahun' ? 'selected' : '' }}>4 - 5 Tahun</option>
                </select>
                @error('kategori_usia')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DIVIDER --}}
            <div class="border-t border-dashed border-gray-100"></div>

            {{-- JUDUL --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Judul Artikel / Rekomendasi <span class="text-red-400">*</span>
                </label>
                <input type="text" name="judul" value="{{ old('judul') }}" required 
                    placeholder="Contoh: Manfaat Protein Hewani untuk Mencegah Stunting" 
                    class="w-full px-5 py-3.5 rounded-2xl border @error('judul') border-red-400 ring-4 ring-red-400/10 @else border-gray-200 focus:border-[#0078C1] focus:ring-2 focus:ring-[#0078C1]/10 @enderror outline-none transition-all text-[#0D1B2E] font-semibold text-sm placeholder:font-normal placeholder:text-gray-300">
                @error('judul')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- UPLOAD GAMBAR --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Gambar Ilustrasi <span class="text-gray-300 normal-case font-normal">(Opsional)</span>
                </label>
                <div class="relative">
                    <input type="file" name="gambar" accept="image/*" 
                        class="w-full px-5 py-3 rounded-2xl border @error('gambar') border-red-400 ring-4 ring-red-400/10 @else border-gray-200 focus:border-[#0078C1] focus:ring-2 focus:ring-[#0078C1]/10 @enderror outline-none transition-all text-sm text-gray-400
                        file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#EEF5FD] file:text-[#0078C1] hover:file:bg-[#D8EAFB] file:transition-all">
                </div>
                <div class="flex justify-between items-start mt-1">
                    <p class="text-[11px] text-gray-300">Format: JPG, PNG, WebP. Maks 10MB.</p>
                    @error('gambar')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest">
                    Isi Lengkap / Deskripsi <span class="text-red-400">*</span>
                </label>
                <textarea name="deskripsi" required rows="8" 
                    placeholder="Tuliskan isi edukasi, bahan-bahan resep, atau panduan pembuatan di sini..." 
                    class="w-full px-5 py-4 rounded-2xl border @error('deskripsi') border-red-400 ring-4 ring-red-400/10 @else border-gray-200 focus:border-[#0078C1] focus:ring-2 focus:ring-[#0078C1]/10 @enderror outline-none transition-all resize-none text-[#0D1B2E] text-sm leading-relaxed placeholder:text-gray-300 font-medium">{{ old('deskripsi') }}</textarea>
                <div class="flex justify-between items-start mt-1">
                    <p class="text-[11px] text-gray-300">Gunakan paragraf yang jelas agar mudah dibaca orang tua.</p>
                    @error('deskripsi')
                        <p class="text-xs text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="pt-5 border-t border-gray-100 flex justify-end">
                <button type="submit" 
                    class="px-8 py-3.5 rounded-2xl bg-gradient-to-r from-[#0078C1] to-[#40A9FF] text-white font-bold text-sm shadow-lg shadow-[#0078C1]/25 hover:shadow-[#0078C1]/40 active:scale-95 transition-all duration-200 flex items-center gap-2">
                    <span>💾</span> Simpan dan Terbitkan
                </button>
            </div>

        </form>
    </div>

</div>

@endsection