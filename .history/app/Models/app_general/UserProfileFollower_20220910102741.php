<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileFollower extends Model
{
    use HasFactory;

    public $table = 'user_profile_followers';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a following and a user profile
    public function following_user_profile()
    {
        return $this->belongsTo(UserProfile::class, 'profile_id'); //each following belongs to an opportunity
    }

}
