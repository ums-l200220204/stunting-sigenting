<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: #EEF3FA;
            background-image:
                radial-gradient(ellipse 80% 60% at 20% -10%, rgba(0,120,193,0.12) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 85% 110%, rgba(253,75,199,0.10) 0%, transparent 55%);
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(0,91,169,0.07) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
            z-index: 0;
        }

        .reg-card {
            position: relative;
            z-index: 1;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.9);
            box-shadow:
                0 4px 6px rgba(0,91,169,0.04),
                0 20px 60px rgba(0,91,169,0.10),
                0 1px 0 rgba(255,255,255,0.8) inset;
        }

        .reg-header {
            background: linear-gradient(135deg, #004E95 0%, #0078C1 45%, #C238A5 80%, #FD4BC7 100%);
            position: relative;
            overflow: hidden;
        }

        .reg-header::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }

        .reg-header::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -20px;
            width: 220px; height: 220px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .icon-ring {
            background: rgba(255,255,255,0.15);
            border: 1.5px solid rgba(255,255,255,0.3);
            box-shadow: 0 0 0 6px rgba(255,255,255,0.06);
        }

        .field-label {
            font-size: 12.5px;
            font-weight: 600;
            letter-spacing: 0.03em;
            color: #3B5273;
            text-transform: uppercase;
        }

        .reg-input {
            width: 100%;
            height: 46px;
            border-radius: 12px;
            border: 1.5px solid #D8E4F0;
            padding: 0 14px;
            font-size: 14px;
            color: #1A2C42;
            background: rgba(248,251,255,0.8);
            transition: all 0.2s ease;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
        }

        .reg-input:hover {
            border-color: #90BAD8;
            background: #fff;
        }

        .reg-input:focus {
            border-color: #0078C1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,120,193,0.10);
        }

        select.reg-input {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' viewBox='0 0 24 24'%3E%3Cpath stroke='%230078C1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .error-box {
            background: linear-gradient(135deg, #FFF0F0, #FFF5F5);
            border: 1.5px solid #FFCECE;
            border-radius: 14px;
            padding: 16px 18px;
        }

        .error-icon-bg {
            background: linear-gradient(135deg, #FFE4E4, #FFCECE);
            border-radius: 10px;
        }

        .error-item {
            font-size: 13px;
            color: #C0392B;
            background: rgba(255,255,255,0.7);
            border: 1px solid #FFDDDD;
            border-radius: 8px;
            padding: 8px 14px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #004E95 0%, #0078C1 50%, #1E8DD4 100%);
            border: none;
            padding: 12px 48px;
            border-radius: 50px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14.5px;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: white;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 4px 15px rgba(0,120,193,0.35),
                0 1px 0 rgba(255,255,255,0.2) inset;
            transition: all 0.25s ease;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.4s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow:
                0 8px 25px rgba(0,120,193,0.40),
                0 1px 0 rgba(255,255,255,0.2) inset;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(0) scale(0.99);
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #D8E8F5, #E8D4F5, transparent);
            margin: 8px 0;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #0078C1;
            background: rgba(0,120,193,0.07);
            border: 1px solid rgba(0,120,193,0.15);
            padding: 4px 10px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .section-tag.pink {
            color: #C238A5;
            background: rgba(194,56,165,0.07);
            border-color: rgba(194,56,165,0.15);
        }

        .section-tag.purple {
            color: #6B3BC2;
            background: rgba(107,59,194,0.07);
            border-color: rgba(107,59,194,0.15);
        }

        /* ── Password wrapper ── */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper .reg-input {
            padding-right: 44px; /* ruang untuk tombol eye */
        }

        .eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 4px;
            cursor: pointer;
            color: #8AACC8;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: color 0.2s ease, background 0.2s ease;
            outline: none;
            line-height: 0;
        }

        .eye-btn:hover {
            color: #0078C1;
            background: rgba(0,120,193,0.08);
        }

        .eye-btn:focus-visible {
            box-shadow: 0 0 0 3px rgba(0,120,193,0.20);
        }

        /* icon slash line animasi */
        .eye-slash-line {
            transform-origin: center;
            transition: opacity 0.15s ease, transform 0.15s ease;
        }
    </style>
</head>

<body class="min-h-screen overflow-y-auto overflow-x-hidden px-4 py-8">

    <div class="fixed top-[-80px] left-[-80px] w-[280px] h-[280px] rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(0,120,193,0.15), transparent 70%); z-index: 0;"></div>
    <div class="fixed bottom-[-80px] right-[-80px] w-[260px] h-[260px] rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(253,75,199,0.12), transparent 70%); z-index: 0;"></div>

    <div class="reg-card relative z-10 w-full max-w-3xl mx-auto rounded-[28px] overflow-hidden">

        <!-- Header -->
        <div class="reg-header px-6 pt-7 pb-8 text-white text-center">
            <div class="flex justify-center mb-4">
                <div class="icon-ring w-16 h-16 rounded-full flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4341/4341139.png" class="w-9 h-9">
                </div>
            </div>

            <h1 style="font-family: 'Sora', sans-serif;" class="text-[26px] font-bold tracking-tight">
                Registrasi Akun
            </h1>

            <p class="text-sm mt-1.5" style="color: rgba(255,255,255,0.80); letter-spacing: 0.01em;">
                Monitoring Tumbuh Kembang Anak
            </p>

            <div class="flex justify-center gap-2 mt-4">
                <div class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold"
                     style="background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.25);">
                    <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                    Data Anak
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold"
                     style="background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.25);">
                    <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                    Data Orang Tua
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold"
                     style="background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.25);">
                    <span class="w-1.5 h-1.5 rounded-full bg-white inline-block"></span>
                    Keamanan
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <div class="px-6 py-7 md:px-8">

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="error-box mb-6">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="error-icon-bg w-9 h-9 flex items-center justify-center flex-shrink-0" style="border-radius: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5" style="color:#E53E3E; width:18px; height:18px;"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-sm" style="color:#C0392B;">Registrasi Gagal</h2>
                            <p class="text-xs mt-0.5" style="color:#E57373;">Harap lengkapi semua data terlebih dahulu.</p>
                        </div>
                    </div>
                    <ul class="space-y-1.5">
                        @foreach ($errors->all() as $error)
                            <li class="error-item">• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <!-- ── DATA ANAK ── -->
                <div class="mb-6">
                    <div class="section-tag">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
                        Data Anak
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <div class="field-group md:col-span-1">
                            <label class="field-label">Nama Anak</label>
                            <input type="text" name="nama_anak"
                                   value="{{ old('nama_anak') }}"
                                   placeholder="Masukkan nama anak"
                                   class="reg-input">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="reg-input">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir') }}"
                                   max="{{ date('Y-m-d') }}"
                                   class="reg-input">
                        </div>

                    </div>
                </div>

                <div class="section-divider"></div>

                <!-- ── DATA ORANG TUA ── -->
                <div class="my-6">
                    <div class="section-tag pink">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
                        Data Orang Tua
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="field-group">
                            <label class="field-label">Nama Orang Tua</label>
                            <input type="text" name="nama"
                                   value="{{ old('nama') }}"
                                   placeholder="Nama lengkap orang tua"
                                   class="reg-input">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Email</label>
                            <input type="email" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="contoh@email.com"
                                   class="reg-input">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Nomor HP</label>
                            <input type="text" name="nomor_hp"
                                   value="{{ old('nomor_hp') }}"
                                   placeholder="08xx-xxxx-xxxx"
                                   class="reg-input">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Alamat</label>
                            <input type="text" name="alamat"
                                   value="{{ old('alamat') }}"
                                   placeholder="Alamat lengkap"
                                   class="reg-input">
                        </div>

                    </div>
                </div>

                <div class="section-divider"></div>

                <!-- ── KEAMANAN AKUN ── -->
                <div class="my-6">
                    <div class="section-tag purple">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
                        Keamanan Akun
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- PASSWORD --}}
                        <div class="field-group">
                            <label class="field-label">Password</label>
                            <div class="password-wrapper">
                                <input type="password" name="password" id="password"
                                       placeholder="Minimal 8 karakter"
                                       class="reg-input">
                                <button type="button" class="eye-btn" onclick="togglePassword('password', this)" aria-label="Tampilkan password">
                                    <!-- Eye icon -->
                                    <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12S5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                        <line class="eye-slash-line" x1="3" y1="3" x2="21" y2="21"
                                              style="opacity:0; stroke-width:2.5;"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="field-group">
                            <label class="field-label">Konfirmasi Password</label>
                            <div class="password-wrapper">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       placeholder="Ulangi password"
                                       class="reg-input">
                                <button type="button" class="eye-btn" onclick="togglePassword('password_confirmation', this)" aria-label="Tampilkan konfirmasi password">
                                    <svg id="eye-icon-password_confirmation" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12S5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                        <line class="eye-slash-line" x1="3" y1="3" x2="21" y2="21"
                                              style="opacity:0; stroke-width:2.5;"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ── BUTTON ── -->
                <div class="mt-6 flex flex-col items-center gap-3">

                    <button type="submit" class="btn-submit">
                        Daftar Sekarang →
                    </button>

                    <p class="text-sm" style="color: #6B7E95;">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                           style="color: #C238A5; font-weight: 700;"
                           class="hover:underline">
                            Masuk di sini
                        </a>
                    </p>

                </div>

            </form>
        </div>

        <!-- Footer strip -->
        <div class="px-6 py-3 text-center text-xs" style="background: #F4F8FC; color: #94A8BF; border-top: 1px solid #E4EDF5;">
            Data Anda aman dan dilindungi · Monitoring Tumbuh Kembang Anak
        </div>

    </div>

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const slashLine = document.querySelector('#eye-icon-' + inputId + ' .eye-slash-line');
            const isHidden = input.type === 'password';

            // Toggle tipe input
            input.type = isHidden ? 'text' : 'password';

            // Toggle garis slash pada icon
            slashLine.style.opacity = isHidden ? '1' : '0';

            // Update warna tombol saat aktif
            btn.style.color = isHidden ? '#0078C1' : '';

            // Update aria-label
            btn.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
        }
    </script>

</body>
</html>