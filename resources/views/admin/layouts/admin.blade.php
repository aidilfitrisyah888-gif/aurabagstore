<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin - Aura Bag Store</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

<div class="admin-wrapper">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="sidebar-header text-center">

            <div class="logo-circle">

                👜

            </div>

            <h4 class="mt-3 fw-bold">

                Aura Bag

            </h4>

            <small>

                Admin Dashboard

            </small>

        </div>

        <hr>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="bi bi-grid-fill"></i>

                    <span>Dashboard</span>

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}"
                    class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">

                    <i class="bi bi-bag-fill"></i>

                    <span>Produk</span>

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}"
                    class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

                    <i class="bi bi-bookmark-fill"></i>

                    <span>Kategori</span>

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}"
                    class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                    <i class="bi bi-people-fill"></i>

                    <span>User</span>

                </a>
            </li>

        </ul>

    </aside>

    <!-- Main -->
    <main class="main-content">

        <nav class="admin-navbar">

            <div>

                <h4 class="fw-bold mb-0">
                    Dashboard Admin
                </h4>

                <small>
                    Selamat datang kembali 👋
                </small>

            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-danger">

                    Logout

                </button>

            </form>

        </nav>

        <div class="admin-content">

            @yield('content')

        </div>

    </main>

</div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.btn-delete').forEach(button => {

            button.addEventListener('click', function(e){

                e.preventDefault();

                const form = this.closest('form');

                Swal.fire({

                    title: 'Yakin ingin menghapus?',

                    text: 'Data yang dihapus tidak dapat dikembalikan.',

                    icon: 'warning',

                    showCancelButton: true,

                    confirmButtonColor: '#dc3545',

                    cancelButtonColor: '#6c757d',

                    confirmButtonText: 'Ya, Hapus!',

                    cancelButtonText: 'Batal'

                }).then((result) => {

                    if(result.isConfirmed){

                        form.submit();

                    }

                });

            });

        });

    });
    </script>

    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
    </script>
    @endif

    <script>

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

    [...tooltipTriggerList].map(function (tooltipTriggerEl) {

        return new bootstrap.Tooltip(tooltipTriggerEl);

    });

    </script>
</body>
</html>