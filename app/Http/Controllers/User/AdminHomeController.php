<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminHomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Admin Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles admin for the application and
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
     * Landing page for admin page
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View
     */
    public function index()
    {
        $show = array('show active', '');
        $user = Auth::user();
        $user->display_picture = $this->getDisplayPicture($user->display_picture);
        $users = User::where('is_admin', 0)->paginate(10);
        Log::debug('LIST: ' . $users);

        return view('adminHome',[
            'user' => $user,
            'users' => $users,
            'username' => '',
            'email' => '',
            'title' => '',
            'show' => $show]);
    }

    /**
     * check action chose by the user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function action($id, $action) {
        if($action == 'remove') {
            $this->removeUser($id);
        } else {
            $this->enableUser($id);
        }
        return back();
    }

    /**
     * delete user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeUser($id)
    {
        $user = User::find($id);
        if (!$user->delete()) {
            return back()->with('delete_failed', 'Opps! something went wrong');
        } else {
            return back()->with('delete_success', 'Successfully deleted a profile!');
        }
    }

    /**
     * enable/disable a user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * search user
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View
     */
    public function searchUser(Request $request)
    {
        $show = array('show active', '');
        $user = Auth::user();
        $users = User::where('is_admin', 0)
        ->where('username', 'LIKE', '%' . $request->username . '%')
        ->where('email', 'LIKE', '%' . $request->email . '%')
        ->paginate(10);
        Log::debug($user);
        $user->display_picture = $this->getDisplayPicture($user->display_picture);
        return view('adminHome',[
            'user' => $user,
            'users' => $users,
            'username' => $request->username,
            'title' => '',
            'email' => $request->email,
            'show' => $show]);
    }

    /**
     * search post
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View
     */
    public function searchPost(Request $request)
    {
        $show = array('', 'show active');
        $user = Auth::user();
        $users = User::where('is_admin', 0)->paginate(10);
        $user->display_picture = $this->getDisplayPicture($user->display_picture);
        return view('adminHome',[
            'user' => $user,
            'users' => $users,
            'username' => $request->username,
            'title' => $request->title,
            'email' => '',
            'show' => $show]);
    }

    /**
     * get the display picture
     *
     * @return string
     */
    private function getDisplayPicture($display_picture)
    {
        if($display_picture == null) {
            $display_pic = asset('storage/user.png');
        } else {
            $display_pic = asset('storage/files/' . $display_picture);
        }
        return $display_pic;
    }
}
