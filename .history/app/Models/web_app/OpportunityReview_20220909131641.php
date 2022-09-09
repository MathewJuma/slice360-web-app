<?php

namespace App\Models\web_app;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityReview extends Model
{
    use HasFactory;

    public $table = 'opportunity_reviews';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between a review and an opportunity
    public function review_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each review belongs to an opportunity
    }
}
