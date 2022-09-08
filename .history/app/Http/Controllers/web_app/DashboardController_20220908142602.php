<?php

namespace App\Http\Controllers\web_app;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Models\app_general\User;
use App\Models\app_general\Country;

use App\Models\web_app\Opportunity;
use App\Http\Controllers\Controller;
use App\Models\app_general\Category;
use Intervention\Image\Facades\Image;
use App\Models\app_general\UserProfile;

class DashboardController extends Controller
{
    //protected variables for all countries and categories
    protected $all_countries;
    protected $all_categories;

    //this is the call constructor
    public function __construct()
    {
        //create instances and fetch all countries
        $countries_table = new Country();
        $this->all_countries = $countries_table->all();

        //create instances and fetch all categories
        $categories_table = new Category();
        $this->all_categories = $categories_table->all();
    }


    //this function is used to load the main dashboard
    public function mainDashboard(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){

            abort(403, 'Unathourized view action');

        }

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        /**
         * 3. fetch all opportunities from the database
         *      a. sort by latest
         *      b. filter the request by incoming queries i.e. tag, interest, country, category
         *      c. fetch results from database using get function
         */
        $all_opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);

        //return main-dashboard view
        return view('web-app.dashboard.main_dashboard', compact(['all_countries', 'all_categories', 'all_opportunities']));
    }


    //this function is used to load user profile page
    public function showUserProfile(User $user){

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //return the first user record
        $user_details = User::whereIn('id', $user)->with(['user_profile'])->first();

        //process if the user has a profile
        if($user_details->user_profile !== NULL){

            $user_profile_images = UserProfile::whereIn('id', $user_details->user_profile)->with(['user_profile_banner', 'user_profile_image'])->first();

        } else {

            $user_profile_images = []; //user profile images is empty

        }

        //return edit user profile view
        return view('web-app.dashboard.show_user_profile', compact(['all_countries', 'all_categories', 'user_details', 'user_profile_images']));

    }


    //this function is used to load form for editing user profile
    public function editUserProfile(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){
            abort(403, 'Unathourized edit action');
        }

        //2. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //return the first user record
        $user_details = User::whereIn('id', $user)->with(['user_profile'])->first();


        //process if the user has a profile
        if($user_details->user_profile !== NULL){

            $user_profile_images = UserProfile::whereIn('id', $user_details->user_profile)->with(['user_profile_banner', 'user_profile_image'])->first();

        } else {

            $user_profile_images = [];

        }

        //return edit user profile view
        return view('web-app.dashboard.edit_user_profile', compact(['all_countries', 'all_categories', 'user_details', 'user_profile_images']));
    }

    //updateUserProfile
    //this function is used to update an opportunity record into the DB
    public function updateUserProfile(Request $request, User $user)
    {
        //1. ensure that users can only update their profile
        if($user->id !== auth()->id()){
            abort(403, 'Unathourized update action');
        }

        //2. validate incoming request data
        $request_data = $this->validateData($request, 'validate_edit_profile');

        //3. map user data ready fir update
        $user_data = [
            'first_name' => $request_data['first_name'],
            'middle_name' => $request_data['middle_name'],
            'last_name' => $request_data['last_name'],
            'user_name' => $request_data['first_name'],
            'email' => $request_data['email'],
            'phone' => $request_data['phone'],
        ];


        //3.1 update the opportunity with the request data
        $user->update($user_data);

        //5. redirect to edited listing with message
        return redirect('/dashboard/user_profile/' . $user->id.'-'.Str::slug($user->first_name.' '.$user->last_name))->with('message', 'User profile updated successfully');
    }


    //validate all opportunity form data
    protected function validateData($incoming_data, $process_name)
    {

        if ($process_name == 'validate_edit_profile') {

            return ($incoming_data->validate(
                [
                    'first_name' => ['required', 'string', 'min:2', 'max:15'],
                    'middle_name' => ['nullable', 'string', 'min:2', 'max:15'],
                    'last_name' => ['required', 'string', 'min:2', 'max:15'],
                    'email' => ['required', 'email'],
                    'second_email' => ['nullable', 'email'],
                    'first_address' => ['nullable', 'string', 'min:2', 'max:15'],
                    'second_address' => ['nullable', 'string', 'min:2', 'max:15'],
                    'phone' => ['required', 'string', 'min:5', 'max:20'],
                    'second_phone' => ['nullable', 'string', 'min:5', 'max:20'],
                    'country_id' => ['required'],
                    'city' => ['required', 'string', 'min:2', 'max:50'],
                    'brief_description' => ['required', 'string', 'min:5', 'max:250'],
                    'website' => ['nullable', 'url', 'max:250'],
                    'facebook' => ['nullable', 'url', 'max:250'],
                    'twitter' => ['nullable', 'url', 'max:250'],
                    'instagram' => ['nullable', 'url', 'max:250']
                ]
            ));

        } else {

            return '';
        }
    }
}
