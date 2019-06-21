<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoringType extends Model
{
    protected $fillable = [
        "type",
        "result_type",
        "execution_type",
        "name",
        "weight"
    ];
}
