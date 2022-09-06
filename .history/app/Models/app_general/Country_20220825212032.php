<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a country and opportunities
    public function country_opportunities()
    {
        return $this->hasMany(Opportunity::class, 'category_id')->orderBy('created_at', 'DESC');  //each country has many opportunities
    }
}