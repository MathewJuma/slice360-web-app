<?php

namespace App\Http\Controllers\app_general;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Models\app_general\Category;
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
        $opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->orderByViews('desc', $views_period)->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->paginate(9);
        $testimonials = UserTestimonial::with(['testimonial_user'])->latest()->take(10)->get();

        return view('app-general.index', compact(['all_countries', 'all_categories', 'testimonials']));
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
