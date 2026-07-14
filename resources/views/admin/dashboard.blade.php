@extends('admin.layouts.admin')

@section('content')

<h2 class="fw-bold mb-4">
    Dashboard
</h2>

<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Produk</h6>
                <h2 class="fw-bold text-primary">{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Kategori</h6>
                <h2 class="fw-bold text-success">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total User</h6>
                <h2 class="fw-bold text-warning">{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Produk Habis</h6>
                <h2 class="fw-bold text-danger">{{ $outOfStock }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    Produk Terbaru
                </h5>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <thead>

                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestProducts as $product)

                        <tr>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->category->name }}</td>

                            <td>
                                Rp {{ number_format($product->price,0,',','.') }}
                            </td>

                            <td>{{ $product->stock }}</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted">

                                Belum ada produk.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection