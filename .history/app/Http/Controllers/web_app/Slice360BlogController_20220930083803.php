<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wink\WinkPost;

use App\Models\app_general\Country;
use App\Models\app_general\Category;

use CyrildeWit\EloquentViewable\Support\Period;
use Wink\WinkTag;

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
        //dd(request('search_blog'));
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        $blog_posts = WinkPost::with(['author','tags'])->orderBy('publish_date', 'DESC')
                                ->ByTitleOrExcerpt(request('search_blog'))
                                ->ByBlogTags(request('search_tag'))->get();

        $blog_tags = WinkTag::get();

        //dd($blog_tags);

        return view('web-app.blog.all_posts', compact(['all_countries', 'all_categories', 'blog_posts', 'blog_tags']));
    }


    public function showBlog ($slug)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        $post = WinkPost::where('slug', '=',$slug)->firstOrFail();

        //dd($post);

        return view('web-app.blog.single_post', compact(['all_countries', 'all_categories', 'post']));
    }
}
