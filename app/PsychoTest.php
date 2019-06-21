<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsychoTest extends Model
{
    protected $fillable=[
        'question','answer_a','answer_b','answer_c','answer_d','correct_answer'
    ];
}
