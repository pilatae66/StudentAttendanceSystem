<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = ['event_id', 'event_time', 'sign_type'];

  public function event()
  {
    return $this->belongsTo(Events::class, 'event_id', 'event_id');
  }
}
