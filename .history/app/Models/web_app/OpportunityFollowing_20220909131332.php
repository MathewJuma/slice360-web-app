<?php

namespace App\Models\web_app;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityFollowing extends Model
{
    use HasFactory;

    public $table = 'opportunity_followings';

    //turn off the fillable
    protected $guarded = [];
}
