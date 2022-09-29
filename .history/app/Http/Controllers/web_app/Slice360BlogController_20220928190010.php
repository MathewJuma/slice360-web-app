<?php

namespace App\Http\Controllers\web_app;

use Illuminate\Http\Request;
use Wink\WinkPost;

class Slice360BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        //dd($posts);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show ($slug)
    {
        //dd($slug);
        $post = WinkPost::where('slug', '=',$slug)->firstOrFail();

        //dd($post);

        return view('blog.show', [
            'post' => $post
        ]);
    }
}
