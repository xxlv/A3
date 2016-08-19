<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [

        'real_name', 'email', 'sex'
    ];

}
