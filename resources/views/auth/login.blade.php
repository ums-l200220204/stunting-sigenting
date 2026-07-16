<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIGENTING</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.15;
            animation: float 9s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }
        .blob-1 { width: 400px; height: 400px; background: #0078C1;
                  top: -120px; left: -120px; animation-delay: 0s; }
        .blob-2 { width: 300px; height: 300px; background: #FD4BC7;
                  bottom: -80px; right: -80px; animation-delay: -4.5s; }
        .blob-3 { width: 200px; height: 200px; background: #7C4DFF;
                  top: 40%; right: 8%; animation-delay: -2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-22px) scale(1.04); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card-animate { animation: slideUp 0.55s cubic-bezier(0.22,1,0.36,1) both; }

        input:focus {
            outline: none;
            border-color: #0078C1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,120,193,0.12);
        }

        /* Class untuk Input yang Error */
        input.input-error {
            border-color: #F09595 !important;
            background: #FCEBEB !important;
            box-shadow: 0 0 0 3px rgba(163,45,45,0.12) !important;
        }
        input.input-error:focus {
            border-color: #A32D2D !important;
            box-shadow: 0 0 0 3px rgba(163,45,45,0.2) !important;
        }

        input::placeholder { color: #b0b8c4; font-weight: 400; }

        .btn-login {
            transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(0,120,193,0.35);
        }
        .btn-login:hover {
            opacity: 0.92;
            box-shadow: 0 6px 22px rgba(0,120,193,0.45);
        }
        .btn-login:active { transform: scale(0.985); }

        .eye-btn { transition: color 0.15s; }
        .eye-btn:hover { color: #0078C1; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 py-10 overflow-x-hidden"
      style="background: #EEF3FA;">

    {{-- Blobs --}}
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    {{-- CARD --}}
    <div class="card-animate relative z-10 w-full max-w-[420px] rounded-3xl overflow-hidden"
         style="background: rgba(255,255,255,0.93);
                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);
                box-shadow: 0 0 0 1px rgba(0,120,193,0.08),
                            0 24px 64px rgba(0,91,169,0.13),
                            0 4px 16px rgba(0,0,0,0.05);">

        {{-- ── HEADER ── --}}
        <div class="relative overflow-hidden px-8 pt-8 pb-7 text-center"
             style="background: linear-gradient(135deg, #0D2B6B 0%, #005BA9 55%, #FD4BC7 100%);">
            
            <div class="absolute -top-12 -left-12 w-36 h-36 rounded-full"
                 style="background: rgba(255,255,255,0.07);"></div>
            <div class="absolute -bottom-10 -right-10 w-28 h-28 rounded-full"
                 style="background: rgba(255,255,255,0.05);"></div>
            <div class="absolute top-4 right-16 w-8 h-8 rounded-full"
                 style="background: rgba(253,75,199,0.3);"></div>

            <div class="relative z-10 w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                 style="background: rgba(255,255,255,0.16); border: 1.5px solid rgba(255,255,255,0.35); box-shadow: 0 4px 16px rgba(0,0,0,0.15);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>

            <h1 class="relative z-10 text-white font-black text-2xl tracking-widest">
                SIGENTING
            </h1>
            <p class="relative z-10 mt-1.5 text-white/75 text-xs tracking-wide">
                Sistem Generasi Anti Stunting
            </p>

            <div class="absolute bottom-0 left-0 right-0 h-px"
                 style="background: linear-gradient(90deg, #3B82F6, #F472B6, #8B5CF6);">
            </div>
        </div>

        {{-- ── BODY ── --}}
        <div class="px-7 py-7 sm:px-8">

            <div class="text-center mb-6">
                <h2 class="text-lg font-bold text-slate-800">Selamat datang kembali 👋</h2>
                <p class="mt-1 text-sm text-slate-400">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            {{-- Alert Sukses --}}
            @if(session('success'))
                <div class="flex items-start gap-2.5 px-4 py-3 rounded-xl mb-5 text-sm font-medium"
                     style="background: #EAF3DE; color: #3B6D11; border: 0.5px solid #97C459;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert Error Global & Validasi Kosong --}}
            @if(session('error') || $errors->any())
                <div class="flex items-start gap-2.5 px-4 py-3 rounded-xl mb-5 text-sm font-medium"
                     style="background: #FCEBEB; color: #A32D2D; border: 0.5px solid #F09595;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                    <div>
                        @if(session('error'))
                            {{ session('error') }}
                        @else
                            Terdapat kesalahan pada input Anda. Silakan periksa lagi.
                        @endif
                    </div>
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-4">
                @csrf

                {{-- NIK --}}
                <div>
                    <label for="nik"
                           class="block text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2 
                                  @error('nik') text-[#A32D2D] @enderror">
                        NIK ANAK
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none 
                                     @error('nik') text-[#A32D2D] @else text-slate-400 @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                        </span>
                        
                        {{-- Class "input-error" akan aktif jika ada error pada 'nik' --}}
                        <input type="text"
                               id="nik"
                               name="nik"
                               placeholder="Masukkan 16 digit NIK Anak Anda"
                               value="{{ old('nik') }}"
                               autocomplete="off"
                               maxlength="16"
                               inputmode="numeric"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                               class="w-full h-12 pl-10 pr-4 rounded-xl text-sm text-slate-800 border transition-all duration-200 
                                      @error('nik') input-error @else border-slate-200 bg-slate-50 @enderror"
                               style="font-family: 'Plus Jakarta Sans', sans-serif;">
                    </div>
                    
                    {{-- Pesan error jika form nik kosong atau salah --}}
                    @error('nik')
                        <p class="text-[#A32D2D] text-[11px] mt-1.5 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password"
                           class="block text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2
                                  @error('password') text-[#A32D2D] @enderror">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none 
                                     @error('password') text-[#A32D2D] @else text-slate-400 @enderror">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                        </span>
                        
                        {{-- Class "input-error" akan aktif jika ada error pada 'password' --}}
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="Masukkan password"
                               autocomplete="current-password"
                               class="w-full h-12 pl-10 pr-11 rounded-xl text-sm text-slate-800 border transition-all duration-200
                                      @error('password') input-error @else border-slate-200 bg-slate-50 @enderror"
                               style="font-family: 'Plus Jakarta Sans', sans-serif;">
                               
                        <button type="button"
                                class="eye-btn absolute right-3.5 top-1/2 -translate-y-1/2 p-0.5
                                       @error('password') text-[#A32D2D] @else text-slate-400 @enderror"
                                onclick="togglePassword('password', this)"
                                aria-label="Tampilkan password">
                            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" style="display:none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/>
                            </svg>
                        </button>
                    </div>
                    
                    {{-- Pesan error jika form password kosong atau salah --}}
                    @error('password')
                        <p class="text-[#A32D2D] text-[11px] mt-1.5 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Lupa password --}}
                <div class="text-right -mt-1">
                    <a href="{{ route('password.request') }}"
                       class="text-xs font-semibold transition-colors duration-150"
                       style="color: #0078C1;">
                        Lupa Password?
                    </a>
                </div>

                {{-- Tombol Masuk --}}
                <button type="submit"
                        class="btn-login w-full h-12 rounded-xl text-white text-sm font-bold tracking-wide border-0 cursor-pointer mt-1"
                        style="background: linear-gradient(135deg, #0D2B6B, #0078C1); font-family: 'Plus Jakarta Sans', sans-serif;">
                    Masuk
                </button>

            </form>

            {{-- Divider --}}
            <div class="flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-slate-100"></div>
                <span class="text-xs text-slate-300 font-medium">atau</span>
                <div class="flex-1 h-px bg-slate-100"></div>
            </div>

            {{-- Register --}}
            <p class="text-center text-sm text-slate-400">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-bold transition-colors duration-150" style="color: #FD4BC7;">
                    Registrasi
                </a>
            </p>

        </div>

    </div>

    <script>
        function togglePassword(inputId) {
            const input     = document.getElementById(inputId);
            const eyeOpen   = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            if (input.type === 'password') {
                input.type              = 'text';
                eyeOpen.style.display   = 'none';
                eyeClosed.style.display = 'block';
            } else {
                input.type              = 'password';
                eyeOpen.style.display   = 'block';
                eyeClosed.style.display = 'none';
            }
        }
    </script>

</body>
</html>