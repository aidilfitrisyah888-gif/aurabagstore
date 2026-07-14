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

            <div class="col-12 mb-3">

                <label class="form-label fw-semibold">
                    <i class="bi bi-card-text me-2"></i>
                    Deskripsi

                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Deskripsikan produk..."
                    style="resize:none">{{ old('description') }}</textarea>

                    @error('description')
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

            <div class="col-md-6 mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-image me-2 text-primary"></i>

                    Gambar Produk

                </label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control"
                    accept="image/*">

            </div>
            
        </div>

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body text-center card-preview">

                    <i
                        id="previewIcon"
                        class="bi bi-image display-2 text-secondary">
                    </i>

                    <h5 class="mt-3 fw-bold">
                        Preview Gambar
                    </h5>

                    <img
                        id="preview"
                        src=""
                        class="img-thumbnail shadow-sm"
                        width="230"
                        style="display:none;">

                    <p
                        id="previewText"
                        class="text-muted mt-3">

                        Belum ada gambar dipilih

                    </p>

                    <button
                        type="button"
                        id="removePreview"
                        class="btn btn-outline-danger btn-sm mt-2 d-none">

                        <i class="bi bi-trash"></i>

                        Hapus Gambar

                    </button>

                </div>

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

    const input = document.getElementById('image');
    const preview = document.getElementById('preview');
    const text = document.getElementById('previewText');
    const removeBtn = document.getElementById('removePreview');

    input.addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                preview.src = event.target.result;
                preview.style.display = "block";
                document.getElementById("previewIcon").style.display = "none";

                text.innerHTML = file.name;

                removeBtn.classList.remove('d-none');

            }

            reader.readAsDataURL(file);

        }

    });

    removeBtn.addEventListener('click', function(){

        input.value = "";

        preview.src = "";
        preview.style.display = "none";
        document.getElementById("previewIcon").style.display = "block";

        text.innerHTML = "Belum ada gambar dipilih";

        removeBtn.classList.add('d-none');

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