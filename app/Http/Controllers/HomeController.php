<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Records;
use App\Students;
use App\Events;

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
    $student_count = Students::count();
    $fines = Students::sum('stud_fines');
    $event_count = Events::count();
    $record_count = Records::count();
    $active = (Records::distinct()->get(['stud_id'])->count() / Students::all()->count()) * 100;
    $active_stud = Records::distinct()->get(['stud_id'])->count();
    $chart_student = Charts::create('percentage', 'justgage')
            ->title('Student Attendance')
            ->elementLabel('% Active Students')
            ->template("green-material")
            ->responsive(false)
            ->height(300)
            ->values([$active, 0, 100])
            ->width(0);

    $records = Records::distinct()->get(['stud_id', 'event_id', 'record_title']);

    foreach ($records as $key => $record) {
      if(!is_null($record->event_id)){
        $record->event_name = $record->event->event_name;
      }
    }
    $recordss = $records->filter(function ($record) {
        return $record->record_title != 'Uniform';
    });


    $chart_records = Charts::database($recordss, 'line', 'chartjs')
            ->title('Student Count per Event')
            ->elementLabel("Student Count")
            ->dimensions(650, 300)
            ->responsive(false)
            ->template("green-material")
            ->groupBy('event_name');

    // return $records;
    return view('home', ['chart_student' => $chart_student, 'chart_records' => $chart_records, 'student' => $student_count, 'event' => $event_count, 'record' => $record_count, 'fines' => $fines, 'active' => $active_stud]);
  }
}
