<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\History;
use App\SchoolStatus;
use App\Fines;
use App\Students;
use App\Records;
use Auth;

class EventController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $status = SchoolStatus::first();
    $events = Events::where('semester', $status->semester)->where('school_year', $status->school_year)->orderBy('event_date', 'asc')->paginate(10);

    return view('event.index', ['events' => $events]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('event.create');
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
      'eventname' => 'required',
      'eventdate' => 'required'
    ]);
    $status = SchoolStatus::first();

    $event = new Events;
    $event->event_name = $request->input('eventname');
    $event->event_date = $request->input('eventdate');
    $event->school_year = $status->school_year;
    $event->semester = $status->semester;

    $history = new History;
    $history->incident = $request->eventname." Event Added ";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
    $history->school_year = $status->school_year;
    $history->semester = $status->semester;

    $history->save();
    $event->save();


    alert()->success('Event Created', 'Successfully')->toToast('top');    
    //Redirect page
    return redirect('/event');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $event = Events::find($id);

    return view('event.edit', ['event' => $event]);
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
    $status = SchoolStatus::first();
    $this->validate($request, [
      'eventname' => 'required',
      'eventdate' => 'required'
    ]);

    $event = Events::find($id);
    $event->event_name = $request->input('eventname');
    $event->event_date = $request->input('eventdate');
    $event->school_year = $status->school_year;
    $event->semester = $status->semester;



    $history = new History;
    $history->incident = $event->event_name." Event Updated";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
    $history->school_year = $status->school_year;
    $history->semester = $status->semester;

    $history->save();
    $event->save();


    alert()->success('Event Updated', 'Successfully')->toToast('top'); 
    //Redirect page
    return redirect('/event');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $status = SchoolStatus::first();
    $fines = Fines::first();
    $event = Events::find($id);
    $schedule_count = $event->schedule->count();

    
    $students = Students::where('isActive', '1')->get();

    foreach ($students as $key => $student) {
      $student_record_count = Records::where('stud_id', $student->stud_id)->where('event_id', $id)->count();
      $student->stud_fines -= $fines->fine_amount * ($schedule_count - $student_record_count);
      $student->save();
    }

    // return $students;

    $history = new History;
    $history->incident = $event->event_name." Event Deleted";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
    $history->school_year = $status->school_year;
    $history->semester = $status->semester;

    $history->save();
    $event->delete();

    alert()->success('Event Deleted', 'Successfully')->toToast('top'); 
    return redirect('/event');
  }
}
