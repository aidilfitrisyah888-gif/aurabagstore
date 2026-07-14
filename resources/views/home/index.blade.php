@extends('layouts.app')

@section('content')

<!-- Hero Banner -->
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <p class="text-warning fw-bold">

                PREMIUM COLLECTION

                </p>

                <h1 class="display-3 fw-bold">

                    Aura Bag Store

                </h1>

                <p class="lead mt-4">

                    Temukan koleksi tas terbaik
                    dengan kualitas premium,
                    desain modern,
                    dan harga terbaik.

                </p>

                <a href="#produk"
                    class="btn btn-warning btn-lg mt-3">

                    🛍 Belanja Sekarang

                </a>

            </div>

            <div class="col-lg-6 text-center">

                <img src="{{ asset('assets/images/banner.png') }}"
                    class="img-fluid rounded-4 shadow"
                    alt="Aura Bag Store">

            </div>

        </div>

    </div>

</section>

<!-- Kategori -->
<section class="container my-5">

    <h2 class="section-title text-center">

        Kategori Tas

    </h2>

    <div class="row">

        @foreach($categories as $category)

        <div class="col-md-3 mb-4">

            <a href="{{ route('products.index',['category'=>$category->id]) }}"
                class="text-decoration-none text-dark">

            <div class="card category-card text-center p-4 h-100">

                @if($category->icon)

                    <img
                        src="{{ asset('storage/' . $category->icon) }}"
                        alt="{{ $category->name }}"
                        class="mx-auto mb-3"
                        style="width:70px; height:70px; object-fit:contain;">

                @else

                    <h4 class="category-icon">👜</h4>

                @endif

                <h5 class="fw-bold">

                    {{ $category->name }}

                </h5>

            </div>

    </a>

        </div>

        @endforeach

    </div>

</section>

<!-- Produk -->
<section class="container mt-5 mb-5" id="produk">

    <h2 class="mb-4 text-center">
        Produk Terbaru
    </h2>

    <p class="text-center text-secondary mb-5">
    Menampilkan {{ $products->count() }} produk terbaru
    </p>

    <div class="row">

        @forelse($products as $product)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card product-card h-100">

                <div class="product-image">

                    <span class="badge bg-danger product-badge">
                        NEW
                    </span>

                <img
                    src="{{ asset('storage/'.$product->image) }}"
                    class="card-img-top"
                    alt="{{ $product->name }}">

            </div>

                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2 mb-2">

                        {{ $product->category->name }}

                    </span>
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mt-2 mb-3">
                        {{ $product->name }}
                    </h5>

                    <h4 class="text-success fw-bold mb-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </h4>

                    <p class="small text-secondary">
                        Stok :
                    <span class="fw-bold">

                    {{ $product->stock }}

                    </span>
                    </p>

                    <p class="text-secondary">
                        {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    </p>

                    <div class="mt-auto">

                        <a href="{{ route('products.show', $product->slug) }}"
                            class="btn btn-dark w-100 product-btn">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

    <div class="alert alert-warning text-center">

    Belum ada produk.

    </div>

</div>

@endforelse

    </div>

</section>

<div class="text-center mb-5">

    <a href="{{ route('products.index') }}"
        class="btn btn-outline-dark btn-lg px-5">

        Lihat Semua Produk →

    </a>

</div>

<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Kenapa Memilih Aura Bag Store?
            </h2>

            <p class="text-muted">
                Kami menghadirkan tas berkualitas dengan desain modern dan pelayanan terbaik.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <div class="feature-box">

                    <div class="feature-icon">
                        🚚
                    </div>

                    <h5>Pengiriman Cepat</h5>

                    <p>
                        Produk dikirim secepat mungkin ke seluruh Indonesia.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-box">

                    <div class="feature-icon">
                        💎
                    </div>

                    <h5>Kualitas Premium</h5>

                    <p>
                        Menggunakan bahan pilihan yang kuat dan tahan lama.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-box">

                    <div class="feature-icon">
                        🛡
                    </div>

                    <h5>Garansi Produk</h5>

                    <p>
                        Produk rusak? Kami siap membantu proses penggantian.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-box">

                    <div class="feature-icon">
                        💬
                    </div>

                    <h5>Fast Response</h5>

                    <p>
                        Tim kami siap menjawab pertanyaan pelanggan setiap hari.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-5 bg-light">

    <div class="container">

        <div class="row text-center">

            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-warning">{{ $totalProducts }}+</h2>
                <p class="text-muted">Produk</p>
            </div>

            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-warning">{{ $totalCategories }}</h2>
                <p class="text-muted">Kategori</p>
            </div>

            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-warning">100%</h2>
                <p class="text-muted">Original</p>
            </div>

            <div class="col-md-3 mb-4">
                <h2 class="fw-bold text-warning">24/7</h2>
                <p class="text-muted">Customer Support</p>
            </div>

        </div>

    </div>

</section>

@endsection