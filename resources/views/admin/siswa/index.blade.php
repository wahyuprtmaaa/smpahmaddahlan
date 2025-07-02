@extends('admin.layouts.app')

@section('title', 'Daftar Siswa')
@section('content')
<div class="container-fluid">
    <div id="siswa-list">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal">
                            Tambah Siswa
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Profile</th>
                                    <th>Kelas</th>
                                    <th>Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswas as $key => $siswa)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $siswa->nis }}</td>
                                    <td>
                                        <strong>Nama: {{ $siswa->nama }} </strong><br>
                                        <small><b>Wali:</b> {{ $siswa->wali->name ?? '-' }}</small>
                                    </td>
                                    <td class="text-center">{{ $siswa->kelas->nama }}</td>
                                    <td class="text-center">{{ $siswa->telepon }}</td>
                                    <td class="text-center">
                                        {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="dropdown-item">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.siswa.show', $siswa->id) }}" class="dropdown-item">
                                                        Detail
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahSiswaModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body fs-8">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nisn" class="form-label fw-semibold">NISN</label>
                            <input type="text" name="nisn" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="form-label fw-semibold">NIS</label>
                            <input type="text" name="nis" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="id_kelas" class="form-label fw-semibold">Kelas</label>
                            <select name="id_kelas" class="form-select" required>
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="telepon" class="form-label fw-semibold">Telepon</label>
                            <input type="text" name="telepon" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="foto" class="form-label fw-semibold">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="user_id" class="form-label fw-semibold">Wali Murid</label>
                            <select class="form-select" name="user_id">
                                <option value="">-- Pilih Wali yang Sudah Ada --</option>
                                @foreach ($wali_users as $wali)
                                    <option value="{{ $wali->id }}">{{ $wali->name }} ({{ $wali->username }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success btn-xs">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSiswaForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit-nisn" class="form-label">NISN</label>
                            <input type="text" id="edit-nisn" name="nisn" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-nis" class="form-label">NIS</label>
                            <input type="text" id="edit-nis" name="nis" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit-nama" class="form-label">Nama</label>
                            <input type="text" id="edit-nama" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-id_kelas" class="form-label">Kelas</label>
                            <select id="edit-id_kelas" name="id_kelas" class="form-control" required>
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit-alamat" class="form-label">Alamat</label>
                            <textarea id="edit-alamat" name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="edit-telepon" class="form-label">Telepon</label>
                            <input type="text" id="edit-telepon" name="telepon" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="edit-jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select id="edit-jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="edit-tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="edit-tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit-foto" class="form-label">Foto</label>
                            <input type="file" id="edit-foto" name="foto" class="form-control">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit-user_id" class="form-label">Wali Murid</label>
                        <select id="edit-user_id" name="user_id" class="form-control">
                            <option value="">-- Pilih Wali yang Sudah Ada --</option>
                            @foreach ($wali_users as $wali)
                                <option value="{{ $wali->id }}">{{ $wali->name }} ({{ $wali->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailSiswaModal" tabindex="-1" aria-labelledby="detailSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailSiswaModalLabel"><i class="bi bi-person-circle"></i> Detail Siswa</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="modalFoto" src="" alt="Foto Siswa" class="img-fluid rounded-circle border shadow-sm ms-5" width="150">
                        <h5 class="mt-3" id="modalNama"></h5>
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group list-group-flush">
                            <table class="table">
                                <tr>
                                    <td><strong><i class="bi bi-card-list"></i> NISN</strong></td>
                                    <td>:</td>
                                    <td><span id="modalNisn"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-credit-card"></i> NIS</strong></td>
                                    <td>:</td>
                                    <td><span id="modalNis"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-house-door"></i> Kelas</strong></td>
                                    <td>:</td>
                                    <td><span id="modalKelas"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-geo-alt"></i> Alamat</strong></td>
                                    <td>:</td>
                                    <td><span id="modalAlamat"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-telephone"></i> Telepon</strong></td>
                                    <td>:</td>
                                    <td><span id="modalTelepon"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-calendar-event"></i> Tanggal Lahir</strong></td>
                                    <td>:</td>
                                    <td><span id="modalTanggalLahir"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</strong></td>
                                    <td>:</td>
                                    <td><span id="modalJenisKelamin"></span></td>
                                </tr>
                                <tr>
                                    <td><strong><i class="bi bi-person"></i> Wali</strong></td>
                                    <td>:</td>
                                    <td><span id="modalWali"></span></td>
                                </tr>
                            </table>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

