@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            <i class="bi bi-box-seam text-primary"></i>

            Detail Produk

        </h2>

        <p class="text-muted mb-0">

            Informasi lengkap produk Aura Bag Store

        </p>

    </div>


    <div class="d-flex gap-2">

        <a
            href="{{ route('admin.products.edit', $product) }}"
            class="btn btn-primary">

            <i class="bi bi-pencil-square"></i>

            Edit

        </a>


        <a
            href="{{ route('admin.products.index') }}"
            class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

</div>


<div class="row g-4">


    {{-- =========================
        GALERI GAMBAR
    ========================= --}}

    <div class="col-lg-5">

        <div class="card admin-card">

            <div class="card-header admin-card-header fw-bold">

                <i class="bi bi-images text-primary me-2"></i>

                Galeri Produk

            </div>


            <div class="card-body">


                {{-- Gambar Utama --}}

                @php
                    $mainImage = $product->images
                        ->sortBy('sort_order')
                        ->first();
                @endphp


                @if($mainImage)

                    <div class="mb-3">

                        <img
                            src="{{ asset('storage/'.$mainImage->image) }}"
                            class="img-fluid rounded shadow-sm w-100"
                            style="height:320px; object-fit:cover;">

                    </div>

                @else

                    <div class="text-center py-5">

                        <i class="bi bi-image display-1 text-secondary"></i>

                        <p class="text-muted mt-3">

                            Belum ada gambar

                        </p>

                    </div>

                @endif


                {{-- Thumbnail Semua Gambar --}}

                @if($product->images->count() > 1)

                    <div class="row g-2">

                        @foreach($product->images as $image)

                            <div class="col-3">

                                <img
                                    src="{{ asset('storage/'.$image->image) }}"
                                    class="img-fluid rounded border"
                                    style="height:80px; width:100%; object-fit:cover;">

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================
        INFORMASI PRODUK
    ========================= --}}

    <div class="col-lg-7">

        <div class="card admin-card h-100">

            <div class="card-header admin-card-header fw-bold">

                <i class="bi bi-info-circle text-primary me-2"></i>

                Informasi Produk

            </div>


            <div class="card-body">


                <h3 class="fw-bold mb-3">

                    {{ $product->name }}

                </h3>


                <div class="mb-3">

                    <span class="badge bg-primary">

                        {{ $product->category->name }}

                    </span>

                </div>


                <h4 class="text-primary fw-bold mb-4">

                    Rp {{ number_format($product->price, 0, ',', '.') }}

                </h4>


                <div class="row g-3 mb-4">


                    <div class="col-md-4">

                        <div class="border rounded p-3">

                            <small class="text-muted d-block">

                                Stok

                            </small>

                            <strong>

                                {{ $product->stock }}

                            </strong>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="border rounded p-3">

                            <small class="text-muted d-block">

                                Motif

                            </small>

                            <strong>

                                {{ $product->motif }}

                            </strong>

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="border rounded p-3">

                            <small class="text-muted d-block">

                                Bahan

                            </small>

                            <strong>

                                {{ $product->bahan }}

                            </strong>

                        </div>

                    </div>


                </div>


                <div class="mb-4">

                    <h6 class="fw-bold">

                        <i class="bi bi-rulers text-primary me-2"></i>

                        Ukuran

                    </h6>


                    <p class="mb-0">

                        {{ $product->ukuran }}

                    </p>

                </div>


                <div class="mb-4">

                    <h6 class="fw-bold">

                        <i class="bi bi-card-text text-primary me-2"></i>

                        Deskripsi Singkat

                    </h6>


                    <p class="text-muted">

                        {{ $product->short_description }}

                    </p>

                </div>


                @if($product->shopee_link)

                    <a
                        href="{{ $product->shopee_link }}"
                        target="_blank"
                        class="btn btn-warning">

                        <i class="bi bi-shop"></i>

                        Lihat di Shopee

                    </a>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================
        DESKRIPSI LENGKAP
    ========================= --}}

    <div class="col-12">

        <div class="card admin-card">

            <div class="card-header admin-card-header fw-bold">

                <i class="bi bi-file-text text-primary me-2"></i>

                Deskripsi Lengkap

            </div>


            <div class="card-body">

                <p style="white-space: pre-line;">

                    {{ $product->long_description }}

                </p>

            </div>

        </div>

    </div>


</div>

@endsection