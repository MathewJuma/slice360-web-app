<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

//use App\Models\app_general\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //this method is used to register a new user
    public function registerUser(Request $request)
    {
        //dd($request);
        //exit();
        //1. validate incoming data
        $user_data_validation = $this->validateData($request, 'user_registration');

        // dd($user_data_validation->any());

        if ($user_data_validation->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($user_data_validation->errors(), 422);
            // validation failed return with 422 status

        } else {

            //success
            return response()->json(['success' => 'Records validated with errors.']);
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