<?php

namespace App\Http\Controllers\Operator;

use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OperatorTagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::with(['siswa.wali', 'biaya'])->get();
        return view('operator.tagihan.index', compact('tagihans'));
    }

    public function show($id)
    {
        $siswa = Siswa::with(['kelas', 'wali'])->findOrFail($id);
        $tagihans = $siswa->tagihans;
        return view('operator.tagihan.show', compact('siswa', 'tagihans'));
    }

    public function invoice($id)
    {
        $tagihan = Tagihan::with('siswa.kelas', 'biaya')->findOrFail($id);

        if ($tagihan->status != 2) {
            abort(403, 'Tagihan belum lunas dan tidak dapat dicetak.');
        }

        return view('operator.tagihan.invoice', compact('tagihan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);

        if ($request->has('status')) {
            $tagihan->status = $request->status;
            $tagihan->save();

            $pembayarans = Pembayaran::where('tagihan_id', $tagihan->id)->get();

            foreach ($pembayarans as $pembayaran) {
                $pembayaran->status = $request->status;
                $pembayaran->save();
            }

            Alert::toast('Status tagihan diperbarui!', 'success');
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Gagal memperbarui status.');
    }
}
