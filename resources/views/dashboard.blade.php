@extends('admin.layouts.admin')

@section('content')

<h2 class="fw-bold mb-4">
    Dashboard Admin
</h2>

<div class="row g-4 mb-4">

    <div class="col-md-3">

        <a href="{{ route('admin.products.index') }}"
            class="text-decoration-none text-dark">

            <div class="card dashboard-card card-product">

                <div class="card-body text-center py-4">

                    <div class="icon-box bg-primary-subtle text-primary">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <h2 class="fw-bold mt-3">
                        {{ $totalProducts }}
                    </h2>

                    <p class="text-muted mb-0">
                        Total Produk
                    </p>

                </div>

            </div>

        </a>

    </div>

    <div class="col-md-3">

        <a href="{{ route('admin.categories.index') }}"
            class="text-decoration-none text-dark">

            <div class="card dashboard-card card-category">

                <div class="card-body text-center py-4">

                    <div class="icon-box bg-success-subtle text-success">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                    <h2 class="fw-bold mt-3">
                        {{ $totalCategories }}
                    </h2>

                    <p class="text-muted mb-0">
                        Total Kategori
                    </p>

                </div>

            </div>

        </a>

    </div>

    <div class="col-md-3">

        <a href="{{ route('admin.users.index') }}"
        class="text-decoration-none text-dark">

            <div class="card dashboard-card card-user">

                <div class="card-body text-center py-4">

                    <div class="icon-box bg-warning-subtle text-warning">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <h2 class="fw-bold mt-3">
                        {{ $totalUsers }}
                    </h2>

                    <p class="text-muted mb-0">
                        Total User
                    </p>

                </div>

            </div>

        </a>

    </div>

    <div class="col-md-3">

        <a href="{{ route('admin.products.index') }}"
        class="text-decoration-none text-dark">

            <div class="card dashboard-card card-stock">

                <div class="card-body text-center py-4">

                    <div class="icon-box bg-danger-subtle text-danger">
                        <i class="bi bi-bag-fill"></i>
                    </div>

                    <h2 class="fw-bold mt-3">
                        {{ $totalStock }}
                    </h2>

                    <p class="text-muted mb-0">
                        Total Stok
                    </p>

                </div>

            </div>

        </a>

    </div>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm text-center">

            <div class="card-body">

                <h1>🔴</h1>

                <h3>{{ $outOfStock }}</h3>

                <p class="text-muted mb-0">
                    Produk Habis
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm text-center">

            <div class="card-body">

                <h1>🟡</h1>

                <h3>{{ $lowStock }}</h3>

                <p class="text-muted mb-0">
                    Hampir Habis
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm text-center">

            <div class="card-body">

                <h1>🟢</h1>

                <h3>{{ $availableStock }}</h3>

                <p class="text-muted mb-0">
                    Produk Tersedia
                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-6">

        <div class="card shadow border-0 mb-4">

            <div class="card-header fw-bold">

                Produk Terbaru

            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Produk</th>

                            <th>Kategori</th>

                            <th>Stok</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestProducts as $product)

                        <tr>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->category->name }}</td>

                            <td>{{ $product->stock }}</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center">

                                Belum ada produk.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card shadow border-0 mb-4">

            <div class="card-header fw-bold">

                Kategori Terbaru

            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Nama Kategori</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($latestCategories as $category)

                        <tr>

                            <td>{{ $category->name }}</td>

                        </tr>

                        @empty

                        <tr>

                            <td class="text-center">

                                Belum ada kategori.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<div class="card quick-action-card mt-4">

    <div class="card-header fw-bold">

        <i class="bi bi-lightning-charge-fill text-warning"></i>

        Quick Action

    </div>

    <div class="card-body">

        <a href="{{ route('admin.products.create') }}"
            class="btn btn-primary me-2 mb-2">

            <i class="bi bi-plus-circle"></i>

            Tambah Produk

        </a>

        <a href="{{ route('admin.categories.create') }}"
            class="btn btn-success me-2 mb-2">

            <i class="bi bi-folder-plus"></i>

            Tambah Kategori

        </a>

        <a href="{{ route('admin.users.index') }}"
            class="btn btn-warning me-2 mb-2">

            <i class="bi bi-people"></i>

            Kelola User

        </a>

        <a href="{{ route('home') }}"
            target="_blank"
            class="btn btn-dark mb-2">

            <i class="bi bi-globe"></i>

            Lihat Website

        </a>

    </div>

</div>

</div>

@endsection