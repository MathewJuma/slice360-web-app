<?php

namespace App\Models\web_app;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunityTimeline extends Model
{
    use HasFactory;

    public $table = 'opportunity_timelines';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between a timeline and an opportunity
    public function timeline_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each timeline belongs to an opportunity
    }
}
