<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileFollowing extends Model
{
    use HasFactory;

    public $table = 'user_profile_followings';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a following and a user
    public function following_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each following belongs to a user
    }


    //defines the relationship between a following and a user profile
    public function following_profile()
    {
        return $this->belongsTo(Opportunity::class, 'profile_id'); //each following belongs to a user profile
    }
}
