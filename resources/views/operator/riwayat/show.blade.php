@extends('operator.layouts.app')
@section('title', 'Riwayat Pembayaran Wali')

@section('content')
<div class="container-fluid">
    @foreach($wali->siswas as $siswa)
        <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100px;"><strong>Wali</strong></td>
                    <td>: {{ $wali->name }}</td>
                </tr>
                <tr>
                    <td><strong>Siswa</strong></td>
                    <td>: {{ $siswa->nama }}</td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>: {{ $siswa->kelas->nama ?? '-' }}</td>
                </tr>
            </table>
        </div>
            <div class="card-body">
                @if($siswa->tagihans->count() > 0)
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Tagihan</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Tanggal Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa->tagihans as $tagihan)
                                @foreach($tagihan->pembayarans as $pembayaran)
                                    <tr>
                                        <td>{{ $tagihan->biaya->nama_biaya ?? '-' }}</td>
                                        <td>Rp{{ number_format($pembayaran->jumlah_dibayar, 0, ',', '.') }}</td>
                                        <td>
                                            @switch($pembayaran->status)
                                                @case(0)
                                                    <span class="badge bg-secondary">Pending</span>
                                                    @break
                                                @case(1)
                                                    <span class="badge bg-warning text-dark">Belum Dikonfirmasi</span>
                                                    @break
                                                @case(2)
                                                    <span class="badge bg-success">Lunas</span>
                                                    @break
                                                @case(3)
                                                    <span class="badge bg-danger">Ditolak</span>
                                                    @break
                                                @default
                                                    <span class="text-muted">-</span>
                                            @endswitch
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">Belum ada tagihan atau pembayaran untuk siswa ini.</p>
                @endif
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-between">
        <a href="{{ route('operator.riwayat.index') }}" class="btn btn-secondary">⬅ Kembali</a>
        <a href="{{ route('operator.riwayat.cetak', $wali->id) }}" target="_blank" class="btn btn-success">🖨️ Cetak</a>
    </div>
</div>
@endsection
