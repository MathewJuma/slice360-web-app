<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Http\Request;
use App\Models\app_general\Country;
use App\Models\app_general\Category;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    //this is the call constructor
    public function __construct()
    {
        $this->auth = UserRepository::check();
    }


    //this function loads index/home page
    public function home()
    {
        return view('app-general.index', compact(['all_countries', 'all_categories']));
    }


    //this function loads how-it-works page
    public function howItWorks()
    {
        return view('app-general.how-it-works', compact(['all_countries', 'all_categories'])));
    }


    //this function loads about-us page
    public function aboutUs()
    {
        return view('app-general.about-us', compact(['all_countries', 'all_categories'])));
    }
}

//create instances and fetch all countries
        $countries_table = new Country();
        $all_countries = $countries_table->all();

        //create instances and fetch all categories
        $categories_table = new Category();
        $all_categories = $categories_table->all();