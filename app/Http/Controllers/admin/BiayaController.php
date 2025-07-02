<?php

namespace App\Http\Controllers\Admin;

use App\Models\Biaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BiayaController extends Controller
{
    public function index()
    {
        $biayas = Biaya::all();
        return view('admin.biaya.index', compact('biayas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_biaya' => 'required|string',
            'jumlah' => 'required|numeric',
            'status' => 'required|integer',
            'bulan' => 'nullable|string|max:20',
        ]);

        Biaya::create([
            'nama_biaya' => $request->nama_biaya,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'bulan' => $request->bulan,
        ]);

        Alert::toast('Biaya Berhasil Ditambahkan', 'success');
        return redirect()->route('admin.biaya.index')->with('success', 'Biaya berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_biaya' => 'required|string',
            'jumlah' => 'required|numeric',
            'status' => 'required|integer',
            'bulan' => 'nullable|string|max:20',
        ]);

        $biaya = Biaya::findOrFail($id);

        $biaya->update([
            'nama_biaya' => $request->nama_biaya,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'bulan' => $request->bulan,
        ]);

        Alert::toast('Biaya Berhasil Diupdate', 'success');
        return redirect()->route('admin.biaya.index')->with('success', 'Biaya berhasil diperbarui');
    }


    public function destroy($id)
    {
        $biaya = Biaya::findOrFail($id);
        $biaya->delete();

        Alert::toast('Biaya Berhasil Dihapus', 'success');
        return redirect()->route('admin.biaya.index');
    }
}
