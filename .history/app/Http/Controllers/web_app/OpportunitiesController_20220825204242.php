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


    //this function is used to show a single opportunity
    public function showSingleOpportunity()
    {
        return view('web-app.opportunities.single_opportunity');
    }


    //this function is used process and store a new opportunity into the DB
    public function storeNewOpportunity()
    {
        return 'about to store data into the database';
    }
}