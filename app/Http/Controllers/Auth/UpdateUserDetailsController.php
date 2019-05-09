<?php


namespace App\Http\Controllers\Auth;


use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdateUserDetailsController
{
    /**
     * Landing Page.
     *
     * @return view
     */
    public function index()
    {
        $user = Auth::user();
        return view('auth/userUpdate',['user' => $user]);
    }

    /**
     * Update a new user instance.
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {

        $this->validateForm($request);
        $user = Auth::user();
        $name = '';

        $user->username = $request->username;

        if (isset($request->password) || !empty($request->password)) {
            $user->password =  Hash::make($request->password, [
                'rounds' => 12
            ]);
        }

        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->is_admin = false;
        $user->is_enabled = true;

        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis") . '.' . $files->getClientOriginalExtension();
            $user->display_picture = $name;
        }

        $user->description = $request->description;
        $user->url = $request->url;

        $result = $user->save();

        if (!$result) {
            return back()->with('update_failed', 'Opps! something went wrong');
        } else {
            if ($request->file('fileToUpload')) {
                Storage::disk('local')->putFileAs(
                    'public/files/',
                    $files,
                    $name
                );
            }
            return back()->with('update_success', 'Congratulations you successfully created your profile!');
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
            'email' => 'required|email',
            'url' => 'required|max:20',
            'password' => 'nullable|max:20|min:8',
            'description' => 'nullable|max:160',
            'fileToUpload' => 'nullable|image|max:10000',
        ]);

        return $validatedData;
    }
}
