<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'vacancy','description','close_date','creator_id'
    ];

    function User(){
        $this->hasOne('App/User','creator_id','id');
    }
}
