@extends('operator.layouts.app')
@section('title', 'Laporan Pembayaran Siswa')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="GET" action="{{ route('operator.Cetaklaporan.tampil') }}" class="row g-3" target="_blank">
            <div class="col-md-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" value="{{ request('nama') }}">
            </div>
            <div class="col-md-3">
                <select name="kelas_id" class="form-select">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="biaya_id" class="form-select">
                    <option value="">-- Pilih Biaya --</option>
                    @foreach($biayas as $b)
                        <option value="{{ $b->id }}" {{ request('biaya_id') == $b->id ? 'selected' : '' }}>{{ $b->nama_biaya }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_dari" class="form-control" value="{{ request('tanggal_dari') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_sampai" class="form-control" value="{{ request('tanggal_sampai') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Status --</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Belum Dibayar</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Belum Dikonfirmasi</option>
                    <option value="2" {{ request('status') === '2' ? 'selected' : '' }}>Dikonfirmasi</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
