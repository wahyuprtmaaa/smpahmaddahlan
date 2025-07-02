<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Pembayaran SPP - SMP Ahmad Dahlan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/css-circular-prog-bar.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <style>
        .tutorial_section .list-group-item {
            font-size: 1.1rem;
            transition: 0.3s ease;
        }
        .tutorial_section .list-group-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        .border-4 {
            border-width: 4px !important;
        }
    </style>
</head>
<body>
    <div class="top_container">
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="/">
                        <img src="assets/images/logo.png" alt="Logo Sekolah">
                        <span>SMP Ahmad Dahlan</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <section class="hero_section">
            <div class="hero-container container">
                <div class="hero_detail-box">
                    <h3>Selamat Datang di</h3>
                    <h1>SMP Ahmad Dahlan</h1>
                    <p>
                        Portal informasi dan pembayaran SPP secara online. Dapatkan kemudahan dalam memantau dan menyelesaikan administrasi pendidikan anak Anda.
                    </p>
                </div>
                <div class="hero_img-container">
                    <img src="assets/images/hero.png" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </section>
    </div>

    {{--  <section class="about_section layout_padding">
        <div class="container">
            <h2 class="main-heading">Tentang Sekolah</h2>
            <p class="text-center">
                SMP Ahmad Dahlan adalah sekolah yang berkomitmen pada pendidikan karakter dan akademik yang unggul. Kami mendukung kemudahan pembayaran SPP secara online agar orang tua dapat mengelola keuangan pendidikan dengan lebih baik.
            </p>
            <div class="about_img-box">
                <img src="assets/images/kids.jpg" alt="Tentang Kami" class="img-fluid w-100">
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="tentang.html" class="call_to-btn">
                    <span>Informasi Lebih Lanjut</span>
                    <img src="assets/images/right-arrow.png" alt="">
                </a>
            </div>
        </div>
    </section>  --}}

    <!-- SECTION: Tutorial Pembayaran -->
    <section class="tutorial_section layout_padding bg-light">
        <div class="container">
            <h2 class="main-heading text-center mb-4">Tutorial Pembayaran SPP</h2>
            <p class="text-center mb-5">
                Ikuti langkah-langkah mudah berikut untuk melakukan pembayaran SPP secara online di SMP Ahmad Dahlan.
            </p>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-white border-left border-primary border-4 mb-2 shadow-sm">
                            <strong>1. Login</strong> ke portal dengan menggunakan akun Anda.
                        </li>
                        <li class="list-group-item bg-white border-left border-success border-4 mb-2 shadow-sm">
                            <strong>2. Pilih Menu</strong> "Pembayaran SPP" di dashboard.
                        </li>
                        <li class="list-group-item bg-white border-left border-warning border-4 mb-2 shadow-sm">
                            <strong>3. Cek Tagihan</strong> Anda dan pastikan jumlah yang harus dibayar.
                        </li>
                        <li class="list-group-item bg-white border-left border-info border-4 mb-2 shadow-sm">
                            <strong>4. Isi Data Tagihan</strong> (Data Rekening, Bukti transfer, Tanggal Pembayaran.)
                        </li>
                        <li class="list-group-item bg-white border-left border-danger border-4 mb-2 shadow-sm">
                            <strong>5. Selesaikan Pembayaran</strong> dan simpan bukti transaksi.
                        </li>
                        <li class="list-group-item bg-white border-left border-secondary border-4 mb-2 shadow-sm">
                            <strong>6. Cetak Bukti</strong> pembayaran dari menu riwayat pembayaran setelah dikonfirmasi.
                        </li>
                    </ul>
                </div>
                {{--  <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="assets/images/tutorial.png" alt="Tutorial Pembayaran" class="img-fluid rounded shadow">
                </div>  --}}
            </div>
        </div>
    </section>

    <section class="landing_section layout_padding">
        <div class="container text-center">
            <h2 class="main-heading">Butuh Bantuan?</h2>
            <h2 class="main-heading number_heading">Hubungi Kami di WhatsApp</h2>
            <p class="landing_detail">
                Klik tombol di bawah untuk menghubungi kami langsung melalui WhatsApp.
            </p>
            <a href="https://wa.me/6282175492549?text=Halo%2C%20saya%20ingin%20bertanya" target="_blank" class="btn btn-success mt-3">
                Chat via WhatsApp
            </a>
        </div>
    </section>

    <section class="container-fluid footer_section">
        <p>
            &copy; 2025 SMP Ahmad Dahlan. Seluruh Hak Cipta Dilindungi.
        </p>
    </section>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
