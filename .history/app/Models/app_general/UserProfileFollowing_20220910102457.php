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
}
