<?php

namespace App\Http\Controllers\app_general;

use Illuminate\Support\Carbon;

use App\Models\app_general\Country;
use App\Models\web_app\Opportunity;
use App\Http\Controllers\Controller;
use App\Models\app_general\Category;
use App\Models\app_general\Slice360Visitor;
use App\Models\app_general\UserTestimonial;
use CyrildeWit\EloquentViewable\Support\Period;

class MainController extends Controller
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


    //this function loads index/home page
    public function home()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //all records are as of the year 2022
        $views_period = Period::since(Carbon::create(2022));

        //popular categories
        $popular_categories = Category::withCount(['category_opportunities' => function ($query) {
                                                                                                    $query->whereRaw('funding_status != "funding closed"')
                                                                                                        ->whereRaw('is_published = "Yes"');
                                                                                                }
                                                ])
                                                ->orderBy('category_opportunities_count', 'desc')
                                                ->paginate(6, '*', 'popular-categories');

        //all opportunities
        $all_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])
                                            ->whereRaw('funding_status != "funding closed"')
                                            ->whereRaw('is_published = "Yes"')
                                            ->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->get();

        //opportunities for statistics
        $statistics_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])
                                            ->whereRaw('funding_status = "funding closed"')
                                            ->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->get();

        //popular opportunities
        $popular_opportunities = (Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])
                                            ->whereRaw('funding_status != "funding closed"')
                                            ->whereRaw('is_published = "Yes"')
                                            ->orderByViews('desc', $views_period)->orderByUniqueViews('desc', $views_period)
                                            ->latest()->take(50)->get())->where('views_count', '!=', '0')->paginate(8, '', '', 'popular-opportunities');

        //monthly visitors
        $new_monthly_visitors = count(Slice360Visitor::select('*')->whereMonth('created_at', Carbon::now()->month)->get());

        //testimonials
        $testimonials = UserTestimonial::with(['testimonial_user'])->latest()->take(10)->get();

        //other possible custom queries
        //$new_monthly_opportunities = count(Opportunity::select('*')->whereMonth('created_at', Carbon::now()->month)->get());
        //$fully_funded_opportunities = count(Opportunity::select('*')->whereRaw('amount_needed = amount_raised')->get());
        //$value_funded_opportunities = Opportunity::select('*')->whereRaw('amount_needed = amount_raised')->sum('amount_raised');

        //dd($popular_opportunities);
        return view('app-general.index', compact(['all_countries', 'all_categories', 'all_opportunities', 'statistics_opportunities', 'popular_categories', 'popular_opportunities', 'new_monthly_visitors', 'testimonials', 'blog_posts']));
    }


    //this function loads how-it-works page
    public function howItWorks()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;

        //dd($blog_posts);

        return view('app-general.how-it-works', compact(['all_countries', 'all_categories', 'blog_posts']));
    }


    //this function loads about-us page
    public function aboutUs()
    {
        //all countries and categories
        $all_countries = $this->all_countries;
        $all_categories = $this->all_categories;
        $all_opportunities = Opportunity::with(['opportunity_user', 'opportunity_country', 'opportunity_category', 'opportunity_banner_images', 'opportunity_other_images'])->latest()->filter(request(['tag', 'interest', 'country_id', 'category_id']))->get();
        $new_monthly_visitors = count(Slice360Visitor::select('*')->whereMonth('created_at', Carbon::now()->month)->get());
        $blog_posts = WinkPost::orderBy('publish_date', 'DESC')->take(3)->get();
        $testimonials = UserTestimonial::with(['testimonial_user'])->latest()->take(10)->get();

        return view('app-general.about-us', compact(['all_countries', 'all_categories', 'all_opportunities', 'testimonials', 'new_monthly_visitors', 'blog_posts']));
    }
}
