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
}