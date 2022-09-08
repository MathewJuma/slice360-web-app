<?php

namespace App\Models\app_general;

use App\Models\app_general\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfileImage extends Model
{
    use HasFactory;

    public $table = 'user_profile_images';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between an image and a user profile
    public function image_user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id'); //each user image belongs to a user profile
    }
}
