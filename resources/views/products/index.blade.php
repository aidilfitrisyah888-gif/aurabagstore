@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">Semua Produk</h1>
        <p class="text-muted">
            Menampilkan {{ $products->total() }} produk
        </p>
    </div>

    {{-- Search --}}
    <form action="{{ route('products.index') }}" method="GET" class="mb-5">

        <div class="row">

            <div class="col-lg-10 col-md-9 mb-2">

                <input
                    type="text"
                    class="form-control"
                    name="search"
                    placeholder="🔍 Cari produk..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-lg-2 col-md-3">

                <button class="btn btn-dark w-100">
                    Cari
                </button>

            </div>

        </div>

    </form>

    <div class="row">

        {{-- Sidebar --}}
        <div class="col-lg-3 mb-4">

            {{-- Kategori --}}
            <div class="card shadow-sm mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">
                        Kategori
                    </h5>

                    <div class="list-group">

                        <a href="{{ route('products.index') }}"
                            class="list-group-item list-group-item-action {{ request('category') == '' ? 'active' : '' }}">

                            Semua Produk

                        </a>

                        @foreach($categories as $category)

                        <a href="{{ route('products.index',[
                            'category'=>$category->id,
                            'search'=>request('search'),
                            'sort'=>request('sort')
                        ]) }}"
                            class="list-group-item list-group-item-action {{ request('category') == $category->id ? 'active' : '' }}">

                            {{ $category->name }}

                        </a>

                        @endforeach

                    </div>

                </div>

            </div>

            {{-- Sorting --}}
            <div class="card shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">
                        Urutkan
                    </h5>

                    <div class="list-group">

                        <a href="{{ route('products.index',[
                            'sort'=>'latest',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="list-group-item list-group-item-action {{ request('sort') == 'latest' || request('sort') == '' ? 'active' : '' }}">

                            Terbaru

                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'low',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="list-group-item list-group-item-action {{ request('sort') == 'low' ? 'active' : '' }}">

                            Harga Terendah

                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'high',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="list-group-item list-group-item-action {{ request('sort') == 'high' ? 'active' : '' }}">

                            Harga Tertinggi

                        </a>

                        <a href="{{ route('products.index',[
                            'sort'=>'name',
                            'search'=>request('search'),
                            'category'=>request('category')
                        ]) }}"
                            class="list-group-item list-group-item-action {{ request('sort') == 'name' ? 'active' : '' }}">

                            Nama A-Z

                        </a>

                    </div>

                </div>

            </div>

        </div>

        {{-- Produk --}}
        <div class="col-lg-9">

            <div class="row">

                @forelse($products as $product)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card product-card h-100 shadow-sm">

                        <img
                            src="https://placehold.co/600x400?text=Aura+Bag"
                            class="card-img-top"
                            alt="{{ $product->name }}">

                        <div class="card-body d-flex flex-column">

                            <span class="badge bg-warning text-dark rounded-pill mb-2">

                                {{ $product->category->name }}

                            </span>

                            <h5 class="fw-bold">

                                {{ $product->name }}

                            </h5>

                            <h4 class="text-success fw-bold">

                                Rp {{ number_format($product->price,0,',','.') }}

                            </h4>

                            <p class="small text-secondary mb-2">

                                Stok : {{ $product->stock }}

                            </p>

                            <p class="text-muted small">

                                {{ \Illuminate\Support\Str::limit($product->description,80) }}

                            </p>

                            <div class="mt-auto">

                                <a
                                    href="{{ route('products.show',$product->slug) }}"
                                    class="btn btn-dark w-100">

                                    Lihat Detail

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                @empty

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        <h5>

                            Produk tidak ditemukan 😥

                        </h5>

                        <p class="mb-0">

                            Coba gunakan kata kunci lain.

                        </p>

                    </div>

                </div>

                @endforelse

            </div>

            <div class="mt-4 d-flex justify-content-center">

                {{ $products->links() }}

            </div>

        </div>

    </div>

</div>

@endsection