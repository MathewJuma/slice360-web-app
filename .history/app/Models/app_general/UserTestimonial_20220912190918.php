<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestimonial extends Model
{
    use HasFactory;

    //related table
    public $table = 'user_testimonials';

     //turn off the fillable
    protected $guarded = [];

    //defines a relationship between intouch message and a user
    public function testimonial_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each intouch message belongs to a user
    }
}
