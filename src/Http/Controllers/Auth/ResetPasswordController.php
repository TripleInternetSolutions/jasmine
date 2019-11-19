<?php

namespace TIS\Jasmine\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use TIS\Jasmine\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function broker()
    {
        return Password::broker('jasmine_users');
    }

    protected function guard()
    {
        return Auth::guard('jasmine_web');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('jasmine.dashboard');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('jasmine::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


}
