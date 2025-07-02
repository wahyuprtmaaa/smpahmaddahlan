<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Riwayat Pembayaran</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 13px;
            color: #000;
            margin: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .logo img {
            height: 60px;
        }

        .title-area {
            text-align: right;
        }

        .title-area h2 {
            margin: 0;
            font-size: 20px;
        }

        .meta {
            margin-top: 5px;
            font-size: 12px;
            color: #666;
        }

        .siswa-section {
            margin-bottom: 35px;
        }

        .siswa-header {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 15px;
            background: #e8f0fe;
            padding: 8px;
            border-left: 5px solid #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
        }

        .bg-success {
            background-color: #28a745;
            color: white;
        }

        .bg-warning {
            background-color: #ffc107;
            color: black;
        }

        .bg-danger {
            background-color: #dc3545;
            color: white;
        }

        .bg-secondary {
            background-color: #6c757d;
            color: white;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="/assets/images/logo.png" alt="Logo Sekolah">
    </div>
    <div class="title-area">
        <h2>Riwayat Pembayaran Wali</h2>
        <div class="meta">
            Nama Wali: <strong>{{ $wali->name }}</strong><br>
            Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
        </div>
    </div>
</div>

@foreach($wali->siswas as $siswa)
    <div class="siswa-section">
        <div class="siswa-header">
            {{ $siswa->nama }} - Kelas: {{ $siswa->kelas->nama ?? '-' }}
        </div>

        @if($siswa->tagihans->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Tagihan</th>
                        <th>Jumlah Dibayar</th>
                        <th>Status</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa->tagihans as $tagihan)
                        @foreach($tagihan->pembayarans as $pembayaran)
                            <tr>
                                <td>{{ $tagihan->biaya->nama_biaya ?? '-' }}</td>
                                <td>Rp{{ number_format($pembayaran->jumlah_dibayar, 0, ',', '.') }}</td>
                                <td>
                                    @switch($pembayaran->status)
                                        @case(0)
                                            <span class="badge bg-secondary">Pending</span>
                                            @break
                                        @case(1)
                                            <span class="badge bg-warning">Belum Dikonfirmasi</span>
                                            @break
                                        @case(2)
                                            <span class="badge bg-success">Lunas</span>
                                            @break
                                        @case(3)
                                            <span class="badge bg-danger">Ditolak</span>
                                            @break
                                        @default
                                            <span class="text-muted">-</span>
                                    @endswitch
                                </td>
                                <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="font-style: italic;">Tidak ada riwayat pembayaran untuk siswa ini.</p>
        @endif
    </div>
@endforeach

<div class="footer">
    &copy; {{ date('Y') }} SMP AHMAD DAHLAN KOTA JAMBI
</div>

<script>
    window.print();
</script>

</body>
</html>
