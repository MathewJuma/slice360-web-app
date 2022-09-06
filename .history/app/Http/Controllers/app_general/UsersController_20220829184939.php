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
    }
}