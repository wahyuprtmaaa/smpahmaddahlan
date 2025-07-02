<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Biaya;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TagihanController extends Controller
{
    private $fonnteToken = "@SqS6rjK+-FMg8so1tU1";

    public function index(Request $request)
    {
        $query = Tagihan::with(['siswa.wali', 'biaya']);

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('tanggal_jatuh_tempo', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('tanggal_jatuh_tempo', '<=', $request->end_date);
        }

        $tagihans = $query->paginate(10);
        $tagihans->appends(request()->query());


        return view('admin.tagihan.index', compact('tagihans'));
    }


    public function create()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::with('wali')->get();
        $biaya = Biaya::where('status', 1)->get();

        return view('admin.tagihan.create', compact('kelas', 'siswa', 'biaya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:semua,kelas,siswa',
            'biaya_id' => 'required|exists:biayas,id',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);

        $biaya = Biaya::findOrFail($request->biaya_id);
        $tanggal = $request->tanggal_jatuh_tempo;
        $siswaList = collect();

        if ($request->jenis == 'semua') {
            $siswaList = Siswa::with('wali')->get();
        } elseif ($request->jenis == 'kelas') {
            $siswaList = Siswa::with('wali')->where('id_kelas', $request->kelas_id)->get();
        } elseif ($request->jenis == 'siswa') {
            $siswaList = Siswa::with('wali')->whereIn('id', $request->siswa_ids)->get();
        }

        foreach ($siswaList as $siswa) {
            Tagihan::create([
                'siswa_id' => $siswa->id,
                'biaya_id' => $biaya->id,
                'jumlah' => $biaya->jumlah,
                'tanggal_jatuh_tempo' => $tanggal,
                'status' => 0,
            ]);

            if ($siswa->wali && $siswa->wali->telepon) {
                $message = "Tagihan baru untuk {$siswa->nama}, sebesar Rp. " . number_format($biaya->jumlah, 0, ',', '.') . ". Jatuh tempo: $tanggal.";
                $this->sendWhatsAppMessage($siswa->wali->telepon, $message);
            }
        }

        Alert::toast('Tagihan berhasil ditambahkan.', 'success');
        return redirect()->route('admin.tagihan.index');
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();
        Alert::toast('Tagihan berhasil dihapus.', 'success');
        return redirect()->route('admin.tagihan.index');
    }

    private function sendWhatsAppMessage($phoneNumber, $message)
    {
        $postData = json_encode([
            'target' => $phoneNumber,
            'message' => $message,
            'countryCode' => '62',
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                "Authorization: $this->fonnteToken",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        if ($response === false) {
            Log::error('Error mengirim pesan WhatsApp: ' . curl_error($curl));
        }
        curl_close($curl);
    }
}
