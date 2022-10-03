<?php

namespace App\Models\web_app;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpportunitySeeking extends Model
{
    use HasFactory;

    public $table = 'opportunity_seekings';

    //turn off the fillable
    protected $guarded = [];

    //defines the relationship between an opportunity seeking and an opportunity
    public function seeking_opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id'); //each seeking belongs to an opportunity
    }

    //define the scope filter for opportunity seeking
    public function scopeOpportunitySeeking($query, $seeking)
    {

        dd($seeking[0]);
        $query->where('seeking_name', 'LIKE', '%' . $seeking . '%');
    }
}
