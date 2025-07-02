@extends('admin.layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="container mt-4">
    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nisn" class="form-label fw-semibold">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nis" class="form-label fw-semibold">NIS</label>
                        <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="id_kelas" class="form-label fw-semibold">Kelas</label>
                        <select name="id_kelas" class="form-select" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ $siswa->id_kelas == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="telepon" class="form-label fw-semibold">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $siswa->telepon) }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="foto" class="form-label fw-semibold">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        @if($siswa->foto)
                            <small class="d-block mt-2">Foto saat ini: <img src="{{ asset('storage/profiles/' . $siswa->foto) }}" width="50"></small>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="user_id" class="form-label fw-semibold">Wali Murid</label>
                        <select name="user_id" class="form-select">
                            <option value="">-- Pilih Wali --</option>
                            @foreach ($wali_users as $wali)
                                <option value="{{ $wali->id }}" {{ $siswa->user_id == $wali->id ? 'selected' : '' }}>
                                    {{ $wali->name }} ({{ $wali->username ?? $wali->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
