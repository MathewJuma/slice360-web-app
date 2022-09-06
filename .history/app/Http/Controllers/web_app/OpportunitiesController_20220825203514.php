<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpportunitiesController extends Controller
{
    //this function loads index/home page
    public function listAllOpportunities()
    {
        return view('app-general.index');
    }
}