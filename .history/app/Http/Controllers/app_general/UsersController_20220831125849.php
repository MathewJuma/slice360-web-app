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
                    'title' => ['required', 'string', 'min:5', 'max:25'],
                    'category_id' => ['required'],
                    'country_id' => ['required'],
                    'city' => ['required', 'string', 'min:2', 'max:50'],
                    'tags' => ['required', 'string', 'max:250'],
                    'brief_description' => ['required', 'string', 'min:15', 'max:250'],
                    'detailed_description' => ['required', 'string', 'min:100', 'max:5000'],
                    'amount_needed' => ['required', 'string', 'min:6', 'max:15'],
                    'currency' => ['required'],
                    'target_investors' => ['nullable', 'integer', 'max:1000'],
                    'pledging_start_date' => ['required', 'string', 'date', 'date_format:d/m/Y', 'after_or_equal:today'],
                    'pledging_end_date' => ['required', 'string', 'date', 'date_format:d/m/Y', 'after:funding_start_date'],
                    'youtube_link' => ['nullable', 'url', 'max:250'],
                    'vimeo_link' => ['nullable', 'url', 'max:250'],
                    'facebook' => ['nullable', 'url', 'max:250'],
                    'twitter' => ['nullable', 'url', 'max:250'],
                    'instagram' => ['nullable', 'url', 'max:250'],
                    'banner_images' => ['required'],
                    'opportunity_images' => ['required']
                ],
                [
                    'title.required' => 'Please enter your project title',
                    'title.max' => 'Project title must not be more than 30 characters'
                ]
            ));
        }

}