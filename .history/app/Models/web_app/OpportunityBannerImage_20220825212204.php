<?php

namespace App\Models\web_app;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityBannerImage extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a banner image and an opportunity
    public function banner_image_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each banner images belongs to an opportunity
    }
}