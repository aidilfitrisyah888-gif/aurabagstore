@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            ✏️ Edit Produk
        </h2>

        <p class="text-muted mb-0">
            Ubah informasi produk Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.products.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<div class="card admin-card">

    <div class="card-header admin-card-header fw-bold">

        <i class="bi bi-pencil-square me-2 text-primary"></i>

        Form Edit Produk

    </div>

    <div class="card-body">

        <form 
            id="formSubmit"
            action="{{ route('admin.products.update',$product) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                <i class="bi bi-tag-fill text-primary me-2"></i>

                Nama Produk

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}">

                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                <i class="bi bi-grid-fill me-2"></i>

                    Kategori

                </label>

                <select
                    name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                <i class="bi bi-cash-stack me-2"></i>

                    Harga

                </label>

                <input
                    type="number"
                    name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}">

                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                <i class="bi bi-boxes me-2"></i>

                    Stok

                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control @error('stock') is-invalid @enderror"
                    value="{{ old('stock', $product->stock) }}">

                @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-palette me-2 text-primary"></i>
                    Motif
                </label>

                <input
                    type="text"
                    name="motif"
                    class="form-control @error('motif') is-invalid @enderror"
                    value="{{ old('motif', $product->motif) }}">

                @error('motif')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-layers me-2 text-primary"></i>
                    Bahan
                </label>

                <input
                    type="text"
                    name="bahan"
                    class="form-control @error('bahan') is-invalid @enderror"
                    value="{{ old('bahan', $product->bahan) }}">

                @error('bahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="col-md-4 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-rulers me-2 text-primary"></i>
                    Ukuran
                </label>

                <input
                    type="text"
                    name="ukuran"
                    class="form-control @error('ukuran') is-invalid @enderror"
                    value="{{ old('ukuran', $product->ukuran) }}">

                @error('ukuran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="col-12 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-card-text me-2"></i>
                    Deskripsi Singkat
                </label>

                <textarea
                    name="short_description"
                    rows="3"
                    class="form-control @error('short_description') is-invalid @enderror"
                    style="resize:none">{{ old('short_description', $product->short_description) }}</textarea>

                @error('short_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="col-12 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-file-text me-2"></i>
                    Deskripsi Lengkap
                </label>

                <textarea
                    name="long_description"
                    rows="7"
                    class="form-control @error('long_description') is-invalid @enderror"
                    style="resize:vertical">{{ old('long_description', $product->long_description) }}</textarea>

                @error('long_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                <i class="bi bi-shop me-2"></i>

                    Link Shopee

                </label>

                <input
                    type="text"
                    name="shopee_link"
                    class="form-control @error('shopee_link') is-invalid @enderror"
                    value="{{ old('shopee_link', $product->shopee_link) }}">

                @error('shopee_link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            {{-- =========================
                GAMBAR LAMA
            ========================= --}}

            <div class="col-12 mb-4">

                <label class="form-label fw-semibold">

                    <i class="bi bi-images text-primary me-2"></i>

                    Gambar Produk Saat Ini

                </label>


                <div class="row g-3">

                    @forelse($product->images as $image)

                        <div class="col-6 col-md-4 col-lg-3">

                            <div class="card shadow-sm h-100">

                                <img
                                    src="{{ asset('storage/'.$image->image) }}"
                                    class="card-img-top"
                                    style="height:180px; object-fit:cover;">

                                <div class="card-body text-center p-2">

                                    @if($image->sort_order == 0)

                                        <span class="badge bg-primary d-block mb-2">
                                            <i class="bi bi-star-fill"></i>
                                            Gambar Utama
                                        </span>

                                    @else

                                        <small class="text-muted d-block mb-2">
                                            Gambar {{ $image->sort_order + 1 }}
                                        </small>

                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-sm mb-2"
                                            data-action="{{ route('admin.products.images.primary', $image) }}"
                                            onclick="setPrimaryImage(this.dataset.action)">

                                            <i class="bi bi-star"></i>
                                            Jadikan Utama

                                        </button>

                                    @endif

                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        data-action="{{ route('admin.products.images.destroy', $image) }}"
                                        onclick="deleteImage(this.dataset.action)">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="alert alert-secondary">

                                Belum ada gambar produk.

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>


            {{-- =========================
                UPLOAD GAMBAR BARU
            ========================= --}}

            <div class="col-12 mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-cloud-arrow-up text-primary me-2"></i>

                    Tambah Gambar Baru

                </label>

                <input
                    type="file"
                    name="images[]"
                    id="images"
                    class="form-control @error('images.*') is-invalid @enderror"
                    accept="image/*"
                    multiple>

                <small class="text-muted">

                    Kamu bisa memilih beberapa gambar sekaligus.

                    <strong>
                        Gambar baru akan ditambahkan ke galeri produk.
                    </strong>

                </small>

            </div>


            {{-- =========================
                PREVIEW GAMBAR BARU
            ========================= --}}

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-eye text-primary me-2"></i>

                        Preview Gambar Baru

                    </h5>


                    <div
                        id="previewContainer"
                        class="row g-3">

                        <div
                            id="emptyPreview"
                            class="col-12 text-center py-4">

                            <i class="bi bi-images display-3 text-secondary"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada gambar baru dipilih

                            </p>

                        </div>

                    </div>

                </div>

            </div>

                <div class="alert alert-info mt-3">

                    <i class="bi bi-info-circle"></i>

                    Jika memilih gambar baru, gambar tersebut akan ditambahkan
                    ke galeri produk yang sudah ada.

                </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <button
                    type="submit"
                    id="submitBtn"
                    class="btn btn-primary px-4">

                    <i class="bi bi-check2-circle"></i>

                    Update Produk

                </button>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn btn-outline-secondary px-4">

                    <i class="bi bi-x-circle"></i>

                    Batal

                </a>

            </div>

        </form>

        {{-- FORM KHUSUS AKSI GAMBAR --}}
        <form
            id="imageActionForm"
            method="POST"
            style="display:none;">

            @csrf

            <input
                type="hidden"
                name="_method"
                id="imageMethod">

        </form>

    </div>

</div>

<script>

const input = document.getElementById('images');

const previewContainer =
    document.getElementById('previewContainer');


input.addEventListener('change', function () {

    previewContainer.innerHTML = '';


    const files = Array.from(this.files);


    if (files.length === 0) {

        previewContainer.innerHTML = `

            <div class="col-12 text-center py-4">

                <i class="bi bi-images display-3 text-secondary"></i>

                <p class="text-muted mt-3 mb-0">

                    Belum ada gambar baru dipilih

                </p>

            </div>

        `;

        return;

    }


    files.forEach((file, index) => {

        const reader = new FileReader();


        reader.onload = function (event) {

            const col = document.createElement('div');


            col.className =
                'col-6 col-md-4 col-lg-3';


            col.innerHTML = `

                <div class="card h-100 shadow-sm">

                    <img
                        src="${event.target.result}"
                        class="card-img-top"
                        style="height:160px; object-fit:cover;">


                    <div class="card-body p-2 text-center">


                        <span class="badge bg-success">

                            Gambar Baru ${index + 1}

                        </span>


                        <div
                            class="small text-truncate mt-2"
                            title="${file.name}">

                            ${file.name}

                        </div>


                    </div>

                </div>

            `;


            previewContainer.appendChild(col);

        };


        reader.readAsDataURL(file);

    });

});

</script>

<script>

document.getElementById('formSubmit').addEventListener('submit', function(){

    const btn = document.getElementById('submitBtn');

    btn.disabled = true;

    btn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Menyimpan...
    `;

});

</script>

<script>
function setPrimaryImage(action) {

    const form = document.getElementById('imageActionForm');

    form.action = action;

    document.getElementById('imageMethod').value = 'PATCH';

    form.submit();

}


function deleteImage(action) {

    Swal.fire({

        title: 'Hapus Gambar?',

        text: 'Gambar ini akan dihapus secara permanen dari produk.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#A9564B',

        cancelButtonColor: '#6B5C4C',

        confirmButtonText: 'Ya, Hapus',

        cancelButtonText: 'Batal'

    }).then((result) => {

        if (result.isConfirmed) {

            const form =
                document.getElementById('imageActionForm');

            form.action = action;

            document.getElementById('imageMethod').value = 'DELETE';

            form.submit();

        }

    });

}
</script>
@endsection