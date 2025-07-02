@extends('wali.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg">
            {{--  <div class="card-header bg-primary text-white text-center">
                <h2 class="fw-bold">
                    <marquee behavior="scroll" direction="left">SMP AHMAD DAHLAN SEKOLAH MASA KINI GENERASI QUR'ANI GENERASI BERPRESTASI</marquee>
                </h2>
                <p class="mb-0">Membangun Generasi Unggul & Berdaya Saing</p>
            </div>  --}}

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="text-center mb-4">
                    <h4 class="fw-bold">Selamat Datang {{ Auth::user()->name }}</h4>
                    <p class="text-muted">Akses informasi pembayaran, riwayat transaksi, dan perkembangan siswa dengan mudah.</p>
                </div>

                <div class="row">
                    <!-- Info Sekolah -->
                    <div class="col-md-6">
                        <div class="card border-primary shadow-sm">
                            <div class="card-header bg-primary text-white fw-bold">📌 Informasi Sekolah</div>
                            <div class="card-body">
                                <p><strong>🏫 Nama:</strong> SMP Ahmad Dahlan </p>
                                <p><strong>📍 Alamat:</strong> Jl. Abdul Chatab No.RT.18, Pasir Putih, Kec. Jambi Sel.  Jambi</p>
                                <p><strong>📞 Kontak:</strong> 0852 7383 2720 / 0813 8981 6141</p>
                                <p><strong>🌐 Website:</strong> <a href="https://ash-shiddiiqi.sch.id/" target="blank" class="text-primary">https://ash-shiddiiqi.sch.id/ </a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-success shadow-sm">
                            <div class="card-header bg-success text-white fw-bold">🛠️ Fitur Dashboard</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">📜 <strong>Riwayat Pembayaran</strong></li>
                                    <li class="list-group-item">💰 <strong>Konfirmasi Pembayaran</strong></li>
                                    <li class="list-group-item">📄 <strong>Cetak Invoice</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
