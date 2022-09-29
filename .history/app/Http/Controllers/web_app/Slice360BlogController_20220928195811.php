<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;

use App\Models\app_general\Country;
use App\Models\app_general\Category;

class Slice360BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        //dd($posts);

        return view('web-app.blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show ($slug)
    {
        //dd($slug);
        $post = WinkPost::where('slug', '=',$slug)->firstOrFail();

        dd($post);

        return view('web-app.blog.show', [
            'post' => $post
        ]);
    }
}
