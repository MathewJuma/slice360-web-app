<?php

namespace App\Models\app_general;

use App\Models\app_general\User;
use App\Models\app_general\UserProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfileFollower extends Model
{
    use HasFactory;

    public $table = 'user_profile_followers';

    //turn off the fillable
    protected $guarded = [];


     //defines the relationship between a profile follower and a user
    public function follower_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each profile follower belongs to a user
    }


    //defines the relationship between a profile follower and a user profile
    public function follower_profile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id'); //each profile follower belongs to a user profile
    }

}
