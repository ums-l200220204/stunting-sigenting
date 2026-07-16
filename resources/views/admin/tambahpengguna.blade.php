@extends('components.main')

@section('title', 'Tambah Pengguna')

@section('content')

<div class="min-h-screen -m-6 p-4 sm:p-10 bg-[#F0F4F8]">

    {{-- PAGE TITLE --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl sm:text-4xl font-black text-slate-800 leading-tight">
                Tambah Pengguna
            </h1>
            <p class="mt-1 text-slate-400 text-xs sm:text-sm">
                Tambahkan data pengguna baru ke dalam sistem.
            </p>
        </div>
        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl
                    flex items-center justify-center flex-shrink-0 ml-3"
             style="background: linear-gradient(135deg, #005BA9, #0078C1);">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 sm:w-7 sm:h-7 text-white"
                 fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0
                         11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-100
                shadow-sm overflow-hidden">

        {{-- CARD HEADER --}}
        <div class="px-5 py-5 sm:px-10 sm:py-6"
             style="background: linear-gradient(135deg, #005BA9 0%, #0078C1 60%, #0EA5E9 100%);">
            <div class="flex items-center gap-3 sm:gap-4">

                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl
                            flex items-center justify-center flex-shrink-0
                            text-xl font-black text-white"
                     style="background: rgba(255,255,255,0.18);
                            border: 1.5px solid rgba(255,255,255,0.3);">
                    +
                </div>

                <div>
                    <p class="text-white font-black text-lg sm:text-2xl leading-snug">
                        Pengguna Baru
                    </p>
                    <p class="text-white/70 text-xs sm:text-sm mt-0.5">
                        Isi form di bawah untuk menambahkan pengguna
                    </p>
                </div>

            </div>
        </div>

        {{-- FORM BODY --}}
        <div class="px-4 py-6 sm:px-10 sm:py-10">

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="flex items-start gap-3 px-4 py-4 rounded-xl mb-6"
                     style="background:#FCEBEB; border: 0.5px solid #F09595;">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4 flex-shrink-0 mt-0.5"
                         style="color:#A32D2D;"
                         fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0
                                 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                    <div>
                        <p class="font-bold text-sm mb-1" style="color:#A32D2D;">
                            Terjadi Kesalahan
                        </p>
                        <ul class="space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li class="text-xs" style="color:#A32D2D;">
                                    • {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.pengguna.store') }}" method="POST">
                @csrf

                {{-- ── ROLE ── --}}
                <div class="mb-6">

                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="w-1 h-5 rounded-full flex-shrink-0"
                             style="background: linear-gradient(180deg, #005BA9, #0EA5E9);">
                        </div>
                        <h2 class="font-black text-slate-800 text-sm sm:text-base">
                            Role Pengguna
                        </h2>
                    </div>

                    <div>
                        <label class="block text-[10px] sm:text-[11px] font-bold
                                      uppercase tracking-widest text-slate-400 mb-1.5">
                            Pilih Role
                        </label>
                        <select id="roleSelect" name="role"
                                class="w-full sm:w-72 h-11 px-4 rounded-xl text-sm
                                       font-medium text-slate-700
                                       border border-slate-200 bg-slate-50
                                       focus:outline-none focus:border-blue-400
                                       focus:ring-2 focus:ring-blue-100
                                       transition-all duration-200">
                            <option value="">— Pilih Role —</option>
                            <option value="admin">Admin</option>
                            <option value="kader">Kader</option>
                            <option value="orang_tua">Orang Tua</option>
                        </select>
                    </div>

                </div>

                {{-- ── ADMIN / KADER FORM ── --}}
                <div id="adminKaderForm" class="contents hidden">
                    <div class="mb-6">

                        <div class="flex items-center gap-2.5 mb-4">
                            <div class="w-1 h-5 rounded-full flex-shrink-0"
                                 style="background: linear-gradient(180deg, #005BA9, #0EA5E9);">
                            </div>
                            <h2 id="adminKaderLabel"
                                class="font-black text-slate-800 text-sm sm:text-base">
                                Data Pengguna
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-1.5">
                                    NIK
                                </label>
                                <input type="text" name="nik" placeholder="Masukkan 16 digit NIK" 
                                    maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="w-full h-11 px-4 rounded-xl text-sm border border-slate-200 bg-slate-50 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Nama Lengkap
                                </label>
                                <input type="text" name="nama"
                                       placeholder="Masukkan nama lengkap"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Email
                                </label>
                                <input type="email" name="email"
                                       placeholder="Masukkan email"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Nomor HP
                                </label>
                                <input type="text" name="nomor_hp"
                                       placeholder="Masukkan nomor HP"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Alamat
                                </label>
                                <textarea name="alamat" rows="3"
                                          placeholder="Masukkan alamat lengkap"
                                          disabled
                                          class="w-full px-4 py-3 rounded-xl text-sm
                                                 text-slate-700 border border-slate-200
                                                 bg-slate-50 focus:outline-none
                                                 focus:border-blue-400
                                                 focus:ring-2 focus:ring-blue-100
                                                 transition-all duration-200
                                                 resize-none"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ── ORANG TUA FORM ── --}}
                <div id="orangTuaForm" class="contents hidden">
                    <div class="mb-6">

                        <div class="flex items-center gap-2.5 mb-4">
                            <div class="w-1 h-5 rounded-full flex-shrink-0"
                                 style="background: linear-gradient(180deg, #005BA9, #0EA5E9);">
                            </div>
                            <h2 class="font-black text-slate-800 text-sm sm:text-base">
                                Data Orang Tua &amp; Anak
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-1.5">NIK Anak</label>
                                <input type="text" name="nik_anak" placeholder="16 digit NIK Anak" maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full h-11 px-4 rounded-xl text-sm border border-slate-200 bg-slate-50">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-1.5">NIK Orang Tua</label>
                                <input type="text" name="nik" placeholder="16 digit NIK" maxlength="16" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full h-11 px-4 rounded-xl text-sm border border-slate-200 bg-slate-50">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Nama Anak
                                </label>
                                <input type="text" name="nama_anak"
                                       placeholder="Masukkan nama anak"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Nama Orang Tua
                                </label>
                                <input type="text" name="nama"
                                       placeholder="Masukkan nama orang tua"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Jenis Kelamin
                                </label>
                                <select name="jenis_kelamin" disabled
                                        class="w-full h-11 px-4 rounded-xl text-sm
                                               font-medium text-slate-700
                                               border border-slate-200 bg-slate-50
                                               focus:outline-none focus:border-blue-400
                                               focus:ring-2 focus:ring-blue-100
                                               transition-all duration-200">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Email
                                </label>
                                <input type="email" name="email"
                                       placeholder="Masukkan email"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Tanggal Lahir Anak
                                </label>
                                <input type="date" name="tanggal_lahir"
                                       max="{{ date('Y-m-d') }}"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div>
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Nomor HP
                                </label>
                                <input type="text" name="nomor_hp"
                                       placeholder="Masukkan nomor HP"
                                       disabled
                                       class="w-full h-11 px-4 rounded-xl text-sm
                                              text-slate-700 border border-slate-200
                                              bg-slate-50 focus:outline-none
                                              focus:border-blue-400
                                              focus:ring-2 focus:ring-blue-100
                                              transition-all duration-200">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-[10px] sm:text-[11px] font-bold
                                              uppercase tracking-widest text-slate-400 mb-1.5">
                                    Alamat
                                </label>
                                <textarea name="alamat" rows="3"
                                          placeholder="Masukkan alamat lengkap"
                                          disabled
                                          class="w-full px-4 py-3 rounded-xl text-sm
                                                 text-slate-700 border border-slate-200
                                                 bg-slate-50 focus:outline-none
                                                 focus:border-blue-400
                                                 focus:ring-2 focus:ring-blue-100
                                                 transition-all duration-200
                                                 resize-none"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ── PASSWORD ── --}}
                <div id="passwordSection" class="hidden">

                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="w-1 h-5 rounded-full flex-shrink-0"
                             style="background: linear-gradient(180deg, #005BA9, #0EA5E9);">
                        </div>
                        <h2 class="font-black text-slate-800 text-sm sm:text-base">
                            Keamanan Akun
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-[10px] sm:text-[11px] font-bold
                                          uppercase tracking-widest text-slate-400 mb-1.5">
                                Password
                            </label>
                            <input type="password" name="password"
                                   placeholder="Masukkan password"
                                   disabled
                                   class="w-full h-11 px-4 rounded-xl text-sm
                                          text-slate-700 border border-slate-200
                                          bg-slate-50 focus:outline-none
                                          focus:border-blue-400
                                          focus:ring-2 focus:ring-blue-100
                                          transition-all duration-200">
                        </div>

                        <div>
                            <label class="block text-[10px] sm:text-[11px] font-bold
                                          uppercase tracking-widest text-slate-400 mb-1.5">
                                Konfirmasi Password
                            </label>
                            <input type="password" name="password_confirmation"
                                   placeholder="Ulangi password"
                                   disabled
                                   class="w-full h-11 px-4 rounded-xl text-sm
                                          text-slate-700 border border-slate-200
                                          bg-slate-50 focus:outline-none
                                          focus:border-blue-400
                                          focus:ring-2 focus:ring-blue-100
                                          transition-all duration-200">
                        </div>

                    </div>

                </div>

                {{-- BUTTONS --}}
                <div class="flex flex-col sm:flex-row gap-3
                            border-t border-slate-100 mt-6 pt-6">

                    <button type="submit"
                            class="w-full sm:w-auto sm:px-8 h-11 rounded-xl
                                   text-white text-sm font-bold
                                   hover:opacity-90 transition-all duration-200"
                            style="background: linear-gradient(135deg, #005BA9, #0078C1);
                                   box-shadow: 0 4px 12px rgba(0,91,169,0.25);">
                        Simpan Pengguna
                    </button>

                    <a href="{{ route('admin.pengguna') }}"
                       class="w-full sm:w-auto sm:px-8 h-11 rounded-xl
                              text-sm font-bold text-slate-500
                              flex items-center justify-center
                              border border-slate-200 bg-white
                              hover:bg-slate-50 transition-all duration-200">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- SCRIPT --}}
<script>
    const roleSelect      = document.getElementById('roleSelect');
    const adminKaderForm  = document.getElementById('adminKaderForm');
    const adminKaderLabel = document.getElementById('adminKaderLabel');
    const orangTuaForm    = document.getElementById('orangTuaForm');
    const passwordSection = document.getElementById('passwordSection');

    function toggleInputs(container, disabled) {
        container.querySelectorAll('input, select, textarea')
                 .forEach(el => el.disabled = disabled);
    }

    toggleInputs(adminKaderForm,  true);
    toggleInputs(orangTuaForm,    true);
    toggleInputs(passwordSection, true);

    roleSelect.addEventListener('change', function () {
        const role = this.value;

        adminKaderForm.classList.add('hidden');
        orangTuaForm.classList.add('hidden');
        passwordSection.classList.add('hidden');

        toggleInputs(adminKaderForm,  true);
        toggleInputs(orangTuaForm,    true);
        toggleInputs(passwordSection, true);

        if (role === 'admin' || role === 'kader') {
            adminKaderLabel.textContent =
                role === 'admin' ? 'Data Admin' : 'Data Kader';
            adminKaderForm.classList.remove('hidden');
            passwordSection.classList.remove('hidden');
            toggleInputs(adminKaderForm,  false);
            toggleInputs(passwordSection, false);
        }

        if (role === 'orang_tua') {
            orangTuaForm.classList.remove('hidden');
            passwordSection.classList.remove('hidden');
            toggleInputs(orangTuaForm,    false);
            toggleInputs(passwordSection, false);
        }
    });
</script>

@endsection