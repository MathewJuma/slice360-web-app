<?php

namespace App\Models\app_general;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIntouchMessage extends Model
{
    use HasFactory;

    //related table
    public $table = 'user_intouch_messages';

     //turn off the fillable
    protected $guarded = [];


    //defines a relationship between intouch message and a user
    public function intouch_message_user()
    {
        return $this->belongsTo(User::class, 'user_id'); //each intouch message belongs a to user
    }
}
