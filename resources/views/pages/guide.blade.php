@extends('layouts.app')

@section('content')

<style>

    .guide-page{
        background:var(--aura-ivory);
        min-height:70vh;
    }

    /* ---- Hero ---- */
    .guide-hero{
        text-align:center;
        padding:4.5rem 1rem 3rem;
    }

    .guide-eyebrow{
        display:inline-flex;
        align-items:center;
        gap:.5rem;

        margin-bottom:1.1rem;
        padding:.4rem .9rem .4rem .7rem;

        border-radius:999px;

        background:rgba(198,149,46,.12);
        color:var(--aura-tan);

        font-family:'JetBrains Mono', monospace;
        font-size:.72rem;
        font-weight:600;
        letter-spacing:.1em;
        text-transform:uppercase;
    }

    .guide-eyebrow::before{
        content:"";
        width:6px; height:6px;
        border-radius:50%;
        background:currentColor;
        opacity:.4;
        box-shadow:inset 0 0 0 1px currentColor;
    }

    .guide-hero h1{
        color:var(--aura-espresso);
        font-size:clamp(2rem, 5vw, 3.5rem);
        margin-bottom:1rem;
    }

    .guide-hero p{
        color:var(--aura-ink-soft);
        max-width:650px;
        margin:auto;
        line-height:1.8;
    }

    /* ---- Section umum ---- */
    .guide-section{
        margin-bottom:4.5rem;
    }

    .guide-section-title{
        text-align:center;
        margin-bottom:2.75rem;
    }

    .guide-section-title h2{
        color:var(--aura-espresso);
        margin-bottom:.6rem;
    }

    .guide-section-title p{
        color:var(--aura-ink-soft);
        margin:0;
    }

    .guide-divider{
        border:none;
        border-top:2px dashed rgba(198,149,46,.35);
        width:56px;
        margin:.9rem auto 0;
    }

    /* ---- Step card (cara belanja) ---- */
    .step-card{
        position:relative;
        height:100%;
        padding:2.2rem 1.5rem 1.8rem;
        text-align:center;

        background:#fff;

        border:1px solid rgba(198,149,46,.18);
        border-top:3px solid var(--aura-brass);
        border-radius:16px;

        box-shadow:0 8px 25px rgba(34,24,18,.06);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }

    .step-card:hover{
        transform:translateY(-6px);
        box-shadow:0 18px 38px rgba(34,24,18,.14);
    }

    .step-number{
        width:52px;
        height:52px;

        display:flex;
        align-items:center;
        justify-content:center;

        margin:0 auto 1.25rem;

        border-radius:50%;

        background:linear-gradient(
            135deg,
            var(--aura-brass-light),
            var(--aura-brass)
        );

        color:var(--aura-espresso);

        font-family:'JetBrains Mono', monospace;
        font-weight:700;
        font-size:1.1rem;

        box-shadow:0 8px 18px rgba(198,149,46,.3);
        transition:transform .25s ease;
    }

    .step-card:hover .step-number{
        transform:rotate(-8deg) scale(1.06);
    }

    .step-card h4{
        color:var(--aura-espresso);
        margin-bottom:.7rem;
        font-size:1.1rem;
    }

    .step-card p{
        color:var(--aura-ink-soft);
        font-size:.9rem;
        line-height:1.7;
        margin:0;
    }

    /* Panah penghubung antar step (desktop) */
    .step-card::after{
        content:"\F135";
        font-family:"bootstrap-icons";
        position:absolute;
        top:50%;
        right:-1.6rem;
        transform:translateY(-50%);
        color:rgba(198,149,46,.4);
        font-size:1.1rem;
        display:none;
    }

    @media(min-width:992px){
        .col-lg-3:not(:last-child) .step-card::after{ display:block; }
    }

    /* ---- FAQ (accordion custom, tanpa Bootstrap collapse) ---- */
    .faq-wrapper{
        max-width:850px;
        margin:auto;
    }

    .faq-item{
        margin-bottom:1rem;

        border:1px solid rgba(198,149,46,.2);
        border-radius:12px;
        overflow:hidden;

        background:#fff;

        transition:box-shadow .2s ease, border-color .2s ease;
    }

    .faq-item.open{
        border-color:rgba(198,149,46,.45);
        box-shadow:0 12px 28px rgba(34,24,18,.1);
    }

    .faq-question{
        width:100%;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:1rem;

        padding:1.1rem 1.4rem;

        background:#fff;
        border:none;
        text-align:left;

        color:var(--aura-espresso);
        font-weight:600;
        font-size:1rem;

        cursor:pointer;
        transition:background .2s ease;
    }

    .faq-item.open .faq-question{
        background:var(--aura-greige);
    }

    .faq-icon{
        flex:0 0 auto;
        width:30px;
        height:30px;

        display:flex;
        align-items:center;
        justify-content:center;

        border-radius:50%;

        background:rgba(198,149,46,.12);
        color:var(--aura-brass);

        transition:transform .3s ease, background .2s ease, color .2s ease;
    }

    .faq-item.open .faq-icon{
        background:var(--aura-brass);
        color:var(--aura-espresso);
        transform:rotate(180deg);
    }

    .faq-answer{
        max-height:0;
        overflow:hidden;
        transition:max-height .3s ease;
    }

    .faq-answer-inner{
        padding:0 1.4rem 1.3rem;
        color:var(--aura-ink-soft);
        line-height:1.8;
    }

    /* ---- Kontak ---- */
    .guide-contact{
        position:relative;
        overflow:hidden;

        max-width:850px;
        margin:0 auto 4rem;

        padding:2.5rem 2rem;

        text-align:center;

        border-radius:20px;
        border:1px dashed var(--aura-brass);

        background:
            linear-gradient(
                135deg,
                var(--aura-espresso-2),
                var(--aura-espresso)
            );

        color:#fff;
    }

    .guide-contact::before{
        content:"\F5F2";
        font-family:"bootstrap-icons";
        position:absolute;
        font-size:9rem;
        opacity:.05;
        right:-1.2rem;
        bottom:-1.8rem;
        transform:rotate(-12deg);
        pointer-events:none;
    }

    .guide-contact > *{
        position:relative;
        z-index:1;
    }

    .guide-contact h3{
        color:var(--aura-brass-light);
        margin-bottom:.6rem;
    }

    .guide-contact p{
        color:#C7B8A3;
        line-height:1.7;
        margin-bottom:1.5rem;
    }

    .guide-contact a{
        display:inline-flex;
        align-items:center;
        gap:.5rem;

        padding:.8rem 1.5rem;

        border-radius:999px;

        background:var(--aura-brass);

        color:var(--aura-espresso);

        text-decoration:none;
        font-weight:600;

        transition:.2s ease;
    }

    .guide-contact a:hover{
        background:var(--aura-brass-light);
        transform:translateY(-2px);
        box-shadow:0 12px 25px -8px rgba(198,149,46,.6);
    }

</style>

<div class="guide-page">

    {{-- HERO --}}

    <section class="guide-hero">

        <div class="container">

            <span class="guide-eyebrow">Aura Bag Store</span>

            <h1>Cara Belanja &amp; FAQ</h1>

            <p>
                Temukan panduan sederhana untuk berbelanja
                dan jawaban atas pertanyaan umum seputar
                Aura Bag Store.
            </p>

        </div>

    </section>


    {{-- CARA BELANJA --}}

    <section class="guide-section">

        <div class="container">

            <div class="guide-section-title">

                <h2>Cara Belanja</h2>

                <p>
                    Belanja di Aura Bag Store dengan mudah
                    melalui beberapa langkah berikut.
                </p>

                <hr class="guide-divider">

            </div>


            <div class="row g-4">

                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">01</div>

                        <h4>Pilih Produk</h4>

                        <p>
                            Jelajahi koleksi produk dan pilih
                            tas yang sesuai dengan gaya dan kebutuhanmu.
                        </p>

                    </div>

                </div>


                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">02</div>

                        <h4>Masukkan Keranjang</h4>

                        <p>
                            Tambahkan produk yang kamu inginkan ke dalam
                            keranjang belanja dengan menekan tombol tambah ke keranjang.
                        </p>

                    </div>

                </div>


                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">03</div>

                        <h4>Beli Sekarang</h4>

                        <p>
                            Atau kamu bisa membeli langsung tas pilihanmu 
                            dengan menekan tombol beli sekarang di shopee.
                        </p>

                    </div>

                </div>


                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">04</div>

                        <h4>Periksa Pesanan</h4>

                        <p>
                            Cek kembali produk dan jumlah barang yang 
                            ingin dibeli sebelum melanjutkan pemesanan di shopee.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">05</div>

                        <h4>Checkout & Beli Pesanan</h4>

                        <p>
                            Checkout produk dan pilih motif tas dan jumlah produk yang 
                            dibeli, Atau bisa juga langsung beli sekarang.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">06</div>

                        <h4>Isi Detail Pembayaran</h4>

                        <p>
                            Tambahkan produk yang kamu inginkan
                            ke dalam keranjang belanja.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">07</div>

                        <h4>Pilih Metode Pembayaran</h4>

                        <p>
                            Tambahkan produk yang kamu inginkan
                            ke dalam keranjang belanja.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="step-card">

                        <div class="step-number">08</div>

                        <h4>Buat Pesanan</h4>

                        <p>
                            Tambahkan produk yang kamu inginkan
                            ke dalam keranjang belanja.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- FAQ --}}

    <section class="guide-section">

        <div class="container">

            <div class="guide-section-title">

                <h2>Frequently Asked Questions</h2>

                <p>
                    Beberapa pertanyaan yang sering ditanyakan
                    oleh pelanggan Aura Bag Store.
                </p>

                <hr class="guide-divider">

            </div>


            <div class="faq-wrapper" id="faqWrapper">

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Bagaimana cara membeli produk?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Pilih produk yang kamu inginkan,
                            tambahkan ke keranjang, lalu hubungi
                            Aura Bag Store untuk konfirmasi
                            ketersediaan dan proses pemesanan.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Apakah produk yang ditampilkan masih tersedia?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Ketersediaan produk dapat berubah.
                            Silakan hubungi kami untuk memastikan
                            stok produk terbaru sebelum melakukan
                            pemesanan.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Bagaimana cara menghubungi Aura Bag Store?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Kamu dapat menghubungi kami melalui
                            kontak yang tersedia di bagian footer
                            website atau melalui media sosial Aura Bag Store.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Apakah bisa melakukan pemesanan dari luar Bandung?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Untuk pengiriman ke luar Bandung,
                            silakan hubungi kami terlebih dahulu
                            untuk mendapatkan informasi mengenai
                            ketersediaan layanan pengiriman.
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" type="button">
                        <span>Kapan Aura Bag Store dapat dihubungi?</span>
                        <span class="faq-icon"><i class="bi bi-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">
                        <div class="faq-answer-inner">
                            Kami dapat dihubungi pada:
                            <br><br>
                            <strong>Senin – Sabtu, pukul 09.00 – 21.00 WIB.</strong>
                            <br>
                            Pesan yang masuk di luar jam operasional
                            akan dibalas pada jam operasional berikutnya.
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{-- KONTAK --}}

    <section class="guide-contact">

        <h3>Masih punya pertanyaan?</h3>

        <p>
            Jangan ragu untuk menghubungi Aura Bag Store.
            Kami siap membantu menjawab pertanyaanmu.
        </p>

        <a href="#">
            <i class="bi bi-whatsapp"></i>
            Hubungi Kami
        </a>

    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Accordion FAQ custom — sengaja tidak pakai data-bs-toggle Bootstrap
    // supaya tidak bentrok kalau Bootstrap JS ke-load lebih dari sekali
    // (penyebab umum accordion "kedip"/nutup sendiri).

    const faqItems = document.querySelectorAll('#faqWrapper .faq-item');

    faqItems.forEach(function (item) {

        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');

        question.addEventListener('click', function () {

            const isOpen = item.classList.contains('open');

            // Tutup semua item lain (accordion: cuma 1 yang terbuka)
            faqItems.forEach(function (other) {
                if (other !== item) {
                    other.classList.remove('open');
                    other.querySelector('.faq-answer').style.maxHeight = null;
                }
            });

            if (isOpen) {
                item.classList.remove('open');
                answer.style.maxHeight = null;
            } else {
                item.classList.add('open');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }

        });

    });

});
</script>

@endsection