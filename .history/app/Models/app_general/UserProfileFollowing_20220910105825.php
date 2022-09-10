<?php

namespace App\Models\app_general;

use App\Models\app_general\User;
use App\Models\app_general\UserProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfileFollowing extends Model
{
    use HasFactory;

    public $table = 'user_profile_followings';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a profile following and a user
    public function following_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each profile following belongs to a user
    }


    //defines the relationship between a following and a user profile
    public function following_profile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id'); //each profile following belongs to a user profile
    }
}
