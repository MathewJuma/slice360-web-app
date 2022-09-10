<?php

namespace App\Models\web_app;

use App\Models\app_general\User;
use App\Models\web_app\Opportunity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    //defines the relationship between a following and an opportunity
    public function following_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each following belongs to an opportunity
    }
}
