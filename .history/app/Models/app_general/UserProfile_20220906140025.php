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


    //defines a relationship between a profile and user
    public function profile_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each profile belongs a user
    }

}
