<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.lupa-password');
    }

    public function sendResetLink(Request $request)
    {
        Log::info('📩 MASUK ke sendResetLink');

        $request->validate([
            'username' => 'required|string',
            'whatsapp' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            Log::warning('❌ Username tidak ditemukan');
            return back()->withErrors(['username' => 'Username tidak ditemukan.']);
        }

        Log::info("🎯 User ditemukan: {$user->username}");

        $token = Str::random(64);
        $user->reset_token = $token; // ✅ gunakan langsung property
        $user->save();

        $url = route('custom.password.reset.form', ['token' => $token]);
        $pesan = "Halo $user->name,\n\nBerikut link untuk reset password akun Anda:\n$url\n\nAbaikan jika Anda tidak meminta.";

        $wa = preg_replace('/^08/', '628', $request->whatsapp);
        Log::info("🚀 Mengirim WA ke: $wa");

        $this->sendWhatsAppMessage($wa, $pesan);

        return back()->with('success', 'Link reset telah dikirim ke WhatsApp.');
    }

    public function showResetForm($token)
    {
        $user = User::where('reset_token', $token)->first();

        if (!$user) {
            Log::warning("❌ Token reset tidak ditemukan: $token");
            abort(404, 'Token tidak ditemukan');
        }

        return view('auth.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('reset_token', $request->token)->first();

        if (!$user) {
            Log::warning("❌ Token reset tidak valid: {$request->token}");
            return redirect()->route('custom.password.request')->withErrors(['token' => 'Token tidak valid.']);
        }

        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();

        Log::info("✅ Password berhasil diupdate untuk user: {$user->username}");

        return redirect()->route('login')->with('success', 'Password berhasil diubah, silakan login.');
    }

    private function sendWhatsAppMessage($phoneNumber, $message)
    {
        Log::info("📨 Mengirim WhatsApp ke: $phoneNumber | Isi: $message");

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
                "Authorization: @SqS6rjK+-FMg8so1tU1",
                "Content-Type: application/json"
            ],
        ]);

        $response = curl_exec($curl);

        if ($response === false) {
            Log::error('❌ GAGAL kirim WA: ' . curl_error($curl));
        } else {
            Log::info('✅ RESPON FONNTE: ' . $response);
        }

        curl_close($curl);
    }
}
