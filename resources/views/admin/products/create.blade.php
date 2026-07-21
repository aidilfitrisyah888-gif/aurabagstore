@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            ➕ Tambah Produk
        </h2>

        <p class="text-muted mb-0">
            Tambahkan produk baru ke Aura Bag Store
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

        <i class="bi bi-box-seam me-2 text-primary"></i>

        Form Tambah Produk

    </div>

    <div class="card-body">

        <form
            id="formSubmit"
            action="{{ route('admin.products.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
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
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama produk">

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

                <select name="category_id" class="form-select">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

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
                    value="{{ old('price') }}"
                    placeholder="Contoh: 250000">

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
                    value="{{ old('stock') }}"
                    placeholder="Masukkan jumlah stok">

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
                    value="{{ old('motif') }}"
                    placeholder="Contoh: Polos">

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
                    value="{{ old('bahan') }}"
                    placeholder="Contoh: Kanvas">

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
                    value="{{ old('ukuran') }}"
                    placeholder="Contoh: 40 × 30 × 15 cm">

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
                    placeholder="Deskripsi singkat untuk tampilan Home dan Produk..."
                    style="resize:none">{{ old('short_description') }}</textarea>

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
                    placeholder="Tulis deskripsi lengkap produk..."
                    style="resize:vertical">{{ old('long_description') }}</textarea>

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
                value="{{ old('shopee_link') }}"
                placeholder="https://shopee.co.id/...">

                @error('shopee_link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-12 mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-images me-2 text-primary"></i>

                    Gambar Produk

                </label>

                <input
                    type="file"
                    name="images[]"
                    id="images"
                    class="form-control"
                    accept="image/*"
                    multiple>

                <small class="text-muted">

                    Pilih beberapa gambar sekaligus.
                    <strong>Gambar pertama akan menjadi gambar utama produk.</strong>

                </small>

            </div>
            
        </div>

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-images text-primary me-2"></i>

                        Preview Gambar

                    </h5>

                    <div
                        id="previewContainer"
                        class="row g-3">

                        <div
                            id="emptyPreview"
                            class="col-12 text-center py-4">

                            <i class="bi bi-images display-3 text-secondary"></i>

                            <p class="text-muted mt-3 mb-0">

                                Belum ada gambar dipilih

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-check mt-3">
                <input
                    type="checkbox"
                    name="is_featured"
                    value="1"
                    class="form-check-input"
                    id="is_featured"
                >

                <label class="form-check-label" for="is_featured">
                    ⭐ Jadikan Produk Unggulan
                </label>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

            <button 
                id="submitBtn"
                class="btn btn-primary px-4">
            <i class="bi bi-check-circle"></i>

                Simpan Produk

            </button>

            <a href="{{ route('admin.products.index') }}"
                class="btn btn-outline-secondary px-4">

                <i class="bi bi-x-circle"></i>

                Batal

            </a>

            </div>

        </form>

    </div>

</div>

    <script>

    const input = document.getElementById('images');
    const previewContainer = document.getElementById('previewContainer');

    input.addEventListener('change', function () {

        previewContainer.innerHTML = '';

        const files = Array.from(this.files);

        if (files.length === 0) {

            previewContainer.innerHTML = `
                <div class="col-12 text-center py-4">

                    <i class="bi bi-images display-3 text-secondary"></i>

                    <p class="text-muted mt-3 mb-0">
                        Belum ada gambar dipilih
                    </p>

                </div>
            `;

            return;

        }

        files.forEach((file, index) => {

            const reader = new FileReader();

            reader.onload = function (event) {

                const col = document.createElement('div');

                col.className = 'col-6 col-md-4 col-lg-3';

                col.innerHTML = `

                    <div class="card h-100 shadow-sm">

                        <img
                            src="${event.target.result}"
                            class="card-img-top"
                            style="height:160px; object-fit:cover;">

                        <div class="card-body p-2 text-center">

                            ${
                                index === 0
                                ?
                                '<span class="badge bg-primary">Gambar Utama</span>'
                                :
                                `<small class="text-muted">
                                    Gambar ${index + 1}
                                </small>`
                            }

                            <div
                                class="small text-truncate mt-1"
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

@endsection