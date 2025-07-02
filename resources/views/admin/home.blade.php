@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                        <i class="fas fa-list-alt"></i>
                    </div>
                </div>
                <div>
                    <p class="mb-1 text-muted">Total Tagihan</p>
                    <h5 class="mb-0">{{ $totalTagihan }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div>
                    <p class="mb-1 text-muted">Total Pemasukan</p>
                    <h5 class="mb-0">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div>
                    <p class="mb-1 text-muted">Jumlah Siswa</p>
                    <h5 class="mb-0">{{ $totalSiswa }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-warning text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
                <div>
                    <p class="mb-1 text-muted">Tagihan Tertunda</p>
                    <h5 class="mb-0">{{ $totalPembayaranPending }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-5">
    <div class="card-header">Transaksi Online Terbaru</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Jenis</th>
                    <th>Jumlah Dibayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiTerbaru as $transaksi)
                    <tr>
                        <td>{{ $transaksi->tagihan->siswa->nama }}</td>
                        <td>{{ $transaksi->tagihan->biaya->nama_biaya }}</td>
                        <td>Rp {{ number_format($transaksi->jumlah_dibayar, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->tanggal_bayar }}</td>
                        <td>
                            <span class="badge
                                @if($transaksi->status == 0) bg-secondary
                                @elseif($transaksi->status == 1) bg-warning
                                @elseif($transaksi->status == 2) bg-success
                                @elseif($transaksi->status == 3) bg-danger
                                @endif">
                                @if($transaksi->status == 0) ⏳ Belum Dibayar
                                @elseif($transaksi->status == 1) 🔄 Menunggu Konfirmasi
                                @elseif($transaksi->status == 2) ✅ Dikonfirmasi
                                @elseif($transaksi->status == 3) ❌ Ditolak
                                @endif
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada transaksi terbaru</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


