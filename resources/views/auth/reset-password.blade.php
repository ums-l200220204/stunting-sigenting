<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800&family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-deep:   #004E95;
            --blue-mid:    #0078C1;
            --blue-light:  #1E8DD4;
            --pink:        #FD4BC7;
            --pink-mid:    #C238A5;
            --bg:          #EEF3FA;
            --card-bg:     rgba(255,255,255,0.94);
            --border:      #D8E4F0;
            --text-dark:   #1A2C42;
            --text-mid:    #3B5273;
            --text-soft:   #6B7E95;
            --text-muted:  #94A8BF;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            background-image:
                radial-gradient(ellipse 80% 55% at 15% -5%,  rgba(0,120,193,0.13) 0%, transparent 60%),
                radial-gradient(ellipse 55% 50% at 90% 105%, rgba(253,75,199,0.11) 0%, transparent 55%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            position: relative;
            overflow-x: hidden;
        }

        /* dot grid */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(0,91,169,0.065) 1px, transparent 1px);
            background-size: 26px 26px;
            pointer-events: none;
            z-index: 0;
        }

        /* ambient blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(72px);
        }
        .blob-tl { top: -90px;  left: -90px;  width: 280px; height: 280px; background: rgba(0,120,193,0.14); }
        .blob-br { bottom: -90px; right: -90px; width: 260px; height: 260px; background: rgba(253,75,199,0.11); }

        /* ── CARD ── */
        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            background: var(--card-bg);
            backdrop-filter: blur(28px);
            -webkit-backdrop-filter: blur(28px);
            border: 1px solid rgba(255,255,255,0.92);
            border-radius: 28px;
            overflow: hidden;
            box-shadow:
                0 2px 4px rgba(0,60,120,0.04),
                0 16px 48px rgba(0,78,149,0.12),
                0 1px 0 rgba(255,255,255,0.85) inset;
            animation: cardIn 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(24px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0)    scale(1);    }
        }

        /* ── HEADER ── */
        .card-header {
            background: linear-gradient(135deg, #004E95 0%, #0078C1 48%, #C238A5 80%, #FD4BC7 100%);
            padding: 32px 28px 28px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50px; right: -50px;
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -70px; left: -20px;
            width: 200px; height: 200px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }

        .header-icon {
            width: 64px; height: 64px;
            border-radius: 50%;
            background: rgba(255,255,255,0.16);
            border: 1.5px solid rgba(255,255,255,0.30);
            box-shadow: 0 0 0 7px rgba(255,255,255,0.06);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
        }

        .card-header h1 {
            font-family: 'Sora', sans-serif;
            font-size: clamp(20px, 5vw, 24px);
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.01em;
        }

        .card-header p {
            font-size: 13.5px;
            color: rgba(255,255,255,0.82);
            margin-top: 6px;
            letter-spacing: 0.01em;
        }

        /* progress strip */
        .progress-strip {
            display: flex;
            justify-content: center;
            gap: 6px;
            margin-top: 18px;
        }
        .progress-dot {
            height: 4px;
            border-radius: 4px;
            background: rgba(255,255,255,0.30);
            transition: width 0.3s ease, background 0.3s ease;
        }
        .progress-dot.active {
            background: rgba(255,255,255,0.90);
            width: 24px;
        }
        .progress-dot:not(.active) { width: 8px; }

        /* ── BODY ── */
        .card-body {
            padding: 28px 28px 24px;
        }

        @media (max-width: 420px) {
            .card-body { padding: 22px 20px 20px; }
            .card-header { padding: 26px 20px 22px; }
        }

        /* ── ERROR BOX ── */
        .error-box {
            background: linear-gradient(135deg, #FFF0F0, #FFF5F5);
            border: 1.5px solid #FFCECE;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }
        .error-icon {
            width: 34px; height: 34px; flex-shrink: 0;
            background: linear-gradient(135deg, #FFE0E0, #FFCCCC);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .error-title { font-size: 13px; font-weight: 700; color: #C0392B; }
        .error-item  { font-size: 12.5px; color: #C0392B; margin-top: 4px; }

        /* ── FIELD ── */
        .field-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            margin-bottom: 16px;
        }
        .field-group:last-of-type { margin-bottom: 0; }

        .field-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-mid);
        }

        .reg-input {
            width: 100%;
            height: 48px;
            border-radius: 13px;
            border: 1.5px solid var(--border);
            padding: 0 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: var(--text-dark);
            background: rgba(248,251,255,0.85);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        .reg-input:hover:not([readonly]) {
            border-color: #90BAD8;
            background: #fff;
        }

        .reg-input:focus {
            border-color: var(--blue-mid);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0,120,193,0.10);
        }

        .reg-input[readonly] {
            background: #F0F5FB;
            color: var(--text-soft);
            cursor: default;
        }

        /* password wrapper */
        .pw-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .pw-wrap .reg-input { padding-right: 46px; }

        .eye-btn {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            padding: 5px;
            cursor: pointer;
            color: var(--text-muted);
            border-radius: 7px;
            line-height: 0;
            transition: color 0.18s, background 0.18s;
            outline: none;
        }
        .eye-btn:hover  { color: var(--blue-mid); background: rgba(0,120,193,0.08); }
        .eye-btn:focus-visible { box-shadow: 0 0 0 3px rgba(0,120,193,0.20); }
        .eye-slash { transition: opacity 0.15s; }

        /* divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #D4E4F0, #E4D4F0, transparent);
            margin: 20px 0;
        }

        /* ── SUBMIT BUTTON ── */
        .btn-submit {
            width: 100%;
            height: 50px;
            margin-top: 24px;
            background: linear-gradient(135deg, #004E95 0%, #0078C1 55%, #1E8DD4 100%);
            border: none;
            border-radius: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,120,193,0.32), 0 1px 0 rgba(255,255,255,0.18) inset;
            transition: transform 0.22s, box-shadow 0.22s;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.14), transparent);
            transition: left 0.4s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(0,120,193,0.38), 0 1px 0 rgba(255,255,255,0.18) inset;
        }

        .btn-submit:hover::before { left: 100%; }
        .btn-submit:active { transform: translateY(0) scale(0.99); }

        /* ── FOOTER ── */
        .card-footer {
            background: #F4F8FC;
            border-top: 1px solid #E4EDF5;
            padding: 12px 28px;
            text-align: center;
            font-size: 11.5px;
            color: var(--text-muted);
        }

        /* secure badge */
        .secure-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            color: #3D7B42;
            background: rgba(61,123,66,0.07);
            border: 1px solid rgba(61,123,66,0.18);
            border-radius: 20px;
            padding: 4px 10px;
            margin-top: 14px;
        }
    </style>
</head>

<body>
    <div class="blob blob-tl"></div>
    <div class="blob blob-br"></div>

    <div class="card">

        <!-- HEADER -->
        <div class="card-header">
            <div class="header-icon">
                <!-- shield-lock icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                     viewBox="0 0 24 24" stroke="white" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7L12 2z"/>
                    <rect x="9" y="10" width="6" height="5" rx="1"/>
                    <path d="M12 10V8.5a1.5 1.5 0 0 0-3 0V10"/>
                </svg>
            </div>
            <h1>Reset Password</h1>
            <p>Buat password baru yang kuat untuk akun Anda</p>
            <div class="progress-strip">
                <div class="progress-dot"></div>
                <div class="progress-dot"></div>
                <div class="progress-dot active"></div>
            </div>
        </div>

        <!-- BODY -->
        <div class="card-body">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="error-box">
                    <div class="error-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                             viewBox="0 0 24 24" stroke="#C0392B" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 8v4m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="error-title">Terjadi Kesalahan</div>
                        @foreach ($errors->all() as $error)
                            <div class="error-item">• {{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- EMAIL -->
                <div class="field-group">
                    <label class="field-label">Email</label>
                    <input type="email" name="email"
                           value="{{ $email ?? old('email') }}"
                           readonly class="reg-input">
                </div>

                <div class="divider"></div>

                <!-- PASSWORD BARU -->
                <div class="field-group">
                    <label class="field-label">Password Baru</label>
                    <div class="pw-wrap">
                        <input type="password" name="password" id="password"
                               required placeholder="Minimal 6 karakter"
                               class="reg-input">
                        <button type="button" class="eye-btn"
                                onclick="togglePw('password', this)"
                                aria-label="Tampilkan password">
                            <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12S5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                                <line class="eye-slash" x1="3" y1="3" x2="21" y2="21"
                                      style="opacity:0; stroke-width:2.5;"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="field-group">
                    <label class="field-label">Konfirmasi Password</label>
                    <div class="pw-wrap">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               required placeholder="Ketik ulang password baru"
                               class="reg-input">
                        <button type="button" class="eye-btn"
                                onclick="togglePw('password_confirmation', this)"
                                aria-label="Tampilkan konfirmasi password">
                            <svg id="eye-icon-password_confirmation" xmlns="http://www.w3.org/2000/svg"
                                 width="18" height="18" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12S5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                                <line class="eye-slash" x1="3" y1="3" x2="21" y2="21"
                                      style="opacity:0; stroke-width:2.5;"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Simpan Password Baru
                </button>

                <div class="flex justify-center">
                    <div class="secure-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7L12 2z"/>
                        </svg>
                        Koneksi aman & terenkripsi
                    </div>
                </div>

            </form>
        </div>

        <!-- FOOTER -->
        <div class="card-footer">
            Data Anda aman dan dilindungi · Monitoring Tumbuh Kembang Anak
        </div>

    </div>

    <script>
        function togglePw(id, btn) {
            const input = document.getElementById(id);
            const slash = document.querySelector('#eye-icon-' + id + ' .eye-slash');
            const show  = input.type === 'password';

            input.type         = show ? 'text' : 'password';
            slash.style.opacity = show ? '1' : '0';
            btn.style.color    = show ? '#0078C1' : '';
            btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        }
    </script>

</body>
</html>