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
    --aura-olive:         #6B7A4F;
    --aura-olive-dark:    #4E5A38;
    --aura-rose:          #A9564B;
    --aura-rose-dark:     #7E3A32;
    --aura-radius:        14px;
}

.aura-page{ font-family:'Inter', sans-serif; color:var(--aura-ink); background:var(--aura-ivory); }
.aura-page h1,.aura-page h2,.aura-page h3,.aura-page h4,.aura-page h5{ font-family:'Fraunces', serif; letter-spacing:-.01em; }

.section-eyebrow{
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.14em; text-transform:uppercase; color:var(--aura-tan);
    display:block; margin-bottom:.4rem;
}
.section-title{ font-size:clamp(1.6rem, 2.4vw, 2.1rem); font-weight:600; color:var(--aura-ink); margin:0; }

.hang-tag{
    display:inline-flex; align-items:center; gap:.45rem;
    padding:.35rem .85rem .35rem .65rem; border-radius:999px;
    font-family:'JetBrains Mono', monospace; font-size:.72rem; font-weight:600;
    letter-spacing:.05em; text-transform:uppercase; line-height:1; white-space:nowrap;
    background:rgba(198,149,46,.12); color:var(--aura-tan);
}
.hang-tag::before{ content:""; width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.4; box-shadow:inset 0 0 0 1px currentColor; }

/* ---- Page hero ---- */
.aura-page-hero{
    background:radial-gradient(circle at 85% 20%, rgba(198,149,46,.16), transparent 45%), var(--aura-espresso);
    color:#F4EEE4; padding:3.25rem 0 2.5rem;
}
.aura-page-hero .section-eyebrow{ color:var(--aura-brass-light); }
.aura-page-hero h1{ color:#fff; font-size:clamp(1.9rem,3.2vw,2.5rem); font-weight:700; margin-bottom:0; }

/* ---- Tombol ---- */
.btn-ink-outline{
    background:transparent; border:1px solid rgba(36,26,19,.25); color:var(--aura-ink);
    font-weight:600; border-radius:999px; padding:.65rem 1.35rem; display:inline-flex; align-items:center;
    justify-content:center; gap:.5rem; transition:.2s;
}
.btn-ink-outline:hover{ background:var(--aura-espresso); border-color:var(--aura-espresso); color:#fff; transform:translateY(-2px); }

.btn-brass{
    background:var(--aura-brass); border:1px solid var(--aura-brass); color:var(--aura-espresso);
    font-weight:600; border-radius:999px; padding:.75rem 1.6rem; display:inline-flex; align-items:center; justify-content:center; gap:.5rem;
    transition:.2s;
}
.btn-brass:hover{ background:var(--aura-brass-light); color:var(--aura-espresso); transform:translateY(-2px); }

.btn-olive{
    background:var(--aura-olive); border:1px solid var(--aura-olive); color:#fff;
    font-weight:600; border-radius:999px; padding:.65rem 1.1rem; display:inline-flex; align-items:center; justify-content:center; gap:.5rem;
    width:100%; transition:.2s;
}
.btn-olive:hover{ background:var(--aura-olive-dark); border-color:var(--aura-olive-dark); color:#fff; transform:translateY(-2px); }

.btn-muted{
    background:var(--aura-greige); border:1px solid rgba(36,26,19,.12); color:var(--aura-ink-soft);
    font-weight:600; border-radius:999px; padding:.65rem 1.1rem; width:100%; cursor:not-allowed;
}

.btn-rose-outline{
    background:transparent; border:1px solid rgba(169,86,75,.45); color:var(--aura-rose);
    font-weight:600; border-radius:999px; padding:.65rem 1.1rem; width:100%; display:inline-flex;
    align-items:center; justify-content:center; gap:.5rem; transition:.2s;
}
.btn-rose-outline:hover{ background:var(--aura-rose); border-color:var(--aura-rose); color:#fff; transform:translateY(-2px); }

/* ---- Alert ---- */
.aura-alert-success{
    background:rgba(107,122,79,.12); border:1px solid rgba(107,122,79,.35); color:var(--aura-olive-dark);
    border-radius:12px; padding:.9rem 1.2rem;
}

/* ---- Kartu item keranjang ---- */
.cart-item-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-top:3px solid var(--aura-brass);
    border-radius:var(--aura-radius); box-shadow:0 10px 25px rgba(36,26,19,.05);
    transition:transform .18s ease, box-shadow .18s ease;
}
.cart-item-card:hover{ transform:translateY(-3px); box-shadow:0 18px 32px -14px rgba(36,26,19,.25); }
.cart-item-card img{ border-radius:10px; aspect-ratio:1/1; object-fit:cover; width:100%; }
.cart-item-card h5{ color:var(--aura-ink); font-size:1.05rem; }
.cart-item-price{ font-family:'JetBrains Mono', monospace; font-weight:600; color:var(--aura-tan); }

/* ---- Ringkasan ---- */
.summary-card{
    background:#fff; border:1px solid rgba(36,26,19,.06); border-top:3px solid var(--aura-brass);
    border-radius:var(--aura-radius); box-shadow:0 10px 25px rgba(36,26,19,.05);
}
.summary-card hr{ border-color:rgba(36,26,19,.08); }
.summary-row{ display:flex; justify-content:space-between; align-items:center; }
.summary-row strong{ font-family:'JetBrains Mono', monospace; color:var(--aura-ink); }

/* ---- Empty state ---- */
.aura-empty{ padding:4.5rem 1rem; text-align:center; color:var(--aura-ink-soft); }
.aura-empty i{ color:var(--aura-tan); opacity:.55; }
</style>

<div class="aura-page">

    <section class="aura-page-hero">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <span class="section-eyebrow">Shopping Bag</span>
                <h1>Keranjang Belanja</h1>
            </div>

            <a href="{{ route('products.index') }}" class="btn-ink-outline" style="border-color:rgba(244,238,228,.4); color:#F4EEE4;">
                <i class="bi bi-arrow-left"></i>
                Lanjut Belanja
            </a>
        </div>
    </section>

    <div class="container py-5">

        @if(session('success'))

            <div class="aura-alert-success mb-4">
                {{ session('success') }}
            </div>

        @endif

        @if(count($cart) > 0)

            <div class="row g-4">

                <div class="col-lg-8">

                    @foreach($cart as $item)

                        <div class="card cart-item-card mb-3">

                            <div class="card-body">

                                <div class="row align-items-center g-4">

                                    {{-- GAMBAR --}}
                                    <div class="col-md-2">

                                        @if($item['image'])

                                            <img
                                                src="{{ asset('storage/' . $item['image']) }}"
                                                alt="{{ $item['name'] }}">

                                        @else

                                            <img
                                                src="https://placehold.co/150x150?text=No+Image"
                                                alt="No Image">

                                        @endif

                                    </div>

                                    {{-- INFORMASI PRODUK --}}
                                    <div class="col-md-4">

                                        <h5 class="mb-1 fw-bold">
                                            {{ $item['name'] }}
                                        </h5>

                                        <p class="cart-item-price mb-0">
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>

                                    </div>

                                    {{-- TOMBOL BELI DI SHOPEE --}}
                                    <div class="col-md-3">

                                        @if(!empty($item['shopee_link']))

                                            <a
                                                href="{{ $item['shopee_link'] }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="btn-olive">

                                                <i class="bi bi-cart3"></i>
                                                Beli di Shopee

                                            </a>

                                        @else

                                            <button class="btn-muted" disabled>
                                                Link Shopee Belum Tersedia
                                            </button>

                                        @endif

                                    </div>

                                    {{-- HAPUS --}}
                                    <div class="col-md-3">

                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn-rose-outline">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- RINGKASAN --}}
                <div class="col-lg-4">

                    <div class="card summary-card">

                        <div class="card-body p-4">

                            <h4 class="fw-bold mb-4">Produk Tersimpan</h4>

                            <div class="summary-row mb-3">
                                <span class="text-secondary">Total Produk</span>
                                <strong>{{ count($cart) }}</strong>
                            </div>

                            <hr>

                            <p class="text-secondary small">
                                Produk yang kamu simpan di sini dapat dibeli kapan saja melalui Shopee.
                            </p>

                            <form action="{{ route('cart.clear') }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="btn-rose-outline">
                                    <i class="bi bi-trash"></i>
                                    Kosongkan Keranjang
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="aura-empty">

                <i class="bi bi-cart-x display-1"></i>

                <h3 class="mt-3">Keranjang masih kosong</h3>

                <p class="text-secondary">Yuk mulai belanja produk favoritmu.</p>

                <a href="{{ route('products.index') }}" class="btn-brass mt-2">
                    <i class="bi bi-bag"></i>
                    Lihat Produk
                </a>

            </div>

        @endif

    </div>

</div>

@endsection