@extends('admin.layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            👤 Data User
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh user Aura Bag Store
        </p>

    </div>

    <a href="{{ route('admin.users.create') }}"
        class="btn btn-primary btn-lg">

        <i class="bi bi-plus-circle-fill"></i>

        Tambah User

    </a>

</div>

<div class="card mb-4">

    <div class="card-body">

        <h5 class="fw-bold mb-3">

            <i class="bi bi-funnel-fill text-primary"></i>

            Filter User

        </h5>

        <form
            method="GET"
            action="{{ route('admin.users.index') }}"
            class="row g-2">

            <div class="col-md-8">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="🔍 Cari nama atau email..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-md-2 d-grid">

                <button class="btn btn-dark">

                    <i class="bi bi-search me-1"></i>

                    Cari

                </button>

            </div>

            <div class="col-md-2 d-grid">

                <a href="{{ route('admin.users.index') }}"
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

            <i class="bi bi-people-fill text-primary me-2"></i>

            Daftar User

        </div>

        <span class="badge bg-primary">

            Total : {{ $users->total() }} User

        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>

                    <th width="80">No</th>

                    <th>Nama</th>

                    <th>Email</th>

                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>

                    <td>

                        {{ $users->firstItem() + $loop->index }}

                    </td>

                    <td>

                        <div class="fw-semibold">

                            {{ $user->name }}

                        </div>

                        <small class="text-muted">

                            Pengguna Sistem

                        </small>

                    </td>

                    <td>

                        {{ $user->email }}

                    </td>

                    <td>
                        <div class="d-flex justify-content-center gap-2">

                        <a href="{{ route('admin.users.edit',$user) }}"
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="tooltip"
                            title="Edit Data">

                            <i class="bi bi-pencil-fill"></i>

                        </a>

                        @if(auth()->id() != $user->id)

                        <form
                            action="{{ route('admin.users.destroy',$user) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="button"
                                class="btn btn-danger btn-sm btn-delete"
                                data-bs-toggle="tooltip"
                                title="Hapus Permanen">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                        @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4"
                        class="text-center py-4">

                        <div class="py-5 text-center">

                            <i class="bi bi-people display-1 text-secondary"></i>

                            <h5 class="mt-3">

                                Belum ada user

                            </h5>

                            <p class="text-muted">

                                Silakan tambahkan user pertama.

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

@if($users->hasPages())

<div class="d-flex justify-content-center mt-4">

    {{ $users->links() }}

</div>

@endif

@endsection