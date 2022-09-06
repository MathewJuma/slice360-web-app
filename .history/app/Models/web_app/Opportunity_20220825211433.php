<?php

namespace App\Models\web_app;

use App\Models\app_general\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];


    //defines a relationship between an opportunities and a country
    public function opportunity_country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}