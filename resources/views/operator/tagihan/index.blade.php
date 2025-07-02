@extends('operator.layouts.app')
@section('title', 'Data Tagihan')
@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
        </div>
        <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nama Siswa</th>
                    <th>Nama Wali</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($tagihans as $tagihan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{--  <td>{{ $tagihan->siswa->nama }}</td>  --}}
                    <td>
                        <a href="{{ route('operator.siswa.show', $tagihan->siswa->id) }}" class="fw-bold text-decoration-none text-primary">
                            {{ $tagihan->siswa->nama }}
                        </a>
                        <br>
                        <small>Wali: {{ $tagihan->siswa->wali->name }}</small>
                    </td>
                    <td>{{ $tagihan->siswa->wali->name }}</td>
                    <td>Rp {{ number_format($tagihan->biaya->jumlah, 0, ',', '.') }}</td>
                    <td>
                        @if($tagihan->status == 0 || $tagihan->status == 1)
                            <div class="dropdown">
                                <button class="btn btn-warning btn-sm dropdown-toggle" type="button" id="statusDropdown{{ $tagihan->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if($tagihan->status == 0)
                                        🔄 Pending
                                    @elseif($tagihan->status == 1)
                                        🟡 Belum Dikonfirmasi
                                    @endif
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $tagihan->id }}">
                                    <li>
                                        <form method="POST" action="{{ route('operator.tagihan.updateStatus', $tagihan->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="dropdown-item">✅ Dikonfirmasi</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <span class="badge
                                @if($tagihan->status == 0) bg-secondary
                                @elseif($tagihan->status == 1) bg-warning
                                @elseif($tagihan->status == 2) bg-success
                                @elseif($tagihan->status == 3) bg-danger
                                @endif">
                                @switch($tagihan->status)
                                    @case(0) ⏳ Belum Dibayar @break
                                    @case(1) 🟡 Belum Dikonfirmasi @break
                                    @case(2) ✅ Dikonfirmasi @break
                                    @case(3) ❌ Ditolak @break
                                @endswitch
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
