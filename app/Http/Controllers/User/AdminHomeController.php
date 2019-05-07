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
    }

    public function index()
    {
        $user = Auth::user();

        if($user->display_picture == 0) {
            $display_pic = asset('storage/user.png');
        } else {
            $display_pic = asset('storage/files/' . $user->display_picture);
        }

        return view('adminHome',['user' => $user, 'dp' => $display_pic]);
    }
}
