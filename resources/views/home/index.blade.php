@extends('layouts.app')

@section('content')

<style>
/* ==========================================================================
   AURA BAG STORE — Design tokens
   Konsep: leather goods premium — espresso gelap + aksen brass (kuningan),
   dengan motif "hang-tag" (label gantung tas) sebagai elemen ciri khas,
   dipadukan efek depth (orb cahaya, kartu melayang, overlap section) untuk
   kesan lebih mewah & "wow".
   ========================================================================== */
@import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

:root{
    --aura-espresso:      #221812;
    --aura-espresso-2:    #2E2019;
    --aura-espresso-3:    #3B291F;
    --aura-brass:         #C6952E;
    --aura-brass-light:   #E3B85C;
    --aura-tan:           #9C6B45;
    --aura-ivory:         #F4EEE4;
    --aura-greige:        #EAE2D3;
    --aura-ink:           #241A13;
    --aura-ink-soft:      #6B5C4C;
    --aura-line:          rgba(198,149,46,.35);
    --aura-radius:        14px;
}

#content-wrap, .aura-page{
    font-family: 'Inter', sans-serif;
    color: var(--aura-ink);
    overflow-x:hidden;
}

.aura-page h1, .aura-page h2, .aura-page h3, .aura-page h4, .aura-page h5{
    font-family: 'Fraunces', serif;
    letter-spacing: -0.01em;
}

.aura-mono{ font-family: 'JetBrains Mono', monospace; }

.grad-text{
    background:linear-gradient(120deg, var(--aura-brass-light), var(--aura-brass) 55%, #fff 130%);
    -webkit-background-clip:text; background-clip:text; color:transparent;
    font-style:italic;
}

/* ---- Signature element: hang-tag pill ---- */
.hang-tag{
    display:inline-flex; align-items:center; gap:.5rem;
    padding:.35rem .9rem .35rem .7rem; border-radius:999px;
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.06em; text-transform:uppercase; line-height:1; white-space:nowrap;
}
.hang-tag::before{
    content:""; width:7px; height:7px; border-radius:50%; background:currentColor;
    opacity:.35; flex:0 0 auto; box-shadow: inset 0 0 0 1px currentColor;
}
.hang-tag--dark{ background:rgba(255,255,255,.08); color:var(--aura-brass-light); }
.hang-tag--brass{ background:rgba(198,149,46,.12); color:var(--aura-tan); }
.hang-tag--solid{ background:var(--aura-brass); color:var(--aura-espresso); }

.stitch-divider{ border:none; border-top:2px dashed var(--aura-line); margin:1.25rem 0 2.5rem; width:64px; }
.stitch-divider.center{ margin-left:auto; margin-right:auto; }

.section-eyebrow{
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.14em; text-transform:uppercase; color:var(--aura-tan);
    display:block; margin-bottom:.5rem;
}
.section-title{ font-size:clamp(1.7rem, 2.4vw, 2.35rem); font-weight:600; color:var(--aura-ink); }

/* ---- Entrance animation ---- */
@keyframes fadeUp{ from{ opacity:0; transform:translateY(22px); } to{ opacity:1; transform:translateY(0); } }
.fade-in{ animation:fadeUp .8s cubic-bezier(.2,.7,.2,1) both; }
.fade-in.d1{ animation-delay:.08s; }
.fade-in.d2{ animation-delay:.18s; }
.fade-in.d3{ animation-delay:.28s; }
.fade-in.d4{ animation-delay:.38s; }

/* ---- Hero ---- */
.aura-hero{
    background:
        radial-gradient(circle at 85% 10%, rgba(198,149,46,.2), transparent 45%),
        var(--aura-espresso);
    color:#F4EEE4;
    padding: 4.5rem 0 4rem;
    position:relative;
    overflow:hidden;
}
.aura-hero::after{
    content:"";
    position:absolute; inset:0;
    background-image: repeating-linear-gradient(135deg, rgba(255,255,255,.02) 0 2px, transparent 2px 26px);
    pointer-events:none;
}
.aura-hero .orb{ position:absolute; border-radius:50%; filter:blur(70px); pointer-events:none; z-index:0; }
.aura-hero .orb-1{ width:360px; height:360px; background:radial-gradient(circle, rgba(198,149,46,.55), transparent 70%); top:-120px; right:-60px; }
.aura-hero .orb-2{ width:280px; height:280px; background:radial-gradient(circle, rgba(156,107,69,.45), transparent 70%); bottom:-60px; left:6%; }
.aura-hero .container{ position:relative; z-index:1; }

.aura-hero h1{
    color:#fff; font-size:clamp(2.6rem, 5vw, 4.2rem); font-weight:700; line-height:1.03; margin:.7rem 0 1.15rem;
}
.aura-hero .lead{ color:#D9CCBB; font-size:1.08rem; max-width:34rem; }
.aura-hero-trust{
    margin-top:2.25rem; display:flex; gap:1.75rem; flex-wrap:wrap; font-size:.85rem; color:#C7B8A3;
}
.aura-hero-trust span{ display:flex; align-items:center; gap:.4rem; }
.aura-hero-trust i{ color:var(--aura-brass); }

.btn-aura-primary{
    background:var(--aura-brass); border:1px solid var(--aura-brass); color:var(--aura-espresso);
    font-weight:600; padding:.8rem 1.7rem; border-radius:999px; display:inline-flex; align-items:center;
    gap:.55rem; transition:transform .18s ease, background .18s ease, box-shadow .18s ease;
}
.btn-aura-primary:hover{
    background:var(--aura-brass-light); color:var(--aura-espresso); transform:translateY(-3px);
    box-shadow:0 16px 30px -10px rgba(198,149,46,.6);
}
.btn-aura-outline{
    background:transparent; border:1px solid rgba(244,238,228,.4); color:#F4EEE4;
    font-weight:600; padding:.8rem 1.7rem; border-radius:999px; display:inline-flex; align-items:center;
    gap:.55rem; transition:border-color .18s ease, background .18s ease, transform .18s ease;
}
.btn-aura-outline:hover{ background:rgba(244,238,228,.1); border-color:#F4EEE4; color:#fff; transform:translateY(-3px); }
.btn-aura-primary:focus-visible, .btn-aura-outline:focus-visible{ outline:2px solid var(--aura-brass-light); outline-offset:3px; }

.aura-hero-frame{
    position:relative; padding:1.1rem; border-radius:20px;
    background:linear-gradient(160deg, rgba(198,149,46,.4), rgba(198,149,46,.05));
    box-shadow:0 35px 65px -25px rgba(0,0,0,.55);
}
.aura-hero-frame::before, .aura-hero-frame::after{
    content:""; position:absolute; width:26px; height:26px; border:2px solid var(--aura-brass); opacity:.75; z-index:2;
}
.aura-hero-frame::before{ top:0; left:0; border-right:none; border-bottom:none; }
.aura-hero-frame::after{ bottom:0; right:0; border-left:none; border-top:none; }
.aura-hero-frame img{ border-radius:14px; display:block; width:100%; }

.aura-hero-badge{
    position:absolute; left:-1.4rem; bottom:-1.4rem; background:#fff; color:var(--aura-ink);
    border-radius:16px; padding:.9rem 1.25rem; box-shadow:0 22px 40px -12px rgba(0,0,0,.4);
    display:flex; align-items:center; gap:.85rem; z-index:3; max-width:230px;
}
.aura-hero-badge .stars{ color:var(--aura-brass); font-size:1rem; line-height:1; }
.aura-hero-badge strong{ display:block; font-family:'Fraunces',serif; font-size:1.05rem; line-height:1.1; }
.aura-hero-badge small{ color:var(--aura-ink-soft); font-size:.72rem; }

/* ---- Kategori (overlap ke hero, ala sheet melayang) ---- */
.aura-section{ padding:5rem 0; }
.aura-section--greige{
    background:var(--aura-greige);
    margin-top:-2.25rem; position:relative; z-index:2;
    border-radius:32px 32px 0 0;
    box-shadow:0 -25px 45px rgba(0,0,0,.06);
    padding-top:4rem;
}
.aura-section--ivory{ background:var(--aura-ivory); }

/* ---- CATEGORY CARD DENGAN BACKGROUND IMAGE ---- */

.category-card{

    position:relative;

    min-height:220px;

    overflow:hidden;

    border:1px solid rgba(36,26,19,.08);

    border-top:3px solid var(--aura-brass);

    border-radius:var(--aura-radius);

    background:var(--aura-espresso);

    display:flex;

    align-items:center;

    justify-content:center;

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}


/* Gambar background kategori */

.category-card-bg{

    position:absolute;

    inset:0;

    width:100%;

    height:100%;

    object-fit:cover;

    opacity:.35;

    transition:
        transform .5s ease,
        opacity .3s ease;

}


/* Lapisan gelap supaya teks tetap terbaca */

.category-card-overlay{

    position:absolute;

    inset:0;

    background:

        linear-gradient(

            to bottom,

            rgba(34,24,18,.25),

            rgba(34,24,18,.82)

        );

}


/* Isi kartu berada di atas gambar */

.category-card-content{

    position:relative;

    z-index:2;

    width:100%;

    padding:2rem 1rem;

    text-align:center;

}


/* Hover */

.category-card:hover{

    transform:translateY(-8px);

    box-shadow:

        0 28px 50px -20px rgba(198,149,46,.45),

        0 10px 25px -12px rgba(36,26,19,.3);

}


.category-card:hover .category-card-bg{

    transform:scale(1.08);

    opacity:.48;

}


/* Judul kategori */

.category-card h5{

    position:relative;

    color:#fff;

    font-size:1.25rem;

    margin-bottom:.8rem;

    text-shadow:0 2px 8px rgba(0,0,0,.65);

}


/* Jumlah produk */

.category-card .hang-tag{

    background:rgba(244,238,228,.9);

    color:var(--aura-espresso);

}

.aura-empty{ padding:3.5rem 1rem; text-align:center; color:var(--aura-ink-soft); }
.aura-empty i{ color:var(--aura-tan); opacity:.6; }

/* ---- Produk ---- */
.product-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-radius:var(--aura-radius);
    overflow:hidden; transition:transform .22s ease, box-shadow .22s ease;
}
.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 30px 50px -22px rgba(198,149,46,.35), 0 14px 30px -16px rgba(36,26,19,.3);
}
.product-image{ position:relative; overflow:hidden; aspect-ratio:4/3; background:var(--aura-greige); }
.product-image img{ width:100%; height:100%; object-fit:cover; transition:transform .4s ease; }
.product-card:hover .product-image img{ transform:scale(1.06); }
.product-image::after{
    content:""; position:absolute; top:0; left:-65%; width:35%; height:100%;
    background:linear-gradient(115deg, transparent, rgba(255,255,255,.5), transparent);
    transform:skewX(-18deg); transition:left .7s ease; pointer-events:none; z-index:2;
}
.product-card:hover .product-image::after{ left:135%; }

.product-badge-new{
    position:absolute; top:.85rem; left:0; background:var(--aura-espresso); color:var(--aura-brass-light);
    font-family:'JetBrains Mono', monospace; font-size:.68rem; font-weight:600; letter-spacing:.08em;
    padding:.3rem .7rem .3rem .6rem; border-radius:0 999px 999px 0; z-index:3;
}

.product-card .card-body{ padding:1.35rem 1.25rem 1.5rem; }
.product-card h5{ font-size:1.05rem; color:var(--aura-ink); }
.product-price{
    font-family:'JetBrains Mono', monospace; font-size:1.15rem; font-weight:600;
    color:var(--aura-tan); margin-bottom:.6rem !important;
}
.product-stock{ font-size:.82rem; color:var(--aura-ink-soft); margin-bottom:.5rem; }
.product-desc{
    font-size:.88rem; color:var(--aura-ink-soft);
    display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;
    overflow:hidden; word-break:break-word;
}

.btn-aura-card{
    background:var(--aura-espresso); color:#F4EEE4; border:none; border-radius:999px; padding:.65rem 1.2rem;
    font-weight:600; font-size:.92rem; display:flex; align-items:center; justify-content:center; gap:.5rem;
    transition:background .15s ease, gap .15s ease;
}
.btn-aura-card:hover{ background:var(--aura-tan); color:#fff; gap:.7rem; }

/* ---- Kenapa memilih kami ---- */
.aura-why{ background:var(--aura-espresso); color:#F4EEE4; padding-bottom:4rem; }
.aura-why-item{ padding:1.25rem 1rem; text-align:center; position:relative; }
.aura-why-item + .aura-why-item::before{
    content:""; position:absolute; left:0; top:20%; height:60%; border-left:1px dashed rgba(244,238,228,.18);
}
.feature-icon-circle{
    width:76px; height:76px; margin:0 auto .9rem; border-radius:50%;
    background:rgba(198,149,46,.12); border:1px solid rgba(198,149,46,.4);
    display:flex; align-items:center; justify-content:center; font-size:1.9rem;
    transition:.25s ease;
}
.aura-why-item:hover .feature-icon-circle{
    background:var(--aura-brass); transform:scale(1.08) rotate(-6deg);
    box-shadow:0 15px 30px -10px rgba(198,149,46,.6);
}
.aura-why-item h5{ color:#fff; font-size:1.02rem; margin-bottom:.5rem; }
.aura-why-item p{ color:#C7B8A3; font-size:.88rem; margin:0; }

/* ---- Stats (kartu melayang overlap ke section why-us) ---- */
.aura-stats{ background:var(--aura-ivory); padding-top:1.5rem; padding-bottom:5rem; }
.stats-row{ margin-top:-3.25rem; position:relative; z-index:3; }
.stat-card{
    background:#fff; border-radius:18px; padding:2.1rem 1rem; text-align:center;
    box-shadow:0 25px 45px -18px rgba(36,26,19,.25); transition:transform .22s ease, box-shadow .22s ease;
    height:100%;
}
.stat-card:hover{ transform:translateY(-6px); box-shadow:0 30px 55px -18px rgba(198,149,46,.4); }
.stat-icon{ font-size:1.35rem; color:var(--aura-brass); margin-bottom:.6rem; }
.stat-card h2{
    background:linear-gradient(120deg, var(--aura-tan), var(--aura-brass));
    -webkit-background-clip:text; background-clip:text; color:transparent;
    font-size:clamp(1.9rem, 3vw, 2.4rem); font-weight:700; margin-bottom:.1rem;
}
.stat-card p{ color:var(--aura-ink-soft); font-size:.82rem; letter-spacing:.04em; text-transform:uppercase; margin:0; }

/* ---- CTA ---- */
.aura-cta{ padding:1rem 0 7rem; background:var(--aura-ivory); }
.aura-cta-box{
    background:var(--aura-espresso); border:1px dashed var(--aura-brass); border-radius:24px;
    padding:4rem 2rem; text-align:center; color:#fff; position:relative; overflow:hidden;
}
.aura-cta-box::before{
    content:"👜"; position:absolute; font-size:11rem; opacity:.045; right:-1.5rem; bottom:-2rem;
    transform:rotate(-12deg); pointer-events:none; line-height:1;
}
.aura-cta-box > *{ position:relative; z-index:1; }
.aura-cta-box h2{ color:#fff; font-size:clamp(1.6rem,3vw,2.15rem); margin-bottom:.75rem; }
.aura-cta-box p{ color:#C7B8A3; max-width:32rem; margin:0 auto 1.75rem; }

@media (max-width:991px){
    .aura-hero-badge{ position:static; margin-top:1.25rem; display:inline-flex; }
}
@media (max-width:767px){
    .aura-why-item + .aura-why-item::before{ display:none; }
    .aura-hero{ padding:3.5rem 0 3.5rem; text-align:center; }
    .aura-hero .lead{ margin-left:auto; margin-right:auto; }
    .aura-hero-trust{ justify-content:center; }
    .stats-row{ margin-top:2rem; }
}

/* ---- Preview gambar produk ---- */

.product-preview-image{
    cursor:zoom-in;
}

.image-preview-modal{
    background:var(--aura-espresso);
    border:1px solid var(--aura-brass);
    border-radius:18px;
    overflow:hidden;
}

.image-preview-modal .modal-header{
    border-bottom:1px solid rgba(198,149,46,.3);
}

.image-preview-modal .modal-title{
    color:#fff;
}

.image-preview-modal .btn-close{
    filter:invert(1);
}

.preview-image-large{
    max-height:75vh;
    width:auto;
    max-width:100%;
    object-fit:contain;
    border-radius:12px;
}

</style>

<div class="aura-page">

<!-- Hero Banner -->
<section class="aura-hero">

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="hang-tag hang-tag--dark fade-in">Premium Collection</span>

                <h1 class="fade-in d1">
                    Aura Bag <span class="grad-text">Store</span>
                </h1>

                <p class="lead fade-in d2">
                    Temukan koleksi tas terbaik dengan kualitas premium,
                    desain modern, dan harga terbaik — dibuat untuk menemani
                    setiap langkahmu.
                </p>

                <div class="mt-4 d-flex gap-3 flex-wrap fade-in d3">

                    <a href="{{ route('products.index') }}" class="btn-aura-primary">
                        <i class="bi bi-bag"></i>
                        Lihat Koleksi
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="#kategori" class="btn-aura-outline">
                        <i class="bi bi-grid"></i>
                        Jelajahi Kategori
                        <i class="bi bi-arrow-down"></i>
                    </a>

                </div>

                <div class="aura-hero-trust fade-in d4">
                    <span><i class="bi bi-patch-check-fill"></i> 100% Original</span>
                    <span><i class="bi bi-truck"></i> Pengiriman ke seluruh Indonesia</span>
                    <span><i class="bi bi-shield-check"></i> Bergaransi</span>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="aura-hero-frame fade-in d2">
                    <img src="{{ asset('assets/images/banner.png') }}" alt="Banner Aura Bag Store">

                    <div class="aura-hero-badge">
                        <span class="stars">★★★★★</span>
                        <div>
                            <strong>4.9 / 5.0</strong>
                            <small>500+ pelanggan puas</small>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- Kategori -->
<section class="aura-section aura-section--greige" id="kategori">

    <div class="container">

        <div class="text-center">
            <span class="section-eyebrow">Belanja per kebutuhan</span>
            <h2 class="section-title">Kategori Tas</h2>
            <hr class="stitch-divider center">
        </div>

        <div class="row">

            @forelse($categories as $category)

            <div class="col-md-3 mb-4">

                <a href="{{ route('products.index',['category'=>$category->id]) }}" class="text-decoration-none">

                    <div class="card category-card">

                        {{-- GAMBAR BACKGROUND KATEGORI --}}

                        @if($category->icon)

                            <img
                                src="{{ asset('storage/' . $category->icon) }}"
                                alt="{{ $category->name }}"
                                class="category-card-bg">

                        @else

                            <div
                                class="category-card-bg"
                                style="
                                    background:
                                    linear-gradient(
                                        135deg,
                                        var(--aura-espresso-2),
                                        var(--aura-tan)
                                    );
                                ">
                            </div>

                        @endif


                        {{-- OVERLAY TRANSPARAN --}}

                        <div class="category-card-overlay"></div>


                        {{-- ISI KARTU --}}

                        <div class="category-card-content">

                            <h5>

                                {{ $category->name }}

                            </h5>


                            <span class="hang-tag">

                                {{ $category->products_count }} Produk

                            </span>

                        </div>

                    </div>

                </a>

            </div>

            @empty

            <div class="col-12">
                <div class="aura-empty">
                    <i class="bi bi-grid display-1"></i>
                    <h5 class="mt-3">Belum ada kategori</h5>
                    <p class="mb-0">Kategori akan segera tersedia.</p>
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- Produk -->
<section class="aura-section aura-section--ivory" id="produk">

    <div class="container">

        <div class="text-center">
            <span class="section-eyebrow">Baru sampai</span>
            <h2 class="section-title">Produk Terbaru</h2>
            <hr class="stitch-divider center">
            <p class="text-secondary mb-5" style="margin-top:-1.5rem;">
                Menampilkan {{ $products->count() }} produk terbaru
            </p>
        </div>

        <div class="row">

            @forelse($products as $product)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card product-card h-100">

                    <div class="product-image">

                        @if($product->created_at >= now()->subDays(4))
                        <span class="product-badge-new">NEW</span>
                        @endif

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-preview-image"
                            data-bs-toggle="modal"
                            data-bs-target="#imagePreviewModal"
                            data-image="{{ asset('storage/'.$product->image) }}"
                            data-product="{{ $product->name }}">

                    </div>

                    <div class="card-body d-flex flex-column">

                        <span class="hang-tag hang-tag--brass mb-2" style="align-self:flex-start;">
                            {{ $product->category->name }}
                        </span>

                        <h5 class="fw-bold mb-2">
                            {{ $product->name }}
                        </h5>

                        <h4 class="product-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h4>

                        <p class="product-stock">
                            Stok : <span class="fw-bold">{{ $product->stock }}</span>
                        </p>

                        <p class="product-desc">
                            {{ \Illuminate\Support\Str::limit($product->short_description, 100) }}
                        </p>

                        <div class="mt-auto pt-3">

                            <a href="{{ route('products.show', $product->slug) }}" class="btn-aura-card">
                                <i class="bi bi-eye"></i>
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">
                <div class="aura-empty">
                    <i class="bi bi-bag-x display-1"></i>
                    <h4 class="mt-3">Belum ada produk</h4>
                    <p class="mb-0">Produk akan segera tersedia.</p>
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

<!-- Kenapa memilih kami -->
<section class="aura-why py-5">

    <div class="container">

        <div class="text-center mb-5">
            <span class="section-eyebrow" style="color:var(--aura-brass-light);">Kenapa Aura</span>
            <h2 class="fw-bold">Kenapa Memilih Aura Bag Store?</h2>
            <p style="color:#C7B8A3;">
                Kami menghadirkan tas berkualitas dengan desain modern dan pelayanan terbaik.
            </p>
        </div>

        <div class="row g-0">

            <div class="col-md-3 aura-why-item">
                <div class="feature-icon-circle">🚚</div>
                <h5>Pengiriman Cepat</h5>
                <p>Produk dikirim secepat mungkin ke seluruh Indonesia.</p>
            </div>

            <div class="col-md-3 aura-why-item">
                <div class="feature-icon-circle">💎</div>
                <h5>Kualitas Premium</h5>
                <p>Menggunakan bahan pilihan yang kuat dan tahan lama.</p>
            </div>

            <div class="col-md-3 aura-why-item">
                <div class="feature-icon-circle">🛡</div>
                <h5>Garansi Produk</h5>
                <p>Produk rusak? Kami siap membantu proses penggantian.</p>
            </div>

            <div class="col-md-3 aura-why-item">
                <div class="feature-icon-circle">💬</div>
                <h5>Fast Response</h5>
                <p>Tim kami siap menjawab pertanyaan pelanggan setiap hari.</p>
            </div>

        </div>

    </div>

</section>

<!-- Statistik -->
<section class="aura-stats">

    <div class="container">

        <div class="row text-center stats-row g-3">

            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-bag-check-fill"></i></div>
                    <h2>{{ $totalProducts }}+</h2>
                    <p>Produk</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-bookmark-star-fill"></i></div>
                    <h2>{{ $totalCategories }}</h2>
                    <p>Kategori</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-patch-check-fill"></i></div>
                    <h2>100%</h2>
                    <p>Original</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-headset"></i></div>
                    <h2>24/7</h2>
                    <p>Customer Support</p>
                </div>
            </div>

        </div>

    </div>

</section>

{{-- CTA --}}
<section class="aura-cta">

    <div class="container">

        <div class="aura-cta-box">

            <span class="hang-tag hang-tag--solid mb-3" style="display:inline-flex;">Koleksi Lengkap</span>

            <h2>Sudah Menemukan Tas yang Kamu Cari?</h2>

            <p>
                Jelajahi koleksi lengkap Aura Bag Store dan temukan tas
                yang sesuai dengan kebutuhanmu.
            </p>

            <a href="{{ route('products.index') }}" class="btn-aura-primary px-4">
                <i class="bi bi-bag"></i>
                Lihat Semua Produk
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

    </div>

</section>

</div>

{{-- Modal Preview Gambar --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content image-preview-modal">

            <div class="modal-header">

                <h5 class="modal-title" id="imagePreviewTitle">
                    Preview Produk
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body text-center">

                <img
                    id="previewImage"
                    src=""
                    alt="Preview Produk"
                    class="img-fluid preview-image-large">

            </div>

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const previewImages =
        document.querySelectorAll('.product-preview-image');

    const previewImage =
        document.getElementById('previewImage');

    const previewTitle =
        document.getElementById('imagePreviewTitle');

    previewImages.forEach(function (image) {

        image.addEventListener('click', function () {

            previewImage.src =
                this.dataset.image;

            previewImage.alt =
                this.dataset.product;

            previewTitle.textContent =
                this.dataset.product;

        });

    });

});

</script>

@endsection