<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
    public function index()
    {
        $operator = User::role('operator')->get();
        return view('admin.operator.index', compact('operator'));
    }

    public function create()
    {
        return view('admin.operator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat'   => 'nullable|string|max:255',
            'telepon'  => 'nullable|string|max:15',
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->alamat   = $request->alamat;
        $user->telepon  = $request->telepon;
        $user->status   = 1;

        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profiles', $filename);
            $user->foto = $filename;
        } else {
            $user->foto = 'profiles/avatar.png';
        }

        $user->save();
        $user->assignRole('operator');

        Alert::toast('Operator berhasil ditambahkan', 'success');
        return redirect()->route('admin.operator.index');
    }

    public function edit($id)
    {
        $operator = User::findOrFail($id);
        return view('admin.operator.edit', compact('operator'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat'   => 'nullable|string|max:255',
            'telepon'  => 'nullable|string|max:15',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->alamat   = $request->alamat;
        $user->telepon  = $request->telepon;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/profiles', $filename);
            $user->foto = $filename;
        }

        $user->save();
        Alert::toast('Operator berhasil diupdate', 'success');
        return redirect()->route('admin.operator.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::toast('Operator berhasil dihapus', 'success');
        return redirect()->route('admin.operator.index');
    }
}
