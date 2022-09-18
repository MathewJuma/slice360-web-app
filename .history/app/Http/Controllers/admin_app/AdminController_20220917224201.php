<?php

namespace App\Http\Controllers\admin_app;

use App\Http\Controllers\Controller;

use App\Models\app_general\Category;
use App\Models\app_general\Country;
use App\Models\app_general\User;

use Illuminate\Http\Request;

class AdminController extends Controller
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


    public function mainDashboard(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){

            abort(403, 'Unathourized view action');

        }

        //2. all countries, categories and user_details
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $user_details = $user;

        $all_opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);

        //return main-dashboard view
        return view('web-app.dashboard.main_dashboard', compact(['all_countries', 'all_categories', 'user_details', 'all_opportunities']));
    }
}
