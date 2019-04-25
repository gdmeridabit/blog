<?php

namespace App\Http\Controllers\User;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IPFSPHP\IPFS;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminHomeController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        return Auth::user();
    }

    public function index()
    {
        $user = Auth::user();
        return view('adminHome',['users' => $user]);
    }
}
