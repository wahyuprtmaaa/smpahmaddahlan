@extends('admin.layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah Kelas</button>
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Kelas</th>
                    <th style="width: 100px;">Tingkat</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $key => $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->tingkat }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-edit"
                            data-id="{{ $k->id }}"
                            data-nama="{{ $k->nama }}"
                            data-tingkat="{{ $k->tingkat }}"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEdit">Edit</button>

                        <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white shadow-lg border-0 rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="modalCreateLabel">Tambah Kelas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.kelas.store') }}" method="POST">
                @csrf
                <div class="modal-body fs-5">
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-semibold">Nama Kelas</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="tingkat" class="form-label fw-semibold">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-select form-select-lg" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white shadow-lg border-0 rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEditLabel">Edit Kelas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body fs-5">
                    <div class="mb-4">
                        <label for="edit-nama" class="form-label fw-semibold">Nama Kelas</label>
                        <input type="text" name="nama" id="edit-nama" class="form-control form-control-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit-tingkat" class="form-label fw-semibold">Tingkat</label>
                        <select name="tingkat" id="edit-tingkat" class="form-select form-select-lg" required>
                            <option value="">-- Pilih Tingkat --</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success btn-lg">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

