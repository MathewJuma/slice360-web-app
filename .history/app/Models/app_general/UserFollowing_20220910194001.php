<?php

namespace App\Models\app_general;

use App\Models\app_general\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFollowing extends Model
{
    use HasFactory;

    public $table = 'user_followings';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a user following and a user
    public function following_user()
    {
        return $this->belongsTo(User::class, 'followed_id'); //each user following belongs to a user
    }


    //defines the relationship between a users followed and a user
    public function followed_user()
    {
        return $this->belongsTo(User::class, 'following_id'); //each user following belongs to a user
    }

}
