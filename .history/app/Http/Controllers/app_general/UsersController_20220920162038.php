<?php

namespace App\Http\Controllers\app_general;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\app_general\User;
use App\Http\Controllers\Controller;
use App\Models\app_general\UserFollowing;
use App\Models\app_general\UserIntouchMessage;
use App\Models\app_general\UserTestimonial;

class UsersController extends Controller
{

    //this method is used to register a new user
    public function loginUser(Request $request)
    {

        //validate request
        // $login_details = $request->validate([
        //     'login_email' => ['required', 'email', 'exists:users,email'],
        //     'login_password' => ['required', 'exists:users,password' ]
        // ]);

        //make login attempt for the user
        if(Auth::attempt([ 'email' => $request->input('login_email'),'password' => $request->input('login_password')])) {

            //regenerate session id
            $request->session()->regenerate();

            //fetch user details
            $user = User::where('email', $request['login_email'])->first();

            //set session values
            session(['system_user_id' => $user->id, 'system_user_name' => $user->first_name.' '.$user->last_name]);

            //return success response
            return response()->json(['success' => 'You have logged-in successfully.']);

        }
        else {

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
        $request->session()->forget(['system_user_id', 'system_user_name']);

        //redirect to login page
        return redirect(route('app-general.home-page'))->with('message', 'You have been logged out successfully');
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
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->username = ucfirst(substr($request['first_name'],0,1)).ucfirst($request['last_name']);
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->password = bcrypt($request['password']);

            //3.2 save the user in  database
            $user->save();

            //3.3 set session value
            session(['system_user_id' => $user->id, 'system_user_name' => $user->first_name.' '.$user->last_name]);

            //3.4 login the created user
            auth()->login($user);

            //return response
            return response()->json(['success' => 'Account has been created successfully.']);
        }
    }


     //this function is used to follow a user
    public function followUser(Request $request)
    {
        //1. check if this following already exists
        $user_following = UserFollowing::where('followed_by_id', $request['followed_by_id'])->where('following_id', $request['following_id'])->first();

         //2. return exists message if the user already exists
        if ($user_following) {

            //2.1 set update values
            $user_following->followed_by_id = $request['followed_by_id'];
            $user_following->following_id = $request['following_id'];
            $user_following->status = $request['status'];

            //2.2 save the user in  database
            $user_following->update();

            //return response
            return response()->json(['success' => 'You are already following this user.']);
        }

        //3. save following, login the user then return success message
        else {

            //3.1 create a new user following
            $following = new UserFollowing;
            $following->followed_by_id = $request['followed_by_id'];
            $following->following_id = $request['following_id'];
            $following->status = $request['status'];

            //3.2 save the user in  database
            $following->save();

            //return response
            return response()->json(['success' => 'Now following this user.']);
        }

    }


    //this function is used to unfollow a user
    public function unfollowUser(Request $request)
    {
        //1. check if this following already exists
        $user_following = UserFollowing::where('followed_by_id', $request['followed_by_id'])->where('following_id', $request['following_id'])->first();

         //2. return exists message if the user already exists
        if ($user_following) {

            //2.1 set update values
            $user_following->followed_by_id = $request['followed_by_id'];
            $user_following->following_id = $request['following_id'];
            $user_following->status = $request['status'];

            //2.2 save the user in  database
            $user_following->update();

            //return response
            return response()->json(['success' => 'Successfully unfollowed this user.']);
        }

        //3. save following, login the user then return success message
        else {

            //return response
            return response()->json(['not_exists' => 'Currently not following this user.']);
        }

    }


    //this function is used to submit a testimonial
    public function submitTestimonial(Request $request)
    {
        //1. check if this user's testimonial already exists
        $user_testimonial = UserTestimonial::where('user_id', $request['user_id'])->first();

         //2. update the existing testimonial with this new one
        if ($user_testimonial) {

            //2.1 set update values
            $user_testimonial->user_id = $request['user_id'];
            $user_testimonial->business_role = $request['business_role'];
            $user_testimonial->your_location = $request['your_location'];
            $user_testimonial->testimonial_message = $request['testimonial_message'];
            $user_testimonial->platform_rating = $request['platform_rating'];
            $user_testimonial->status = $request['status'];

            //2.2 update the user in  database
            $user_testimonial->update();

            //return response
            return response()->json(['success_updating' => 'Successfully updated testimonial.']);
        }

        //3. save a new testimonial with this information
        else {

            //3.1 set update values
            $user_testimonial = new UserTestimonial;

            //3.2 set create values
            $user_testimonial->user_id = $request['user_id'];
            $user_testimonial->business_role = $request['business_role'];
            $user_testimonial->your_location = $request['your_location'];
            $user_testimonial->testimonial_message = $request['testimonial_message'];
            $user_testimonial->platform_rating = $request['platform_rating'];
            $user_testimonial->status = $request['status'];

            //3.3 save the user in  database
            $user_testimonial->save();

            //return response
            return response()->json(['success_creating' => 'Successfully created testimonial.']);
        }

    }


    //this function is used to submit a get intouch message
    public function getIntouchMessage(Request $request)
    {

        //1.1 create a new in-touch message
        $intouch_message = new UserIntouchMessage();
        $intouch_message->sender_id = $request['sender_id'];
        $intouch_message->receiver_id = $request['receiver_id'];
        $intouch_message->intouch_message = $request['intouch_message'];
        $intouch_message->status = $request['status'];

        //3.2 save in-touch message in database
        $intouch_message->save();

        //return response
        return response()->json(['success' => 'In touch message has been created successfully.']);

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
