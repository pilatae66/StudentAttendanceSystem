<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
  protected $primaryKey = 'event_id';

  protected $fillable = ['event_id', 'event_name', 'event_att_amount', 'event_date', 'fine_amount'];

  public function records()
  {
    return $this->belongsTo(Records::class);
  }

  public function schedule()
  {
    return $this->hasMany(Schedule::class, 'event_id', 'event_id');
  }
}
