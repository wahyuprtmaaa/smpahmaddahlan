<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kwitansi Pembayaran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
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
      max-width: 800px;
      background: #fff;
      margin: auto;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .header {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #007bff;
      padding-bottom: 20px;
      margin-bottom: 30px;
    }

    .logo img {
      max-height: 60px;
      width: auto;
    }

    .title {
      text-align: right;
      flex: 1;
    }

    .title h2 {
      margin: 0;
      font-size: 22px;
      color: #007bff;
    }

    .info {
      margin-bottom: 30px;
    }

    .info p {
      margin: 6px 0;
      font-size: 16px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    .table th, .table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
      font-size: 14px;
    }

    .table th {
      background-color: #007bff;
      color: white;
    }

    .total {
      text-align: right;
      font-size: 18px;
      font-weight: bold;
      color: #28a745;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #666;
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }

      .header {
        flex-direction: column;
        align-items: flex-start;
      }

      .title {
        text-align: left;
        margin-top: 10px;
      }

      .buttons button {
        font-size: 14px;
        padding: 8px 16px;
      }

      .table th, .table td {
        font-size: 13px;
        padding: 8px;
      }

      .total {
        font-size: 16px;
      }

      .info p {
        font-size: 14px;
      }
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
    <button class="btn-print" onclick="window.print()">🖨️ Cetak Kwitansi</button>
    <button class="btn-download" onclick="downloadPDF()">⬇️ Unduh Kwitansi</button>
  </div>

  <div class="container" id="kwitansi">
    <div class="header">
      <div class="logo">
        <img src="/assets/images/logo.png" alt="Logo Sekolah">
      </div>
      <div class="title">
        <h2>KWITANSI PEMBAYARAN</h2>
        <p>No: INV-{{ $tagihan->id }}</p>
        <p>Tanggal: {{ \Carbon\Carbon::parse($tagihan->tanggal)->format('d M Y') }}</p>
      </div>
    </div>

    <div class="info">
      <p><strong>Nama Siswa:</strong> {{ $tagihan->siswa->nama }}</p>
      <p><strong>Kelas:</strong> {{ $tagihan->siswa->kelas->nama ?? '-' }}</p>
      <p><strong>Tagihan:</strong> {{ $tagihan->biaya->nama_biaya }}</p>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Deskripsi</th>
          <th>Jumlah</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $tagihan->biaya->nama_biaya }}</td>
          <td>Rp{{ number_format($tagihan->jumlah, 0, ',', '.') }}</td>
          <td>
            @if($tagihan->status == 2)
              <span style="color: green;">Lunas</span>
            @elseif($tagihan->status == 1)
              <span style="color: orange;">Belum Dikonfirmasi</span>
            @else
              <span style="color: red;">Belum Dibayar</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>

    <div class="total">
      Total: Rp{{ number_format($tagihan->jumlah, 0, ',', '.') }}
    </div>

    <div class="footer">
      Terima kasih telah melakukan pembayaran.
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
    function downloadPDF() {
      const element = document.getElementById('kwitansi');
      const opt = {
        margin:       0.5,
        filename:     'kwitansi_{{ $tagihan->id }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
      };
      html2pdf().set(opt).from(element).save();
    }
  </script>

</body>
</html>
