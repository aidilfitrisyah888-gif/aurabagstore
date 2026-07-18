@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            <i class="bi bi-bag-fill text-primary"></i>
            Data Produk
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

<div class="card mb-4 filter-card">

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
            placeholder="Cari produk..."
            value="{{ request('search') }}">

    </div>

    <div class="col-md-3">

        <div class="custom-select" data-type="category">

            <div class="custom-select-trigger">
                <span>
                    @if(request('category'))
                        {{ $categories->firstWhere('id', request('category'))->name ?? 'Semua Kategori' }}
                    @else
                        Semua Kategori
                    @endif
                </span>

                <i class="bi bi-chevron-down"></i>
            </div>

            <div class="custom-options">

                <div class="custom-option {{ !request('category') ? 'selected' : '' }}"
                    data-value="">
                    Semua Kategori
                </div>

                @foreach($categories as $category)

                    <div
                        class="custom-option {{ request('category') == $category->id ? 'selected' : '' }}"
                        data-value="{{ $category->id }}">

                        {{ $category->name }}

                    </div>

                @endforeach

            </div>

        </div>

        <input type="hidden" name="category" id="category-input"
            value="{{ request('category') }}">

    </div>

    <div class="col-md-2">

        <div class="custom-select" data-type="sort">

            <div class="custom-select-trigger">

                <span>
                    @switch(request('sort'))
                        @case('oldest') Terlama @break
                        @case('price_low') Harga Termurah @break
                        @case('price_high') Harga Termahal @break
                        @case('name') Nama A-Z @break
                        @default Terbaru
                    @endswitch
                </span>

                <i class="bi bi-chevron-down"></i>

            </div>

            <div class="custom-options">

                <div class="custom-option {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}"
                    data-value="latest">
                    Terbaru
                </div>

                <div class="custom-option {{ request('sort') == 'oldest' ? 'selected' : '' }}"
                    data-value="oldest">
                    Terlama
                </div>

                <div class="custom-option {{ request('sort') == 'price_low' ? 'selected' : '' }}"
                    data-value="price_low">
                    Harga Termurah
                </div>

                <div class="custom-option {{ request('sort') == 'price_high' ? 'selected' : '' }}"
                    data-value="price_high">
                    Harga Termahal
                </div>

                <div class="custom-option {{ request('sort') == 'name' ? 'selected' : '' }}"
                    data-value="name">
                    Nama A-Z
                </div>

            </div>

        </div>

        <input type="hidden" name="sort" id="sort-input"
            value="{{ request('sort') ?? 'latest' }}">

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

                <span class="hang-tag">

                    Total :
                    {{ $products->total() }}

                    Produk

                </span>

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

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.custom-select').forEach(select => {

        const trigger = select.querySelector('.custom-select-trigger');
        const options = select.querySelectorAll('.custom-option');

        trigger.addEventListener('click', function (e) {

            e.stopPropagation();

            document.querySelectorAll('.custom-select').forEach(other => {

                if (other !== select) {
                    other.classList.remove('open');
                }

            });

            select.classList.toggle('open');

        });

        options.forEach(option => {

            option.addEventListener('click', function () {

                const value = this.dataset.value;
                const text = this.textContent.trim();

                trigger.querySelector('span').textContent = text;

                if (select.dataset.type === 'category') {

                    document.getElementById('category-input').value = value;

                }

                if (select.dataset.type === 'sort') {

                    document.getElementById('sort-input').value = value;

                }

                options.forEach(item => {
                    item.classList.remove('selected');
                });

                this.classList.add('selected');

                select.classList.remove('open');

            });

        });

    });

    document.addEventListener('click', function () {

        document.querySelectorAll('.custom-select')
            .forEach(select => select.classList.remove('open'));

    });

});

</script>

@endsection