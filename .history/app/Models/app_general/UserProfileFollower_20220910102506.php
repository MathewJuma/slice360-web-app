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


    //defines the relationship between a following and an opportunity
    public function following_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each following belongs to an opportunity
    }

}
