@extends('operator.layouts.app')

@section('title', 'Detail Siswa')
@section('content')
<div class="card border-0 shadow rounded-4">
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="{{ $siswa->foto ? asset('storage/profiles/' . $siswa->foto) : asset('storage/uploads/profiles/avatar.png') }}"
                         class="rounded-circle shadow mb-3" width="150" height="150" alt="Foto Siswa">
                    <h5 class="fw-bold">{{ $siswa->nama }}</h5>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">NISN</label>
                        <div>{{ $siswa->nisn }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">NIS</label>
                        <div>{{ $siswa->nis }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Kelas</label>
                        <div>{{ $siswa->kelas->nama ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Tanggal Lahir</label>
                        <div>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Telepon</label>
                        <div>{{ $siswa->telepon }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Jenis Kelamin</label>
                        <div>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold text-muted">Alamat</label>
                    <div>{{ $siswa->alamat }}</div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('operator.tagihan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Tagihan
            </a>
        </div>
        <div class="mt-4">
            <h5 class="fw-bold mb-3">Daftar Tagihan</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tagihans as $index => $tagihan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tagihan->biaya->nama_biaya }}</td>
                                <td>{{ $tagihan->biaya->bulan }}</td>
                                <td>Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                                <td>
                                    @if($tagihan->status == '0')
                                        <span class="badge bg-danger">Belum Dibayar</span>
                                    @elseif($tagihan->status == '1')
                                        <span class="badge bg-success">Belum Dikonfirmasi</span>
                                    @elseif($tagihan->status == '2')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($tagihan->status) }}</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($tagihan->tanggal)->translatedFormat('d F Y') }}</td>
                                <td data-label="Cetak">
                                    @if($tagihan->status == 2)
                                        <a class="btn btn-primary" href="{{ route('operator.tagihan.invoice', $tagihan->id) }}" target="_blank">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data tagihan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
