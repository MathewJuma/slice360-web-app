<?php

namespace App\Http\Controllers\app_general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //this method is used to register a new user
    public function registerUser(Request $request)
    {
        //1. check if the user already exists
        $user = User::where('email', $request['email'])->first();
    }
}