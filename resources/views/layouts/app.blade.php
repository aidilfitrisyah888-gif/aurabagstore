<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aura Bag Store</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">

            <img src="{{ asset('assets/images/logo.png') }}"
                width="45"
                class="me-2"
                alt="Logo Aura Bag">

            Aura Bag Store

        </a>

        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="navbar-collapse show"
            id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('products.index') }}">

                        Produk

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('categories.index') }}">

                        Kategori

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('about.index') }}">

                        Tentang

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('contact.index') }}">

                        Contact

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<main>

    @yield('content')

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>