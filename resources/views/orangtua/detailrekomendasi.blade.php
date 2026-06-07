@extends('components.main')

@section('title', 'Detail Rekomendasi')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@700;800&display=swap" rel="stylesheet">

<style>
    .rekom-page * { font-family: 'Plus Jakarta Sans', sans-serif; }

    /* ── HERO HEADER ── */
    .hero-header {
        background: linear-gradient(135deg, #003F7A 0%, #005BA9 35%, #0078C1 65%, #1A8ED4 100%);
        border-radius: 32px;
        padding: 44px 48px;
        position: relative;
        overflow: hidden;
        color: white;
    }
    .hero-header::before {
        content: '';
        position: absolute;
        top: -70px; right: -70px;
        width: 280px; height: 280px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }
    .hero-header::after {
        content: '';
        position: absolute;
        bottom: -90px; left: 30%;
        width: 340px; height: 340px;
        background: rgba(253,75,199,0.08);
        border-radius: 50%;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.25);
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 16px;
    }
    .hero-title {
        font-family: 'Sora', sans-serif;
        font-size: clamp(28px, 5vw, 46px);
        font-weight: 800;
        line-height: 1.15;
        letter-spacing: -0.02em;
    }

    /* ── STAT CARDS ── */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-top: 28px;
    }
    @media (max-width: 640px) {
        .stat-grid { grid-template-columns: 1fr; }
    }
    .stat-card {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.20);
        border-radius: 18px;
        padding: 16px 20px;
        backdrop-filter: blur(8px);
    }
    .stat-label {
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.65);
    }
    .stat-value {
        font-family: 'Sora', sans-serif;
        font-size: 28px;
        font-weight: 800;
        color: #fff;
        margin-top: 4px;
        line-height: 1;
    }
    .stat-unit {
        font-size: 13px;
        font-weight: 600;
        color: rgba(255,255,255,0.60);
        margin-left: 3px;
    }
    .stat-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px;
        margin-bottom: 10px;
    }

    /* ── SECTION TITLE ── */
    .section-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #0078C1;
        background: rgba(0,120,193,0.08);
        border: 1px solid rgba(0,120,193,0.18);
        padding: 4px 12px;
        border-radius: 50px;
        margin-bottom: 10px;
    }
    .section-heading {
        font-family: 'Sora', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: #0F1E35;
        letter-spacing: -0.01em;
    }

    /* ── REKOM CARD ── */
    .rekom-card {
        background: #fff;
        border: 1.5px solid #E4EDF7;
        border-radius: 28px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr;
        transition: box-shadow 0.25s ease, transform 0.25s ease;
    }
    .rekom-card:hover {
        box-shadow: 0 20px 50px rgba(0,91,169,0.12);
        transform: translateY(-2px);
    }
    @media (min-width: 768px) {
        .rekom-card { grid-template-columns: 300px 1fr; }
        .rekom-card.reverse { grid-template-columns: 1fr 300px; }
        .rekom-card.reverse .rekom-img { order: 2; }
        .rekom-card.reverse .rekom-body { order: 1; }
    }

    /* Image panel */
    .rekom-img {
        position: relative;
        min-height: 220px;
        overflow: hidden;
    }
    .rekom-img img {
        width: 100%; height: 100%;
        object-fit: cover;
        display: block;
    }
    .rekom-img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 50%, rgba(0,30,70,0.35) 100%);
    }
    .rekom-num {
        position: absolute;
        top: 16px; left: 16px;
        width: 38px; height: 38px;
        border-radius: 12px;
        background: rgba(0,0,0,0.35);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.25);
        display: flex; align-items: center; justify-content: center;
        font-family: 'Sora', sans-serif;
        font-size: 15px;
        font-weight: 800;
        color: #fff;
    }

    /* Body */
    .rekom-body {
        padding: 32px 34px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .rekom-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        padding: 3px 10px;
        border-radius: 50px;
        margin-bottom: 12px;
        width: fit-content;
    }
    .rekom-title {
        font-family: 'Sora', sans-serif;
        font-size: 21px;
        font-weight: 800;
        color: #0F1E35;
        line-height: 1.3;
        letter-spacing: -0.01em;
        margin-bottom: 12px;
    }
    .rekom-desc {
        font-size: 15px;
        line-height: 1.85;
        color: #4A6080;
        text-align: justify;
    }
    
    /* Color variants for category label */
    .cat-blue   { background: #E6F2FB; color: #0055A5; }
    .cat-pink   { background: #FDE8F6; color: #B5218E; }
    .cat-green  { background: #E3F8EE; color: #0A7048; }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 64px 32px;
        background: #F7FAFD;
        border: 2px dashed #C8DCF0;
        border-radius: 24px;
        color: #7A95B0;
    }
</style>

<div class="rekom-page space-y-8 pb-6">

    {{-- ── HERO HEADER ── --}}
    <div class="hero-header">
        <div style="position: relative; z-index: 1;">
            <div class="hero-badge">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                Panduan Nutrisi
            </div>

            <h1 class="hero-title">{{ $kategori }}</h1>
            <p style="margin-top: 10px; color: rgba(255,255,255,0.75); font-size: 15px; max-width: 480px; line-height: 1.6;">
                Rekomendasi nutrisi dan pola makan yang disesuaikan dengan kategori usia dan kondisi tumbuh kembang anak Anda.
            </p>

            {{-- STAT CARDS --}}
            <div class="stat-grid">

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(0,191,255,0.18);">⚖️</div>
                    <div class="stat-label">Berat Badan</div>
                    <div class="stat-value">
                        {{ $perkembangan->berat_badan ?? 0 }}<span class="stat-unit">KG</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(253,75,199,0.18);">📏</div>
                    <div class="stat-label">Tinggi Badan</div>
                    <div class="stat-value">
                        {{ $perkembangan->tinggi_badan ?? 0 }}<span class="stat-unit">CM</span>
                    </div>
                </div>

                <div class="stat-card" style="background: rgba(255,255,255,0.16);">
                    <div class="stat-icon" style="background: rgba(0,220,130,0.18);">🩺</div>
                    <div class="stat-label">Status Gizi</div>
                    <div class="stat-value" style="font-size: 20px; margin-top: 6px;">
                        {{ $perkembangan->status_gizi ?? '-' }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ── REKOMENDASI SECTION ── --}}
    <div>
        <div class="section-eyebrow">
            <svg width="9" height="9" viewBox="0 0 9 9" fill="currentColor"><circle cx="4.5" cy="4.5" r="4.5"/></svg>
            {{ count($rekomendasi) }} Rekomendasi Tersedia
        </div>
        <h2 class="section-heading">Panduan untuk {{ $kategori }}</h2>
    </div>

    {{-- ── CARDS ── --}}
    @php
        $catColors = ['cat-blue', 'cat-green', 'cat-pink'];
    @endphp

    @forelse($rekomendasi as $index => $item)
        @php
            $isRev = ($index % 2 === 1);
            $catCls = $catColors[$index % count($catColors)];
            
            // Cek apakah item memiliki gambar. Jika tidak ada, pakai gambar default dari web.
            $imgUrl = $item->gambar ? asset('storage/' . $item->gambar) : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&q=80';
        @endphp

        <div class="rekom-card {{ $isRev ? 'reverse' : '' }}">

            {{-- IMAGE PANEL DARI DATABASE --}}
            <div class="rekom-img">
                <img src="{{ $imgUrl }}" alt="{{ $item->judul }}" loading="lazy">
                <div class="rekom-img-overlay"></div>
                <div class="rekom-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
            </div>

            {{-- CONTENT PANEL DARI DATABASE --}}
            <div class="rekom-body">

                <span class="rekom-category {{ $catCls }}">
                    Informasi Gizi
                </span>

                {{-- JUDUL DARI DB --}}
                <h2 class="rekom-title">{{ $item->judul }}</h2>

                {{-- DESKRIPSI DARI DB (nl2br agar enter/paragraf terbaca) --}}
                <p class="rekom-desc">{!! nl2br(e($item->deskripsi)) !!}</p>


            </div>

        </div>

    @empty
        <div class="empty-state">
            <div style="font-size: 48px; margin-bottom: 12px;">🥦</div>
            <p style="font-size: 16px; font-weight: 600; color: #4A6A8A;">Belum ada rekomendasi tersedia.</p>
            <p style="font-size: 13px; margin-top: 6px;">Silakan konsultasikan dengan tenaga kesehatan.</p>
        </div>
    @endforelse

</div>

@endsection