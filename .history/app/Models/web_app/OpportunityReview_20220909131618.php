<?php

namespace App\Models\web_app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityReview extends Model
{
    use HasFactory;

    public $table = 'opportunity_reviews';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between a timeline and an opportunity
    public function review_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each timeline belongs to an opportunity
    }
}
