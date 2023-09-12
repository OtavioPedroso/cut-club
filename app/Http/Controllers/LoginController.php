<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($email)
    {
        if (User::where('email', $email)->first()) {
            return Auth::guard('user');
        } else {
            return Auth::guard('customer');
        }
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if ($this->guard($credentials['email'])->attempt($credentials)) {
            return redirect()->intended(route('front.dashboard'));
        }

        throw ValidationException::withMessages([
            'error' => [trans('auth.failed')],
        ])->errorBag('login')->redirectTo(route('front.login'));
    }

    public function logout(Request $request, $email){
        $this->guard($email)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended(route('front.login'));
    }
}
