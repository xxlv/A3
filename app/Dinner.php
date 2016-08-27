<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Dinner extends Model
{

    use Searchable;

    protected $fillable = ['name', 'email', 'begin_at', 'end_at', 'auto_report', 'dinner_time', 'uid'];


    public function searchableAs()
    {
        return 'dinner';
    }
}
