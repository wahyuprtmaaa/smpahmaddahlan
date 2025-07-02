<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $walis = User::role('wali')->with('siswas')->get();
        return view('operator.riwayat.index', compact('walis'));
    }

    public function show($id)
    {
        $wali = User::with('siswas.tagihans.pembayarans')->findOrFail($id);
        return view('operator.riwayat.show', compact('wali'));
    }

    public function cetak($id)
    {
        $wali = User::with('siswas.tagihans.pembayarans', 'siswas.kelas', 'siswas.tagihans.biaya')
                    ->where('id', $id)
                    ->firstOrFail();

        return view('operator.riwayat.cetak', compact('wali'));
    }

}
