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

            //create the user
            $user->create();

            //return response
            return response()->json(['success' => 'A similar email address already exists.']);
        }
    }
}