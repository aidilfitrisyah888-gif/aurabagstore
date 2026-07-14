@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            ✏️ Edit Kategori
        </h2>

        <p class="text-muted mb-0">
            Ubah informasi kategori Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.categories.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<div class="card admin-card">

    <div class="card-header admin-card-header fw-bold">

        <i class="bi bi-pencil-square text-primary me-2"></i>

        Form Edit Kategori

    </div>

    <div class="card-body">

        <form
            id="formSubmit"
            action="{{ route('admin.categories.update', $category) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-tag-fill text-primary me-2"></i>

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama kategori">

                @error('name')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-image text-primary me-2"></i>

                    Ganti Icon (Opsional)

                </label>

                <input
                    type="file"
                    name="icon"
                    id="icon"
                    class="form-control @error('icon') is-invalid @enderror"
                    accept="image/*">

                @error('icon')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror

            </div>

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body text-center card-preview">

                <i
                    id="previewIcon"
                    class="bi bi-image display-2 text-secondary"
                    {{ $category->icon ? 'style=display:none' : '' }}>
                </i>

                    <h5 class="mt-3 fw-bold">

                        Preview Icon

                    </h5>

                    <img
                        id="preview"
                        src="{{ $category->icon ? asset('storage/'.$category->icon) : '' }}"
                        class="img-thumbnail shadow-sm"
                        width="230"
                        {{ $category->icon ? '' : 'style=display:none' }}>

                    <p
                        id="previewText"
                        class="text-muted mt-3">

                        {{ $category->icon ? basename($category->icon) : 'Belum ada icon yang dipilih' }}

                    </p>

                    <button
                        type="button"
                        id="removePreview"
                        class="btn btn-outline-danger btn-sm mt-3 d-none">

                        <i class="bi bi-trash"></i>

                        Hapus Icon

                    </button>

                </div>

            </div>

            <div class="alert alert-warning mt-3">

                <i class="bi bi-info-circle"></i>

                Jika memilih icon baru,
                icon lama akan otomatis diganti.

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <button
                    id="submitBtn"
                    class="btn btn-primary px-4">

                    <i class="bi bi-check-circle"></i>

                    Update Kategori

                </button>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn btn-outline-secondary px-4">

                    <i class="bi bi-x-circle"></i>

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

<script>

const oldImage = "{{ $category->icon ? asset('storage/'.$category->icon) : '' }}";
const oldName  = "{{ $category->icon ? basename($category->icon) : '' }}";

const input = document.getElementById('icon');
const preview = document.getElementById('preview');
const text = document.getElementById('previewText');
const removeBtn = document.getElementById('removePreview');

input.addEventListener('change', function(){

    const file = this.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(e){

            preview.src = e.target.result;
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

    if(oldImage != ""){

        preview.src = oldImage;
        preview.style.display = "block";
        text.innerHTML = oldName;
        document.getElementById("previewIcon").style.display = "none";

    }else{

        preview.src = "";
        preview.style.display = "none";
        text.innerHTML = "Belum ada icon yang dipilih";
        document.getElementById("previewIcon").style.display = "block";

    }

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