<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aura Bag Store</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    /* ==========================================================================
       AURA BAG STORE — Design tokens (dipakai global: navbar, footer, & konten)
       Konsep: leather goods premium — espresso gelap + aksen brass (kuningan),
       motif "hang-tag" (label gantung tas) sebagai elemen ciri khas.
       ========================================================================== */
    @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap');

    :root{
        --aura-espresso:      #221812;
        --aura-espresso-2:    #2E2019;
        --aura-espresso-3:    #3B291F;
        --aura-brass:         #C6952E;
        --aura-brass-light:   #E3B85C;
        --aura-tan:           #9C6B45;
        --aura-ivory:         #F4EEE4;
        --aura-greige:        #EAE2D3;
        --aura-ink:           #241A13;
        --aura-ink-soft:      #6B5C4C;
        --aura-line:          rgba(198,149,46,.35);
    }

    body{
        font-family:'Inter', sans-serif;
        color:var(--aura-ink);
        background:var(--aura-ivory);
    }
    h1,h2,h3,h4,h5,h6{ font-family:'Fraunces', serif; letter-spacing:-.01em; }

    /* ---- Navbar ---- */
    .aura-navbar{
        background:var(--aura-espresso) !important;
        padding-top:.85rem;
        padding-bottom:.85rem;
        border-bottom:1px solid rgba(198,149,46,.25);
    }
    .aura-navbar .navbar-brand{
        font-family:'Fraunces', serif;
        font-size:1.25rem;
        color:#F4EEE4 !important;
        display:flex;
        align-items:center;
    }
    .aura-navbar .nav-link{
        color:#D9CCBB !important;
        font-weight:500;
        font-size:.95rem;
        margin:0 .4rem;
        padding:.4rem .2rem !important;
        position:relative;
        transition:color .15s ease;
    }
    .aura-navbar .nav-link::after{
        content:"";
        position:absolute;
        left:0; bottom:-2px;
        width:0;
        height:2px;
        background:var(--aura-brass);
        transition:width .2s ease;
    }
    .aura-navbar .nav-link:hover,
    .aura-navbar .nav-link.active{
        color:#fff !important;
    }
    .aura-navbar .nav-link:hover::after,
    .aura-navbar .nav-link.active::after{
        width:100%;
    }
    .aura-navbar .navbar-toggler{
        border-color:rgba(198,149,46,.4);
        padding:.35rem .6rem;
    }
    .aura-navbar .navbar-toggler-icon{
        background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(230, 197, 129, 0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* ---- Footer ---- */
    .aura-footer{
        background:var(--aura-espresso-2);
        color:#C7B8A3;
        padding:3.5rem 0 1.75rem;
        margin-top:0;
    }
    .aura-footer h3{ color:#F4EEE4; font-size:1.35rem; margin-bottom:.75rem; }
    .aura-footer h5{
        color:var(--aura-brass-light);
        font-family:'JetBrains Mono', monospace;
        font-size:.78rem;
        font-weight:600;
        letter-spacing:.1em;
        text-transform:uppercase;
        margin-bottom:1rem;
    }
    .aura-footer p{ color:#C7B8A3; font-size:.92rem; line-height:1.65; }
    .aura-footer ul{ list-style:none; padding:0; margin:0; }
    .aura-footer ul li{ margin-bottom:.6rem; }
    .aura-footer ul li a{
        color:#C7B8A3;
        text-decoration:none;
        font-size:.92rem;
        transition:color .15s ease, padding-left .15s ease;
    }
    .aura-footer ul li a:hover{ color:var(--aura-brass-light); padding-left:.25rem; }
    .aura-footer .contact-row{
        display:flex;
        align-items:center;
        gap:.6rem;
        margin-bottom:.75rem;
        font-size:.92rem;
    }
    .aura-footer .contact-row i{ color:var(--aura-brass); font-size:1rem; }
    .aura-footer-divider{
        border:none;
        border-top:1px dashed rgba(198,149,46,.3);
        margin:2.25rem 0 1.5rem;
    }
    .aura-footer-bottom{
        text-align:center;
        font-size:.82rem;
        color:#9C8B76;
        letter-spacing:.02em;
    }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg aura-navbar sticky-top">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            <img src="{{ asset('assets/images/logo.png') }}"
                width="40"
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

                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">

                        Produk

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">

                        Kategori

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

<footer class="aura-footer">

    <div class="container">

        <div class="row">

            {{-- Tentang --}}
            <div class="col-lg-4 mb-4">

                <h3>

                    Aura Bag Store

                </h3>

                <p>

                    Menyediakan berbagai tas berkualitas
                    dengan harga terbaik untuk kebutuhan
                    sekolah, kerja, maupun traveling.

                </p>

            </div>

            {{-- Menu --}}
            <div class="col-lg-4 mb-4">

                <h5>

                    Menu

                </h5>

                <ul>

                    <li>

                        <a href="{{ route('home') }}">
                            Home
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('products.index') }}">
                            Produk
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('categories.index') }}">
                            Kategori
                        </a>

                    </li>

                </ul>

            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 mb-4">

                <h5>

                    Hubungi Kami

                </h5>

                <div class="contact-row">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Bandung, Indonesia</span>
                </div>

                <div class="contact-row">
                    <i class="bi bi-envelope-fill"></i>
                    <span>aurabagstore@gmail.com</span>
                </div>

                <div class="contact-row">
                    <i class="bi bi-phone-fill"></i>
                    <span>+62 812-3456-7890</span>
                </div>

            </div>

        </div>

        <hr class="aura-footer-divider">

        <div class="aura-footer-bottom">

            © {{ date('Y') }}
            Aura Bag Store.
            All Rights Reserved.

        </div>

    </div>

</footer>

</body>

</html>