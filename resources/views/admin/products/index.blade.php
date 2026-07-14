@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            📦 Data Produk
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh produk Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.products.create') }}"
        class="btn btn-primary btn-lg">

        <i class="bi bi-plus-circle-fill"></i>

        Tambah Produk

    </a>

</div>

<div class="card mb-4">

    <div class="card-body">

        <h5 class="fw-bold mb-3">

            <i class="bi bi-funnel-fill text-primary"></i>

            Filter Produk

        </h5>

<form method="GET"
    action="{{ route('admin.products.index') }}"
    class="row g-2 mb-3">

    <div class="col-md-3">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="🔍 Cari produk..."
            value="{{ request('search') }}">

    </div>

    <div class="col-md-3">

        <select
            name="category"
            class="form-select">

            <option value="">

                Semua Kategori

            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ request('category') == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-2">

        <select
            name="sort"
            class="form-select">

            <option value="latest"
                {{ request('sort')=='latest'?'selected':'' }}>

                Terbaru

            </option>

            <option value="oldest"
                {{ request('sort')=='oldest'?'selected':'' }}>

                Terlama

            </option>

            <option value="price_low"
                {{ request('sort')=='price_low'?'selected':'' }}>

                Harga Termurah

            </option>

            <option value="price_high"
                {{ request('sort')=='price_high'?'selected':'' }}>

                Harga Termahal

            </option>

            <option value="name"
                {{ request('sort')=='name'?'selected':'' }}>

                Nama A-Z

            </option>

        </select>

    </div>

    <div class="col-md-2">

        <div class="d-flex gap-2">

            <button class="btn btn-dark flex-fill">
                <i class="bi bi-search me-1"></i>

                Cari

            </button>

            <a href="{{ route('admin.products.index') }}"
                class="btn btn-secondary flex-fill">

                <i class="bi bi-arrow-clockwise me-1"></i>

                Reset

            </a>

        </div>

    </div>

</form>

    </div>

</div>

@if(request('search') || request('category') || request('sort'))

<div class="alert alert-info">

    @if(request('search'))

        Pencarian:
        <strong>{{ request('search') }}</strong>

    @endif

    @if(request('category'))

        |
        Kategori dipilih:
        <strong>{{ $categories->find(request('category'))->name ?? '' }}</strong>

    @endif

</div>

@endif

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h5 class="fw-bold mb-0">
            <i class="bi bi-box-seam-fill text-primary me-2"></i>

            Daftar Produk

        </h5>

    </div>

    <span class="badge rounded-pill bg-primary px-3 py-2">

        Total :
        {{ $products->total() }}

        Produk

    </span>

</div>

</div>

<table class="table table-striped table-hover align-middle">

    <thead>

        <tr>

            <th>No</th>

            <th>Gambar</th>

            <th>Nama</th>

            <th>Kategori</th>

            <th>Harga</th>

            <th>Stok</th>

            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($products as $product)

        <tr>

            <td>{{ $products->firstItem() + $loop->index }}</td>

            <td>
                @if($product->image)
                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="img-thumbnail preview-image"
                        style="width:80px;height:80px;object-fit:cover;cursor:pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#imageModal"
                        data-image="{{ asset('storage/'.$product->image) }}">
                @endif
            </td>

            <td>

                <div class="fw-semibold">

                    {{ $product->name }}

                </div>

                <small class="text-muted">

                    Kode: ABS-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}

                </small>

            </td>

            <td>{{ $product->category->name }}</td>

            <td>

                <span class="fw-bold text-primary">

                    Rp {{ number_format($product->price,0,',','.') }}

                </span>

            </td>

            <td>

                @if($product->stock == 0)

                    <span class="badge bg-danger">

                        Habis (0)

                    </span>

                @elseif($product->stock <= 10)

                    <span class="badge bg-warning text-dark">

                        Hampir Habis ({{ $product->stock }})

                    </span>

                @else

                    <span class="badge bg-success">

                        Tersedia ({{ $product->stock }})

                    </span>

                @endif

            </td>

            <td class="text-nowrap">

                <a href="{{ route('admin.products.edit',$product) }}"
                    class="btn btn-warning btn-action"
                    data-bs-toggle="tooltip"
                    title="Edit Data">

                    <i class="bi bi-pencil-fill"></i>

                </a>

                <form
                    action="{{ route('admin.products.destroy',$product) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        class="btn btn-danger btn-action btn-delete"
                        data-bs-toggle="tooltip"
                        title="Hapus Permanen">

                        <i class="bi bi-trash-fill"></i>

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center py-4">

                @if(request('search'))

                    Tidak ditemukan produk dengan kata kunci
                    <strong>"{{ request('search') }}"</strong>

                @else

                    <div class="py-5 text-center">

                        <i class="bi bi-box-seam display-1 text-secondary"></i>

                        <h5 class="mt-3">
                            Belum ada produk
                        </h5>

                        <p class="text-muted">

                            Silakan tambahkan produk pertama.

                        </p>

                    </div>

                @endif

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

            @if($products->hasPages())

            <div class="d-flex justify-content-center mt-4">

                {{ $products->links() }}

            </div>

            @endif

        </div>

    </div>

</div>

</div>

<!-- Modal Preview -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Preview Gambar
                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body text-center">

                <img
                    id="previewImage"
                    src=""
                    class="img-fluid rounded">

            </div>

        </div>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".preview-image").forEach(function(img){

        img.addEventListener("click", function(){

            document.getElementById("previewImage").src =
                this.dataset.image;

        });

    });

});

</script>

@endsection