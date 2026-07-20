@extends('layouts.app')

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

:root{
    --aura-espresso:      #221812;
    --aura-brass:         #C6952E;
    --aura-brass-light:   #E3B85C;
    --aura-tan:           #9C6B45;
    --aura-ivory:         #F4EEE4;
    --aura-greige:        #EAE2D3;
    --aura-ink:           #241A13;
    --aura-ink-soft:      #6B5C4C;
}

.aura-page{ font-family:'Inter', sans-serif; color:var(--aura-ink); background:var(--aura-ivory); }
.aura-page h1,.aura-page h2,.aura-page h4{ font-family:'Fraunces', serif; letter-spacing:-.01em; }

.hang-tag{
    display:inline-flex; align-items:center; gap:.45rem;
    padding:.35rem .85rem .35rem .65rem; border-radius:999px;
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.05em; text-transform:uppercase; line-height:1; white-space:nowrap;
    background:rgba(198,149,46,.12); color:var(--aura-tan);
}
.hang-tag::before{ content:""; width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.4; box-shadow:inset 0 0 0 1px currentColor; }

.aura-page-hero{
    background:radial-gradient(circle at 85% 20%, rgba(198,149,46,.16), transparent 45%), var(--aura-espresso);
    color:#F4EEE4; padding:4rem 0 3rem; text-align:center;
}
.aura-page-hero h1{ color:#fff; font-size:clamp(2rem,3.5vw,2.8rem); font-weight:700; margin-bottom:.5rem; }
.aura-page-hero p{ color:#C7B8A3; margin:0; }

/* =========================================================
   CATEGORY CARD — BACKGROUND IMAGE
   ========================================================= */

.category-card{

    position:relative;

    min-height:300px;

    overflow:hidden;

    border:1px solid rgba(36,26,19,.08);

    border-top:3px solid var(--aura-brass);

    border-radius:18px;

    background:var(--aura-espresso);

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}


/* Gambar kategori sebagai background */

.category-card-bg{

    position:absolute;

    inset:0;

    width:100%;

    height:100%;

    object-fit:cover;

    opacity:.38;

    transition:
        transform .5s ease,
        opacity .3s ease;

}


/* Overlay agar teks tetap jelas */

.category-card-overlay{

    position:absolute;

    inset:0;

    background:
        linear-gradient(
            to bottom,
            rgba(34,24,18,.2),
            rgba(34,24,18,.88)
        );

}


/* Isi kartu */

.category-card-content{

    position:relative;

    z-index:2;

    min-height:300px;

    padding:2rem 1.25rem;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    text-align:center;

}


/* Hover card */

.category-card:hover{

    transform:translateY(-8px);

    box-shadow:
        0 28px 50px -20px rgba(198,149,46,.45),
        0 10px 25px -12px rgba(36,26,19,.3);

}


.category-card:hover .category-card-bg{

    transform:scale(1.08);

    opacity:.52;

}


/* Judul kategori */

.category-card h4{

    color:#fff;

    font-size:1.35rem;

    margin-bottom:.5rem;

    text-shadow:0 2px 8px rgba(0,0,0,.7);

}


/* Jumlah produk */

.category-card .category-desc{

    color:#F4EEE4;

    font-size:.9rem;

    margin-bottom:1.25rem;

    text-shadow:0 2px 6px rgba(0,0,0,.6);

}

.btn-aura-card{
    background:var(--aura-espresso); color:#F4EEE4; border:none; border-radius:999px; padding:.65rem 1.6rem;
    font-weight:600; font-size:.92rem; display:inline-flex; align-items:center; justify-content:center; gap:.5rem;
    transition:background .15s ease, gap .15s ease;
}
.btn-aura-card:hover{ background:var(--aura-tan); color:#fff; gap:.7rem; }
</style>

<div class="aura-page">

    <section class="aura-page-hero">
        <div class="container">
            <span class="hang-tag mb-3" style="background:rgba(255,255,255,.1); color:var(--aura-brass-light);">Jelajahi</span>
            <h1>Semua Kategori</h1>
            <p>Pilih kategori tas favoritmu.</p>
        </div>
    </section>

    <div class="container py-5">

        <div class="row">

            @foreach($categories as $category)

            <div class="col-lg-4 col-md-6 mb-4">

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
                                    var(--aura-espresso),
                                    var(--aura-tan)
                                );
                            ">
                        </div>

                    @endif


                    {{-- OVERLAY --}}

                    <div class="category-card-overlay"></div>


                    {{-- ISI CARD --}}

                    <div class="category-card-content">

                        <h4 class="fw-bold">
                            {{ $category->name }}
                        </h4>

                        <p class="category-desc">
                            {{ $category->products_count }} Produk tersedia
                        </p>

                        <a
                            href="{{ route('products.index',['category'=>$category->id]) }}"
                            class="btn-aura-card">

                            <i class="bi bi-bag"></i>

                            Lihat Produk

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection