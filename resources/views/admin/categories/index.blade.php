@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            <i class="bi bi-bookmark-fill text-primary"></i>
            Data Kategori
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh kategori Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.categories.create') }}"
        class="btn btn-primary btn-lg">

        <i class="bi bi-plus-circle-fill"></i>

        Tambah Kategori

    </a>

</div>

    <div class="card mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">

                <i class="bi bi-funnel-fill text-primary"></i>

                Filter Kategori

            </h5>

            <form
                method="GET"
                action="{{ route('admin.categories.index') }}"
                class="row g-2">

                <div class="col-md-8">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari kategori..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-dark">

                            <i class="bi bi-search me-1"></i>

                            Cari

                        </button>

                    </div>

                    <div class="col-md-2 d-grid">

                        <a href="{{ route('admin.categories.index') }}"
                            class="btn btn-secondary">

                            <i class="bi bi-arrow-clockwise me-1"></i>

                            Reset

                        </a>

                    </div>

            </form>

        </div>

    </div>

<div class="card admin-card">

    <div class="card-header admin-card-header d-flex justify-content-between align-items-center">

        <div class="fw-bold">

            <i class="bi bi-folder-fill text-primary me-2"></i>

            Daftar Kategori

        </div>

        <span class="hang-tag">

            Total : {{ $categories->total() }} Kategori

        </span>

    </div>

    <div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover mb-0">

            <thead>

                <tr>

                    <th width="80">No</th>

                    <th width="100">Icon</th>

                    <th>Nama Kategori</th>

                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr>

                    <td>

                        {{ $categories->firstItem() + $loop->index }}

                    </td>

                    <td>

                    @if($category->icon)

                    <img
                        src="{{ asset('storage/'.$category->icon) }}"
                        class="img-thumbnail preview-image category-icon"
                        data-bs-toggle="modal"
                        data-bs-target="#imageModal"
                        data-image="{{ asset('storage/'.$category->icon) }}">

                    @else

                    <div class="bg-light border rounded d-flex justify-content-center align-items-center category-placeholder">
                        <i class="bi bi-image text-secondary"></i>

                    </div>

                    @endif

                    </td>

                    <td>

                        <div class="fw-semibold">

                            {{ $category->name }}

                        </div>

                        <small class="text-muted">

                            Kategori Produk

                        </small>

                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <a
                                href="{{ route('admin.categories.edit',$category) }}"
                                class="btn btn-warning btn-sm btn-action"
                                data-bs-toggle="tooltip"
                                title="Edit Data">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form
                                action="{{ route('admin.categories.destroy',$category) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm btn-action btn-delete"
                                    data-bs-toggle="tooltip"
                                    title="Hapus Permanen">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-4">

                        <div class="py-5 text-center">

                            <i class="bi bi-folder2-open display-1 text-secondary"></i>

                            <h5 class="mt-3">

                                Belum ada kategori

                            </h5>

                            <p class="text-muted">

                                Silakan tambahkan kategori pertama.

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

            </div> {{-- table-responsive --}}

    </div> {{-- card-body --}}

</div> {{-- card --}}


@if($categories->hasPages())

<div class="d-flex justify-content-center mt-4">

    {{ $categories->links() }}

</div>

@endif

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