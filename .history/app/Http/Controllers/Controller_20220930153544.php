<?php

namespace App\Http\Controllers;

use Wink\WinkPost;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $blog_posts = WinkPost::orderBy('publish_date', 'DESC')->take(3)->get();

        View::share('countCartItems', $blog_posts);
    }
}
