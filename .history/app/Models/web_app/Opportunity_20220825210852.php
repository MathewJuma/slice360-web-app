<?php

namespace App\Models\web_app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    //turn off the fillable
    protected $guarded = [];
}