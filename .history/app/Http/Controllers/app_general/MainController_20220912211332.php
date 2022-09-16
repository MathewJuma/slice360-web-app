<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Http\Request;
use App\Models\app_general\Country;
use App\Models\app_general\Category;

use App\Http\Controllers\Controller;
use App\Models\app_general\UserTestimonial;

class MainController extends Controller
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


    //this function loads index/home page
    public function home()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $testimonials = UserTestimonial::with(['opportunity_user'])->latest()->paginate(9);
        dd($testimonials->all());

        return view('app-general.index', compact(['all_countries', 'all_categories']));
    }


    //this function loads how-it-works page
    public function howItWorks()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        return view('app-general.how-it-works', compact(['all_countries', 'all_categories']));
    }


    //this function loads about-us page
    public function aboutUs()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        return view('app-general.about-us', compact(['all_countries', 'all_categories']));
    }
}
