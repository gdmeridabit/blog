<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class RegistrationController extends Controller
{

    /**
     * Landing Page.
     *
     * @return view
     */
    public function index()
    {
        return view('auth/registration');
    }

    /**
     * Create a new user instance.
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {

        $this->validateForm($request);

        $user = new User;

        $name = '';
        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis") . '.' . $files->getClientOriginalExtension();
        }

        Log::debug('check name: ' . $name);

        $user->username = $request->username;
        $user->password = Hash::make($request->password, [
            'rounds' => 12
        ]);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->is_admin = false;
        $user->is_enabled = true;
        $user->display_picture = $name;
        $user->description = $request->description;
        $user->url = $request->username;

        $result = $user->save();

        if (!$result) {
            return back()->with('create_failed', 'Opps! something went wrong');
        } else {
            Storage::disk('local')->putFileAs(
                'public/files/',
                $files,
                $name
            );
            return back()->with('create_success', 'Congratulations you successfully created your profile!');
        }
    }

    /**
     * Input validations
     *
     * @param Request $request
     * @return ValidationException
     */
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
