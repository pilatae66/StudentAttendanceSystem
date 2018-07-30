<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Records;
use App\Students;
use App\Events;
use App\SchoolStatus;
use App\Payment;
use App\Contribution;

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
    $student_count = Students::where('isActive', '1')->count();
    $fines = Students::where('isActive', '1')->sum('stud_fines');
    $event_count = Events::where('school_year', $status->school_year)->where('semester', $status->semester)->count();
    $record_count = Records::where('school_year', $status->school_year)->where('semester', $status->semester)->count();
    $active_stud = Records::where('school_year', $status->school_year)->where('semester', $status->semester)->distinct()->where('record_title', '!=', 'Uniform')->count();
    
    $records = Records::distinct()->get(['stud_id', 'event_id', 'record_title']);

    $collection = Payment::where('semester', $status->semester)->where('school_year', $status->school_year)->sum('pay_amount');
    $contributions = Contribution::where('cont_title','!=', 'Uniform')->where('semester', $status->semester)->where('school_year', $status->school_year)->get();
    $payments = Payment::where('semester', $status->semester)->where('school_year', $status->school_year)->get();

    $pay = [];

    foreach ($contributions as $key => $contribution) {
      $pay[$key] = $payments->where('pay_type', $contribution->cont_title)->sum('pay_amount');
    }    

    // return $pay;

    $recordss = $records->filter(function ($record) {
        return $record->record_title != 'Uniform';
    });

    // return $fines;
    return view('home', [
      'pay' => $pay,
      'student' => $student_count, 
      'event' => $event_count, 
      'record' => $record_count, 
      'fines' => $fines, 
      'active' => $active_stud, 
      'collection' => $collection,
      'contributions' => $contributions
      ]);
  }
}
