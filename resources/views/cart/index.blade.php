@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <span class="section-eyebrow">
                Shopping Bag
            </span>

            <h1 class="section-title">
                Keranjang Belanja
            </h1>

        </div>

        <a href="{{ route('products.index') }}"
           class="btn btn-outline-dark">

            <i class="bi bi-arrow-left"></i>
            Lanjut Belanja

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    @if(count($cart) > 0)

        <div class="row g-4">

            <div class="col-lg-8">

                @foreach($cart as $item)

                    <div class="card mb-3 border-0 shadow-sm">

                        <div class="card-body">

                            <div class="row align-items-center g-4">

                                {{-- GAMBAR --}}
                                <div class="col-md-2">

                                    @if($item['image'])

                                        <img
                                            src="{{ asset('storage/' . $item['image']) }}"
                                            alt="{{ $item['name'] }}"
                                            class="img-fluid rounded">

                                    @else

                                        <img
                                            src="https://placehold.co/150x150?text=No+Image"
                                            alt="No Image"
                                            class="img-fluid rounded">

                                    @endif

                                </div>


                                {{-- INFORMASI PRODUK --}}
                                <div class="col-md-4">

                                    <h5 class="mb-1">

                                        {{ $item['name'] }}

                                    </h5>

                                    <p class="text-muted mb-0">

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
                                            class="btn btn-success w-100">

                                            <i class="bi bi-cart3"></i>

                                            Beli di Shopee

                                        </a>

                                    @else

                                        <button
                                            class="btn btn-secondary"
                                            disabled>

                                            Link Shopee Belum Tersedia

                                        </button>

                                    @endif

                                </div>


                                {{-- HAPUS --}}
                                <div class="col-md-3">

                                    <form
                                        action="{{ route('cart.remove', $item['id']) }}"
                                        method="POST">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            class="btn btn-outline-danger w-100">

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

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="mb-4">

                            Produk Tersimpan

                        </h4>


                        <div class="d-flex justify-content-between mb-3">

                            <span>Total Produk</span>

                            <strong>

                                {{ count($cart) }}

                            </strong>

                        </div>


                        <hr>


                        <p class="text-muted">

                            Produk yang kamu simpan di sini dapat dibeli kapan saja melalui Shopee.

                        </p>


                        <form
                            action="{{ route('cart.clear') }}"
                            method="POST">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-outline-danger w-100">

                                <i class="bi bi-trash"></i>

                                Kosongkan Keranjang

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @else

        <div class="text-center py-5">

            <i class="bi bi-cart-x display-1 text-muted"></i>

            <h3 class="mt-3">

                Keranjang masih kosong

            </h3>

            <p class="text-muted">

                Yuk mulai belanja produk favoritmu.

            </p>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-dark">

                Lihat Produk

            </a>

        </div>

    @endif

</div>

@endsection