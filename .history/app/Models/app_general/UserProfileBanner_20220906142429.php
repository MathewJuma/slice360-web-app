<?php

namespace App\Models\app_general;

use App\Models\app_general\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfileBanner extends Model
{
    use HasFactory;

    public $table = 'user_profile_banners';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a banner image and a user profile
    public function banner_user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id'); //each banner images belongs to a user profile
    }

}
