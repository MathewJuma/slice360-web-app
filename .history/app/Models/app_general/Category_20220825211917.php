<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];


    //defines the relationship between a category and opportunities
    public function category_opportunities()
    {
        return $this->hasMany(Opportunity::class, 'category_id')->orderBy('created_at', 'DESC');  //a category has many opportunities
    }
}