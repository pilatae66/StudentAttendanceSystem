<?php

namespace App\Http\Controllers;

use App\Events;
use App\SchoolStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

  public function sign()
  {
    $status = SchoolStatus::first();
    $event = Events::where('event_date', date("Y-m-d"))->where('school_year', $status->school_year)->where('semester', $status->semester)->first();
    if(!is_null($event)){
      foreach ($event->schedule as $key => $value) {
        if(Carbon::now()->format('H:i') >= Carbon::parse($value->event_time)->toTimeString() && Carbon::now()->format('h:i') <= Carbon::parse($value->event_time)->addMinutes(30)->toTimeString()){
          $event->sign_type = $value->sign_type;
        }
      }
    }
    return view('attendance.welcome', ['event' => $event]);
  }
}
