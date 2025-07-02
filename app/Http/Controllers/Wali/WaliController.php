<?php

namespace App\Http\Controllers\wali;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WaliController extends Controller
{
    public function home()
    {
        return view('wali.home');
    }

    public function murid()
    {
        $tagihans = Tagihan::whereHas('siswa', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->whereIn('status', [0, 1, 3])
        ->with(['siswa' => function ($query) {
            $query->with('kelas', 'wali');
        }])
        ->get();
        return view('wali.murid', compact('tagihans'));
    }
}
