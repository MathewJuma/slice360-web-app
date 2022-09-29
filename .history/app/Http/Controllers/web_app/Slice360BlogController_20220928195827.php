<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;

use App\Models\app_general\Country;
use App\Models\app_general\Category;

class Slice360BlogController extends Controller
{

    //protected variables for all countries and categories
    protected $all_countries;
    protected $all_categories;

    //this is the call constructor
    public function __construct()
    {
        //create instances and fetch all countries
        $countries_table = new Country();
        $this->all_countries = $countries_table->all();

        //create instances and fetch all categories
        $categories_table = new Category();
        $this->all_categories = $categories_table->all();

    }

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
