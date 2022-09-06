<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpportunitiesController extends Controller
{
    //this function is used to list all opportunities
    public function listAllOpportunities()
    {
        return view('web-app.opportunities.all_opportunities');
    }



    //this function is used to create a new opportunity
    public function createNewOpportunity()
    {
        return view('web-app.opportunities.create_opportunity');
    }


    //this function is used to list all opportunities
    public function showSingleOpportunity()
    {
        return view('web-app.opportunities.all_opportunities');
    }


    //this function is used to list all opportunities
    public function listAllOpportunities()
    {
        return view('web-app.opportunities.all_opportunities');
    }


    //this function is used to list all opportunities
    public function listAllOpportunities()
    {
        return view('web-app.opportunities.all_opportunities');
    }
}