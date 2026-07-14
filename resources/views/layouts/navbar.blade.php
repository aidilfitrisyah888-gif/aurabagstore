<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3" href="/">
            👜 Aura Bag Store
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
            id="navbarNav">

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>

            <a class="nav-link"
                href="{{ route('categories.index') }}">
                Kategori
            </a>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
            </li>

            <a class="nav-link"
                href="{{ route('about') }}">
                Tentang
            </a>

            <a class="nav-link"
                href="{{ route('contact') }}">
                Kontak
            </a>

        </ul>
        </div>

    </div>

</nav>