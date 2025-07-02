@extends('wali.layouts.app')
@section('title', 'Tagihan')
@section('content')

<style>
/* Responsif tabel jadi tampilan list di mobile */
@media (max-width: 767px) {
  table.table {
    display: block;
    width: 100%;
  }

  table.table thead {
    display: none;
  }

  table.table tbody {
    display: block;
    width: 100%;
  }

  table.table tr {
    display: block;
    margin-bottom: 1rem;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    padding: 10px;
    background: #f8f9fa;
  }

  table.table td {
    display: flex;
    justify-content: space-between;
    padding: 8px 10px;
    border: none !important;
    border-bottom: 1px solid #ccc;
  }

  table.table td:last-child {
    border-bottom: none;
  }

  table.table td::before {
    content: attr(data-label);
    font-weight: bold;
    color: #333;
  }
}
</style>

<div class="container-fluid px-3 px-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Jenis</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($tagihans->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada Tagihan</td>
                                    </tr>
                                @else
                                    @foreach($tagihans as $tagihan)
                                        @if($tagihan->siswa)
                                            <tr>
                                                <td data-label="Nama Siswa">{{ $tagihan->siswa->nama }}</td>
                                                <td data-label="Pembayaran">
                                                    <strong>Nama:</strong> {{ $tagihan->biaya->nama_biaya ?? 'Tidak ada data' }} <br>
                                                    @if(!is_null($tagihan->biaya->bulan))
                                                        <strong>Bulan:</strong> {{ $tagihan->biaya->bulan }}
                                                    @endif
                                                </td>
                                                <td data-label="Jumlah Tagihan">Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
                                                <td data-label="Jatuh Tempo">{{ date('d-m-Y', strtotime($tagihan->tanggal_jatuh_tempo)) }}</td>
                                                <td data-label="Status" class="text-white">
                                                    @if($tagihan->status == 0)
                                                        <span class="badge bg-warning">Belum Dibayar</span>
                                                    @elseif($tagihan->status == 1)
                                                        <span class="badge bg-info">Menunggu Konfirmasi</span>
                                                    @elseif($tagihan->status == 2)
                                                        <span class="badge bg-success">Lunas</span>
                                                    @elseif($tagihan->status == 3)
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td data-label="Aksi">
                                                    <a href="{{ route('wali.pembayaran.create', $tagihan->id) }}" class="btn btn-primary btn-sm">Bayar</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <h5>Keterangan Pembayaran:</h5>
                        <p>Pembayaran bisa dilakukan langsung ke Operator(TU) sekolah, atau melalui transfer ke rekening sekolah.</p>
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Jangan melakukan transfer ke rekening selain dari rekening yang sudah tertera.</strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
