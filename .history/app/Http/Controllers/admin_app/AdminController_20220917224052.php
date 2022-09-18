<?php

namespace App\Http\Controllers\admin_app;

use App\Http\Controllers\Controller;

use App\Models\app_general\Category;
use App\Models\app_general\Country;
use App\Models\app_general\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function mainDashboard()
    {
        return "We are here! Funci it";
    }
}
