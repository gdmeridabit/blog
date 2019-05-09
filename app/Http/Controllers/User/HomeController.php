<?php

namespace App\Http\Controllers\User;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IPFSPHP\IPFS;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        Log::debug('DP: ' . $user->display_picture);
        if($user->display_picture == null) {
            Log::debug('HERE1');
            $display_pic = asset('storage/user.png');
        } else {
            Log::debug('HERE2');
            $display_pic = asset('storage/files/' . $user->display_picture);
        }
        Log::debug('$display_pic: ' . $display_pic);

        return view('home',['user' => $user, 'dp' => $display_pic]);
    }
}
