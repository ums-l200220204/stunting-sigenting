<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F5F7FA] flex items-center justify-center px-4">

    {{-- BLUR --}}
    <div class="absolute top-[-60px] left-[-60px] w-[140px] h-[140px] bg-[#0078C1]/20 rounded-full blur-[70px] opacity-20"></div>
    <div class="absolute bottom-[-60px] right-[-60px] w-[140px] h-[140px] bg-[#FD4BC7]/20 rounded-full blur-[70px] opacity-20"></div>

    <div class="w-full max-w-md bg-white rounded-[24px] shadow-xl overflow-hidden z-10">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-[#005BA9] via-[#0078C1] to-[#FD4BC7] p-5 text-white text-center">
            <h1 class="text-2xl font-bold">Reset Password</h1>
            <p class="text-sm mt-1 text-white/90">Buat password baru untuk akun Anda</p>
        </div>

        <div class="p-6">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-600 rounded-xl p-3 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                {{-- WAJIB ADA: TOKEN DARI URL --}}
                <input type="hidden" name="token" value="{{ $token }}">

                {{-- EMAIL (Readonly agar user tau akun mana yang direset) --}}
                <div class="mb-4">
                    <label class="font-semibold text-sm">Email</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" readonly
                           class="w-full mt-2 border border-gray-300 bg-gray-50 text-gray-500 rounded-xl p-3 outline-none">
                </div>

                <div class="mb-4">
                    <label class="font-semibold text-sm">Password Baru</label>
                    <input type="password" name="password" required
                           class="w-full mt-2 border border-gray-300 rounded-xl p-3"
                           placeholder="Minimal 6 karakter">
                </div>

                <div>
                    <label class="font-semibold text-sm">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full mt-2 border border-gray-300 rounded-xl p-3"
                           placeholder="Ketik ulang password baru">
                </div>

                <button type="submit" class="w-full mt-6 bg-[#0078C1] hover:bg-[#005BA9] text-white font-bold rounded-xl py-3 transition duration-300">
                    Simpan Password Baru
                </button>

            </form>

        </div>
    </div>

</body>
</html>