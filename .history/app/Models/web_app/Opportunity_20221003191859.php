<?php

namespace App\Models\web_app;

use Laravel\Scout\Searchable;
use App\Models\app_general\User;
use App\Models\app_general\Country;
use App\Models\app_general\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\web_app\OpportunityReview;
use App\Models\web_app\OpportunitySeeking;
use App\Models\web_app\OpportunityTimeline;

use App\Models\web_app\OpportunityFollowing;
use App\Models\web_app\OpportunityOtherImage;

use App\Models\web_app\OpportunityBannerImage;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opportunity extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use Searchable;

    //related table
    public $table = 'opportunities';

    //turn off the fillable
    protected $guarded = [];

    //set timestamps to false
    public $timestamps = false;


    //this is the searchable array
    public function toSearchableArray()
    {
        //$opportunity = $this->only(['id', 'title', 'brief_description', 'detailed_description']);

        $opportunity = [
            'title' => $this->title,
            'brief_description' => $this->brief_description,
            'detailed_description' => $this->detailed_description,
        ];

        return $opportunity;

    }


    // protected function makeAllSearchableUsing($query)
    // {
    //     return $query->with('opportunity_country');
    // }


    //create a scope filter to help in filtering opportunities
    public function scopeFilterOpportunities($query, array $filters)
    {
        //dd($filters);
        //$arrays to search
        $tags_search = ['tag'];
        $seek_search = ['seeking'];
        $main_search = ['interest', 'category_id', 'country_id'];

        //1. search using tags
        if (count(array_intersect_key(array_flip($tags_search), $filters)) === count($tags_search)) {

            $query->where('category_id', 'like', '%' . $filters['tag'] . '%') //select where category_id matches filters
                ->orWhere('country_id', 'like', '%' . $filters['tag'] . '%') //select where country matches filters
                ->orWhere('brief_description', 'like', '%' . $filters['tag'] . '%') //select where brief_description matches filters
                ->orWhere('detailed_description', 'like', '%' . $filters['tag'] . '%') //select where detailed_description matches filters
                ->orWhere('title', 'like', '%' . $filters['tag'] . '%') //select where title matches filters
                ->orWhere('tags', 'like', '%' . $filters['tag'] . '%'); //select where title matches filters
        }

        //2. search using seek
        if (count(array_intersect_key(array_flip($seek_search), $filters)) === count($seek_search)) {

            $query->whereHas('opportunity_seeking', function    ($query) use ($filters) {
                        $query->opportunitySeeking($filters);
                    })
                  ->orWhere('tags', 'like', '%' . $filters['tag'] . '%'); //select where title matches filters
        }

        //3. search using interest
        if (count(array_intersect_key(array_flip($main_search), $filters)) === count($main_search)) {

            //2.1 interest null, all locations, all categories i.e. just return everything
            if ($filters['interest'] == null && $filters['country_id'] == "All Locations" && $filters['category_id'] == "All Categories") {
                //dd('interest is null, all categories, all countries,');
            }

            //2.2 interest null, select category, all countries
            if ($filters['interest'] == null  && $filters['category_id'] != "All Categories" && $filters['country_id'] == "All Locations") {
                $query->where('category_id', $filters['category_id']); //select where category matches filters
            }

            //2.3 interest null, all categories, select country
            if ($filters['interest'] == null  && $filters['category_id'] == "All Categories" && $filters['country_id'] != "All Locations") {
                $query->where('country_id', $filters['country_id']); //select where category matches filters
            }

            //2.4 interest null, select categories, select country
            if ($filters['interest'] == null  && $filters['category_id'] != "All Categories" && $filters['country_id'] != "All Locations") {
                $query->where('category_id', $filters['category_id']) //select where category matches filters
                    ->where('country_id',  $filters['country_id']); //select where category matches filters
            }

            //2.5 interest, all categories, all countries
            if ($filters['interest'] != null && $filters['category_id'] == "All Categories" && $filters['country_id'] == "All Locations") {
                $query->where('title', 'like', '%' . $filters['interest'] . '%') //select where title matches filters
                    ->orWhere('brief_description', 'like', '%' . $filters['interest'] . '%') //select where description matches filters
                    ->orWhere('country_id', 'like', '%' . $filters['interest'] . '%') //select where country matches filters
                    ->orWhere('city', 'like', '%' . $filters['interest'] . '%') //select where city matches filters
                    ->orWhere('category_id', 'like', '%' . $filters['interest'] . '%'); //select where tags matches filters
            }

            //2.6 interest, select category, all countries
            if ($filters['interest'] != null  && $filters['category_id'] != "All Categories" && $filters['country_id'] == "All Locations") {
                $query->where('title', 'like', '%' . $filters['interest'] . '%') //select where title matches filters
                    ->orWhere('brief_description', 'like', '%' . $filters['interest'] . '%') //select where description matches filters
                    ->where('category_id', $filters['category_id']); //select where category matches filters
            }

            //2.7 interest, all categories, select country
            if ($filters['interest'] != null  && $filters['category_id'] == "All Categories" && $filters['country_id'] != "All Locations") {
                $query->where('title', 'like', '%' . $filters['interest'] . '%') //select where title matches filters
                    ->orWhere('brief_description', 'like', '%' . $filters['interest'] . '%') //select where description matches filters
                    ->where('country_id', $filters['country_id']); //select where country matches filters
            }

            //2.8 interest, select category, select country
            if ($filters['interest'] != null  && $filters['category_id'] != "All Categories" && $filters['country_id'] != "All Locations") {
                $query->where('title', 'like', '%' . $filters['interest'] . '%') //select where title matches filters
                    ->orWhere('brief_description', 'like', '%' . $filters['interest'] . '%') //select where description matches filters
                    ->where('category_id', $filters['category_id']) //select where category matches filters
                    ->where('country_id', $filters['country_id']); //select where country matches filters
            }
        }
    }


    //this method is used to increament a view count on every opportunity
    public function incrementViewCount() {

        $this->click_views++;
        return $this->save();

    }


    //defines a relationship between an opportunities and a user
    public function opportunity_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each opportunity belongs to a user
    }


    //defines a relationship between an opportunities and a country
    public function opportunity_country()
    {
        return $this->belongsTo(Country::class, 'country_id'); //each opportunity belongs to a country
    }


    //defines a relationship between an opportunities and a category
    public function opportunity_category()
    {
        return $this->belongsTo(Category::class, 'category_id'); //each opportunity belongs to a category
    }


    //defines the relationship between an opportunity and opportunity timelines
    public function opportunity_timelines()
    {
        return $this->hasMany(OpportunityTimeline::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many timelines
    }


    //defines the relationship between an opportunity and opportunity reviews
    public function opportunity_reviews()
    {
        return $this->hasMany(OpportunityReview::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many reviews
    }


    //defines the relationship between an opportunity and opportunity followings
    public function opportunity_followings()
    {
        return $this->hasMany(OpportunityFollowing::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many followings
    }


    //defines the relationship between an opportunity and seekings
    public function opportunity_seeking()
    {
        return $this->hasMany(OpportunitySeeking::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many seekings
    }


    //defines the relationship between an opportunity and banner images
    public function opportunity_banner_images()
    {
        return $this->hasMany(OpportunityBannerImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many banner images
    }


    //defines the relationship between an opportunity and other images
    public function opportunity_other_images()
    {
        return $this->hasMany(OpportunityOtherImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many other images
    }
}
