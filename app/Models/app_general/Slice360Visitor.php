<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slice360Visitor extends Model
{
    use HasFactory;

    public $table = 'slice360_visitors';

    //turn off the fillable
    protected $guarded = [];
}
