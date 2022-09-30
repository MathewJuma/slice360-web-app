<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Wink\WinkPost;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    $session_id = Session::get('session_id');
        $countCartItems = DB::table('cart')->where(['session_id'=>$session_id])->count();

        View::share('countCartItems', $countCartItems);
}
