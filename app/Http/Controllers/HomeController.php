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
    
    $contribution_titles = [];
    $contribution_amount = [];
    $contribution_remaining = [];
    $first = [];
    $second = [];
    $third = [];
    $fourth = [];
    $total = [];
    $counter = [];
    $year = ['1st', '2nd', '3rd', '4th'];
    
    foreach ($contributions as $key => $contribution) {
      $contribution_titles[$key] = $contribution->cont_title;
      $contribution_amount[$key] = $payments->where('pay_type', $contribution->cont_title)->sum('pay_amount');
      $contribution_remaining[$key] = $student_count * $contribution->cont_amount;
      $counter = $payments->where('pay_type', $contribution->cont_title);
      $total[$key] = $counter->count();
      $first[$key] = $counter->filter(function($value, $key) {
        return $value->student->stud_year == '1st';
      });
      $second[$key] = $counter->filter(function($value, $key) {
        return $value->student->stud_year == '2nd';
      });
      $third[$key] = $counter->filter(function($value, $key) {
        return $value->student->stud_year == '3rd';
      });
      $fourth[$key] = $counter->filter(function($value, $key) {
        return $value->student->stud_year == '4th';
      });
      
    }
    // return $total;
    // return $first[0]->count() . " " . $second[0]->count() . " " . $third[0]->count(). " " .$fourth[0]->count();
    
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
      'contributions' => $contributions,
      'contribution_titles' => $contribution_titles,
      'contribution_amount' => $contribution_amount,
      'contribution_remaining' => $contribution_remaining,
      'first' => $first,
      'second' => $second,
      'third' => $third,
      'fourth' => $fourth,
      'total' => $total,
      ]);
    }
  }
  