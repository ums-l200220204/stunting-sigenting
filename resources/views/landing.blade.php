<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGENTING — Sistem Generasi Anti Stunting</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ── Base ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8faff;
            color: #0f172a;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, .display { font-family: 'Outfit', sans-serif; }
        a { text-decoration: none; }

        /* ── Dot grid ── */
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: radial-gradient(circle, rgba(14,165,233,0.09) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
            z-index: 0;
        }

        /* ── Orbs ── */
        .orb {
            position: fixed; border-radius: 9999px;
            filter: blur(80px); pointer-events: none; z-index: 0;
        }
        .orb-1 { width: 560px; height: 560px; background: rgba(14,165,233,0.11); top: -160px; left: -120px; animation: drift1 22s ease-in-out infinite; }
        .orb-2 { width: 480px; height: 480px; background: rgba(217,70,239,0.08); bottom: -120px; right: -80px; animation: drift2 26s ease-in-out infinite; }
        .orb-3 { width: 300px; height: 300px; background: rgba(16,185,129,0.07); top: 40%; left: 55%; animation: drift3 18s ease-in-out infinite; }
        @keyframes drift1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(40px,55px)} }
        @keyframes drift2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-40px,-50px)} }
        @keyframes drift3 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-30px,30px)} }

        /* ── Gov Top Bar ── */
        .gov-bar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 101;
            height: 34px;
            background: linear-gradient(90deg, #0c4a6e, #075985);
            display: flex; align-items: center;
            padding: 0 32px;
        }
        .gov-bar-inner {
            width: 100%; max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
        }
        .gov-bar-left { display: flex; align-items: center; gap: 8px; }
        .gov-bar-left span { font-size: 11.5px; font-weight: 600; color: rgba(255,255,255,0.92); letter-spacing: 0.01em; }
        .gov-bar-flag { display: flex; height: 11px; width: 16px; border-radius: 2px; overflow: hidden; box-shadow: 0 0 0 1px rgba(255,255,255,0.25); flex-shrink: 0; }
        .gov-bar-flag div { flex: 1; }
        .gov-bar-right { display: flex; align-items: center; gap: 18px; }
        .gov-bar-right a { display: flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 500; color: rgba(255,255,255,0.78); transition: color 0.2s; }
        .gov-bar-right a:hover { color: white; }

        /* ── Navbar ── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            height: 68px;
            display: flex; align-items: center;
            padding: 0 32px;
            background: rgba(248, 250, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(14,165,233,0.10);
        }
        .navbar-inner {
            width: 100%; max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-logo { display: flex; align-items: center; gap: 12px; }
        .logo-village {
            width: 42px; height: 42px; border-radius: 50%; flex-shrink: 0;
            background: white; border: 2px solid #075985;
            display: flex; align-items: center; justify-content: center;
            font-size: 19px;
            box-shadow: 0 2px 8px rgba(7,89,133,0.20);
        }
        .logo-divider { width: 1px; height: 30px; background: #e2e8f0; }
        .logo-box {
            width: 42px; height: 42px; border-radius: 14px; flex-shrink: 0;
            background: linear-gradient(135deg, #0284c7, #0ea5e9);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 20px; color: white;
            box-shadow: 0 4px 14px rgba(2,132,199,0.35);
        }
        .logo-name { font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 18px; color: #0f172a; letter-spacing: 0.04em; }
        .logo-tagline { font-size: 10px; color: #94a3b8; letter-spacing: 0.1em; text-transform: uppercase; margin-top: 1px; }

        .nav-btns { display: flex; gap: 10px; align-items: center; }
        .btn-outline {
            padding: 9px 20px; border-radius: 12px;
            font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 14px;
            color: #475569; border: 1.5px solid #e2e8f0;
            background: white; cursor: pointer; transition: all 0.2s;
        }
        .btn-outline:hover { border-color: #0ea5e9; color: #0284c7; box-shadow: 0 2px 10px rgba(14,165,233,0.15); }
        .btn-solid {
            padding: 9px 22px; border-radius: 12px;
            font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 14px;
            color: white; border: none;
            background: linear-gradient(135deg, #0369a1, #0ea5e9);
            cursor: pointer; transition: all 0.2s;
            box-shadow: 0 4px 14px rgba(2,132,199,0.30);
            display: inline-flex; align-items: center; gap: 6px;
        }
        .btn-solid:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(2,132,199,0.42); }

        /* ── Hero ── */
        .hero {
            position: relative; z-index: 1;
            min-height: 100vh;
            display: flex; align-items: center;
            padding: 132px 32px 60px;
        }
        .hero-inner {
            width: 100%; max-width: 1200px; margin: 0 auto;
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 64px; align-items: center;
        }
        .hero-left { display: flex; flex-direction: column; }

        /* Badge */
        .badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px 6px 7px;
            background: white; border: 1px solid rgba(14,165,233,0.18);
            border-radius: 999px; font-size: 12px; font-weight: 600; color: #475569;
            width: fit-content; margin-bottom: 28px;
            box-shadow: 0 2px 10px rgba(14,165,233,0.10);
            animation: fadeUp 0.7s 0.0s both;
        }
        .badge-dot {
            width: 24px; height: 24px; border-radius: 50%;
            background: linear-gradient(135deg, #0ea5e9, #10b981);
            display: flex; align-items: center; justify-content: center; font-size: 13px;
        }

        /* Hero heading */
        .hero-h1 {
            font-family: 'Outfit', sans-serif; font-weight: 900;
            font-size: clamp(38px, 5vw, 64px);
            line-height: 1.07; letter-spacing: -0.025em; color: #0f172a;
            margin-bottom: 22px;
            animation: fadeUp 0.7s 0.1s both;
        }
        .grad {
            background: linear-gradient(90deg, #0284c7, #38bdf8, #d946ef);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }

        .hero-desc {
            font-size: 16px; line-height: 1.8; color: #64748b; font-weight: 300;
            max-width: 440px; margin-bottom: 36px;
            animation: fadeUp 0.7s 0.2s both;
        }

        /* CTA buttons */
        .hero-cta { display: flex; gap: 12px; margin-bottom: 44px; animation: fadeUp 0.7s 0.3s both; }
        .btn-hero-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 15px 28px; border-radius: 16px;
            font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px;
            color: white; border: none;
            background: linear-gradient(135deg, #0369a1, #0ea5e9);
            cursor: pointer; transition: all 0.28s;
            box-shadow: 0 8px 24px rgba(2,132,199,0.30);
        }
        .btn-hero-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 36px rgba(2,132,199,0.42); }
        .btn-hero-secondary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 15px 28px; border-radius: 16px;
            font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px;
            color: #334155; border: 1.5px solid #e2e8f0;
            background: white; cursor: pointer; transition: all 0.28s;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .btn-hero-secondary:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.10); border-color: rgba(14,165,233,0.25); color: #0284c7; }

        /* Stats row */
        .stats {
            display: grid; grid-template-columns: repeat(3, 1fr);
            background: white; border: 1px solid #f1f5f9;
            border-radius: 20px; overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            animation: fadeUp 0.7s 0.4s both;
            max-width: 440px;
        }
        .stat {
            padding: 20px 12px; text-align: center;
            border-right: 1px solid #f1f5f9;
            transition: background 0.2s;
        }
        .stat:last-child { border-right: none; }
        .stat:hover { background: #f8faff; }
        .stat-val { font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 22px; line-height: 1; margin-bottom: 6px; }
        .stat-lbl { font-size: 10px; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; font-weight: 600; }

        /* Hero visual */
        .hero-right { position: relative; display: flex; justify-content: center; animation: fadeUp 0.7s 0.15s both; }
        .img-wrap { position: relative; width: 100%; max-width: 440px; }
        .img-glow {
            position: absolute; inset: -20px;
            background: radial-gradient(ellipse, rgba(14,165,233,0.16) 0%, rgba(217,70,239,0.07) 55%, transparent 72%);
            border-radius: 50%; filter: blur(24px);
            animation: glow 4s ease-in-out infinite;
        }
        @keyframes glow { 0%,100%{opacity:.7;transform:scale(1)} 50%{opacity:1;transform:scale(1.06)} }
        .hero-img {
            position: relative; z-index: 1; width: 100%;
            aspect-ratio: 4/5; object-fit: cover;
            border-radius: 36px;
            border: 1px solid rgba(255,255,255,0.8);
            box-shadow: 0 28px 70px rgba(0,50,120,0.16);
            animation: imgFloat 5s ease-in-out infinite;
        }
        @keyframes imgFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-14px)} }

        /* Float cards */
        .fc {
            position: absolute; z-index: 2; background: white;
            border: 1px solid #f1f5f9; border-radius: 18px;
            padding: 12px 16px; display: flex; align-items: center; gap: 11px;
            box-shadow: 0 12px 40px rgba(0,50,120,0.13);
            max-width: 210px;
        }
        .fc-icon {
            width: 40px; height: 40px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 19px; flex-shrink: 0;
        }
        .fc-main { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 13px; color: #1e293b; }
        .fc-sub  { font-size: 11px; color: #94a3b8; margin-top: 2px; }
        .fc-1 { top: 10%; left: -56px; animation: fc1 6s ease-in-out infinite; }
        .fc-2 { bottom: 16%; right: -46px; animation: fc2 5.5s ease-in-out infinite; }
        @keyframes fc1 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
        @keyframes fc2 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(9px)} }

        .live-badge {
            position: absolute; top: 18px; right: 18px; z-index: 3;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(8px);
            border: 1px solid #f1f5f9;
            border-radius: 12px; padding: 7px 12px;
            display: flex; align-items: center; gap: 7px;
            font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 11px; color: #334155;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        }
        .live-dot { width: 7px; height: 7px; border-radius: 50%; background: #10b981; animation: pulse 2s ease-in-out infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.4} }

        /* ── Divider ── */
        .divider {
            position: relative; z-index: 1; height: 1px; margin: 0 40px;
            background: linear-gradient(90deg, transparent, rgba(14,165,233,0.14) 30%, rgba(14,165,233,0.14) 70%, transparent);
        }

        /* ── Profil Desa ── */
        .profil {
            position: relative; z-index: 1; padding: 70px 32px;
        }
        .profil-box {
            max-width: 1200px; margin: 0 auto;
            display: grid; grid-template-columns: 1.1fr 1fr;
            gap: 48px; align-items: center;
            background: white; border: 1px solid #f1f5f9;
            border-radius: 32px; padding: 52px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.05);
        }
        .profil-eyebrow { display: flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #075985; margin-bottom: 16px; }
        .profil-title { font-family: 'Outfit', sans-serif; font-weight: 900; font-size: clamp(22px, 3vw, 32px); color: #0f172a; line-height: 1.18; letter-spacing: -0.02em; margin-bottom: 16px; }
        .profil-desc { font-size: 14.5px; color: #64748b; line-height: 1.85; font-weight: 300; margin-bottom: 8px; }
        .profil-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .profil-card {
            background: #f8faff; border: 1px solid #eef2f9; border-radius: 18px;
            padding: 20px 18px; text-align: center;
        }
        .profil-val { font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 24px; color: #075985; line-height: 1; margin-bottom: 6px; }
        .profil-lbl { font-size: 11px; color: #94a3b8; font-weight: 600; letter-spacing: 0.03em; }

        @media (max-width: 1024px) {
            .profil-box { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .profil { padding: 40px 16px; }
            .profil-box { padding: 30px 22px; border-radius: 24px; gap: 28px; }
            .profil-grid { gap: 12px; }
        }

        /* ── Features ── */
        .features { position: relative; z-index: 1; padding: 80px 32px 60px; }
        .features-inner { max-width: 1200px; margin: 0 auto; }
        .section-head { text-align: center; max-width: 540px; margin: 0 auto 60px; }
        .section-label { font-size: 11px; font-weight: 700; font-family: 'Outfit', sans-serif; letter-spacing: 0.16em; text-transform: uppercase; color: #0284c7; display: block; margin-bottom: 14px; }
        .section-title { font-family: 'Outfit', sans-serif; font-size: clamp(26px, 3.5vw, 40px); font-weight: 900; color: #0f172a; line-height: 1.12; letter-spacing: -0.02em; margin-bottom: 14px; }
        .section-desc { font-size: 15px; color: #64748b; font-weight: 300; line-height: 1.75; }

        .feat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .feat-card {
            background: white; border: 1px solid #f1f5f9;
            border-radius: 24px; padding: 40px 32px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.05);
            position: relative; overflow: hidden;
            transition: all 0.3s ease;
        }
        .feat-card:hover { transform: translateY(-6px); }
        .feat-card::before { /* accent corner blob */
            content: '';
            position: absolute; top: 0; right: 0;
            width: 100px; height: 100px; border-radius: 50%;
            transform: translate(35%, -35%);
            transition: transform 0.4s ease;
        }
        .feat-card:hover::before { transform: translate(35%, -35%) scale(1.4); }
        .feat-card::after { /* bottom accent bar */
            content: '';
            position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
            border-radius: 0 0 24px 24px; opacity: 0; transition: opacity 0.3s;
        }
        .feat-card:hover::after { opacity: 1; }

        .card-a::before { background: rgba(14,165,233,0.07); }
        .card-a::after  { background: linear-gradient(90deg, #0284c7, #38bdf8); }
        .card-a:hover   { box-shadow: 0 16px 48px rgba(14,165,233,0.14); }

        .card-b::before { background: rgba(217,70,239,0.07); }
        .card-b::after  { background: linear-gradient(90deg, #d946ef, #fb7185); }
        .card-b:hover   { box-shadow: 0 16px 48px rgba(217,70,239,0.12); }

        .card-c::before { background: rgba(16,185,129,0.07); }
        .card-c::after  { background: linear-gradient(90deg, #059669, #38bdf8); }
        .card-c:hover   { box-shadow: 0 16px 48px rgba(16,185,129,0.12); }

        .feat-icon {
            width: 56px; height: 56px; border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; margin-bottom: 24px;
            position: relative; z-index: 1;
            transition: transform 0.3s;
        }
        .feat-card:hover .feat-icon { transform: scale(1.1); }
        .icon-a { background: rgba(14,165,233,0.09);  border: 1px solid rgba(14,165,233,0.18); }
        .icon-b { background: rgba(217,70,239,0.09);  border: 1px solid rgba(217,70,239,0.18); }
        .icon-c { background: rgba(16,185,129,0.09);  border: 1px solid rgba(16,185,129,0.18); }

        .feat-title { font-family: 'Outfit', sans-serif; font-size: 19px; font-weight: 800; color: #1e293b; margin-bottom: 12px; letter-spacing: -0.01em; position: relative; z-index: 1; }
        .feat-desc  { font-size: 14px; color: #64748b; line-height: 1.78; font-weight: 300; position: relative; z-index: 1; }
        .feat-link  { display: inline-flex; align-items: center; gap: 5px; margin-top: 24px; font-size: 13px; font-weight: 700; font-family: 'Outfit', sans-serif; transition: gap 0.2s; position: relative; z-index: 1; }
        .feat-link:hover { gap: 9px; }
        .link-a { color: #0284c7; }
        .link-b { color: #c026d3; }
        .link-c { color: #059669; }

        /* Mini highlights */
        .highlights { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-top: 18px; }
        .hl-card {
            background: white; border: 1px solid #f1f5f9;
            border-radius: 18px; padding: 18px 14px; text-align: center;
            transition: all 0.2s;
        }
        .hl-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); border-color: rgba(14,165,233,0.2); }
        .hl-emoji { font-size: 22px; margin-bottom: 8px; }
        .hl-title { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 12px; color: #334155; margin-bottom: 3px; }
        .hl-sub   { font-size: 11px; color: #94a3b8; font-weight: 300; }

        /* ── CTA ── */
        .cta-section { position: relative; z-index: 1; padding: 40px 32px 100px; }
        .cta-box {
            max-width: 1200px; margin: 0 auto;
            border-radius: 36px; padding: 72px 56px;
            text-align: center; position: relative; overflow: hidden;
            background: linear-gradient(135deg, #0369a1 0%, #0ea5e9 55%, #06b6d4 100%);
            box-shadow: 0 24px 72px rgba(2,132,199,0.28);
        }
        .cta-blob-1 { position: absolute; top: -70px; right: -70px; width: 220px; height: 220px; border-radius: 50%; background: rgba(255,255,255,0.09); pointer-events: none; }
        .cta-blob-2 { position: absolute; bottom: -50px; left: -50px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255,255,255,0.07); pointer-events: none; }
        .cta-blob-3 { position: absolute; top: 50%; left: 30%; width: 120px; height: 120px; border-radius: 50%; background: rgba(217,70,239,0.10); transform: translateY(-50%); pointer-events: none; }

        .cta-label { display: inline-flex; align-items: center; gap: 6px; padding: 6px 16px; border-radius: 999px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.2); font-family: 'Outfit', sans-serif; font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.9); margin-bottom: 22px; position: relative; z-index: 1; }
        .cta-title { font-family: 'Outfit', sans-serif; font-size: clamp(26px, 4vw, 46px); font-weight: 900; color: white; line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 18px; position: relative; z-index: 1; }
        .cta-desc  { font-size: 16px; color: rgba(255,255,255,0.75); max-width: 440px; margin: 0 auto 36px; font-weight: 300; line-height: 1.72; position: relative; z-index: 1; }
        .cta-btns  { display: flex; gap: 12px; justify-content: center; position: relative; z-index: 1; }

        .btn-cta-white {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 15px 30px; border-radius: 16px;
            font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 15px;
            color: #0284c7; background: white; border: none;
            box-shadow: 0 8px 24px rgba(0,0,0,0.14);
            transition: all 0.28s; cursor: pointer;
        }
        .btn-cta-white:hover { transform: translateY(-3px); box-shadow: 0 16px 36px rgba(0,0,0,0.18); }

        .btn-cta-ghost {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 15px 28px; border-radius: 16px;
            font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 15px;
            color: white; background: rgba(255,255,255,0.12);
            border: 2px solid rgba(255,255,255,0.35);
            transition: all 0.28s; cursor: pointer;
        }
        .btn-cta-ghost:hover { background: rgba(255,255,255,0.22); border-color: white; transform: translateY(-3px); }

        /* Trust badges */
        .trust { display: flex; justify-content: center; gap: 28px; margin-top: 36px; flex-wrap: wrap; position: relative; z-index: 1; }
        .trust-item { display: flex; align-items: center; gap: 7px; font-size: 12px; font-weight: 500; color: rgba(255,255,255,0.70); }
        .trust-item svg { opacity: 0.85; }

        /* ── Footer ── */
        footer {
            position: relative; z-index: 1;
            background: white; border-top: 1px solid #f1f5f9;
            padding: 24px 32px;
            display: flex; align-items: center; justify-content: center;
        }
        .footer-left { display: flex; align-items: center; gap: 10px; }
        .footer-logo-box { width: 30px; height: 30px; border-radius: 9px; background: linear-gradient(135deg, #0284c7, #0ea5e9); display: flex; align-items: center; justify-content: center; font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 14px; color: white; }
        .footer-text { font-size: 13px; color: #94a3b8; }
        .footer-text b { color: #0284c7; font-family: 'Outfit', sans-serif; }

        /* ── Animations ── */
        @keyframes fadeUp { from{opacity:0;transform:translateY(22px)} to{opacity:1;transform:translateY(0)} }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .hero-inner { grid-template-columns: 1fr; gap: 40px; }
            .hero-left { align-items: center; text-align: center; }
            .hero-desc { margin: 0 auto 36px; }
            .stats { max-width: 100%; }
            .hero-right { display: none; }
            .feat-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 768px) {
            .gov-bar { padding: 0 14px; height: 30px; }
            .gov-bar-left span { font-size: 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 210px; }
            .gov-bar-right { display: none; }
            .navbar { top: 0px; padding: 0 16px; height: 60px; }
            .logo-village { width: 34px; height: 34px; font-size: 15px; }
            .logo-divider { display: none; }
            .logo-tagline { display: none; }
            .logo-box { width: 36px; height: 36px; font-size: 17px; border-radius: 11px; }
            .logo-name { font-size: 16px; }
            .btn-outline { display: none; } /* hide register on mobile, available in hero */
            .btn-solid { padding: 8px 16px; font-size: 13px; }

            .hero { padding: 108px 16px 50px; }
            .hero-h1 { font-size: 34px; }
            .hero-desc { font-size: 15px; }
            .hero-cta { flex-direction: column; width: 100%; }
            .btn-hero-primary, .btn-hero-secondary { width: 100%; justify-content: center; padding: 14px 20px; }

            .stats { grid-template-columns: repeat(3, 1fr); }
            .stat-val { font-size: 18px; }

            .features { padding: 50px 16px 40px; }
            .feat-grid { grid-template-columns: 1fr; gap: 14px; }
            .feat-card { padding: 30px 22px; }

            .highlights { grid-template-columns: repeat(2, 1fr); gap: 10px; }

            .cta-section { padding: 20px 16px 70px; }
            .cta-box { padding: 40px 22px; border-radius: 24px; }
            .cta-title { font-size: 26px; }
            .cta-desc { font-size: 14px; margin-bottom: 26px; }
            .cta-btns { flex-direction: column; }
            .btn-cta-white, .btn-cta-ghost { width: 100%; justify-content: center; }
            .trust { gap: 16px; }

            footer { flex-direction: column; gap: 10px; text-align: center; padding: 20px 16px; }

            .divider { margin: 0 16px; }
        }

        @media (max-width: 420px) {
            .hero-h1 { font-size: 29px; }
            .badge { font-size: 11px; }
            .stats { border-radius: 16px; }
            .stat { padding: 15px 8px; }
            .stat-val { font-size: 16px; }
        }
    </style>
</head>
<body>

    <!-- ═══════ NAVBAR ═══════ -->
    <nav class="navbar">
        <div class="navbar-inner">

            <a href="#" class="nav-logo">
                <div class="logo-divider"></div>
                <div class="logo-box">S</div>
                <div>
                    <div class="logo-name">SIGENTING</div>
                    <div class="logo-tagline">Sistem Generasi Anti Stunting | Pemerintah Desa Ngunggahan</div>
                </div>
            </a>

            <div class="nav-btns">
                <a href="{{ route('register') }}" class="btn-outline">Registrasi</a>
                <a href="{{ route('login') }}"    class="btn-solid">
                    Masuk
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </nav>

    <!-- ═══════ HERO ═══════ -->
    <section class="hero">
        <div class="hero-inner">

            <!-- Left -->
            <div class="hero-left">

                <h1 class="hero-h1">
                    Ciptakan<br>
                    <span class="grad">Generasi Ngunggahan</span><br>
                    Tanpa Stunting
                </h1>

                <p class="hero-desc">
                    Sistem berbasis web untuk membantu orang tua dan kader posyandu
                    memantau pertumbuhan anak, status gizi, dan perkembangan kesehatan
                    secara modern, cepat, dan mudah digunakan.
                </p>

                <div class="hero-cta">
                    <a href="{{ route('login') }}"    class="btn-hero-primary">
                        Mulai Sekarang
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('register') }}" class="btn-hero-secondary">
                        Daftar Gratis
                    </a>
                </div>

                <div class="stats">
                    <div class="stat">
                        <div class="stat-val" style="color:#0284c7">24/7</div>
                        <div class="stat-lbl">Monitoring</div>
                    </div>
                    <div class="stat">
                        <div class="stat-val" style="color:#c026d3">Aman</div>
                        <div class="stat-lbl">Data Tersimpan</div>
                    </div>
                    <div class="stat">
                        <div class="stat-val" style="color:#059669">Mudah</div>
                        <div class="stat-lbl">Digunakan</div>
                    </div>
                </div>

            </div>

            <!-- Right: Visual -->
            <div class="hero-right">
                <div class="img-wrap">
                    <div class="img-glow"></div>

                    <div class="fc fc-1">
                        <div class="fc-icon" style="background:rgba(16,185,129,0.09);border:1px solid rgba(16,185,129,0.18)">📊</div>
                        <div>
                            <div class="fc-main">Status Gizi Normal</div>
                            <div class="fc-sub">Sesuai standar WHO</div>
                        </div>
                    </div>

                    <img
                        src="{{ asset('images/family.jpg') }}"
                        alt="Keluarga sehat"
                        class="hero-img"
                    >


                    <div class="fc fc-2">
                        <div class="fc-icon" style="background:rgba(14,165,233,0.09);border:1px solid rgba(14,165,233,0.18)">🩺</div>
                        <div>
                            <div class="fc-main">Deteksi Dini Stunting</div>
                            <div class="fc-sub">Analisis akurat & real-time</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="divider"></div>

    <!-- ═══════ PROFIL DESA ═══════ -->
    <section class="profil">
        <div class="profil-box">
            <div>
                <div class="profil-eyebrow">🏘️ Tentang Desa Ngunggahan</div>
                <h2 class="profil-title">Berkomitmen Mewujudkan Generasi Ngunggahan yang Sehat dan Bebas Stunting</h2>
                <p class="profil-desc">
                    Desa Ngunggahan, Kecamatan Eromoko, Kabupaten Wonogiri, menghadirkan
                    SIGENTING sebagai wujud nyata komitmen pemerintah desa dalam mempercepat penurunan
                    stunting melalui pemantauan gizi balita yang terpadu, transparan, dan berbasis data.
                </p>
                <p class="profil-desc">
                    Aplikasi ini dikembangkan bersama kader Posyandu dan Tim Percepatan Penurunan Stunting (TPPS)
                    tingkat desa untuk mendukung layanan kesehatan ibu dan anak yang lebih dekat dengan warga.
                </p>
            </div>
            <div class="profil-grid">
                <div class="profil-card">
                    <div class="profil-val">7</div>
                    <div class="profil-lbl">DUSUN</div>
                </div>
                <div class="profil-card">
                    <div class="profil-val">7</div>
                    <div class="profil-lbl">POSYANDU AKTIF</div>
                </div>
                <div class="profil-card">
                    <div class="profil-val">{{ $totalAnak ?? 0 }}</div>
                    <div class="profil-lbl">ANAK TERPANTAU</div>
                </div>

                <div class="profil-card">
                    <div class="profil-val">{{ $totalKader ?? 0 }}</div>
                    <div class="profil-lbl">KADER POSYANDU</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════ FEATURES ═══════ -->
    <section class="features">
        <div class="features-inner">

            <div class="section-head">
                <span class="section-label">Fitur Unggulan</span>
                <h2 class="section-title">Semua yang Anda Butuhkan,<br>Dalam Satu Platform</h2>
                <p class="section-desc">Dirancang untuk kemudahan kader posyandu dan orang tua dalam memantau tumbuh kembang anak.</p>
            </div>

            <div class="feat-grid">

                <div class="feat-card card-a">
                    <div class="feat-icon icon-a">📊</div>
                    <div class="feat-title">Monitoring Anak</div>
                    <p class="feat-desc">Pantau pertumbuhan dan perkembangan anak secara berkala dengan data terintegrasi dan visualisasi yang mudah dipahami.</p>
                    <a href="#" class="feat-link link-a">Pelajari lebih lanjut <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </div>

                <div class="feat-card card-b">
                    <div class="feat-icon icon-b">🩺</div>
                    <div class="feat-title">Analisis Status Gizi</div>
                    <p class="feat-desc">Deteksi risiko stunting lebih cepat dan akurat dengan analisis status gizi berbasis standar WHO yang terpercaya.</p>
                    <a href="#" class="feat-link link-b">Pelajari lebih lanjut <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </div>

                <div class="feat-card card-c">
                    <div class="feat-icon icon-c">🔒</div>
                    <div class="feat-title">Aman & Terpercaya</div>
                    <p class="feat-desc">Sistem keamanan berlapis memastikan data anak tersimpan dengan aman. Mudah diakses kapan saja dan di mana saja.</p>
                    <a href="#" class="feat-link link-c">Pelajari lebih lanjut <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════ CTA ═══════ -->
    <section class="cta-section">
        <div class="cta-box">
            <div class="cta-blob-1"></div>
            <div class="cta-blob-2"></div>
            <div class="cta-blob-3"></div>

            <div class="cta-label">🌟 Bergabung Sekarang</div>
            <h2 class="cta-title">Mulai Pantau Anak Anda<br>Sekarang Juga</h2>
            <p class="cta-desc">Bergabunglah bersama ribuan orang tua dan kader posyandu yang telah mempercayakan pemantauan kesehatan anak kepada SIGENTING.</p>

            <div class="cta-btns">
                <a href="{{ route('register') }}" class="btn-cta-white">
                    Daftar Gratis Sekarang
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('login') }}" class="btn-cta-ghost">Sudah Punya Akun?</a>
            </div>

            <div class="trust">
                <div class="trust-item">
                    <svg width="15" height="15" fill="none" stroke="#6ee7b7" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Data Aman & Terenkripsi
                </div>
                <div class="trust-item">
                    <svg width="15" height="15" fill="none" stroke="#7dd3fc" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Akses 24/7
                </div>
                <div class="trust-item">
                    <svg width="15" height="15" fill="none" stroke="#e879f9" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    Gratis Untuk Semua
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════ FOOTER ═══════ -->
    <footer>
        <div class="footer-left">
            <div class="footer-logo-box">S</div>
            <span class="footer-text">© 2026 <b>SIGENTING</b> — Sistem Generasi Anti Stunting</span>
        </div>
    </footer>

</body>
</html>