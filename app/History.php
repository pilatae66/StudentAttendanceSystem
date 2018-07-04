<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $primaryKey = 'history_id';

  protected $fillable = ['incident', 'id'];

  public function student()
  {
    return $this->hasOne(Students::class, 'stud_id', 'sus_id');
  }
}
