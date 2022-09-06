<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpportunitiesController extends Controller
{
    //this function is used to list all opportunities
    public function listOpportunities()
    {
        return view('web-app.opportunities.all_opportunities');
    }


    //this function is used to create a new opportunity
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