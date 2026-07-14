@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="py-5 bg-light">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">

            Tentang Aura Bag Store

        </h1>

        <p class="lead text-muted">

            Menyediakan berbagai tas berkualitas dengan desain modern,
            harga terjangkau, dan pelayanan terbaik.

        </p>

    </div>

</section>

<!-- Cerita -->
<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img src="{{ asset('assets/images/about.jpg') }}"
                    class="img-fluid rounded-4 shadow"
                    alt="Tentang Aura Bag Store">

            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Siapa Kami?

                </h2>

                <p>

                    Aura Bag Store merupakan toko yang menyediakan berbagai
                    jenis tas berkualitas premium untuk kebutuhan sekolah,
                    kuliah, kerja maupun travelling.

                </p>

                <p>

                    Kami berkomitmen memberikan produk terbaik dengan kualitas,
                    harga, dan pelayanan yang memuaskan pelanggan.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- Visi Misi -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="card border-0 shadow h-100">

                    <div class="card-body">

                        <h3>🎯 Visi</h3>

                        <p>

                            Menjadi toko tas terpercaya dengan produk
                            berkualitas dan pelayanan terbaik di Indonesia.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card border-0 shadow h-100">

                    <div class="card-body">

                        <h3>🚀 Misi</h3>

                        <ul>

                            <li>Menyediakan produk berkualitas.</li>

                            <li>Harga kompetitif.</li>

                            <li>Pelayanan cepat.</li>

                            <li>Kepuasan pelanggan.</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Statistik -->
<section class="py-5">

    <div class="container">

        <div class="row text-center">

            <div class="col-md-4">

                <h1 class="fw-bold text-warning">

                    {{ $totalProducts }}+

                </h1>

                <h5>Produk</h5>

            </div>

            <div class="col-md-4">

                <h1 class="fw-bold text-warning">

                    {{ $totalCategories }}

                </h1>

                <h5>Kategori</h5>

            </div>

            <div class="col-md-4">

                <h1 class="fw-bold text-warning">

                    100%

                </h1>

                <h5>Kepuasan Pelanggan</h5>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-5 bg-dark text-white">

    <div class="container text-center">

        <h2 class="fw-bold">

            Temukan Tas Favoritmu Sekarang

        </h2>

        <p>

            Jelajahi koleksi Aura Bag Store dan temukan tas yang sesuai
            dengan kebutuhanmu.

        </p>

        <a href="{{ route('products.index') }}"
            class="btn btn-warning btn-lg">

            Lihat Semua Produk

        </a>

    </div>

</section>

@endsection