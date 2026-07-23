@extends('layouts.app')

@section('content')

<style>
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
    --aura-olive:         #6B7A4F;
    --aura-rose:          #A9564B;
    --aura-radius:        14px;
}

.aura-page{ font-family:'Inter', sans-serif; color:var(--aura-ink); background:var(--aura-ivory); }
.aura-page h1,.aura-page h2,.aura-page h3,.aura-page h4,.aura-page h5{ font-family:'Fraunces', serif; letter-spacing:-.01em; }

/* ---- Hang-tag (elemen ciri khas brand) ---- */
.hang-tag{
    display:inline-flex; align-items:center; gap:.45rem;
    padding:.35rem .85rem .35rem .65rem; border-radius:999px;
    font-family:'JetBrains Mono', monospace; font-size:.7rem; font-weight:600;
    letter-spacing:.05em; text-transform:uppercase; line-height:1; white-space:nowrap;
}
.hang-tag::before{ content:""; width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.4; box-shadow:inset 0 0 0 1px currentColor; }
.hang-tag--brass{ background:rgba(198,149,46,.12); color:var(--aura-tan); }
.hang-tag--ok{ background:rgba(107,122,79,.13); color:var(--aura-olive); }
.hang-tag--warn{ background:rgba(198,149,46,.14); color:#8A5A24; }
.hang-tag--danger{ background:rgba(169,86,75,.13); color:var(--aura-rose); }

/* ---- Page hero (band judul gelap) ---- */
.aura-page-hero{

    position:relative;

    overflow:hidden;

    background:
        radial-gradient(
            circle at 85% 20%,
            rgba(198,149,46,.18),
            transparent 45%
        ),
        var(--aura-espresso);

    color:#F4EEE4;

    padding:4rem 0 3rem;

    text-align:center;

}


/* Efek cahaya dekoratif */

.aura-page-hero::before{

    content:"";

    position:absolute;

    width:260px;

    height:260px;

    top:-150px;

    left:-100px;

    border-radius:50%;

    background:rgba(198,149,46,.08);

    filter:blur(30px);

}


/* Judul */

.aura-page-hero h1{

    position:relative;

    color:#fff;

    font-size:clamp(2rem,3.5vw,2.8rem);

    font-weight:700;

    margin-bottom:.55rem;

    text-shadow:
        0 4px 18px rgba(0,0,0,.25);

}


/* Deskripsi */

.aura-page-hero p{

    position:relative;

    color:#C7B8A3;

    margin:0;

    font-size:.98rem;

}

/* ---- Search bar ---- */
.aura-search .form-control{
    border-radius:999px 0 0 999px !important; border:1px solid #E1D6C2; padding:.85rem 1.3rem;
    background:#fff; color:var(--aura-ink);
}
.aura-search .form-control:focus{ box-shadow:none; border-color:var(--aura-brass); }
.btn-brass{
    background:var(--aura-brass); border:1px solid var(--aura-brass); color:var(--aura-espresso);
    font-weight:600; border-radius:999px; padding:.7rem 1.5rem; display:inline-flex; align-items:center; justify-content:center; gap:.5rem;
    transition:.2s;
}
.btn-brass:hover{ background:var(--aura-brass-light); color:var(--aura-espresso); transform:translateY(-2px); }
.btn-ink-outline{
    background:transparent; border:1px solid rgba(36,26,19,.25); color:var(--aura-ink);
    font-weight:600; border-radius:999px; padding:.7rem 1.5rem; display:inline-flex; align-items:center; justify-content:center; gap:.5rem;
    transition:.2s;
}
.btn-ink-outline:hover{ background:var(--aura-espresso); border-color:var(--aura-espresso); color:#fff; transform:translateY(-2px); }

/* ---- Filter sidebar ---- */
.filter-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-top:3px solid var(--aura-brass);
    border-radius:var(--aura-radius); box-shadow:0 10px 25px rgba(36,26,19,.05);
}
.filter-card h5{ font-size:1rem; }
.filter-link{
    display:block; padding:.6rem .9rem; border-radius:10px; color:var(--aura-ink-soft);
    text-decoration:none; font-weight:500; font-size:.92rem; margin-bottom:.25rem; transition:.18s;
}
.filter-link:hover{ background:var(--aura-greige); color:var(--aura-ink); padding-left:1.1rem; }
.filter-link.active{ background:var(--aura-brass); color:var(--aura-espresso); font-weight:600; }

/* ---- Product card (dengan efek shine mewah) ---- */
.product-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-radius:var(--aura-radius);
    overflow:hidden; transition:transform .2s ease, box-shadow .2s ease; height:100%;
}
.product-card:hover{ transform:translateY(-7px); box-shadow:0 24px 45px -20px rgba(36,26,19,.4); }
.product-image{ position:relative; overflow:hidden; aspect-ratio:4/3; background:var(--aura-greige); }
.product-image img{ width:100%; height:100%; object-fit:cover; transition:transform .4s ease; }
.product-card:hover .product-image img{ transform:scale(1.06); }
.product-image::after{
    content:""; position:absolute; top:0; left:-65%; width:35%; height:100%;
    background:linear-gradient(115deg, transparent, rgba(255,255,255,.55), transparent);
    transform:skewX(-18deg); transition:left .7s ease; pointer-events:none; z-index:2;
}
.product-card:hover .product-image::after{ left:135%; }
.product-badge{
    position:absolute; top:.85rem; left:0; background:var(--aura-espresso); color:var(--aura-brass-light);
    font-family:'JetBrains Mono', monospace; font-size:.66rem; font-weight:600; letter-spacing:.08em;
    padding:.3rem .7rem .3rem .6rem; border-radius:0 999px 999px 0; z-index:3;
}
.product-card .card-body{ padding:1.3rem 1.2rem 1.5rem; }
.product-card h5{ font-size:1.02rem; color:var(--aura-ink); }
.product-price{ font-family:'JetBrains Mono', monospace; font-size:1.1rem; font-weight:600; color:var(--aura-tan); }
.product-description{ font-size:.85rem; color:var(--aura-ink-soft); }
.btn-aura-card{
    background:var(--aura-espresso); color:#F4EEE4; border:none; border-radius:999px; padding:.65rem 1.2rem;
    font-weight:600; font-size:.92rem; display:flex; align-items:center; justify-content:center; gap:.5rem;
    transition:background .15s ease, gap .15s ease; width:100%;
}
.btn-aura-card:hover{ background:var(--aura-tan); color:#fff; gap:.7rem; }
/* ===================================================
   PAGINATION — AURA BAG STORE
=================================================== */
.pagination{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    margin-top:20px;

}

/* Setiap item */

.pagination .page-item{

    margin:0;

}

/* Tombol pagination */

.pagination .page-link{

    width:42px;

    height:42px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:var(--aura-ink-soft);

    background:rgba(255,255,255,.75);

    border:1px solid rgba(198,149,46,.25);

    border-radius:50%;

    font-family:'JetBrains Mono', monospace;

    font-size:.85rem;

    font-weight:600;

    transition:

        transform .25s ease,

        background .25s ease,

        color .25s ease,

        border-color .25s ease,

        box-shadow .25s ease;

}

/* Hover */

.pagination .page-link:hover{

    color:var(--aura-espresso);

    background:rgba(198,149,46,.12);

    border-color:var(--aura-brass);

    transform:translateY(-3px);

    box-shadow:

        0 8px 18px rgba(198,149,46,.18);

}

/* Halaman aktif */

.pagination .page-item.active .page-link,

.pagination .active > .page-link{

    color:var(--aura-espresso);

    background:var(--aura-brass);

    border-color:var(--aura-brass);

    box-shadow:

        0 8px 20px rgba(198,149,46,.35);

    transform:translateY(-2px);

}

/* Tombol sebelumnya dan berikutnya */

.pagination .page-item:first-child .page-link,

.pagination .page-item:last-child .page-link{

    color:var(--aura-tan);

    background:transparent;

    border-color:rgba(198,149,46,.3);

}

/* Hover tombol arah */

.pagination .page-item:first-child .page-link:hover,

.pagination .page-item:last-child .page-link:hover{

    color:var(--aura-espresso);

    background:var(--aura-brass);

    border-color:var(--aura-brass);

}

/* Disabled dan titik-titik */

.pagination .page-item.disabled .page-link{

    color:#B8AA9A;

    background:transparent;

    border-color:rgba(36,26,19,.1);

    box-shadow:none;

    transform:none;

    cursor:default;

}

/* Fokus */

.pagination .page-link:focus{

    color:var(--aura-espresso);

    background:rgba(198,149,46,.12);

    border-color:var(--aura-brass);

    box-shadow:0 0 0 .2rem rgba(198,149,46,.2);

}

/* Informasi pagination */

.pagination-info{

    color:var(--aura-ink-soft);

    font-size:.88rem;

    letter-spacing:.01em;

}

.pagination-info strong{

    color:var(--aura-ink);

    font-weight:700;

}

.aura-empty i{ color:var(--aura-tan); opacity:.6; }
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
    <section class="aura-page-hero">
        <div class="container">
            <span
                class="hang-tag mb-3"
                style="
                    background:rgba(255,255,255,.1);
                    color:var(--aura-brass-light);
                ">
                Koleksi Aura
            </span>
            <h1>Jelajahi {{ $products->total() }} pilihan tas untuk melengkapi gayamu.</h1>
        </div>
    </section>

    <div class="container py-5">

        {{-- Search --}}
        <form action="{{ route('products.index') }}" method="GET" class="mb-5 aura-search">

            @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if(request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
            @endif

            <div class="row g-2">

                <div class="col-md-9 col-12">
                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="Cari produk..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3 col-12 d-flex gap-2">
                    <button type="submit" class="btn-brass flex-fill">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                    <a href="{{ route('products.index') }}" class="btn-ink-outline flex-fill">
                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset
                    </a>
                </div>

            </div>

        </form>

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-lg-3 mb-4">

                {{-- Kategori --}}
                <div class="filter-card mb-4">
                    <div class="p-4">

                        <h5 class="fw-bold mb-3">Kategori</h5>

                        <a href="{{ route('products.index') }}"
                            class="filter-link {{ request('category') == '' ? 'active' : '' }}">
                            Semua Produk
                        </a>

                        @foreach($categories as $category)

                        <a href="{{ route('products.index',[
                            'category'=>$category->id,
                            'search'=>request('search'),
                            'sort'=>request('sort')
                        ]) }}"
                            class="filter-link {{ request('category') == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>

                        @endforeach

                    </div>
                </div>

                {{-- Sorting --}}
                <div class="filter-card">
                    <div class="p-4">

                        <h5 class="fw-bold mb-3">Urutkan</h5>

                        <a href="{{ route('products.index',[
                            'sort'=>'latest',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="filter-link {{ request('sort') == 'latest' || request('sort') == '' ? 'active' : '' }}">
                            Terbaru
                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'low',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="filter-link {{ request('sort') == 'low' ? 'active' : '' }}">
                            Harga Terendah
                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'high',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="filter-link {{ request('sort') == 'high' ? 'active' : '' }}">
                            Harga Tertinggi
                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'name',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="filter-link {{ request('sort') == 'name' ? 'active' : '' }}">
                            Nama A-Z
                        </a>

                    </div>
                </div>

            </div>

            {{-- Produk --}}
            <div class="col-lg-9">

                <div class="row">

                    @forelse($products as $product)

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card product-card">

                            <div class="product-image">

                                @if($product->created_at >= now()->subDays(4))
                                <span class="product-badge">NEW</span>
                                @endif

                                @if($product->image)

                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    loading="lazy"
                                    alt="{{ $product->name }}"
                                    class="product-preview-image"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imagePreviewModal"
                                    data-image="{{ asset('storage/'.$product->image) }}"
                                    data-product="{{ $product->name }}">

                                @else

                                <img
                                    src="https://placehold.co/600x400?text=No+Image"
                                    loading="lazy"
                                    alt="No Image"
                                    class="product-preview-image"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imagePreviewModal"
                                    data-image="https://placehold.co/600x400?text=No+Image"
                                    data-product="No Image">

                                @endif

                            </div>

                            <div class="card-body d-flex flex-column">

                                <span class="hang-tag hang-tag--brass mb-2" style="align-self:flex-start;">
                                    {{ $product->category->name }}
                                </span>

                                <h5 class="fw-bold">
                                    {{ \Illuminate\Support\Str::limit($product->name,25) }}
                                </h5>

                                <h4 class="product-price">
                                    Rp {{ number_format($product->price,0,',','.') }}
                                </h4>

                                <p class="small text-secondary mb-2">
                                    Stok : {{ $product->stock }}
                                </p>

                                @if($product->stock > 10)

                                    <span class="hang-tag hang-tag--ok mb-2" style="align-self:flex-start;">
                                        <i class="bi bi-check-circle-fill"></i> Stok Banyak
                                    </span>

                                @elseif($product->stock > 0)

                                    <span class="hang-tag hang-tag--warn mb-2" style="align-self:flex-start;">
                                        <i class="bi bi-exclamation-triangle-fill"></i> Stok Terbatas
                                    </span>

                                @else

                                    <span class="hang-tag hang-tag--danger mb-2" style="align-self:flex-start;">
                                        <i class="bi bi-x-circle-fill"></i> Stok Habis
                                    </span>

                                @endif

                                <p class="product-description">
                                    {{ Str::limit($product->short_description, 60) }}
                                </p>

                                <div class="mt-auto pt-3">

                                    <a href="{{ route('products.show',$product->slug) }}" class="btn-aura-card">
                                        <i class="bi bi-eye"></i>
                                        Lihat Detail
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="col-12">

                        <div class="aura-empty text-center py-5">

                            <i class="bi bi-bag-x display-1 text-secondary"></i>

                            <h4 class="mt-3">
                                Produk tidak ditemukan
                            </h4>

                            <p class="text-muted">
                                Coba ubah kata kunci pencarian atau filter kategori.
                            </p>

                        </div>

                    </div>

                    @endforelse

                </div>

                <div class="mt-4 d-flex justify-content-center">

                    {{ $products->links('vendor.pagination.bootstrap-5') }}

                </div>

            </div>

        </div>

    </div>

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