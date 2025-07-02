<?php

namespace App\Http\Controllers\Admin;

use App\Models\Biaya;
use App\Models\Kelas;
use App\Models\Rekening;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $kelas = Kelas::all();
        $biayas = Biaya::all();
        $rekenings = Rekening::all();
        $tagihans = Tagihan::all();

        return view('admin.laporan.index', compact('kelas', 'biayas', 'rekenings', 'tagihans'));
    }

    public function tampil(Request $request)
    {
        $query = Tagihan::with(['siswa.kelas', 'biaya']);

        if ($request->filled('nama')) {
            $query->whereHas('siswa', fn($q) =>
                $q->where('nama', 'like', '%' . $request->nama . '%')
            );
        }

        if ($request->filled('kelas_id')) {
            $query->whereHas('siswa', fn($q) =>
                $q->where('id_kelas', $request->kelas_id)
            );
        }

        if ($request->filled('biaya_id')) {
            $query->where('biaya_id', $request->biaya_id);
        }

        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_jatuh_tempo', '>=', $request->tanggal_dari);
        }

        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('tanggal_jatuh_tempo', '<=', $request->tanggal_sampai);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tagihans = $query->orderBy('tanggal_jatuh_tempo', 'desc')->get();

        return view('admin.laporan.tampil', compact('tagihans'));
    }
}
