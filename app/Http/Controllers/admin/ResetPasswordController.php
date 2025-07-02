<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('admin.resetpassword.index');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('username', $request->username)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        Alert::toast('Password berhasil direset untuk pengguna: ' . $user->username, 'success');
        return back();
    }
}
