<?php

namespace App\Models\web_app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunitySeeking extends Model
{
    use HasFactory;

    public $table = 'opportunity_seekings';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between an opportunity seeking and an opportunity
    public function seeking_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each banner images belongs to an opportunity
    }
}
