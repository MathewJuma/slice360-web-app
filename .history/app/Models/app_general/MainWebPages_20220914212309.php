<?php

namespace App\Models\app_general;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opportunity extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;

    //turn off the fillable
    protected $guarded = [];

}
