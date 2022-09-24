<?php

namespace App\Http\Controllers\admin_app;



use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\app_general\User;
use App\Models\app_general\Country;
use App\Models\admin_app\Opportunity;

use App\Http\Controllers\Controller;
use App\Models\app_general\Category;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;

use App\Models\web_app\OpportunityReview;
use App\Models\web_app\OpportunityFollowing;
use CyrildeWit\EloquentViewable\Support\Period;

class OpportunitiesController extends Controller
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


    //this function is used to list all admin opportunities
    public function adminFetchOpportunities(Request $request)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //2. get current user id
        $user = auth()->user();

        //3. fetch all user details
        $user_details = User::whereIn('id', $user)->with(['user_profile', 'user_opportunities'])->first();

        if ($request->filled('search')) {

            $all_opportunities = Opportunity::search($request->search)->paginate(15, 'slice360-opportunities'); // search by value
            //dd($all_opportunities);

        } else {

            $all_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->paginate(15, '*', 'slice360-opportunities');

        }

        dd($all_opportunities);

        //4. return my opportunities view
        return view('admin-app.opportunities.all_admin_opportunities', compact(['all_countries', 'all_categories', 'all_opportunities', 'user_details']));

    }
}
