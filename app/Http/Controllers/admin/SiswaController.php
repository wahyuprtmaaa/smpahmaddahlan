<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Biaya;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        $wali_users = User::role('wali')->get();
        $siswas = Siswa::with('kelas')->get();
        return view('admin.siswa.index', compact('siswas', 'kelas', 'wali_users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nisn' => 'required|unique:siswas,nisn',
                'nis' => 'required|unique:siswas,nis',
                'nama' => 'required|string|max:255',
                'id_kelas' => 'required|exists:kelas,id',
                'alamat' => 'required',
                'telepon' => 'required',
                'jenis_kelamin' => 'required|in:L,P',
                'tanggal_lahir' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'user_id' => 'nullable|exists:users,id',
            ]);

            $siswa = new Siswa();
            $siswa->nisn = $request->nisn;
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->id_kelas = $request->id_kelas;
            $siswa->alamat = $request->alamat;
            $siswa->telepon = $request->telepon;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->user_id = $request->user_id;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/profiles', $filename);
                $siswa->foto = $filename;
            } else {
                $siswa->foto = 'profiles/avatar.png';
            }

            $siswa->save();

            Alert::toast('Siswa berhasil ditambahkan', 'success');
            return redirect()->route('admin.siswa.index');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Gagal menyimpan: NISN atau NIS sudah terdaftar.', 'error');
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Alert::toast('Terjadi kesalahan saat menyimpan data.', 'error');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $siswa = Siswa::with(['kelas', 'wali'])->findOrFail($id);
        $kelas = Kelas::all();
        $wali_users = User::role('wali')->get();

        return view('admin.siswa.edit', compact('siswa', 'kelas', 'wali_users'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'nis' => 'required|unique:siswas,nis,' . $id,
            'nama' => 'required|string',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'foto' => 'nullable|image|max:2048',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($request->user_id) {
            $wali = User::where('id', $request->user_id)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'wali');
                })->first();

            if (!$wali) {
                return redirect()->back()->withErrors(['user_id' => 'User yang dipilih bukan wali.'])->withInput();
            }
        }

        $data = $request->except(['foto']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profiles', $filename);
            $siswa->foto = $filename;
        }

        $siswa->update($data);

        Alert::toast('Data Siswa Berhasil Diupdate', 'success');
        return redirect()->route('admin.siswa.index');
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        Alert::toast('Data Siswa Berhasil Dihapus', 'success');
        return redirect()->route('admin.siswa.index');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['kelas', 'wali'])->findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }


    public function cetakKartuSPPSemester($nis)
    {
        $siswa = Siswa::with('wali')->where('nis', $nis)->firstOrFail();

        $userId = $siswa->wali->user_id ?? null;

        $bulanTerbayar = DB::table('pembayarans')
            ->join('tagihans', 'pembayarans.tagihan_id', '=', 'tagihans.id')
            ->join('biayas', 'tagihans.biaya_id', '=', 'biayas.id')
            ->where('pembayarans.user_id', $userId)
            ->where('pembayarans.status', 2)
            ->pluck('biayas.bulan')
            ->toArray();

        return view('admin.siswa.kartu-spp', compact('siswa', 'userId', 'bulanTerbayar'));
    }

}
