<?php

namespace App\Models\web_app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityFollowing extends Model
{
    use HasFactory;

    public $table = 'opportunity_followings';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between a following and a user
    public function following_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each following belongs to a user
    }

    //defines the relationship between a review and an opportunity
    public function review_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each review belongs to an opportunity
    }
}
