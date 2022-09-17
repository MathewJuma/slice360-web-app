<?php

namespace App\Http\Controllers\admin_app;

use Illuminate\Http\Request;

use App\Models\app_general\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    //this is the call constructor
    public function __construct()
    {

    }


    //this function is used to load the main dashboard
    public function mainDashboard(User $user)
    {
        //1. ensure that users can only update their posts
        if($user->id !== auth()->id()){

            abort(403, 'Unathourized view action');

        }

        //return main-dashboard view
        //return view('web-app.dashboard.main_dashboard', compact(['all_countries', 'all_categories', 'user_details', 'all_opportunities']));
        return "Admin Dashboard!";
    }

}
