@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

:root{
    --aura-espresso:      #221812;
    --aura-espresso-2:    #2E2019;
    --aura-brass:         #C6952E;
    --aura-brass-light:   #E3B85C;
    --aura-tan:           #9C6B45;
    --aura-ivory:         #F4EEE4;
    --aura-greige:        #EAE2D3;
    --aura-ink:           #241A13;
    --aura-ink-soft:      #6B5C4C;
    --aura-olive:         #6B7A4F;
    --aura-rose:          #A9564B;
}

.aura-page{ font-family:'Inter', sans-serif; color:var(--aura-ink); background:var(--aura-ivory); }
.aura-page h1,.aura-page h2,.aura-page h3,.aura-page h4,.aura-page h5{ font-family:'Fraunces', serif; letter-spacing:-.01em; }

/* ---- Hang-tag ---- */
.hang-tag{
    display:inline-flex; align-items:center; gap:.45rem;
    padding:.4rem .9rem .4rem .7rem; border-radius:999px;
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.05em; text-transform:uppercase; line-height:1; white-space:nowrap;
}
.hang-tag::before{ content:""; width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.4; box-shadow:inset 0 0 0 1px currentColor; }
.hang-tag--brass{ background:rgba(198,149,46,.12); color:var(--aura-tan); }
.hang-tag--ok{ background:rgba(107,122,79,.13); color:var(--aura-olive); }
.hang-tag--warn{ background:rgba(198,149,46,.14); color:#8A5A24; }
.hang-tag--danger{ background:rgba(169,86,75,.13); color:var(--aura-rose); }

/* ---- Breadcrumb ---- */
.aura-breadcrumb{ background:transparent; padding:0; margin:0; }
.aura-breadcrumb a{ color:var(--aura-ink-soft); text-decoration:none; font-size:.88rem; }
.aura-breadcrumb a:hover{ color:var(--aura-tan); }
.aura-breadcrumb .breadcrumb-item.active{ color:var(--aura-ink); font-size:.88rem; }
.aura-breadcrumb .breadcrumb-item + .breadcrumb-item::before{ color:var(--aura-tan); }

/* ---- Kartu detail utama ---- */
.aura-detail-card{
    background:#fff; border:none; border-radius:22px; border-top:4px solid var(--aura-brass);
    box-shadow:0 25px 55px -25px rgba(36,26,19,.35);
}

.aura-detail-frame{
    position:relative; padding:.9rem; border-radius:20px;
    background:linear-gradient(160deg, rgba(198,149,46,.28), rgba(198,149,46,.04));
}
.aura-detail-frame::before,
.aura-detail-frame::after{
    content:""; position:absolute; width:24px; height:24px; border:2px solid var(--aura-brass); opacity:.75; z-index:2;
}
.aura-detail-frame::before{ top:0; left:0; border-right:none; border-bottom:none; }
.aura-detail-frame::after{ bottom:0; right:0; border-left:none; border-top:none; }
.aura-detail-frame img{ border-radius:14px; display:block; }

.aura-rating{ color:var(--aura-brass); letter-spacing:.15em; }

.aura-price-label{ font-size:.82rem; color:var(--aura-ink-soft); text-transform:uppercase; letter-spacing:.06em; margin-bottom:.15rem; }
.aura-price{ font-family:'JetBrains Mono', monospace; font-size:2.1rem; font-weight:700; color:var(--aura-tan); }

/* ---- Info produk ala "paspor" tas ---- */
.product-passport{
    background:var(--aura-ivory);
    border:1px dashed rgba(198,149,46,.5);
    border-radius:16px;
}
.product-passport h5{ font-size:1rem; }
.product-passport p{ font-size:.92rem; margin-bottom:.6rem; display:flex; align-items:center; gap:.55rem; }
.product-passport i{ color:var(--aura-brass); width:1.1rem; text-align:center; }

/* ---- Tombol ---- */
.btn-aura-primary{
    background:var(--aura-brass); border:1px solid var(--aura-brass); color:var(--aura-espresso);
    font-weight:600; padding:.85rem 1.6rem; border-radius:999px; display:inline-flex; align-items:center;
    justify-content:center; gap:.55rem; transition:.2s; width:100%;
}
.btn-aura-primary:hover{ background:var(--aura-brass-light); color:var(--aura-espresso); transform:translateY(-2px); }
.btn-aura-primary:disabled{ opacity:.55; transform:none; cursor:not-allowed; }

.btn-aura-danger{
    background:var(--aura-rose); border:1px solid var(--aura-rose); color:#fff;
    font-weight:600; padding:.85rem 1.6rem; border-radius:999px; display:inline-flex; align-items:center;
    justify-content:center; gap:.55rem; width:100%;
}

.btn-ink-outline{
    background:transparent; border:1px solid rgba(36,26,19,.25); color:var(--aura-ink);
    font-weight:600; border-radius:999px; padding:.8rem 1.5rem; display:inline-flex; align-items:center;
    justify-content:center; gap:.55rem; transition:.2s; width:100%;
}
.btn-ink-outline:hover{ background:var(--aura-espresso); border-color:var(--aura-espresso); color:#fff; }

/* ---- Produk terkait ---- */
.section-title{ font-size:clamp(1.4rem,2vw,1.9rem); font-weight:600; }
.stitch-divider{ border:none; border-top:2px dashed rgba(198,149,46,.35); margin:.75rem auto 2.25rem; width:56px; }

.product-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-radius:14px; overflow:hidden;
    transition:transform .2s ease, box-shadow .2s ease; height:100%;
}
.product-card:hover{ transform:translateY(-6px); box-shadow:0 22px 40px -20px rgba(36,26,19,.35); }
.product-image{ position:relative; overflow:hidden; aspect-ratio:4/3; background:var(--aura-greige); }
.product-image img{ width:100%; height:100%; object-fit:cover; transition:transform .4s ease; }
.product-card:hover .product-image img{ transform:scale(1.06); }
.product-badge{
    position:absolute; top:.75rem; left:0; background:var(--aura-espresso); color:var(--aura-brass-light);
    font-family:'JetBrains Mono', monospace; font-size:.64rem; font-weight:600; letter-spacing:.08em;
    padding:.28rem .65rem .28rem .55rem; border-radius:0 999px 999px 0; z-index:2;
}
.product-card .card-body{ padding:1.2rem 1.1rem 1.4rem; }
.product-price-sm{ font-family:'JetBrains Mono', monospace; font-weight:600; color:var(--aura-tan); }
.btn-aura-card{
    background:var(--aura-espresso); color:#F4EEE4; border:none; border-radius:999px; padding:.6rem 1.1rem;
    font-weight:600; font-size:.9rem; display:flex; align-items:center; justify-content:center; gap:.5rem; width:100%;
    transition:background .15s ease;
}
.btn-aura-card:hover{ background:var(--aura-tan); color:#fff; }
</style>

<div class="aura-page">

<div class="container mt-4">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb aura-breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">Produk</a>
            </li>

            <li class="breadcrumb-item active">

                {{ \Illuminate\Support\Str::limit($product->name,25) }}

            </li>

        </ol>

    </nav>

</div>

<div class="container my-5">

    <div class="card aura-detail-card">

        <div class="card-body p-4 p-lg-5">

    <div class="row g-5">

        <div class="col-lg-6">

            <div class="aura-detail-frame">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="img-fluid w-100"
                        style="height:480px;object-fit:cover;"
                        alt="{{ $product->name }}">

                @else

                    <img
                        src="https://placehold.co/700x500?text=No+Image"
                        class="img-fluid w-100"
                        alt="No Image">

                @endif

            </div>

        </div>

        <div class="col-lg-6">

            <span class="hang-tag hang-tag--brass mb-3">
                {{ $product->category->name }}
            </span>

            <h1 class="fw-bold mt-3">
                {{ $product->name }}
            </h1>

            <div class="mb-4">
                <span class="aura-rating">★★★★★</span>
                <span class="text-muted ms-1">Produk Baru</span>
            </div>

            <p class="aura-price-label mb-0">Harga</p>
            <h2 class="aura-price mb-3">
                Rp {{ number_format($product->price,0,',','.') }}
            </h2>

            <p class="mb-3">
                <strong>Stok :</strong>
                {{ $product->stock }}
            </p>

            @if($product->stock > 10)

                <span class="hang-tag hang-tag--ok mb-4">
                    <i class="bi bi-check-circle-fill"></i> Stok Banyak
                </span>

            @elseif($product->stock > 0)

                <span class="hang-tag hang-tag--warn mb-4">
                    <i class="bi bi-exclamation-triangle-fill"></i> Stok Terbatas
                </span>

            @else

                <span class="hang-tag hang-tag--danger mb-4">
                    <i class="bi bi-x-circle-fill"></i> Stok Habis
                </span>

            @endif

            <div class="product-passport p-4 mt-4 mb-4">

                <h5 class="fw-bold mb-3">Informasi Produk</h5>

                <p>
                    <i class="bi bi-bookmark-fill"></i>
                    <strong>Kategori :</strong>
                    {{ $product->category->name }}
                </p>

                <p>
                    <i class="bi bi-truck"></i>
                    <strong>Pengiriman :</strong>
                    Seluruh Indonesia
                </p>

                <p>
                    <i class="bi bi-shield-check"></i>
                    <strong>Garansi :</strong>
                    7 Hari
                </p>

                <p class="mb-0">
                    <i class="bi bi-box-seam-fill"></i>
                    <strong>Kondisi :</strong>
                    Baru
                </p>

            </div>

            <hr>

            <h5>Deskripsi Produk</h5>

                @if($product->description)

                    <p class="text-secondary">
                        {{ $product->description }}
                    </p>

                @else

                    <p class="text-muted">
                        Belum ada deskripsi produk.
                    </p>

                @endif

            <div class="mt-4">

            @if($product->stock > 0)

                @if($product->shopee_link)

                    <a
                        href="{{ $product->shopee_link }}"
                        target="_blank"
                        class="btn-aura-primary mb-3">

                        <i class="bi bi-cart3"></i>
                        Beli Sekarang di Shopee

                    </a>

                @else

                    <button class="btn-aura-primary mb-3" disabled>
                        <i class="bi bi-shop"></i>
                        Link Shopee Belum Tersedia
                    </button>

                @endif

            @else

                <button class="btn-aura-danger mb-3" disabled>
                    <i class="bi bi-x-circle"></i>
                    Produk Sedang Habis
                </button>

            @endif

            <a href="{{ route('products.index') }}" class="btn-ink-outline">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Produk
            </a>

            </div>

        </div>
    </div>
        </div>
    </div>
</div>

    <hr class="my-5">

    <div class="container mb-5">

        <div class="text-center">
            <h3 class="section-title">Produk Terkait</h3>
            <hr class="stitch-divider">
        </div>

    <div class="row">

    @forelse($relatedProducts as $related)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card product-card">

            <div class="product-image">

            @if($related->created_at >= now()->subDays(4))
            <span class="product-badge">NEW</span>
            @endif

            @if($related->image)

                <img
                src="{{ asset('storage/'.$related->image) }}"
                alt="{{ $related->name }}">

            @else

                <img
                src="https://placehold.co/600x400?text=No+Image"
                alt="No Image">

            @endif

            </div>

            <div class="card-body d-flex flex-column">

                <span class="hang-tag hang-tag--brass mb-2" style="align-self:flex-start;">
                    {{ $related->category->name }}
                </span>

                <h5 class="fw-bold">
                    {{ \Illuminate\Support\Str::limit($related->name,25) }}
                </h5>

                <h5 class="product-price-sm">
                    Rp {{ number_format($related->price,0,',','.') }}
                </h5>

                <p class="small text-secondary mb-2">
                    Stok : {{ $related->stock }}
                </p>

                @if($related->stock > 10)

                    <span class="hang-tag hang-tag--ok mb-2" style="align-self:flex-start;">
                        <i class="bi bi-check-circle-fill"></i> Stok Banyak
                    </span>

                @elseif($related->stock > 0)

                    <span class="hang-tag hang-tag--warn mb-2" style="align-self:flex-start;">
                        <i class="bi bi-exclamation-triangle-fill"></i> Stok Terbatas
                    </span>

                @else

                    <span class="hang-tag hang-tag--danger mb-2" style="align-self:flex-start;">
                        <i class="bi bi-x-circle-fill"></i> Stok Habis
                    </span>

                @endif

                <div class="mt-auto pt-2">

                    <a href="{{ route('products.show',$related->slug) }}" class="btn-aura-card">
                        Lihat Detail
                    </a>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert text-center" style="background:var(--aura-greige); color:var(--aura-ink-soft); border-radius:12px;">

            Belum ada produk terkait.

        </div>

    </div>

    @endforelse

    </div> {{-- row --}}

</div> {{-- container --}}

</div>

@endsection