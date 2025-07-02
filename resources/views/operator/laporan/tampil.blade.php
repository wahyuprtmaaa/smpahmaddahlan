<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 40px; }
        h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 25px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .ttd { margin-top: 20px; width: 250px; float: right; text-align: center; }
        .no-print { margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="no-print">
        <button onclick="printLaporan()">🖨️ Cetak</button>
        <button onclick="downloadPDF()">⬇️ Download PDF</button>
    </div>

    <div id="laporan">
        <h2>LAPORAN PEMBAYARAN SISWA</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Biaya</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tgl. Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tagihans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama ?? '-' }}</td>
                        <td>{{ $item->siswa->kelas->nama ?? '-' }}</td>
                        <td>{{ $item->biaya->nama_biaya ?? '-' }}</td>
                        <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->status_label }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Tidak ada data tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="ttd">
            <p>Jambi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <b>Operator</b>
            <br><br><br><br>
            <p><strong>________________________</strong></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function printLaporan() {
            const content = document.getElementById('laporan').innerHTML;
            const style = `
                <style>
                    body { font-family: Arial; font-size: 14px; margin: 40px; }
                    table { width: 100%; border-collapse: collapse; }
                    th, td { border: 1px solid #000; padding: 8px; text-align: center; }
                    th { background-color: #f2f2f2; }
                </style>
            `;
            const w = window.open('', '', 'width=1200,height=800');
            w.document.write('<html><head><title>Cetak Laporan</title>' + style + '</head><body>');
            w.document.write(content);
            w.document.write('</body></html>');
            w.document.close();
            w.focus();
            w.print();
        }

        function downloadPDF() {
            const element = document.getElementById('laporan');
            html2pdf().set({
                margin: 0.3,
                filename: 'laporan_tagihan_{{ now()->format("Ymd_His") }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            }).from(element).save();
        }
    </script>

</body>
</html>
