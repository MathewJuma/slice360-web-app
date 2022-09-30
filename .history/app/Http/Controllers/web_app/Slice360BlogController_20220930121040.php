<?php

namespace App\Http\Controllers\web_app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\app_general\Country;
use App\Models\app_general\Category;


use Wink\WinkPost;
use Wink\WinkTag;
use Wink\WinkComment;

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
                                                ->paginate(10, '*', 'popular-categories');

        //dd($blog_posts);

        return view('web-app.blog.all_posts', compact(['all_countries', 'all_categories', 'blog_posts', 'blog_tags', 'popular_categories']));
    }

    public function showBlog ($slug)
    {
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $blog_tags = WinkTag::get();

        $post = WinkPost::with(['tags', 'comments'])->where('slug', '=',$slug)->firstOrFail();

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

    //this function is used to record followers of on opportunity
    public function reviewPost(Request $request)
    {
        //1. check if this following already exists
        $post_review = WinkComment::where('post_id', $request['post_id'])->where('email', $request['email'])->first();

         //2. return exists message if the user already exists
        if ($post_review) {

            //return response
            return response()->json(['exists' => 'You have already reviewed this post.']);
        }

        //3. save review, login the user then return success message
        else {

            //3.1 create a new opportunity review
            $review = new WinkComment;
            $review->post_id = $request['post_id'];
            $review->author = $request['author'];
            $review->review_description = $request['review_description'];
            $review->description_score = $request['description_score'];
            $review->capital_score = $request['capital_score'];
            $review->category_score = $request['category_score'];
            $review->timeline_score = $request['timeline_score'];
            $review->total_score = $request['total_score'];

            //3.2 save the review in  database
            $review->save();

            //return response
            return response()->json(['success' => 'Successfully reviewed this opportunity.']);
        }

    }

}
