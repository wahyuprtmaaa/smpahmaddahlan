@extends('admin.layouts.app')
@section('title', 'reset password')

@section('content')
<div class="card">
    <div class="card-body">
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.resetpassword.reset') }}">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username Wali Murid</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>

    </div>
</div>
@endsection
