<?php

namespace App\Http\Controllers\web_app;


use Illuminate\Http\Request;

use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Models\app_general\Category;

use App\Http\Controllers\Controller;

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


    //this function is used to list all opportunities
    public function listOpportunities()
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
        $opportunities = Opportunity::with(['opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);

        return view('web-app.opportunities.all_opportunities', compact(['all_countries', 'all_categories']));
    }


    //this function is used to load the form for creating a new opportunity
    public function createOpportunity()
    {
        return view('web-app.opportunities.create_opportunity');
    }


    //this function is used process and store a new opportunity into the DB
    public function storeOpportunity()
    {
        return 'about to store data into the database';
    }


    //this function is used to load a single opportunity
    public function showOpportunity()
    {
        return view('web-app.opportunities.single_opportunity');
    }


    //this function is used to load edit form for a single opportunity
    public function editOpportunity()
    {
        return view('web-app.opportunities.edit_opportunity');
    }


    //this function is used to update an opportunity record into the DB
    public function updateOpportunity()
    {
        return 'about to update data into the database';
    }


    //this function is used to delete an opportunity record from the DB
    public function deleteOpportunity()
    {
        return 'about to delete data from the database';
    }
}