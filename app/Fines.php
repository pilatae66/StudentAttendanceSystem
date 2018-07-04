<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fines extends Model
{
  protected $primaryKey = 'fine_id';

  protected $fillable = ['fine_amount'];
}
