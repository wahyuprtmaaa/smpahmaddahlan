<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function username()
    {
        return 'username';
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'last_accessed_at' => now()
        ]);
        
        if ($user->hasRole('admin')) {
            return Redirect::route('admin.home');
        } elseif ($user->hasRole('operator')) {
            return Redirect::route('operator.home');
        } elseif ($user->hasRole('wali')) {
            return Redirect::route('wali.home');
        }

        return Redirect::intended($this->redirectTo);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $credentials['status'] = 1;

        return Auth::attempt($credentials, $request->filled('remember'));
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where($this->username(), $request->{$this->username()})->first();

        if ($user && $user->status == 0) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.inactive')],
            ]);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
