<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Records;
use App\Students;
use App\Events;
use App\SchoolStatus;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $status = SchoolStatus::first();
    $student_count = Students::where('isActive', 'Active')->count();
    $fines = Students::where('isActive', 'Active')->sum('stud_fines');
    $event_count = Events::where('school_year', $status->school_year)->where('semester', $status->semester)->count();
    $record_count = Records::where('school_year', $status->school_year)->where('semester', $status->semester)->count();
    $active_stud = Records::where('school_year', $status->school_year)->where('semester', $status->semester)->distinct()->get(['stud_id'])->count();
    
    $records = Records::distinct()->get(['stud_id', 'event_id', 'record_title']);
    
    $recordss = $records->filter(function ($record) {
        return $record->record_title != 'Uniform';
    });

    // return $records;
    return view('home', ['student' => $student_count, 'event' => $event_count, 'record' => $record_count, 'fines' => $fines, 'active' => $active_stud]);
  }
}
