<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoringValue extends Model
{
    protected $fillable =[
        'score','value','type_id',
    ];
}
