<?php

namespace App\Http\Controllers\web_app;

use Wink\WinkTag;
use Wink\WinkPost;

use Wink\WinkComment;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use App\Models\app_general\Country;
use App\Http\Controllers\Controller;
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
        //dd(request('search_blog'));
        //1. all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $blog_tags = WinkTag::get();

        $blog_posts = WinkPost::with(['author','tags'])->orderBy('publish_date', 'DESC')
                                ->ByTitleOrExcerpt(request('search_blog'))
                                ->ByBlogTags(request('search_tag'))
                                ->Paginate(3, '*', 'slice360-blog-articles');
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
    public function newsSubscription(Request $request)
    {
        //1. check if this following already exists
        $news_subscription = WinkSubscription::where('email_address', $request['email_address'])->first();

         //2. return exists message if the user already exists
        if ($news_subscription) {

            //return response
            return response()->json(['exists' => 'You have already subscribed to our newsletter.']);
        }

        //3. save review, login the user then return success message
        else {

            //3.1 create a new opportunity review
            $review = new WinkComment;
            $review->id = (string) Str::uuid();
            $review->full_name = $request['full_name'];
            $review->email_address = $request['email_address'];

            //3.2 save the review in  database
            $review->save();

            //return response
            return response()->json(['success' => 'Successfully subscribed to out newsletter.']);
        }

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
            $review->id = (string) Str::uuid();
            $review->post_id = $request['post_id'];
            $review->author = $request['author'];
            $review->email = $request['email'];
            $review->comment = $request['comments'];

            //3.2 save the review in  database
            $review->save();

            //return response
            return response()->json(['success' => 'Successfully reviewed this post.']);
        }

    }

}
