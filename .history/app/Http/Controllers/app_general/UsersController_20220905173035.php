<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

use App\Models\app_general\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    //this method is used to register a new user
    public function loginUser(Request $request)
    {

        $form_field = $request->validate();

        //1. validate auth attempt for the user
        if (Auth::attempt([
            'email' => $request->input('login_email'),
            'password' => $request->input('login_password'),
        ])) {

            //return success response
            return response()->json(['success' => 'You have logged-in successfully.']);
        } else {

            //return error response
            return response()->json(['error' => 'Something went wrong!']);
        }
    }

    //logout this user
    public function logoutUser(Request $request)
    {

        //1. logout the user using auth()
        auth()->logout();

        //2. invalidate the user's session and regenerate the csrf token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //redirect to login page
        return redirect('/')->with('message', 'You have been logged out successfully');
    }

    //this method is used to register a new user
    public function registerUser(Request $request)
    {
        //dd($request);

        //1. check if this user email already exists
        $user_email = User::where('email', $request['email'])->first();

        //2. return exists message if the user already exists
        if ($user_email) {

            //return response
            return response()->json(['exists' => 'A similar email address already exists.']);
        }

        //3. save user, login the user then return success message
        else {

            //3.1 create a new user object
            $user = new User();
            $user->full_name = $request['full_name'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);

            //3.2 save the user in  database
            $user->save();

            //3.3 login the created user
            auth()->login($user);

            //return response
            return response()->json(['success' => 'Account has been created successfully.']);
        }
    }


    //validate all opportunity form data
    protected function validateData($incoming_data, $process_name)
    {

        //validate incoming data
        if ($process_name == 'user_registration') {

            return ($incoming_data->validate(
                [
                    'full_name' => ['required', 'string', 'min:2', 'max:50'],
                    'username' => ['required'],
                    'email' => ['required', 'email', 'string', 'min:5', 'max:250', Rule::unique('users', 'email')],
                    'password' => ['required', 'string', 'min:5', 'max:30', 'confirmed'],
                    'password_confirmation' => ['required'],
                    'privacy' => ['required'],
                    'terms' => ['required']
                ],
                [
                    'full_name.required' => 'Please enter your full name',
                    'full_name.min' => 'Full name cannot be shorter than 2 characters',
                    'full_name.max' => 'Full name cannot be more than 50 characters'
                ]
            ));
        }
    }
}