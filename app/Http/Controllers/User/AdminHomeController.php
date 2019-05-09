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
use Illuminate\Support\Facades\Log;


class AdminHomeController extends Controller {

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

        $users = DB::table('users')->where('is_admin', 0)->paginate(10);

        return view('adminHome',['user' => $user, 'dp' => $display_pic, 'users' => $users]);
    }

    public function action($id, $action) {
        if($action == 'remove') {
            $this->removeUser($id);
        } else {
            $this->enableUser($id);
        }
        return back();
    }

    public function removeUser($id)
    {
        $user = User::find($id);
        if (!$user->delete()) {
            return back()->with('delete_failed', 'Opps! something went wrong');
        } else {
            return back()->with('delete_success', 'Successfully deleted a profile!');
        }
    }

    public function enableUser($id)
    {
        $user = User::find($id);
        if($user->is_enabled == 1) {
            $user->is_enabled = 0;
        } else {
            $user->is_enabled = 1;
        }

        if (!$user->save()) {
            return back()->with('enable_failed', 'Opps! something went wrong');
        } else {
            return back()->with('enable_success', 'Successfully enable/disable a profile!');
        }
    }
}
