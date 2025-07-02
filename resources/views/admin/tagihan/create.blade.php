@extends('admin.layouts.app')

@section('title', 'Tambah Tagihan')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.tagihan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Tagihan</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="semua">Semua Siswa</option>
                    <option value="kelas">Per Kelas</option>
                    <option value="siswa">Siswa Tertentu</option>
                </select>
            </div>

            <div class="mb-3 d-none" id="kelas-field">
                <label for="kelas_id" class="form-label">Pilih Kelas</label>
                <select name="kelas_id" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 d-none" id="siswa-field">
                <label for="siswa_ids" class="form-label">Pilih Siswa</label>

                <input type="text" id="search-siswa" class="form-control mb-2" placeholder="Cari nama atau NISN siswa...">

                <select name="siswa_ids[]" class="form-control" multiple id="siswa-select">
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama }} ({{ $item->nisn }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="biaya_id" class="form-label">Pilih Biaya</label>
                <select name="biaya_id" class="form-control" required>
                    @foreach ($biaya as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_biaya }}- {{ $item->bulan }} - Rp{{ number_format($item->jumlah, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jenis = document.getElementById('jenis');
        const kelasField = document.getElementById('kelas-field');
        const siswaField = document.getElementById('siswa-field');

        jenis.addEventListener('change', function () {
            if (jenis.value === 'kelas') {
                kelasField.classList.remove('d-none');
                siswaField.classList.add('d-none');
            } else if (jenis.value === 'siswa') {
                siswaField.classList.remove('d-none');
                kelasField.classList.add('d-none');
            } else {
                kelasField.classList.add('d-none');
                siswaField.classList.add('d-none');
            }
        });
    });


    const searchInput = document.getElementById('search-siswa');
    const siswaSelect = document.getElementById('siswa-select');

    searchInput.addEventListener('keyup', function () {
        const filter = this.value.toLowerCase();
        const options = siswaSelect.options;

        for (let i = 0; i < options.length; i++) {
            const text = options[i].text.toLowerCase();
            options[i].style.display = text.includes(filter) ? 'block' : 'none';
        }
    });

</script>
@endsection
