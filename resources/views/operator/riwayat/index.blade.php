@extends('operator.layouts.app')
@section('title', 'Riwayat Pembayaran Wali')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-hover" data-toggle="data-table">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>👤 Nama Wali</th>
                            <th class="text-center" style="width: 150px;">⚙️ Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($walis as $wali)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $wali->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('operator.riwayat.show', $wali->id) }}" class="btn btn-sm btn-outline-primary">
                                        🔍 Lihat Riwayat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data wali.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
