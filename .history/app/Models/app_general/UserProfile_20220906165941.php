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




}
