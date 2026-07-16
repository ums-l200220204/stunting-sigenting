@extends('components.main')

@section('title', 'Edit Data Anak')

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

                        ✏️

                    </span>

                </div>

            </div>

            <h1 class="text-3xl font-black mt-4">

                Edit Data Anak

            </h1>

            <p class="text-sm text-white/90 mt-2">

                Perbarui informasi data anak dan orang tua

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

            <form action="{{ route('kader.update', $anak->id) }}"
                  method="POST"
                  class="space-y-8">

                @csrf
                @method('PUT')

                {{-- GRID --}}
                <div class="grid grid-cols-1
                            lg:grid-cols-2
                            gap-8">

                    {{-- LEFT --}}
                    <div class="space-y-6">

                        {{-- NIK Anak --}}
                        <div class="field-group">
                            <label class="block text-sm font-bold text-[#1E293B] mb-2">NIK Anak</label>
                            <input type="text" name="nik_anak" required value="{{ old('nik_anak', $anak->nik) }}" 
                                maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                class="w-full h-14 rounded-2xl border border-[#E5EDF6] bg-white px-5 shadow-sm focus:ring-2 focus:ring-blue-200">
                        </div>

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
                                value="{{ old('nama_anak', $anak->nama_anak) }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5">

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
                                       px-5">

                                <option value="L"
                                    {{ $anak->jenis_kelamin == 'L' ? 'selected' : '' }}>

                                    Laki-Laki

                                </option>

                                <option value="P"
                                    {{ $anak->jenis_kelamin == 'P' ? 'selected' : '' }}>

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
                                value="{{ old('tanggal_lahir', $anak->tanggal_lahir) }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5">

                        </div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="space-y-6">

                        {{-- NIK Orang Tua --}}
                        <div class="field-group">
                            <label class="block text-sm font-bold text-[#1E293B] mb-2">NIK Orang Tua</label>
                            <input type="text" name="nik" required value="{{ old('nik', $anak->nik_orangtua) }}" 
                                maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                class="w-full h-14 rounded-2xl border border-[#E5EDF6] bg-white px-5 shadow-sm focus:ring-2 focus:ring-blue-200">
                        </div>

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
                                value="{{ old('nama', $anak->nama) }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5">

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
                                value="{{ old('email', $anak->email) }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5">

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
                                value="{{ old('nomor_hp', $anak->nomor_hp) }}"
                                class="w-full h-14
                                       rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5">

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
                                class="w-full rounded-2xl
                                       border border-[#E5EDF6]
                                       bg-[#F8FBFF]
                                       px-5 py-4">{{ old('alamat', $anak->alamat) }}</textarea>

                        </div>

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

                        Update Data

                    </button>

                    <a href="{{ route('kader.dashboard') }}"
                        class="h-14 px-10
                               rounded-2xl
                               border border-[#E5EDF6]
                               bg-white
                               text-[#1E293B]
                               font-bold
                               flex items-center
                               justify-center">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection