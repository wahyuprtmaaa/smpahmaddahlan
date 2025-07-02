@extends('wali.layouts.app')
@section('title', 'Riwayat Pembayaran')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-hover " data-toggle="data-table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Pembayaran</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                    @if($pembayarans->contains('status', 2))
                        <th>Cetak Invoice</th>
                    @endif
                    @if($pembayarans->contains('status', 3))
                        <th>Keterangan</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pembayarans as $pembayaran)
                <tr class="text-center">
                    <td data-label="Nama Siswa">{{ $pembayaran->tagihan->siswa->nama }}</td>
                    <td data-label="Kelas">{{ $pembayaran->tagihan->siswa->kelas->nama }}</td>
                    <td data-label="Nisn">{{ $pembayaran->tagihan->siswa->nisn }}</td>
                    <td data-label="Pembayaran">
                        <strong> {{ $pembayaran->tagihan->biaya->nama_biaya }}</strong> <br>
                        Rp {{ number_format($pembayaran->jumlah_dibayar, 0, ',', '.') }}

                    </td>
                    <td data-label="Tanggal Bayar">{{ date('d M Y', strtotime($pembayaran->tanggal_bayar)) }}</td>
                    <td class="text-white" data-label="Status">
                        @if($pembayaran->status == 0)
                            <span class="badge bg-warning">Belum Dibayar</span>
                        @elseif($pembayaran->status == 1)
                            <span class="badge bg-info">Menunggu Konfirmasi</span>
                        @elseif($pembayaran->status == 2)
                            <span class="badge bg-success">Lunas</span>
                        @elseif($pembayaran->status == 3)
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td data-label="Bukti">
                        <a href="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" target="_blank">Lihat</a>
                    </td>
                    @if($pembayarans->contains('status', 2))
                        <td data-label="Cetak">
                            @if($pembayaran->status == 2)
                                <a class="btn btn-primary" href="{{ route('wali.pembayaran.invoice', $pembayaran->id) }}" rel="noopener noreferrer"><i class="fa-solid fa-print"></i></a>
                            @endif
                        </td>
                    @endif
                    @if($pembayarans->contains('status', 3))
                        <td data-label="Keterangan">
                            @if($pembayaran->status == 3)
                                {{ $pembayaran->keterangan }}
                            @endif
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
