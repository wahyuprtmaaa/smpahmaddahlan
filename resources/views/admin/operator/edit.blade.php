@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
            <h1>Edit Operator</h1>
    </div>
    <div class="card-body">
        <div class="container mt-4">
            <form action="{{ route('admin.operator.update', $operator->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $operator->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $operator->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $operator->telepon) }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $operator->alamat) }}">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($operator->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/profiles/' . $operator->foto) }}" width="100" alt="Foto Operator">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection
