<?php

namespace App\Http\Controllers\web_app;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\app_general\User;
use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;

use App\Http\Controllers\Controller;
use App\Models\app_general\Category;
use Intervention\Image\Facades\Image;

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
    public function mainDashboard()
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        /**
         * 2. fetch all opportunities from the database
         *      a. sort by latest
         *      b. filter the request by incoming queries i.e. tag, interest, country, category
         *      c. fetch results from database using get function
         */
        $all_opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);

        //return main-dashboard view
        return view('web-app.dashboard.main_dashboard', compact(['all_countries', 'all_categories', 'all_opportunities']));
    }


    //this function is used to load form for editing user profile
    public function editUserProfile(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->user_id !== auth()->id()){
            abort(403, 'Unathourized delete action');
        }

        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        dd($user);

        //return edit user profile view
        //return view('web-app.dashboard.edit_user_profile', compact(['all_countries', 'all_categories', 'all_opportunities']));
    }
}
