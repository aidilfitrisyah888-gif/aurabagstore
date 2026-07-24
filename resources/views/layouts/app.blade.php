<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aura Bag Store</title>

    <link rel="icon" type="image/png"
        href="{{ asset('assets/images/logo-tas.png') }}">

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

  /* =========================================================
    FOOTER — AURA BAG STORE
    ========================================================= */

    .aura-footer{
        position:relative;
        overflow:hidden;

        background:
            radial-gradient(
                circle at 85% 15%,
                rgba(198,149,46,.12),
                transparent 32%
            ),
            linear-gradient(
                135deg,
                var(--aura-espresso-2),
                var(--aura-espresso)
            );

        color:#C7B8A3;
        padding:5rem 0 1.5rem;
        margin-top:0;
    }

    /* Ornamen cahaya */

    .aura-footer::before{
        content:"";
        position:absolute;

        width:360px;
        height:360px;

        right:-150px;
        bottom:-180px;

        border-radius:50%;

        background:radial-gradient(
            circle,
            rgba(198,149,46,.12),
            transparent 70%
        );

        pointer-events:none;
    }

    /* Garis dekoratif atas */

    .aura-footer::after{
        content:"";

        position:absolute;
        top:0;
        left:0;

        width:100%;
        height:3px;

        background:
            linear-gradient(
                90deg,
                transparent,
                var(--aura-brass),
                var(--aura-brass-light),
                var(--aura-brass),
                transparent
            );

        opacity:.8;
    }


    /* Brand */

    .footer-brand{
        display:inline-flex;
        align-items:center;
        gap:.7rem;

        margin-bottom:1.25rem;

        text-decoration:none;
    }

    .footer-brand-icon{
        width:48px;
        height:48px;

        display:flex;
        align-items:center;
        justify-content:center;

        border-radius:50%;

        color:var(--aura-espresso);

        background:
            linear-gradient(
                135deg,
                var(--aura-brass-light),
                var(--aura-brass)
            );

        font-size:1.4rem;

        box-shadow:
            0 8px 20px rgba(198,149,46,.25),
            inset 0 1px 2px rgba(255,255,255,.4);
    }

    .footer-brand-text{
        display:flex;
        flex-direction:column;

        line-height:1;
    }

    .footer-brand-text strong{
        color:#fff;

        font-family:'Fraunces', serif;
        font-size:1.3rem;
    }

    .footer-brand-text small{
        margin-top:5px;

        color:var(--aura-brass-light);

        font-family:'JetBrains Mono', monospace;
        font-size:.58rem;
        letter-spacing:.25em;
    }


    /* Deskripsi */

    .aura-footer p{
        color:#C7B8A3;
        font-size:.9rem;
        line-height:1.75;
    }


    /* Judul kolom */

    .aura-footer h5{
        position:relative;

        color:var(--aura-brass-light);

        font-family:'JetBrains Mono', monospace;
        font-size:.75rem;
        font-weight:600;

        letter-spacing:.12em;
        text-transform:uppercase;

        margin-bottom:1.25rem;
    }


    /* Garis kecil bawah judul */

    .aura-footer h5::after{
        content:"";

        display:block;

        width:28px;
        height:2px;

        margin-top:.55rem;

        background:var(--aura-brass);
    }


    /* Link */

    .aura-footer ul{
        list-style:none;
        padding:0;
        margin:0;
    }

    .aura-footer ul li{
        margin-bottom:.7rem;
    }

    .aura-footer ul li a{
        display:inline-flex;
        align-items:center;
        gap:.45rem;

        color:#C7B8A3;

        text-decoration:none;
        font-size:.9rem;

        transition:
            color .2s ease,
            transform .2s ease;
    }

    .aura-footer ul li a:hover{
        color:var(--aura-brass-light);
        transform:translateX(4px);
    }


    /* Kontak */

    .aura-footer .contact-row{
        display:flex;
        align-items:flex-start;
        gap:.7rem;

        margin-bottom:.9rem;

        color:#C7B8A3;
        font-size:.9rem;
        line-height:1.5;
    }

    .aura-footer .contact-row i{
        flex:0 0 auto;

        margin-top:.15rem;

        color:var(--aura-brass);
        font-size:1rem;
    }

    .aura-footer .contact-row a{
        color:#C7B8A3;

        text-decoration:none;

        transition:color .2s ease;
    }

    .aura-footer .contact-row a:hover{
        color:var(--aura-brass-light);
    }


    /* Social media */

    .footer-social{
        display:flex;
        gap:.65rem;

        margin-top:1.4rem;
    }

    .footer-social a{
        width:38px;
        height:38px;

        display:flex;
        align-items:center;
        justify-content:center;

        border-radius:50%;

        color:#C7B8A3;

        border:1px solid rgba(198,149,46,.35);

        text-decoration:none;

        transition:
            transform .2s ease,
            color .2s ease,
            background .2s ease,
            border-color .2s ease;
    }

    .footer-social a:hover{
        color:var(--aura-espresso);

        background:var(--aura-brass);

        border-color:var(--aura-brass);

        transform:translateY(-4px);
    }


    /* Trust badge */

    .footer-trust{
        display:flex;
        flex-wrap:wrap;
        gap:.6rem;

        margin-top:1.5rem;
    }

    .footer-trust span{
        display:inline-flex;
        align-items:center;
        gap:.4rem;

        padding:.4rem .7rem;

        border-radius:999px;

        background:rgba(255,255,255,.045);

        border:1px solid rgba(198,149,46,.2);

        color:#C7B8A3;

        font-size:.72rem;
    }

    .footer-trust i{
        color:var(--aura-brass-light);
    }


    /* Divider */

    .aura-footer-divider{
        border:none;

        border-top:1px dashed rgba(198,149,46,.3);

        margin:3rem 0 1.5rem;
    }


    /* Footer bottom */

    .aura-footer-bottom{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:1rem;

        color:#9C8B76;

        font-size:.8rem;
        letter-spacing:.02em;
    }

    .footer-bottom-links{
        display:flex;
        gap:1.25rem;
    }

    .footer-bottom-links a{
        color:#9C8B76;

        text-decoration:none;

        transition:color .2s ease;
    }

    .footer-bottom-links a:hover{
        color:var(--aura-brass-light);
    }


    @media(max-width:767px){

        .aura-footer{
            padding-top:4rem;
        }

        .aura-footer-bottom{
            flex-direction:column;
            text-align:center;
        }

        .footer-bottom-links{
            justify-content:center;
            flex-wrap:wrap;
        }

    }

        .aura-brand{
        display:flex;
        align-items:center;
        gap:.7rem;
        text-decoration:none;
    }

    .aura-logo-icon{
        width:44px;
        height:44px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        background:linear-gradient(
            135deg,
            var(--aura-brass-light),
            var(--aura-brass)
        );
        color:var(--aura-espresso);
        font-size:1.35rem;
        box-shadow:
            0 5px 15px rgba(198,149,46,.3),
            inset 0 1px 2px rgba(255,255,255,.35);
    }

    .aura-brand-text{
        display:flex;
        flex-direction:column;
        line-height:1;
    }

    .aura-brand-text strong{
        font-size:1.05rem;
        letter-spacing:.08em;
        color:#fff;
    }

    .aura-brand-text small{
        margin-top:4px;
        font-size:.58rem;
        letter-spacing:.25em;
        color:#C6952E;
    }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg aura-navbar sticky-top">

    <div class="container">

        <a href="{{ route('home') }}" class="navbar-brand aura-brand">

            <div class="aura-logo-icon">
                <i class="bi bi-handbag-fill"></i>
            </div>

            <div class="aura-brand-text">
                <strong>AURA BAG</strong>
                <small>STORE</small>
            </div>

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
                        <i class="bi bi-house-door-fill"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        <i class="bi bi-bag-fill"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        <i class="bi bi-tags-fill"></i>
                        Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        href="{{ route('cart.index') }}"
                        class="nav-link position-relative">
                        <i class="bi bi-cart3"></i>
                        Keranjang
                        @php
                            $cartCount = collect(session('cart', []))
                                ->sum('quantity');
                        @endphp

                        @if($cartCount > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                {{ $cartCount }}
                            </span>
                        @endif
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

        <div class="row g-5">

            {{-- BRAND --}}
            <div class="col-lg-5 col-md-6">

                <a href="{{ route('home') }}" class="footer-brand">

                    <div class="footer-brand-icon">
                        <i class="bi bi-handbag-fill"></i>
                    </div>

                    <div class="footer-brand-text">
                        <strong>AURA BAG</strong>
                        <small>STORE</small>
                    </div>

                </a>

                <p>
                    Temukan tas yang sesuai dengan gaya,
                    kebutuhan, dan aktivitasmu di Aura Bag Store.
                    Kami menghadirkan pilihan tas berkualitas
                    dengan harga yang bersahabat.
                </p>

                <div class="footer-trust">

                    <span>
                        <i class="bi bi-shield-check"></i>
                        Pilihan Berkualitas
                    </span>

                    <span>
                        <i class="bi bi-bag-check"></i>
                        Belanja Nyaman
                    </span>

                </div>

                <div class="footer-social">

                    <a href="#" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" aria-label="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>

                    <a href="#" aria-label="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>

                </div>

            </div>


            {{-- NAVIGASI TOKO --}}
            <div class="col-lg-3 col-md-6">

                <h5>Jelajahi</h5>

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            <i class="bi bi-chevron-right"></i>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}">
                            <i class="bi bi-chevron-right"></i>
                            Semua Produk
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories.index') }}">
                            <i class="bi bi-chevron-right"></i>
                            Kategori
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cart.index') }}">
                            <i class="bi bi-chevron-right"></i>
                            Keranjang
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}#lokasi">
                            <i class="bi bi-chevron-right"></i>
                            Lokasi Toko
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('guide') }}">
                            <i class="bi bi-chevron-right"></i>
                            Cara Belanja & FAQ
                        </a>
                    </li>

                </ul>

            </div>


            {{-- KONTAK --}}
            <div class="col-lg-4 col-md-6">

                <h5>Hubungi Kami</h5>

                <div class="contact-row">

                    <i class="bi bi-geo-alt-fill"></i>

                    <a
                        href="https://maps.app.goo.gl/wdfFW2yXARxdT8ru9"
                        target="_blank"
                        rel="noopener noreferrer">

                        Bandung, Indonesia

                    </a>

                </div>

                <div class="contact-row">

                    <i class="bi bi-envelope-fill"></i>

                    <span>
                        aurabagstore@gmail.com
                    </span>

                </div>

                <div class="contact-row">

                    <i class="bi bi-clock-fill"></i>

                    <span>
                        Jam Operasional<br>
                        Senin – Sabtu, 09.00 – 21.00 WIB
                    </span>

                </div>

                <div class="contact-row">

                    <i class="bi bi-chat-dots-fill"></i>

                    <span>
                        Pesan dibalas selama jam operasional
                    </span>

                </div>

            </div>

        </div>


        <hr class="aura-footer-divider">


        <div class="aura-footer-bottom">

            <div>

                © {{ date('Y') }}
                Aura Bag Store.
                All Rights Reserved.

            </div>

            <div class="footer-bottom-links">

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <a href="{{ route('products.index') }}">
                    Koleksi
                </a>

                <a href="{{ route('cart.index') }}">
                    Keranjang
                </a>

            </div>

        </div>

    </div>

</footer>

</body>

</html>