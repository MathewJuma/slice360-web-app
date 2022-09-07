<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileBanner extends Model
{
    use HasFactory;

    public $table = 'user_profile_banners';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a banner image and a user profile
    public function banner_image_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each banner images belongs to an opportunity
    }

}
