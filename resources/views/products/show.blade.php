@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('products.index') }}">Produk</a>
            </li>

            <li class="breadcrumb-item active">

                {{ $product->name }}

            </li>

        </ol>

    </nav>

</div>

<div class="container my-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-body p-5">

    <div class="row">

        <div class="col-lg-6">

            @if($product->image)

                <img src="{{ asset('storage/' . $product->image) }}"
                    class="img-fluid rounded-4 shadow w-100"
                    style="height:500px; object-fit:cover;"
                    alt="{{ $product->name }}">

            @else

                <img src="https://placehold.co/700x500?text=No+Image"
                    class="img-fluid rounded-4 shadow w-100"
                    alt="No Image">

            @endif

        </div>

        <div class="col-lg-6 mb-4 mb-lg-0">

            <span class="badge rounded-pill bg-warning text-dark px-3 py-2 mb-3">
                {{ $product->category->name }}
            </span>
            <hr>

            <h1 class="fw-bold">
                {{ $product->name }}
            </h1>

            <div class="mb-3">

            <span class="text-warning fs-5">
                ★★★★★
            </span>

            <span class="text-secondary">
                (5.0 • 120 Terjual)
            </span>

            </div>

            <h2 class="text-success my-3">
                Rp {{ number_format($product->price,0,',','.') }}
            </h2>

            <p>
                <strong>Stok :</strong>
                {{ $product->stock }}
            </p>

            @if($product->stock > 0)

                <span class="badge bg-success">
                    ✅ Tersedia
                </span>

            @else

                <span class="badge bg-danger">
                    ❌ Habis
                </span>

            @endif

                <div class="card bg-light border-0 mt-4 mb-4">

                    <div class="card-body">

                <h5 class="fw-bold mb-3">
                    Informasi Produk
                </h5>

                <p class="mb-2">
                    📂 Kategori :
                    <strong>{{ $product->category->name }}</strong>
                </p>

                <p class="mb-2">
                    📦 Stok :
                    <strong>{{ $product->stock }}</strong>
                </p>

                <p class="mb-0">
                    🚚 Pengiriman :
                    Seluruh Indonesia
                </p>

    </div>

</div>
            <hr>

            <h5>Deskripsi Produk</h5>

            <p>
                {{ $product->description }}
            </p>

                    <div class="card border-0 bg-light mb-4">

            <div class="card-body">

                <h5 class="fw-bold mb-3">

                    Kenapa Memilih Produk Ini?

                </h5>

                <ul class="mb-0">

                    <li>✅ Produk Original</li>

                    <li>✅ Material Berkualitas Premium</li>

                    <li>✅ Packing Aman</li>

                    <li>✅ Siap Kirim Seluruh Indonesia</li>

                </ul>

            </div>

        </div>

                <div class="card border-0 bg-white shadow-sm mb-4">

            <div class="card-body">

                <h5 class="fw-bold">

                    Spesifikasi

                </h5>

                <table class="table">

                    <tr>

                        <th width="35%">Kategori</th>

                        <td>{{ $product->category->name }}</td>

                    </tr>

                    <tr>

                        <th>Material</th>

                        <td>Premium Polyester</td>

                    </tr>

                    <tr>

                        <th>Ukuran</th>

                        <td>45 x 30 x 18 cm</td>

                    </tr>

                    <tr>

                        <th>Warna</th>

                        <td>Menyesuaikan Varian</td>

                    </tr>

                    <tr>

                        <th>Garansi</th>

                        <td>7 Hari</td>

                    </tr>

                </table>

            </div>

        </div>

                <div class="alert alert-success">

            <h5>

                🚚 Informasi Pengiriman

            </h5>

            <ul class="mb-0">

                <li>Pengiriman maksimal 1 x 24 jam.</li>

                <li>Dikirim dari Kota Bandung.</li>

                <li>Produk dikemas dengan bubble wrap.</li>

                <li>Mendukung pengiriman ke seluruh Indonesia.</li>

            </ul>

        </div>

            <a href="{{ $product->shopee_link }}"
                target="_blank"
                class="btn btn-success btn-lg w-100 mb-3">

                🛒 Beli Sekarang di Shopee

            </a>

            <a href="{{ route('products.index') }}"
                class="btn btn-outline-dark btn-lg w-100">

                ← Kembali ke Produk

            </a>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>

    <hr class="my-5">

    <h3 class="fw-bold text-center mb-4">

        Produk Terkait

    </h3>

    <div class="row">

    @forelse($relatedProducts as $related)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card h-100 shadow-sm">

            @if($related->image)

                <img
                    src="{{ asset('storage/' . $related->image) }}"
                    class="card-img-top"
                    style="height:250px; object-fit:cover;"
                    alt="{{ $related->name }}">

            @else

                <img
                    src="https://placehold.co/600x400?text=No+Image"
                    class="card-img-top"
                    alt="No Image">

            @endif

            <div class="card-body d-flex flex-column">

                <span class="badge bg-warning text-dark mb-2">

                    {{ $related->category->name }}

                </span>

                <h5>

                    {{ $related->name }}

                </h5>

                <h4 class="text-success">

                    Rp {{ number_format($related->price,0,',','.') }}

                </h4>

                <div class="mt-auto">

                    <a
                        href="{{ route('products.show',$related->slug) }}"
                        class="btn btn-dark w-100">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-secondary text-center">

            Belum ada produk terkait.

        </div>

    </div>

    @endforelse

    </div>

@endsection