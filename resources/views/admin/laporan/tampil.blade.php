<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Pembayaran Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f9;
      padding: 20px;
      color: #333;
      margin: 0;
    }

    .buttons {
      text-align: center;
      margin-bottom: 20px;
    }

    .buttons button {
      padding: 10px 20px;
      margin: 5px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-print {
      background-color: #007bff;
      color: white;
    }

    .btn-download {
      background-color: #28a745;
      color: white;
    }

    .container {
      max-width: 1000px;
      background: #fff;
      margin: auto;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .header {
      display: flex;
      align-items: center;
      border-bottom: 2px solid #007bff;
      padding-bottom: 20px;
      margin-bottom: 30px;
    }

    .logo img {
      max-height: 60px;
    }

    .school-info {
      margin-left: 15px;
    }

    .school-info h1 {
      font-size: 20px;
      margin: 0;
      color: #007bff;
    }

    .title-date {
      text-align: right;
      margin-left: auto;
    }

    .title-date h2 {
      margin: 0;
      font-size: 22px;
      color: #007bff;
    }

    .title-date p {
      margin: 4px 0 0 0;
      font-size: 14px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .table th, .table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }

    .table th {
      background-color: #007bff;
      color: white;
    }

    .ttd {
      margin-top: 60px;
      text-align: right;
    }

    .ttd p {
      margin: 4px 0;
    }

    @media print {
      .buttons {
        display: none;
      }
      body {
        background: none;
        padding: 0;
        margin: 0;
      }
      .container {
        box-shadow: none;
        padding: 0;
      }
    }
  </style>
</head>
<body>

  <div class="buttons">
    <button class="btn-print" onclick="window.print()">🖨️ Cetak Laporan</button>
    <button class="btn-download" onclick="downloadPDF()">⬇️ Unduh PDF</button>
  </div>

  <div class="container" id="laporan">
    <div class="header">
      <div class="logo">
        <img src="/assets/images/logo.png" alt="Logo Sekolah">
      </div>
      <div class="school-info">
        <h1>SMP AHMAD DAHLAN</h1>
      </div>
      <div class="title-date">
        <h2>Laporan Pembayaran Siswa</h2>
        <p>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
      </div>
    </div>

    <table class="table">
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
          <td>Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
          <td>
            @if($item->status == 2)
              <span style="color: green;">Lunas</span>
            @elseif($item->status == 1)
              <span style="color: orange;">Belum Dikonfirmasi</span>
            @else
              <span style="color: red;">Belum Dibayar</span>
            @endif
          </td>
          <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7">Tidak ada data tersedia.</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    <div class="ttd">
      <p>Jambi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
      <p><strong>Admin</strong></p>
      <br><br><br>
      <p><strong>________________________</strong></p>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
    function downloadPDF() {
      const element = document.getElementById('laporan');
      html2pdf().set({
        margin: 0.5,
        filename: 'laporan_pembayaran_{{ now()->format("Ymd_His") }}.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
      }).from(element).save();
    }
  </script>

</body>
</html>
