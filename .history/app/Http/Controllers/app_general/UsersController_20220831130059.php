<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\app_general\User;

class UsersController extends Controller
{
    //this method is used to register a new user
    public function registerUser(Request $request)
    {

        //dd($request);

        //1. check if the user already exists
        $user = User::where('email', $request['email'])->first();

        //return messages
        if ($user) {

            //return response
            return response()->json(['exists' => 'A similar email address already exists.']);
        } else {

            //create a new user object
            $user = new User();
            $user->full_name = $request['full_name'];
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);

            //dd($user);

            //create the user
            $user->save();

            //return response
            return response()->json(['success' => 'Account has been created successfully']);
        }
    }


    //validate all opportunity form data
    protected function validateData($incoming_data, $process_name)
    {

        //validate incoming data
        if ($process_name == 'validate_user_registration') {

            return ($incoming_data->validate(
                [
                    'full_name' => ['required', 'string', 'min:2', 'max:50'],
                    'username' => ['required'],
                    'email' => ['required', 'email'],
                    'email_confirmation' => ['required', 'string', 'min:2', 'max:50'],
                    'privacy' => ['required'],
                    'terms' => ['required']
                ],
                [
                    'title.required' => 'Please enter your full name',
                    'title.max' => 'Full name cannot be more than 50 characters'
                ]
            ));
        }

}