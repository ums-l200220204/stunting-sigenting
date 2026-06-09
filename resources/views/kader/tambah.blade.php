@extends('components.main')

@section('title', 'Tambah Data Anak')

@section('content')

<div class="min-h-screen
            bg-[#F5F7FA]
            overflow-y-auto
            overflow-x-hidden
            px-4 py-6">

    {{-- BLUR --}}
    <div class="absolute top-[-60px] left-[-60px]
                w-[140px] h-[140px]
                bg-[#0078C1]/20 rounded-full
                blur-[70px] opacity-20">
    </div>

    <div class="absolute bottom-[-60px] right-[-60px]
                w-[140px] h-[140px]
                bg-[#FD4BC7]/20 rounded-full
                blur-[70px] opacity-20">
    </div>

    {{-- CARD --}}
    <div class="relative z-10
                w-full max-w-5xl mx-auto
                bg-white/90 backdrop-blur-xl
                rounded-[32px]
                overflow-hidden
                shadow-xl border border-white/30">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r
                    from-[#005BA9]
                    via-[#0078C1]
                    to-[#FD4BC7]
                    px-6 py-7 text-white text-center">

            <div class="flex justify-center">

                <div class="bg-white/20
                            w-16 h-16 rounded-full
                            flex items-center justify-center
                            shadow-lg">

                    <span class="text-4xl">

                        👶

                    </span>

                </div>

            </div>

            <h1 class="text-3xl font-black mt-4">

                Tambah Data Anak

            </h1>

            <p class="text-sm text-white/90 mt-2">

                Sistem Monitoring Tumbuh Kembang Anak SIGENTING

            </p>

        </div>

        {{-- FORM --}}
        <div class="p-6 md:p-8">

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="mb-8
                            rounded-3xl
                            border border-red-200
                            bg-red-50
                            px-6 py-5">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-12 h-12
                                    rounded-2xl
                                    bg-red-100
                                    flex items-center justify-center">

                            ⚠️

                        </div>

                        <div>

                            <h2 class="font-black text-red-500">

                                Validasi Gagal

                            </h2>

                            <p class="text-sm text-red-400 mt-1">

                                Harap periksa kembali input data.

                            </p>

                        </div>

                    </div>

                    <div class="space-y-3">

                        @foreach ($errors->all() as $error)

                            <div class="bg-white
                                        border border-red-100
                                        rounded-2xl
                                        px-4 py-3
                                        text-sm text-red-500">

                                • {{ $error }}

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

            <form action="{{ route('kader.store') }}"
                  method="POST"
                  class="space-y-8">

                @csrf

                {{-- GRID --}}
                <div class="grid grid-cols-1
                            lg:grid-cols-2
                            gap-8">

                    {{-- LEFT --}}
                    <div class="space-y-6">

                        {{-- NAMA ANAK --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Nama Anak

                            </label>

                            <input type="text"
                                name="nama_anak"
                                value="{{ old('nama_anak') }}"
                                placeholder="Masukkan nama anak"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20
                                       transition">

                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Jenis Kelamin

                            </label>

                            <select name="jenis_kelamin"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">

                                <option value="">
                                    Pilih Jenis Kelamin
                                </option>

                                <option value="L">
                                    Laki-Laki
                                </option>

                                <option value="P">
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Tanggal Lahir

                            </label>

                            <input type="date"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">

                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="space-y-6">

                        {{-- NAMA ORANG TUA --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Nama Orang Tua

                            </label>

                            <input type="text"
                                name="nama"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan nama orang tua"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">

                        </div>

                        {{-- EMAIL --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Email

                            </label>

                            <input type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">

                        </div>

                        {{-- NOMOR HP --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Nomor HP

                            </label>

                            <input type="text"
                                name="nomor_hp"
                                value="{{ old('nomor_hp') }}"
                                placeholder="Masukkan nomor HP"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">

                        </div>

                        {{-- ALAMAT --}}
                        <div>

                            <label class="block
                                          text-sm font-bold
                                          text-[#1E293B]
                                          mb-3">

                                Alamat

                            </label>

                            <textarea name="alamat"
                                rows="4"
                                placeholder="Masukkan alamat lengkap"
                                class="w-full rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 py-4 text-sm
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-[#0078C1]/20">{{ old('alamat') }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-bold text-[#1E293B] mb-3">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full h-14
                                rounded-2xl
                                border border-[#E5EDF6]
                                bg-[#F8FBFF]
                                px-5 pr-14 text-sm
                                focus:outline-none
                                focus:ring-2
                                focus:ring-[#0078C1]/20">
                        <button type="button"
                            onclick="togglePassword('password', 'eye-password')"
                            class="absolute right-4 top-1/2 -translate-y-1/2
                                text-gray-400 hover:text-[#0078C1]
                                transition duration-200">
                            <svg id="eye-password" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                    -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div>
                    <label class="block text-sm font-bold text-[#1E293B] mb-3">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Konfirmasi password"
                            class="w-full h-14
                                rounded-2xl
                                border border-[#E5EDF6]
                                bg-[#F8FBFF]
                                px-5 pr-14 text-sm
                                focus:outline-none
                                focus:ring-2
                                focus:ring-[#0078C1]/20">
                        <button type="button"
                            onclick="togglePassword('password_confirmation', 'eye-confirm')"
                            class="absolute right-4 top-1/2 -translate-y-1/2
                                text-gray-400 hover:text-[#0078C1]
                                transition duration-200">
                            <svg id="eye-confirm" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                    -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="flex flex-col sm:flex-row
                            justify-center
                            gap-4 pt-4">

                    <button type="submit"
                        class="h-14 px-10
                               rounded-2xl
                               bg-gradient-to-r
                               from-[#005BA9]
                               to-[#0078C1]
                               text-white
                               font-bold
                               shadow-lg
                               hover:scale-[1.01]
                               transition duration-300">

                        Simpan Data

                    </button>

                    <a href="{{ route('kader.dashboard') }}"
                        class="h-14 px-10
                               rounded-2xl
                               border border-[#E5EDF6]
                               bg-white
                               text-[#1E293B]
                               font-bold
                               flex items-center
                               justify-center
                               hover:bg-[#F8FBFF]
                               transition duration-300">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
@push('scripts')
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);

        const isHidden = input.type === 'password';
        input.type = isHidden ? 'text' : 'password';

        // Ganti icon: eye-off saat tampil, eye saat tersembunyi
        icon.innerHTML = isHidden
            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                     a9.97 9.97 0 012.049-3.414M6.53 6.53A9.97 9.97 0 0112 5
                     c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-1.357 2.647
                     M6.53 6.53L3 3m3.53 3.53l11.94 11.94M15 12a3 3 0 00-3-3
                     m0 6a3 3 0 01-2.83-2" />
               <line x1="3" y1="3" x2="21" y2="21"
                  stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" />`
            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                     -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
    }
</script>
@endpush
@endsection