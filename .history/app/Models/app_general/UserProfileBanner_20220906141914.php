<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileBanner extends Model
{
    use HasFactory;

    public $table = 'user_profile_banners';

    //turn off the fillable
    protected $guarded = [];

}
