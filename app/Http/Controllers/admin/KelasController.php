<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tingkat' => 'required|integer|in:7,8,9',
        ]);

        Kelas::create([
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
        ]);

        Alert::toast('Kelas Berhasil Ditambahkan', 'success');
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'tingkat' => 'required|integer|in:7,8,9',
        ]);

        $kelas->update([
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
        ]);

        Alert::toast('Kelas Berhasil Diupdate', 'success');
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        Alert::toast('Kelas Berhasil Dihapus', 'success');
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus');
    }
}
