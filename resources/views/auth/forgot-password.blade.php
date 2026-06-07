<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background: #EEF2F7;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        /* Geometric background shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }
        .bg-shape-1 {
            width: 320px; height: 320px;
            background: #0078C1;
            opacity: 0.07;
            top: -80px; left: -80px;
            filter: blur(60px);
        }
        .bg-shape-2 {
            width: 260px; height: 260px;
            background: #FD4BC7;
            opacity: 0.07;
            bottom: -60px; right: -60px;
            filter: blur(60px);
        }
        .bg-shape-3 {
            width: 180px; height: 180px;
            background: #005BA9;
            opacity: 0.05;
            bottom: 20%; left: 10%;
            filter: blur(50px);
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 20px;
            box-shadow:
                0 1px 2px rgba(0,90,169,0.04),
                0 4px 16px rgba(0,90,169,0.08),
                0 16px 40px rgba(0,90,169,0.06);
            overflow: hidden;
            position: relative;
            z-index: 10;
            animation: slideUp 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Header */
        .card-header {
            background: linear-gradient(135deg, #005BA9 0%, #0078C1 55%, #4E6FD8 80%, #FD4BC7 100%);
            padding: 2rem 2rem 1.75rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* subtle grid overlay on header */
        .card-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .header-icon {
            width: 52px;
            height: 52px;
            background: rgba(255,255,255,0.18);
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.9rem;
            position: relative;
            backdrop-filter: blur(4px);
        }

        .header-icon svg {
            width: 26px;
            height: 26px;
            stroke: #fff;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .card-header h1 {
            margin: 0;
            font-size: 1.35rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.01em;
            position: relative;
        }

        .card-header p {
            margin: 0.35rem 0 0;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.82);
            font-weight: 400;
            position: relative;
        }

        /* Body */
        .card-body {
            padding: 1.75rem 2rem 2rem;
        }

        /* Alerts */
        .alert {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            border-radius: 12px;
            padding: 0.75rem 0.9rem;
            font-size: 0.82rem;
            margin-bottom: 1.25rem;
            line-height: 1.5;
        }
        .alert-icon {
            flex-shrink: 0;
            width: 16px;
            height: 16px;
            margin-top: 1px;
        }
        .alert-error {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #B91C1C;
        }
        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #15803D;
        }

        /* Label */
        .field-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.45rem;
            letter-spacing: 0.01em;
        }

        /* Input */
        .field-wrap {
            position: relative;
        }
        .field-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            width: 17px;
            height: 17px;
            stroke: #9CA3AF;
            fill: none;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
            transition: stroke 0.2s;
        }
        .text-input {
            width: 100%;
            padding: 0.7rem 0.9rem 0.7rem 2.5rem;
            border: 1.5px solid #E5E7EB;
            border-radius: 12px;
            font-size: 0.875rem;
            color: #111827;
            background: #FAFAFA;
            outline: none;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .text-input::placeholder { color: #9CA3AF; }
        .text-input:hover {
            border-color: #CBD5E1;
            background: #fff;
        }
        .text-input:focus {
            border-color: #0078C1;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,120,193,0.1);
        }
        .text-input:focus + .field-icon,
        .field-wrap:focus-within .field-icon {
            stroke: #0078C1;
        }

        /* Submit button */
        .btn-submit {
            display: block;
            width: 100%;
            margin-top: 1.25rem;
            padding: 0.78rem 1rem;
            background: linear-gradient(135deg, #0078C1, #005BA9);
            color: #fff;
            font-size: 0.9rem;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            letter-spacing: 0.01em;
            transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(0,90,169,0.3);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .btn-submit:hover {
            opacity: 0.92;
            box-shadow: 0 6px 20px rgba(0,90,169,0.35);
        }
        .btn-submit:active {
            transform: scale(0.98);
            box-shadow: 0 2px 8px rgba(0,90,169,0.25);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.4rem 0 1.1rem;
        }
        .divider-line {
            flex: 1;
            height: 1px;
            background: #F3F4F6;
        }
        .divider-text {
            font-size: 0.75rem;
            color: #D1D5DB;
            font-weight: 500;
        }

        /* Back link */
        .back-link-wrap {
            text-align: center;
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            color: #0078C1;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link:hover { color: #005BA9; text-decoration: underline; }
        .back-link svg {
            width: 14px; height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
    </style>
</head>

<body>

    {{-- Background shapes --}}
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="card">

        {{-- HEADER --}}
        <div class="card-header">
            <div class="header-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 9.9-1"/>
                </svg>
            </div>
            <h1>Lupa Password</h1>
            <p>Cari akun menggunakan email atau nomor HP</p>
        </div>

        <div class="card-body">

            {{-- PESAN ERROR --}}
            @if(session('error'))
                <div class="alert alert-error">
                    <svg class="alert-icon" viewBox="0 0 24 24" stroke="#B91C1C" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- PESAN SUKSES --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <svg class="alert-icon" viewBox="0 0 24 24" stroke="#15803D" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('forgot.password.check') }}">
                @csrf
                <div>
                    <label class="field-label" for="login-input">Email</label>
                    <div class="field-wrap">
                        <input
                            id="login-input"
                            type="text"
                            name="login"
                            class="text-input"
                            placeholder="contoh@email.com"
                            required
                            autocomplete="username"
                        >
                        <svg class="field-icon" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Kirim Link Reset
                </button>
            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">atau</span>
                <div class="divider-line"></div>
            </div>

            <div class="back-link-wrap">
                <a href="/login" class="back-link">
                    <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                    Kembali ke Login
                </a>
            </div>

        </div>
    </div>

</body>
</html>