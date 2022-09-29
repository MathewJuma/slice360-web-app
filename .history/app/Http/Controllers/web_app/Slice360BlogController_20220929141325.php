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

    public function listBlogs()
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        $posts = WinkPost::with(tags)->orderBy('publish_date', 'DESC')->simplePaginate(12);

        dd($posts);

        return view('web-app.blog.index', compact(['all_countries', 'all_categories', 'posts']));
    }

    public function showBlog ($slug)
    {
        //dd($slug);
        $post = WinkPost::where('slug', '=',$slug)->firstOrFail();

        dd($post);

        return view('web-app.blog.show', [
            'post' => $post
        ]);
    }
}
