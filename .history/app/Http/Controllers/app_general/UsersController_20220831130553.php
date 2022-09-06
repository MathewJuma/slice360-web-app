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
        //1. validate incoming data
        $user_data = $this->validateData($request, 'user_registration');
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