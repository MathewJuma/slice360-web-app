<?php

namespace App\Http\Controllers\app_general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    //this function loads index/home page
    public function home()
    {

        //create instances and fetch all countries
        $countries_table = new Country();
        $all_countries = $countries_table->all();

        //create instances and fetch all categories
        $categories_table = new Category();
        $all_categories = $categories_table->all();


        return view('app-general.index');
    }


    //this function loads how-it-works page
    public function howItWorks()
    {
        return view('app-general.how-it-works');
    }


    //this function loads about-us page
    public function aboutUs()
    {
        return view('app-general.about-us');
    }
}