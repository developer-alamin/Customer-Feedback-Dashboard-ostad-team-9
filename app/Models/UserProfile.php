<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    // fillable property
    protected $fillable = [
        'user_id', 
        'mobile', 
        'address', 
        'image'
    ];

    // user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
