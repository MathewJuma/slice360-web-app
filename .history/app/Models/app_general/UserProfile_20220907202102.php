<?php

namespace App\Models\app_general;

use App\Models\app_general\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\app_general\UserProfileImage;
use App\Models\app_general\UserProfileBanner;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    //related table
    public $table = 'user_profiles';

     //turn off the fillable
    protected $guarded = [];

    protected $appends = ["userProfiles"];


    protected $casts = [
        'problem_user_profiles' => 'array',
    ];

    public function getUserProfilesAttribute()
    {

        if (!$this->problem_user_profiles) {
            return null;
        }

        $problem_aspects = [];

        foreach ($this->problem_aspects as $key => $is_problem_aspect) {
            if ($is_problem_aspect == true) {
                $problem_aspects[] = getUserProfilesById($key);
            }
        }

        return $problem_aspects;
    }


    //defines a relationship between a profile and user
    public function profile_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each profile belongs a user
    }


    //defines the relationship between a profile and banner image
    public function user_profile_banner()
    {
        return $this->hasOne(UserProfileBanner::class, 'profile_id')->orderBy('created_at', 'DESC'); //each user profile has one banner image
    }


    //defines the relationship between a profile and profile image
    public function user_profile_image()
    {
        return $this->hasOne(UserProfileImage::class, 'profile_id')->orderBy('created_at', 'DESC'); //each user profile has one profile image
    }

}
