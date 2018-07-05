<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolStatus extends Model
{
    protected $fillable = [
        'school_year', 'semester'
    ];
}
