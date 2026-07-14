@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            ✏️ Edit User
        </h2>

        <p class="text-muted mb-0">
            Ubah informasi user Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.users.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<div class="card admin-card">

    <div class="card-header admin-card-header fw-bold">

        <i class="bi bi-pencil-square text-primary me-2"></i>

        Form Edit User

    </div>

    <div class="card-body">

        <form 
            id="formSubmit"
            action="{{ route('admin.users.update',$user) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-person-fill text-primary me-2"></i>

                    Nama

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name',$user->name) }}"
                    placeholder="Masukkan nama user">

                @error('name')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-envelope-fill text-primary me-2"></i>

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email',$user->email) }}"
                    placeholder="Masukkan email">

                @error('email')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-lock-fill text-primary me-2"></i>

                    Password Baru

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password baru">

                @error('password')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror

                <div class="form-text">

                    Kosongkan jika tidak ingin mengganti password.

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    <i class="bi bi-shield-lock-fill text-primary me-2"></i>

                    Konfirmasi Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    placeholder="Ulangi password baru">

                @error('password_confirmation')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

                @enderror

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <button
                    id="submitBtn"
                    class="btn btn-primary px-4">

                    <i class="bi bi-check-circle"></i>

                    Update User

                </button>

                <a href="{{ route('admin.users.index') }}"
                    class="btn btn-outline-secondary px-4">

                    <i class="bi bi-x-circle"></i>

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

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