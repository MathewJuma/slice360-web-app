<?php

namespace App\Http\Controllers\app_general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    //this function loads index/home page
    public function home()
    {

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