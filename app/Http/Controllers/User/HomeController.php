<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles users for the application and
    | shows them to your admin home screen.
    |
    */

    /**
     * set the page to authenticated
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * set the landing page
     * @return \Illuminate\View\View|\Illuminate\Contracts\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('home',['users' => $user]);
    }
}
