<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $primaryKey = 'cont_id';

    protected $fillable = [
      'cont_id',
      'cont_title',
      'cont_amount',
      'school_year',
      'semester',
    ];

}
