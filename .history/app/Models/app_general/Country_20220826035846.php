<?php

namespace App\Models\app_general;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    public $table = 'countries';

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a country and opportunities
    public function country_opportunities()
    {
        return $this->hasMany(Opportunity::class, 'category_id')->orderBy('created_at', 'DESC');  //each country has many opportunities
    }
}