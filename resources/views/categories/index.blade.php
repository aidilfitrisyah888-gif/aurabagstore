@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">

            Semua Kategori

        </h1>

        <p class="text-muted">

            Pilih kategori tas favoritmu.

        </p>

    </div>

    <div class="row">

        @foreach($categories as $category)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body text-center">

                    <div style="font-size:60px;">

                        👜

                    </div>

                    <h4 class="fw-bold mt-3">

                        {{ $category->name }}

                    </h4>

                    <p class="text-muted">

                        {{ $category->products_count }}
                        Produk

                    </p>

                    <a href="{{ route('products.index',['category'=>$category->id]) }}"
                        class="btn btn-dark">

                        Lihat Produk

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection