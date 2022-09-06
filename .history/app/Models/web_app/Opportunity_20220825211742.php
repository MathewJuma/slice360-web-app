<?php

namespace App\Models\web_app;

use App\Models\app_general\Country;
use App\Models\app_general\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\web_app\OpportunityBannerImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opportunity extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];


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


    //defines the relationship between an opportunity and banner images
    public function opportunity_banner_images()
    {
        return $this->hasMany(OpportunityBannerImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //an opportunity has many banner images
    }


    //create the relationship between opportunity and images
    public function opportunity_other_images()
    {
        return $this->hasMany(OpportunityOtherImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //an opportunity has many images
    }
}