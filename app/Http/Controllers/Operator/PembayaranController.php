<?php

namespace App\Http\Controllers\Operator;

use App\Models\Tagihan;
use App\Models\Rekening;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\StatusPembayaranDiperbarui;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['tagihan.siswa', 'rekening'])->latest()->get();
        return view('operator.pembayaran.index', compact('pembayarans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($request->has('status')) {
            $pembayaran->status = $request->status;

            if ($request->status == 3) {
                $request->validate([
                    'keterangan' => 'required|string|max:255',
                ]);
                $pembayaran->keterangan = $request->keterangan;

                $tagihan = $pembayaran->tagihan;
                if ($tagihan) {
                    $tagihan->status = 3;
                    $tagihan->save();
                }
            }

            if ($request->status == 2) {
                $tagihan = $pembayaran->tagihan;
                if ($tagihan) {
                    $tagihan->status = 2;
                    $tagihan->save();
                }
            }

            $pembayaran->save();

            $tagihan = $pembayaran->tagihan;
            if ($tagihan && $tagihan->siswa && $tagihan->siswa->wali) {
                $wali = $tagihan->siswa->wali;
                $pesan = 'Pembayaran Diterima';
                $wali->notify(new StatusPembayaranDiperbarui($pesan));
            }

            Alert::toast('Status pembayaran diperbarui!', 'success');
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Gagal memperbarui status.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['tagihan.siswa', 'rekening'])->findOrFail($id);
        return view('operator.pembayaran.show', compact('pembayaran'));
    }


    private function getStatusText($status)
    {
        return match ($status) {
            1 => 'Menunggu Konfirmasi',
            2 => 'Diterima',
            3 => 'Ditolak',
            default => 'Tidak Diketahui',
        };
    }

}
