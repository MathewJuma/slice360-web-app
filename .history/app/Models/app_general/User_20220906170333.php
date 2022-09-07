<?php

namespace App\Models\app_general;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use App\Models\web_app\Opportunity;
use App\Models\app_general\UserProfile;
use Illuminate\Notifications\Notifiable;
use App\Models\app_general\UserProfileImage;
use App\Models\app_general\UserProfileBanner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //related table
    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //defines the relationship between a user and a profile
    public function user_profile()
    {
        return $this->hasOne(UserProfile::class , 'user_id'); //each user has one user profile
    }


    //defines a relationship between a users and opportunities
    public function user_opportunities()
    {
        return $this->hasMany(Opportunity::class, 'user_id'); //each user has many opportunities
    }
}