<?php

namespace App\Models\app_general;

use App\Models\app_general\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    //related table
    public $table = 'user_profiles';

     //turn off the fillable
    protected $guarded = [];


    //defines a relationship between a profile and user
    public function profile_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each profile belongs a user
    }


    //defines the relationship between a profile and banner image
    public function user_profile_banner()
    {
        return $this->hasMany(OpportunityBannerImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many banner images
    }


    //defines the relationship between a profile and profile image
    public function user_profile_image()
    {
        return $this->hasMany(OpportunityOtherImage::class, 'opportunity_id')->orderBy('created_at', 'DESC'); //each opportunity has many other images
    }

}
