@extends('wali.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <h4 class="card-title text-center fw-bold">Edit Profil</h4>
                    <div class="text-center mb-3">
                        <img src="{{ Auth::user()->foto ? asset('storage/profiles/' . Auth::user()->foto) : asset('storage/uploads/profiles/avatar.png') }}"
                             class="rounded-circle border shadow-sm" width="150" height="150" alt="Foto Profil">
                    </div>
                    <form action="{{ route('wali.profiles.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username</label>
                            <input type="username" class="form-control" name="username" value="{{ $user->username }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-bold">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}">
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Telepon</label>
                            <input type="text" class="form-control" name="telepon" value="{{ $user->telepon }}">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label fw-bold">Foto Profil</label>
                            <input type="file" class="form-control" name="foto" accept="image/*">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('wali.profiles.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
