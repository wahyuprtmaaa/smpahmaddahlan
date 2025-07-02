@extends('wali.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        @php
            // Ambil semua siswa yang wali-nya adalah user yang sedang login
            $siswas = App\Models\Siswa::whereHas('wali', function ($query) {
                $query->where('user_id', Auth::id());
            })->with(['kelas', 'wali'])->get();
        @endphp

        @if($siswas->isNotEmpty())
            @foreach($siswas as $siswa)
                <div class="row mb-4">
                    <div class="col-md-3 text-center">
                        @php
                            $foto = $siswa->foto
                                ? asset('storage/profiles/' . $siswa->foto)
                                : asset('storage/uploads/profiles/avatar.png');
                        @endphp
                        <img src="{{ $foto }}" class="img-fluid rounded-circle mb-2" alt="Foto Siswa" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-md-9">
                        <div class="bg-light p-3 rounded h-100">
                            <h5 class="fw-bold mb-3">Informasi Siswa - {{ $siswa->nama }}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-grid">
                                        <div>Nama</div><div>:</div><div>{{ $siswa->nama }}</div>
                                        <div>NIS</div><div>:</div><div>{{ $siswa->nis ?? '-' }}</div>
                                        <div>NISN</div><div>:</div><div>{{ $siswa->nisn ?? '-' }}</div>
                                        <div>Telepon</div><div>:</div><div>{{ $siswa->telepon ?? '-' }}</div>
                                        <div>Kelas</div><div>:</div><div>{{ $siswa->kelas->nama ?? '-' }}</div>
                                        <div>Tanggal Lahir </div><div> : </div><div> {{ $siswa->tanggal_lahir ?? '-' }}</div>
                                        <div>Alamat</div><div>:</div><div>{{ $siswa->alamat }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <div class="alert alert-warning text-center">
                <h5>Data siswa tidak ditemukan untuk wali yang sedang login.</h5>
            </div>
        @endif
    </div>
</div>

<style>
    .info-grid {
        display: grid;
        grid-template-columns: auto 10px 1fr;
        row-gap: 8px;
    }
</style>
@endsection
