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
        $blog_tags = WinkTag::get();

        $blog_posts = WinkPost::with(['author','tags'])->orderBy('publish_date', 'DESC')
                                ->ByTitleOrExcerpt(request('search_blog'))
                                ->ByBlogTags(request('search_tag'))
                                ->Paginate(1, '*', 'slice360-blog-articles');
        //popular categories
        $popular_categories = Category::withCount(['category_opportunities' => function ($query) {
                                                                                                    $query->whereRaw('funding_status != "funding closed"')
                                                                                                        ->whereRaw('is_published = "Yes"');
                                                                                                }
                                                ])
                                                ->orderBy('category_opportunities_count', 'desc')
                                                ->paginate(6, '*', 'popular-categories');

        //dd($popular_categories);

        return view('web-app.blog.all_posts', compact(['all_countries', 'all_categories', 'blog_posts', 'blog_tags', 'popular_categories']));
    }


    public function showBlog ($slug)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $blog_tags = WinkTag::get();

        $post = WinkPost::with(['tags'])->where('slug', '=',$slug)->firstOrFail();

        //popular categories
        $popular_categories = Category::withCount(['category_opportunities' => function ($query) {
                                                                                                    $query->whereRaw('funding_status != "funding closed"')
                                                                                                        ->whereRaw('is_published = "Yes"');
                                                                                                }
                                                ])
                                                ->orderBy('category_opportunities_count', 'desc')
                                                ->paginate(10, '*', 'popular-categories');

        //dd($post);

        return view('web-app.blog.single_post', compact(['all_countries', 'all_categories', 'post', 'blog_tags', 'popular_categories']));
    }
}
