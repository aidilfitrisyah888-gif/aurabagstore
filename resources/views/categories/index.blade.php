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

.category-card{
    background:#fff; border:none; border-top:3px solid var(--aura-brass); border-radius:18px;
    height:100%; transition:transform .22s ease, box-shadow .22s ease; overflow:hidden; position:relative;
}
.category-card:hover{ transform:translateY(-8px); box-shadow:0 26px 45px -22px rgba(36,26,19,.4); }
.category-card::before{
    content:""; position:absolute; right:-40px; top:-40px; width:130px; height:130px;
    border-radius:50%; background:rgba(198,149,46,.07); pointer-events:none;
}
.category-icon-wrap{
    width:96px; height:96px; margin:0 auto 1.1rem; border-radius:50%;
    background:linear-gradient(160deg, var(--aura-greige), #fff);
    display:flex; align-items:center; justify-content:center; font-size:2.6rem;
    box-shadow:inset 0 0 0 1px rgba(198,149,46,.25);
    transition:transform .25s ease;
}
.category-card:hover .category-icon-wrap{ transform:rotate(-8deg) scale(1.06); }
.category-card h4{ font-size:1.25rem; margin-bottom:.35rem; }
.category-card .category-desc{ color:var(--aura-ink-soft); font-size:.9rem; margin-bottom:1.25rem; }

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

                    <div class="card-body text-center p-4 py-5">

                        <div class="category-icon-wrap">
                            👜
                        </div>

                        <h4 class="fw-bold">
                            {{ $category->name }}
                        </h4>

                        <p class="category-desc">
                            {{ $category->products_count }} Produk tersedia
                        </p>

                        <a href="{{ route('products.index',['category'=>$category->id]) }}"
                            class="btn-aura-card">
                            <i class="bi bi-bag"></i>
                            Lihat Produk
                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

@endsection