<?php

namespace App\Http\Controllers\User;

use DB;
use App\User;
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

        $users = DB::table('users')->where('is_admin', 0)->paginate(10);

        return view('adminHome',['user' => $user, 'dp' => $display_pic, 'users' => $users]);
    }

    public function removeUser($id)
    {
        $user = User::find($id);
        if (!$user->delete()) {
            return back()->with('delete_failed', 'Opps! something went wrong');
        } else {
            return back()->with('delete_success', 'Congratulations you successfully created your profile!');
        }
    }
}
