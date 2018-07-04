<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class Students extends Authenticatable
{
  use Searchable;
  use Notifiable;

  protected $primaryKey = 'stud_id';
  public $incrementing = false;

  protected $fillable = [
    'stud_id', 'stud_fname', 'stud_lname', 'stud_course', 'stud_yearlvl', 'email', 'password'
  ];

  protected $hidden = [
    'password', 'remember_token'
  ];

  public function records()
  {
    return $this->hasMany(Records::class, 'stud_id', 'stud_id');
  }

  public function events()
  {
    return $this->hasMany(Events::class);
  }

}
