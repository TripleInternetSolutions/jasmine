<?php

namespace TIS\Jasmine\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TIS\Jasmine\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:jasmine_web')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('jasmine_web');
    }


    public function showLoginForm()
    {
        return view('jasmine::auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('jasmine.dashboard');
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('jasmine.login'));
    }


}
