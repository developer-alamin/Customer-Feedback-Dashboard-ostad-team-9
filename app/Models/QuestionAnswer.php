<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    // Fillable
    protected $fillable = ['question', 'type', 'options', 'responses'];

    // Cast
    protected $casts = [
        'options' => 'array',
        'responses' => 'array',
    ];
}
