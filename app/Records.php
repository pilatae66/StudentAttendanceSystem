<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
  protected $primaryKey = 'record_id';

  protected $fillable = ['record_id', 'stud_id', 'event_id', 'stud_att', 'sign_type'];

  public function student()
  {
    return $this->belongsTo(Students::class, 'stud_id', 'stud_id')->select(['fname', 'lname']);
  }

  public function event()
  {
    return $this->hasOne(Events::class, 'event_id', 'event_id');
  }
}
