<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinner extends Model
{
    protected $fillable = ['name', 'email', 'begin_at', 'end_at', 'auto_report', 'dinner_time', 'uid'];

}
