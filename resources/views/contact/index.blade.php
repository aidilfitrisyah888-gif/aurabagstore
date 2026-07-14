@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="py-5 bg-light">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">

            Hubungi Kami

        </h1>

        <p class="lead text-muted">

            Kami siap membantu menjawab pertanyaan Anda.

        </p>

    </div>

</section>

<!-- Contact -->
<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <!-- Informasi -->
            <div class="col-lg-5">

                <div class="card shadow border-0 h-100">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">

                            Informasi Kontak

                        </h3>

                        <p>

                            📞 <strong>WhatsApp</strong><br>

                            08xxxxxxxxxx

                        </p>

                        <hr>

                        <p>

                            📧 <strong>Email</strong><br>

                            aurabagstore@gmail.com

                        </p>

                        <hr>

                        <p>

                            📷 <strong>Instagram</strong><br>

                            @aurabagstore

                        </p>

                        <hr>

                        <p>

                            📍 <strong>Alamat</strong><br>

                            Bandung, Jawa Barat

                        </p>

                    </div>

                </div>

            </div>

            <!-- Form -->
            <div class="col-lg-7">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">

                            Kirim Pesan

                        </h3>

                        <form>

                            <div class="mb-3">

                                <label class="form-label">

                                    Nama

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Masukkan nama">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Masukkan email">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Pesan

                                </label>

                                <textarea
                                    rows="6"
                                    class="form-control"
                                    placeholder="Tulis pesan..."></textarea>

                            </div>

                            <button
                                class="btn btn-warning btn-lg w-100">

                                Kirim Pesan

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Maps -->
<section class="pb-5">

    <div class="container">

        <div class="card shadow border-0">

            <div class="card-body">

                <h3 class="fw-bold mb-4 text-center">

                    Lokasi Kami

                </h3>

                <iframe
                    src="https://www.google.com/maps?q=Bandung&output=embed"
                    width="100%"
                    height="400"
                    style="border:0;"
                    loading="lazy">

                </iframe>

            </div>

        </div>

    </div>

</section>

@endsection