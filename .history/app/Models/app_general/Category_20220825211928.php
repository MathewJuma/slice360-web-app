<?php

namespace App\Models\app_general;

use App\Models\web_app\Opportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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