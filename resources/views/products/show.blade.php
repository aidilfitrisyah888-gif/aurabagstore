@extends('layouts.app')

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');


:root{

    --aura-espresso: #221812;
    --aura-espresso-2: #2E2019;
    --aura-brass: #C6952E;
    --aura-brass-light: #E3B85C;
    --aura-tan: #9C6B45;
    --aura-ivory: #F4EEE4;
    --aura-greige: #EAE2D3;
    --aura-ink: #241A13;
    --aura-ink-soft: #6B5C4C;
    --aura-olive: #6B7A4F;
    --aura-rose: #A9564B;

}


/* =========================
   PAGE
========================= */

.aura-page{

    font-family: 'Inter', sans-serif;
    color: var(--aura-ink);
    background: var(--aura-ivory);

    min-height: 100vh;

}


.aura-page h1,
.aura-page h2,
.aura-page h3,
.aura-page h4,
.aura-page h5{

    font-family: 'Fraunces', serif;
    letter-spacing: -.01em;

}


/* =========================
   BREADCRUMB
========================= */

.aura-breadcrumb{

    background: transparent;
    padding: 0;
    margin: 0;

}


.aura-breadcrumb a{

    color: var(--aura-ink-soft);
    text-decoration: none;
    font-size: .88rem;

}


.aura-breadcrumb a:hover{

    color: var(--aura-tan);

}


.aura-breadcrumb .breadcrumb-item.active{

    color: var(--aura-ink);
    font-size: .88rem;

}


.aura-breadcrumb .breadcrumb-item + .breadcrumb-item::before{

    color: var(--aura-tan);

}


/* =========================
   HANG TAG
========================= */

.hang-tag{

    display: inline-flex;
    align-items: center;
    gap: .45rem;

    padding: .4rem .9rem .4rem .7rem;

    border-radius: 999px;

    font-family: 'JetBrains Mono', monospace;
    font-size: .72rem;
    font-weight: 600;

    letter-spacing: .05em;
    text-transform: uppercase;

    line-height: 1;

    white-space: nowrap;

}


.hang-tag::before{

    content: "";

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: currentColor;

    opacity: .4;

    box-shadow: inset 0 0 0 1px currentColor;

}


.hang-tag--brass{

    background: rgba(198,149,46,.12);
    color: var(--aura-tan);

}


.hang-tag--ok{

    background: rgba(107,122,79,.13);
    color: var(--aura-olive);

}


.hang-tag--warn{

    background: rgba(198,149,46,.14);
    color: #8A5A24;

}


.hang-tag--danger{

    background: rgba(169,86,75,.13);
    color: var(--aura-rose);

}


/* =========================
   DETAIL CARD
========================= */

.aura-detail-card{

    background: #fff;

    border: none;

    border-radius: 22px;

    border-top: 4px solid var(--aura-brass);

    box-shadow: 0 25px 55px -25px rgba(36,26,19,.35);

}


/* =========================
   IMAGE GALLERY
========================= */

.aura-detail-frame{

    position: relative;

    padding: .9rem;

    border-radius: 20px;

    background:

        linear-gradient(

            160deg,

            rgba(198,149,46,.28),

            rgba(198,149,46,.04)

        );

}


.aura-detail-frame::before,
.aura-detail-frame::after{

    content: "";

    position: absolute;

    width: 24px;
    height: 24px;

    border: 2px solid var(--aura-brass);

    opacity: .75;

    z-index: 2;

}


.aura-detail-frame::before{

    top: 0;
    left: 0;

    border-right: none;
    border-bottom: none;

}


.aura-detail-frame::after{

    bottom: 0;
    right: 0;

    border-left: none;
    border-top: none;

}


.aura-detail-frame img{

    display: block;

    width: 100%;

    height: 480px;

    object-fit: cover;

    border-radius: 14px;

}


/* =========================
   THUMBNAIL
========================= */

.thumbnail-wrapper{

    display: flex;

    gap: .75rem;

    margin-top: 1rem;

    overflow-x: auto;

    padding-bottom: .35rem;

}


.product-thumbnail{

    flex: 0 0 auto;

    width: 82px;
    height: 82px;

    object-fit: cover;

    border-radius: 10px;

    cursor: pointer;

    border: 3px solid transparent;

    transition: .2s ease;

}


.product-thumbnail:hover{

    transform: translateY(-3px);

}


.product-thumbnail.active{

    border-color: var(--aura-brass);

    box-shadow: 0 0 0 3px rgba(198,149,46,.15);

    transform: translateY(-3px);

}


.thumbnail-label{

    font-size: .72rem;

    color: var(--aura-ink-soft);

}


/* =========================
   RATING
========================= */

.aura-rating{

    color: var(--aura-brass);

    letter-spacing: .15em;

}


/* =========================
   PRICE
========================= */

.aura-price-label{

    font-size: .82rem;

    color: var(--aura-ink-soft);

    text-transform: uppercase;

    letter-spacing: .06em;

    margin-bottom: .15rem;

}


.aura-price{

    font-family: 'JetBrains Mono', monospace;

    font-size: 2.1rem;

    font-weight: 700;

    color: var(--aura-tan);

}


/* =========================
   PRODUCT PASSPORT
========================= */

.product-passport{

    background: var(--aura-ivory);

    border: 1px dashed rgba(198,149,46,.5);

    border-radius: 16px;

}


.product-passport h5{

    font-size: 1rem;

}


.product-passport p{

    font-size: .92rem;

    margin-bottom: .7rem;

    display: flex;

    align-items: flex-start;

    gap: .55rem;

}


.product-passport i{

    color: var(--aura-brass);

    width: 1.1rem;

    text-align: center;

    margin-top: .15rem;

}


.product-passport strong{

    margin-right: .25rem;

}


/* =========================
   DESCRIPTION
========================= */

.product-description{

    line-height: 1.8;

    white-space: normal;

}


.short-description{

    font-size: 1.05rem;

    line-height: 1.7;

}


/* =========================
   BUTTON
========================= */

.btn-aura-primary{

    background: var(--aura-brass);

    border: 1px solid var(--aura-brass);

    color: var(--aura-espresso);

    font-weight: 600;

    padding: .85rem 1.6rem;

    border-radius: 999px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: .55rem;

    transition: .2s;

    width: 100%;

    text-decoration: none;

}


.btn-aura-primary:hover{

    background: var(--aura-brass-light);

    color: var(--aura-espresso);

    transform: translateY(-2px);

}


.btn-aura-danger{

    background: var(--aura-rose);

    border: 1px solid var(--aura-rose);

    color: #fff;

    font-weight: 600;

    padding: .85rem 1.6rem;

    border-radius: 999px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: .55rem;

    width: 100%;

}


.btn-ink-outline{

    background: transparent;

    border: 1px solid rgba(36,26,19,.25);

    color: var(--aura-ink);

    font-weight: 600;

    border-radius: 999px;

    padding: .8rem 1.5rem;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: .55rem;

    transition: .2s;

    width: 100%;

    text-decoration: none;

}


.btn-ink-outline:hover{

    background: var(--aura-espresso);

    border-color: var(--aura-espresso);

    color: #fff;

}


/* =========================
   SECTION
========================= */

.section-title{

    font-size: clamp(1.4rem, 2vw, 1.9rem);

    font-weight: 600;

}


.stitch-divider{

    border: none;

    border-top: 2px dashed rgba(198,149,46,.35);

    margin: .75rem auto 2.25rem;

    width: 56px;

}


/* =========================
   RELATED PRODUCT
========================= */

.product-card{

    background: #fff;

    border: 1px solid rgba(36,26,19,.06);

    border-radius: 14px;

    overflow: hidden;

    transition:

        transform .2s ease,

        box-shadow .2s ease;

    height: 100%;

}


.product-card:hover{

    transform: translateY(-6px);

    box-shadow: 0 22px 40px -20px rgba(36,26,19,.35);

}


.product-image{

    position: relative;

    overflow: hidden;

    aspect-ratio: 4 / 3;

    background: var(--aura-greige);

}


.product-image img{

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: transform .4s ease;

}


.product-card:hover .product-image img{

    transform: scale(1.06);

}


.product-badge{

    position: absolute;

    top: .75rem;

    left: 0;

    background: var(--aura-espresso);

    color: var(--aura-brass-light);

    font-family: 'JetBrains Mono', monospace;

    font-size: .64rem;

    font-weight: 600;

    letter-spacing: .08em;

    padding: .28rem .65rem .28rem .55rem;

    border-radius: 0 999px 999px 0;

    z-index: 2;

}


.product-card .card-body{

    padding: 1.2rem 1.1rem 1.4rem;

}


.product-price-sm{

    font-family: 'JetBrains Mono', monospace;

    font-weight: 600;

    color: var(--aura-tan);

}


.btn-aura-card{

    background: var(--aura-espresso);

    color: var(--aura-ivory);

    border: none;

    border-radius: 999px;

    padding: .6rem 1.1rem;

    font-weight: 600;

    font-size: .9rem;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: .5rem;

    width: 100%;

    transition: background .15s ease;

    text-decoration: none;

}


.btn-aura-card:hover{

    background: var(--aura-tan);

    color: #fff;

}


/* =========================
   MOBILE
========================= */

@media(max-width: 768px){

    .aura-detail-frame img{

        height: 360px;

    }


    .aura-price{

        font-size: 1.7rem;

    }


    .aura-page h1{

        font-size: 1.8rem;

    }


    .product-thumbnail{

        width: 70px;

        height: 70px;

    }

}

.image-preview-modal .modal-header{

    border-bottom: 1px solid rgba(198,149,46,.3);

}


.image-preview-modal .modal-title{

    color: #fff;

}


.image-preview-modal .btn-close{

    filter: invert(1);

}

.image-preview-content{

    background: var(--aura-espresso);

    border: 1px solid var(--aura-brass);

    border-radius: 18px;

    overflow: hidden;

}

.image-preview-content .modal-header{

    border-bottom: 1px solid rgba(198,149,46,.3);

}


.image-preview-content .modal-title{

    color: #fff;

}

.image-preview-content .btn-close{

    filter: invert(1);

}


.preview-image-large{

    max-height: 75vh;

    width: auto;

    max-width: 100%;

    object-fit: contain;

    border-radius: 12px;

}

.product-preview-trigger{

    cursor: zoom-in;

    transition: transform .3s ease;

}

.product-preview-trigger:hover{

    transform: scale(1.015);

}

.related-preview-trigger{

    cursor: zoom-in;

    transition: transform .3s ease;

}

.related-preview-trigger:hover{

    transform: scale(1.03);

}

</style>


<div class="aura-page">
    {{-- =========================
        DETAIL PRODUK
    ========================= --}}

    <div class="container my-5">

        <div class="card aura-detail-card">

            <div class="card-body p-4 p-lg-5">

                <div class="row g-5">


                    {{-- =========================
                        GALERI PRODUK
                    ========================= --}}

                    <div class="col-lg-6">

                        <div class="aura-detail-frame">

                            @if($product->images->count())

                                <img
                                    id="mainProductImage"
                                    src="{{ asset('storage/'.$product->images->first()->image) }}"
                                    alt="{{ $product->name }}"
                                    class="product-preview-trigger"
                                    data-image="{{ asset('storage/'.$product->images->first()->image) }}"
                                    data-name="{{ $product->name }}">

                            @else

                                <img
                                    id="mainProductImage"
                                    src="https://placehold.co/700x500?text=No+Image"
                                    alt="No Image"
                                    class="product-preview-trigger"
                                    data-image="https://placehold.co/700x500?text=No+Image"
                                    data-name="No Image">

                            @endif

                        </div>


                        @if($product->images->count() > 1)

                            <div class="thumbnail-wrapper">

                                @foreach($product->images as $image)

                                    <div class="text-center">

                                        <img

                                            src="{{ asset('storage/'.$image->image) }}"

                                            class="product-thumbnail
                                            {{ $loop->first ? 'active' : '' }}"

                                            data-image="{{ asset('storage/'.$image->image) }}"

                                            alt="{{ $product->name }}">


                                        @if($loop->first)

                                            <div class="thumbnail-label mt-1">

                                                Utama

                                            </div>

                                        @endif

                                    </div>

                                @endforeach

                            </div>

                        @endif

                    </div>


                    {{-- =========================
                        INFORMASI PRODUK
                    ========================= --}}

                    <div class="col-lg-6">


                        <span class="hang-tag hang-tag--brass mb-3">

                            {{ $product->category->name }}

                        </span>


                        <h1 class="fw-bold mt-3">

                            {{ $product->name }}

                        </h1>


                        <div class="mb-4">

                            <span class="hang-tag hang-tag--brass">

                                ✦ Produk Baru

                            </span>

                        </div>


                        <p class="aura-price-label mb-0">

                            Harga

                        </p>


                        <h2 class="aura-price mb-3">

                            Rp {{ number_format($product->price, 0, ',', '.') }}

                        </h2>


                        <p class="mb-3">

                            <strong>Stok:</strong>

                            {{ $product->stock }}

                        </p>


                        @if($product->stock > 10)

                            <span class="hang-tag hang-tag--ok mb-4">

                                <i class="bi bi-check-circle-fill"></i>

                                Stok Banyak

                            </span>

                        @elseif($product->stock > 0)

                            <span class="hang-tag hang-tag--warn mb-4">

                                <i class="bi bi-exclamation-triangle-fill"></i>

                                Stok Terbatas

                            </span>

                        @else

                            <span class="hang-tag hang-tag--danger mb-4">

                                <i class="bi bi-x-circle-fill"></i>

                                Stok Habis

                            </span>

                        @endif


                        {{-- =========================
                            INFORMASI PRODUK
                        ========================= --}}

                        <div class="product-passport p-4 mt-4 mb-4">


                            <h5 class="fw-bold mb-3">

                                Informasi Produk

                            </h5>


                            <p>

                                <i class="bi bi-bookmark-fill"></i>

                                <strong>Kategori:</strong>

                                {{ $product->category->name }}

                            </p>


                            <p>

                                <i class="bi bi-palette-fill"></i>

                                <strong>Motif:</strong>

                                {{ $product->motif }}

                            </p>


                            <p>

                                <i class="bi bi-layers-fill"></i>

                                <strong>Bahan:</strong>

                                {{ $product->bahan }}

                            </p>


                            <p>

                                <i class="bi bi-rulers"></i>

                                <strong>Ukuran:</strong>

                                {{ $product->ukuran }}

                            </p>


                            <p>

                                <i class="bi bi-truck"></i>

                                <strong>Pengiriman:</strong>

                                Seluruh Indonesia

                            </p>


                            <p class="mb-0">

                                <i class="bi bi-box-seam-fill"></i>

                                <strong>Kondisi:</strong>

                                Baru

                            </p>


                        </div>


                        {{-- =========================
                            TOMBOL
                        ========================= --}}

                        <div class="mt-4">


                            @if($product->stock > 0)


                                @if($product->shopee_link)

                                    <a

                                        href="{{ $product->shopee_link }}"

                                        target="_blank"

                                        rel="noopener noreferrer"

                                        class="btn-aura-primary mb-3">


                                        <i class="bi bi-cart3"></i>

                                        Beli Sekarang di Shopee


                                    </a>

                                @else

                                    <button

                                        class="btn-aura-primary mb-3"

                                        disabled>


                                        <i class="bi bi-shop"></i>

                                        Link Shopee Belum Tersedia


                                    </button>

                                @endif


                            @else

                                <button

                                    class="btn-aura-danger mb-3"

                                    disabled>


                                    <i class="bi bi-x-circle"></i>

                                    Produk Sedang Habis


                                </button>

                            @endif


                            <a

                                href="{{ route('products.index') }}"

                                class="btn-ink-outline">


                                <i class="bi bi-arrow-left"></i>

                                Kembali ke Produk


                            </a>


                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        DESKRIPSI & SPESIFIKASI
    ========================= --}}

    <div class="container mb-5">

        <div class="row g-4">


            {{-- DESKRIPSI --}}

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">


                        <h3 class="section-title mb-3">

                            Deskripsi Produk

                        </h3>


                        @if($product->short_description)

                            <p class="short-description text-secondary">

                                {{ $product->short_description }}

                            </p>

                        @endif


                        @if($product->long_description)

                            <div class="product-description text-secondary">

                                {!! nl2br(e($product->long_description)) !!}

                            </div>

                        @else

                            <p class="text-muted">

                                Belum ada deskripsi produk.

                            </p>

                        @endif


                    </div>

                </div>

            </div>


            {{-- SPESIFIKASI --}}

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">


                        <h3 class="section-title mb-3">

                            Spesifikasi

                        </h3>


                        <div class="product-passport p-3">


                            <p>

                                <i class="bi bi-palette-fill"></i>

                                <strong>Motif:</strong>

                                {{ $product->motif }}

                            </p>


                            <p>

                                <i class="bi bi-layers-fill"></i>

                                <strong>Bahan:</strong>

                                {{ $product->bahan }}

                            </p>


                            <p class="mb-0">

                                <i class="bi bi-rulers"></i>

                                <strong>Ukuran:</strong>

                                {{ $product->ukuran }}

                            </p>


                        </div>


                    </div>

                </div>

            </div>


        </div>

    </div>


    {{-- =========================
        PRODUK TERKAIT
    ========================= --}}

    <hr class="my-5">


    <div class="container mb-5">


        <div class="text-center">

            <h3 class="section-title">

                Produk Terkait

            </h3>


            <hr class="stitch-divider">

        </div>


        <div class="row">


            @forelse($relatedProducts as $related)


                <div class="col-lg-4 col-md-6 mb-4">


                    <div class="card product-card">


                        <div class="product-image">


                            @if($related->created_at >= now()->subDays(4))

                                <span class="product-badge">

                                    NEW

                                </span>

                            @endif


                            @if($related->image)

                                <img
                                    src="{{ asset('storage/'.$related->image) }}"
                                    alt="{{ $related->name }}"
                                    class="related-preview-trigger"
                                    data-image="{{ asset('storage/'.$related->image) }}"
                                    data-name="{{ $related->name }}">

                            @else

                                <img
                                    src="https://placehold.co/600x400?text=No+Image"
                                    alt="No Image"
                                    class="related-preview-trigger"
                                    data-image="https://placehold.co/600x400?text=No+Image"
                                    data-name="No Image">

                            @endif


                        </div>


                        <div class="card-body d-flex flex-column">


                            <span

                                class="hang-tag hang-tag--brass mb-2"

                                style="align-self:flex-start;">


                                {{ $related->category->name }}


                            </span>


                            <h5 class="fw-bold">


                                {{ \Illuminate\Support\Str::limit($related->name, 25) }}


                            </h5>


                            <h5 class="product-price-sm">


                                Rp {{ number_format($related->price, 0, ',', '.') }}


                            </h5>


                            <p class="small text-secondary mb-2">


                                Stok: {{ $related->stock }}


                            </p>


                            @if($related->stock > 10)


                                <span

                                    class="hang-tag hang-tag--ok mb-2"

                                    style="align-self:flex-start;">


                                    <i class="bi bi-check-circle-fill"></i>

                                    Stok Banyak


                                </span>


                            @elseif($related->stock > 0)


                                <span

                                    class="hang-tag hang-tag--warn mb-2"

                                    style="align-self:flex-start;">


                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    Stok Terbatas


                                </span>


                            @else


                                <span

                                    class="hang-tag hang-tag--danger mb-2"

                                    style="align-self:flex-start;">


                                    <i class="bi bi-x-circle-fill"></i>

                                    Stok Habis


                                </span>


                            @endif


                            <div class="mt-auto pt-2">


                                <a

                                    href="{{ route('products.show', $related->slug) }}"

                                    class="btn-aura-card">


                                    Lihat Detail


                                </a>


                            </div>


                        </div>


                    </div>


                </div>


            @empty


                <div class="col-12">


                    <div

                        class="alert text-center"

                        style="

                            background:var(--aura-greige);

                            color:var(--aura-ink-soft);

                            border-radius:12px;

                        ">


                        Belum ada produk terkait.


                    </div>


                </div>


            @endforelse


        </div>


    </div>


</div>

{{-- IMAGE PREVIEW MODAL --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content image-preview-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Preview Produk
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup">
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

    const mainImage =
        document.getElementById('mainProductImage');

    const thumbnails =
        document.querySelectorAll('.product-thumbnail');


    thumbnails.forEach(function (thumbnail) {

        thumbnail.addEventListener('click', function () {

            const imageUrl = this.dataset.image;


            // Ganti gambar utama

            mainImage.src = imageUrl;

            mainImage.dataset.image = imageUrl;

            mainImage.dataset.name = thumbnail.alt;


            // Ganti thumbnail aktif

            thumbnails.forEach(function (item) {

                item.classList.remove('active');

            });

            this.classList.add('active');

        });

    });


    // Preview gambar utama

    const previewTriggers =
        document.querySelectorAll(
            '.product-preview-trigger, .related-preview-trigger'
        );

    const previewImage =
        document.getElementById('previewImage');

    const previewModal =
        new bootstrap.Modal(
            document.getElementById('imagePreviewModal')
        );


    previewTriggers.forEach(function (image) {

        image.addEventListener('click', function () {

            previewImage.src = this.dataset.image;

            previewImage.alt = this.dataset.name;

            previewModal.show();

        });

    });

});

</script>

@endsection