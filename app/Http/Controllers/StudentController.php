<?php

namespace App\Http\Controllers;

use App\Events;
use App\Students;
use App\Fines;
use App\History;
use App\Records;
use App\Schedule;
use App\SchoolStatus;
use Auth;
use Hash;
use Notify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contribution;

class StudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:web')->except('home', 'report');
    $this->middleware('auth:student')->only('home');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function saveFines($id)
  {
    $status = SchoolStatus::first();
    $student = Students::where('stud_id', $id)->first();
    $events = Events::where('school_year', $status->school_year)->where('semester', $status->semester)->get();
    $fine = Fines::first();
    $fines = 0;
    foreach ($events as $key => $event) {
      $fines += $event->schedule->count() * $fine->fine_amount;
    }
    $student->stud_fines = $fines;
    $student->save();
  }
  
  public function index()
  {
    $students = Students::where('isActive', '1')->orderBy('lname', 'asc')->get();
    
    return view('student.index', ['students' => $students]);
  }
  
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('student.create');
  }
  
  public function report($id)
  {
    $status = SchoolStatus::first();
    $fine_amount = Fines::first();
    $student = Students::where('stud_id', $id)->select('stud_id', 'fname', 'lname')->first();
    if (!is_null($student)) {
      $event = Events::all();
      if ($event->count() > 0) {
        for ($k = 0; $k < $event->count(); $k++) {
          $reports[$k] = array(
            'full_name' => $student->fname . " " . $student->lname,
            'event_name' => null,
            'morning_in' => null,
            'morning_out' => null,
            'afternoon_in' => null,
            'afternoon_out' => null,
            'evening_in' => null,
            'evening_out' => null,
            'fine' => null,
          );
        }
      } else {
        $reports[0] = array(
          'stud_id' => $student->stud_id,
          'full_name' => $student->fname . " " . $student->lname,
          'event_name' => " ",
          'morning_in' => " ",
          'morning_out' => " ",
          'afternoon_in' => " ",
          'afternoon_out' => " ",
          'evening_in' => " ",
          'evening_out' => " ",
          'fine' => 0,
        );
      }
      for ($i = 0; $i < $event->count(); $i++) {
        if ($i >= 1) {
          if ($reports[$i - 1]["event_name"] != $event[$i]->event_name) {
            $reports[$i]["event_name"] = $event[$i]->event_name;
            
            $sign_check = Records::where('event_id', $event[$i]->event_id)->where('stud_id', $id)->get();
            
            $stud_fines = ($event[$i]->schedule->count() - $sign_check->count()) * $fine_amount->fine_amount;
            
            $reports[$i]["fine"] = $stud_fines;
            
            for ($j = 0; $j < $sign_check->count(); $j++) {
              if ($sign_check[$j]->sign_type == 'Morning In') {
                $reports[$i]["morning_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Morning Out') {
                $reports[$i]["morning_out"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Afternoon In') {
                $reports[$i]["afternoon_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Afternoon Out') {
                $reports[$i]["afternoon_out"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Evening Out') {
                $reports[$i]["evening_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Evening Out') {
                $reports[$i]["evening_out"] = $sign_check[$j]->created_at->format('h:i A');
              }
            }
          } else {
            $i++;
          }
        } else {
          if ($reports[$i]["event_name"] != $event[$i]->event_name) {
            $reports[$i]["event_name"] = $event[$i]->event_name;
            $sign_check = Records::where('event_id', $event[$i]->event_id)->where('stud_id', $id)->get();
            
            $stud_fines = ($event[$i]->schedule->count() - $sign_check->count()) * $fine_amount->fine_amount;
            $reports[$i]["fine"] = $stud_fines;
            for ($j = 0; $j < $sign_check->count(); $j++) {
              if ($sign_check[$j]->sign_type == 'Morning In') {
                $reports[$i]["morning_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Morning Out') {
                $reports[$i]["morning_out"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Afternoon In') {
                $reports[$i]["afternoon_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Afternoon Out') {
                $reports[$i]["afternoon_out"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Evening Out') {
                $reports[$i]["evening_in"] = $sign_check[$j]->created_at->format('h:i A');
              } else if ($sign_check[$j]->sign_type == 'Evening Out') {
                $reports[$i]["evening_out"] = $sign_check[$j]->created_at->format('h:i A');
              }
            }
          } else {
            $i++;
          }
        }
        if ($event[$i]->schedule->count() > 0) {
          foreach ($event[$i]->schedule as $key => $value) {
            if (Schedule::where('sign_type', 'Morning In')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["morning_in"] = "No Schedule";
            }
            if (Schedule::where('sign_type', 'Morning Out')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["morning_out"] = "No Schedule";
            }
            if (Schedule::where('sign_type', 'Afternoon In')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["afternoon_in"] = "No Schedule";
            }
            if (Schedule::where('sign_type', 'Afternoon Out')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["afternoon_out"] = "No Schedule";
            }
            if (Schedule::where('sign_type', 'Evening In')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["evening_in"] = "No Schedule";
            }
            if (Schedule::where('sign_type', 'Evening Out')->where('event_id', $event[$i]->event_id)->first() == null) {
              $reports[$i]["evening_out"] = "No Schedule";
            }
          }
        } else {
          $reports[$i]["morning_in"] = "No Schedule";
          $reports[$i]["morning_out"] = "No Schedule";
          $reports[$i]["afternoon_in"] = "No Schedule";
          $reports[$i]["afternoon_out"] = "No Schedule";
          $reports[$i]["evening_in"] = "No Schedule";
          $reports[$i]["evening_out"] = "No Schedule";
        }
      }
      $reports[0]['stud_id'] = $student->stud_id;
      $history = new History;
      $history->incident = "Student " . $student->fname . " " . $student->lname . " checked their account";
      $history->full_name = $student->fname . " " . $student->lname;
      $history->school_year = $status->school_year;
      $history->semester = $status->semester;
      
      $history->save();
      
      $uni_fines = Records::where('record_title', 'Uniform')->where('stud_id', $id)->get();
      
      // return $reports;
      return view('student.report', ['reports' => $reports, 'uni_fines' => $uni_fines]);
    } else {
      
      $history = new History;
      $history->incident = "Anonymous checked their account. Student not found in the database!";
      $history->full_name = "Anonymous";
      $history->school_year = $status->school_year;
      $history->semester = $status->semester;
      
      $history->save();
      
      alert()->error('Student not found in the database', 'Successfully')->toToast('top');
      return redirect()->back()->withInput();
    }
  }
  
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'stud_id' => 'required|unique:students',
      'fname' => 'required',
      'lname' => 'required',
      'course' => 'required',
      'yearlvl' => 'required',
      ]);
      
      $user = new Students;
      $user->stud_id = $request->input('stud_id');
      $user->fname = ucfirst($request->input('fname'));
      $user->lname = ucfirst($request->input('lname'));
      $user->stud_course = $request->input('course');
      $user->stud_year = $request->input('yearlvl');
      $user->isActive = '1';
      
      $user->save();
      
      $this->saveFines($request->stud_id);
      
      $status = SchoolStatus::first();
      
      $history = new History;
      $history->incident = "Student " . $request->fname . " " . $request->lname . " Added ";
      $history->full_name = Auth::user()->fname . " " . Auth::user()->lname;
      $history->school_year = $status->school_year;
      $history->semester = $status->semester;
      
      $history->save();
      
      alert()->success('Student Registered', 'Successfully')->toToast('top');
      return redirect()->route('student.master');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
      
    }
    
    public function home()
    {
      return view('student.home');
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      $student = Students::find($id);
      
      return view('student.edit', ['student' => $student]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'stud_id' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'course' => 'required',
        'yearlvl' => 'required',
        ]);
        
        
        $user = Students::find($id);
        
        $user->stud_id = $request->input('stud_id');
        $user->fname = ucfirst($request->input('fname'));
        $user->lname = ucfirst($request->input('lname'));
        $user->stud_course = $request->input('course');
        $user->stud_year = $request->input('yearlvl');
        
        $user->save();
        
        $status = SchoolStatus::first();
        
        $history = new History;
        $history->incident = "Student " . $user->fname . " " . $user->lname . " Edited ";
        $history->full_name = Auth::user()->fname . " " . Auth::user()->lname;
        $history->school_year = $status->school_year;
        $history->semester = $status->semester;
        
        $history->save();
        
        alert()->success('Student Updated', 'Successfully')->toToast('top');
        return redirect()->route('student.master');
        
      }
      
      /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function destroy($id)
      {
        $student = Students::find($id);
        
        $status = SchoolStatus::first();
        
        $history = new History;
        $history->incident = "Student " . $student->fname . " " . $student->lname . " Deleted ";
        $history->full_name = Auth::user()->fname . " " . Auth::user()->lname;
        $history->school_year = $status->school_year;
        $history->semester = $status->semester;
        
        $history->save();
        $student->delete();
        
        alert()->success('Student Deleted', 'Successfully')->toToast('top');
        return back();
      }
      public function uniform($id)
      {
        $student = $id;
        
        return view('student.uniform', ['student' => $student]);
      }
      
      public function addUniformFine($id)
      {
        $status = SchoolStatus::first();
        $uniform = Contribution::where('cont_title', 'Uniform')->first();
        $record = new Records;
        
        $student = Students::where('stud_id', $id)->first();
        
        $record->stud_id = $id;
        $record->record_title = 'Uniform';
        $record->record_amount = $uniform->cont_amount;
        $record->school_year = $status->school_year;
        $record->semester = $status->semester;
        
        $record->save();
        
        $student->stud_fines += $uniform->cont_amount;
        
        $student->save();
        
        alert()->success('Uniform Fine Added', 'Successfully')->toToast('top');
        return redirect()->route('student.index');
      }
      
      public function getMasterList()
      {
        $students = Students::orderBy('lname', 'asc')->get();
        
        return view('student.master', ['students' => $students]);
      }
      
      public function activate($id)
      {
        $student = Students::where('stud_id', $id)->first();
        
        $student->isActive = !$student->isActive;
        
        print($student->isActive);
        
        $student->save();

        $this->saveFines($id);
        
        alert()->success('Student Activated', 'Successfully')->toToast('top');
        return redirect()->route('student.master');
      }
    }
    