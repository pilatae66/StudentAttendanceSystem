<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Records;
use App\Students;
use App\Events;
use App\History;
use Carbon\Carbon;
use Notify;
use Validator;

class RecordController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => 'store']);
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $records = Records::orderBy('updated_at', 'dec')->paginate(10);

    return view('records.index', ['records' => $records]);
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
      'id' => 'required'
    ]);
    $status = SchoolStatus::first();

    if($request->submitButton == 'sign'){
      if(!is_null($request->event_id)){
        $event_checks = Events::where('event_date', date("Y-m-d"))->with('schedule')->first();
        foreach ($event_checks->schedule as $key => $value) {
          if(Carbon::now()->format('H:i') >= Carbon::parse($value->event_time)->toTimeString() && Carbon::now()->format('H:i') <= Carbon::parse($value->event_time)->addMinutes($value->duration)->toTimeString()){
            if(Students::where('stud_id', '=', $request->input('id'))->count()>0){
              if(!Records::where('stud_id', '=', $request->input('id'))->where('sign_type', $request->sign_type)->count()>0){

                $record = new Records;
                $record->stud_id = $request->input('id');
                $record->event_id = $request->input('event_id');
                $record->sign_type = $request->sign_type;
                $record->school_year = $status->school_year;
                $record->semester = $status->semester;


                $student = Students::where('stud_id', '=', $request->input('id'))->first();
                $history = new History;
                $history->incident = $student->stud_fname." ".$student->stud_lname." Signed ".$request->sign_type;
                $history->full_name = $student->stud_fname." ".$student->stud_lname;
                $history->school_year = $status->school_year;
                $history->semester = $status->semester;

                $history->save();

                $record->save();
                Notify::info('You have Signed In/Out Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
                return redirect('/');
              }
              else{
                $student = Students::where('stud_id', '=', $request->input('id'))->first();
                $history = new History;
                $history->incident = 'Duplicate Sign';
                $history->full_name = $student->stud_fname." ".$student->stud_lname;
                $history->school_year = $status->school_year;
                $history->semester = $status->semester;

                $history->save();

                Notify::error('You have Signed In/Out multiple times!','Duplicate!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
                return redirect('/');
              }

            }
            else{
              Notify::error('Student is not found in the database!','Student not found!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
              //Redirect page
              return redirect('/');
            }
            break;
          }
        }
      }
      else{
        if(Students::where('stud_id', '=', $request->input('id'))->count()>0){
          $student = Students::where('stud_id', '=', $request->input('id'))->first();
          $history = new History;
          $history->incident = 'No event signing';
          $history->full_name = $student->stud_fname." ".$student->stud_lname;
          $history->school_year = $status->school_year;
          $history->semester = $status->semester;

          $history->save();
          Notify::error('Theres no event today.','No Event!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
          return redirect('/');
        }
        else{
          $history = new History;
          $history->incident = 'No event signing';
          $history->full_name = "Anonymous";
          $history->school_year = $status->school_year;
          $history->semester = $status->semester;

          $history->save();
          Notify::error('Theres no event today.','No Event!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
          return redirect('/');
        }
      }

      //Redirect page

      if(Students::where('stud_id', '=', $request->input('id'))->count()>0){
        $student = Students::where('stud_id', '=', $request->input('id'))->first();
        $history = new History;
        $history->incident = 'Signing In/Out before schedule';
        $history->full_name= $student->stud_fname." ".$student->stud_lname;
        $history->school_year = $status->school_year;
        $history->semester = $status->semester;

        $history->save();

        Notify::error('You cant Sign In/Out in this time.','No Schedule!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
        return redirect('/');
      }else{
        $history = new History;
        $history->incident = 'Signing In/Out before schedule';
        $history->full_name= "Anonymous";
        $history->school_year = $status->school_year;
        $history->semester = $status->semester;

        $history->save();

        Notify::error('You cant Sign In/Out in this time.','No Schedule!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-remove']);
        return redirect('/');
      }
    }
    else{
      return redirect()->route('student.report', ['id' => $request->id]);
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
    $records = Records::where('stud_id', $id)->paginate(10);
    $full_name = Students::find($id);
    $records->full_name = $full_name->stud_fname . " " . $full_name->stud_lname;

    return view('records.show', ['records' => $records]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $record = Records::find($id);

    return view('records.edit', ['record' => $record]);
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
      'record_title' => 'required',
      'record_amount' => 'required',
    ]);

    $record = Records::find($id);

    $record->record_title = $request->record_title;
    $record->record_amount = $request->record_amount;
    $record->school_year = $status->school_year;
    $record->semester = $status->semester;


    $record->save();

    Notify::success('Student Deleted Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);

    //Redirect page
    return redirect()->route('uniform.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $event = Records::find($id);
    $event->delete();

    Notify::success('Student Deleted Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
    return back();
  }

  public function uniformIndex()
  {
    $uniforms = Records::where('record_title', 'Uniform')->paginate(10);

    return view('records.uniformIndex', ['uniforms' => $uniforms]);
  }
}
