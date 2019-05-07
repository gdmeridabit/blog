<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Set login from email to username
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after logout.
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('login'); // redirect the user to the login screen
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return '/admin';
        } else {
            return '/home';
        }
    }

    /**
     * Login validation
     *
     * @param Request $request
     * @throws ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            // new rules here
        ]);
    }
}
