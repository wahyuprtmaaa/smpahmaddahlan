@extends('admin.layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="container mt-4">
    <div class="card mt-3">
        <div class="card-body row">
            <div class="col-md-4 text-center">
                <img src="{{ $siswa->foto ? asset('storage/profiles/' . $siswa->foto) : asset('storage/uploads/profiles/avatar.png') }}"
                     alt="Foto Siswa" class="img-fluid rounded-circle border shadow-sm" width="150">
                <h5 class="mt-3">{{ $siswa->nama }}</h5>
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <td><strong><i class="bi bi-card-list"></i> NISN</strong></td>
                        <td>: {{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-credit-card"></i> NIS</strong></td>
                        <td>: {{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-house-door"></i> Kelas</strong></td>
                        <td>: {{ $siswa->kelas->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-geo-alt"></i> Alamat</strong></td>
                        <td>: {{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-telephone"></i> Telepon</strong></td>
                        <td>: {{ $siswa->telepon }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-calendar-event"></i> Tanggal Lahir</strong></td>
                        <td>: {{ $siswa->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</strong></td>
                        <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td><strong><i class="bi bi-person"></i> Wali</strong></td>
                        <td>: {{ $siswa->wali->name ?? '-' }}</td>
                    </tr>
                </table>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
