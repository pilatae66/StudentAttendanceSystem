<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\History;
use App\Students;
use App\SchoolStatus;
use App\Fines;
use Carbon\Carbon;
use Auth;
use Notify;

class ScheduleController extends Controller
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
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create($id)
  {
    return view('schedules.create', ['id' => $id]);
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
      'event_time' => 'required',
      'duration' => 'required',
      'sign_type' => 'required',
    ]);

    $schedule = new Schedule;
    $schedule->event_id = $request->id;
    $schedule->duration = $request->duration;
    $schedule->event_time = $request->event_time;
    if(Carbon::parse($request->event_time)->hour < 12){
      $schedule->sign_type = "Morning " . $request->sign_type;
    }else if(Carbon::parse($request->event_time)->hour >= 12 && Carbon::parse($request->event_time)->hour <=18){
      $schedule->sign_type = "Afternoon " . $request->sign_type;
    }else{
      $schedule->sign_type = "Evening " . $request->sign_type;
    }

    if(Schedule::where('event_id', $request->id)->where('sign_type', $schedule->sign_type)->count()>0 ){
      
      alert()->error('You entered a duplicate schedule', '!')->toToast('top'); 
      return back()->withInput();
    }
    else{
      $fines = Fines::first();
      $status = SchoolStatus::first();
      $students = Students::where('isActive', '1')->get();

      foreach ($students as $key => $student) {
        $student->stud_fines += $fines->fine_amount;
        $student->save();
      }

      $history = new History;
      $history->incident = " Schedule for ".$schedule->event->event_name." Added ";
      $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
      $history->school_year = $status->school_year;
      $history->semester = $status->semester;

      $history->save();
      $schedule->save();

      alert()->success('Schedule Added', 'Successfully')->toToast('top'); 
      return redirect('schedules/'.$request->id);
    }


  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $schedules = Schedule::where('event_id', $id)->orderBy('event_time')->paginate(5);
    $schedules->event = $id;

    return view('schedules.show', ['schedules' => $schedules]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $schedule = Schedule::find($id);

    return view('schedules.edit', ['schedule' => $schedule]);
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
    $schedule = Schedule::find($id);

    $this->validate($request, [
      'event_time' => 'required',
      'sign_type' => 'required',
    ]);

    $schedule->event_time = $request->event_time;
    if(Carbon::parse($request->event_time)->hour < 12){
      $schedule->sign_type = "Morning " . $request->sign_type;
    }else if(Carbon::parse($request->event_time)->hour >= 12 && Carbon::parse($request->event_time)->hour <= 18){
      $schedule->sign_type = "Afternoon " . $request->sign_type;
    }else{
      $schedule->sign_type = "Evening " . $request->sign_type;
    }

    $status = SchoolStatus::first();

    $history = new History;
    $history->incident = " Schedule for ".$schedule->event->event_name." Edited ";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
    $history->school_year = $status->school_year;
    $history->semester = $status->semester;

    $history->save();
    $schedule->save();


    alert()->success('Schedule Updated', 'Successfully')->toToast('top');     
    return redirect("event/{$id}/schedule");
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
    $schedule = Schedule::find($id);

    $status = SchoolStatus::first(); 
    $fines = Fines::first();
    $students = Students::where('isActive', '1')->get();

    foreach ($students as $key => $student) {
      $student->stud_fines -= $fines->fine_amount;
      $student->save();
    }

    $history = new History;
    $history->incident = " Schedule for ".$schedule->event->event_name." Deleted";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;
    $history->school_year = $status->school_year;
    $history->semester = $status->semester;

    $history->save();
    $schedule->delete();


    alert()->success('Schedule Deleted', 'Successfully')->toToast('top'); 
    return redirect('schedules/'.$schedule->event_id);;
  }
}
