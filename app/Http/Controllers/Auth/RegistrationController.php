<?php

//include 'vendor/autoload.php';
namespace App\Http\Controllers\Auth;

use App\Users;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IPFSPHP\IPFS;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{

    protected $ipfs;

    public function __construct()
    {
        $this->ipfs = new IPFS('127.0.0.1', 8080, 5001);
    }

    public function index()
    {
        $users = Users::all();
        return view('registration', ['users' => $users]);
    }

    /**
     * Create a new user instance.
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {

        $this->validateForm($request);

        $user = new Users;

        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis");
            Storage::disk('local')->putFileAs(
                'files/' . $name,
                $files,
                $name
            );
        }

        $user->username = $request->username;
        $user->password = Hash::make($request->password, [
            'rounds' => 12
        ]);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->is_admin = false;
        $user->is_enabled = true;
        $user->display_picture = isset($name);
        $user->description = $request->description;
        $user->url = $request->username;

        $result = $user->save();

        if (!$result) {
            return back()->with('create_failed', 'Opps! something went wrong');
        } else {
            return back()->with('create_success', 'Congratulations you successfully created your profile!');
        }
    }

    public function validateForm(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|max:50|alpha_num',
            'lastname' => 'required|max:50|alpha_num',
            'username' => 'required|max:20|alpha_num',
            'password' => 'required|max:20|min:8',
            'email' => 'required|email',
            'description' => 'nullable|max:160',
            'fileToUpload' => 'nullable|image|max:10000',
        ]);

        return $validatedData;
    }
}
