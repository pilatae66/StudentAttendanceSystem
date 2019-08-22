<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Records;
use App\Students;
use App\Events;
use App\History;
use Carbon\Carbon;
use App\Fines;
use Validator;
use App\SchoolStatus;

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
    $fines = Fines::first();

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
                $student->stud_fines -= $fines->fine_amount;
                $history = new History;
                $history->incident = $student->stud_fname." ".$student->stud_lname." Signed ".$request->sign_type;
                $history->full_name = $student->stud_fname." ".$student->stud_lname;
                $history->school_year = $status->school_year;
                $history->semester = $status->semester;

                // return $student;

                $history->save();

                $student->save();

                $record->save();

                alert()->success('Signed In/Out Successfully', '!')->toToast('top');

                return redirect('/attend');
              }
              else{
                $student = Students::where('stud_id', '=', $request->input('id'))->first();
                $history = new History;
                $history->incident = 'Duplicate Sign';
                $history->full_name = $student->stud_fname." ".$student->stud_lname;
                $history->school_year = $status->school_year;
                $history->semester = $status->semester;

                $history->save();

                alert()->error('Duplicate Sign In/Out', '!')->toToast('top');
                return redirect('/attend');
              }

            }
            else{
              alert()->error('No Student with id' . $request->id .'is in the database', '!')->toToast('top');
              //Redirect page
              return redirect('/attend');
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
          
          alert()->error('There is no Event Today', '!')->toToast('top');
          return redirect('/attend');
        }
        else{
          $history = new History;
          $history->incident = 'No event signing';
          $history->full_name = "Anonymous";
          $history->school_year = $status->school_year;
          $history->semester = $status->semester;

          $history->save();

          alert()->error('There is no Event Today', '!')->toToast('top');
          return redirect('/attend');
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

        alert()->error('You cannot sign in/out on this time', '!')->toToast('top');
        toast('You cannot sign in/out on this time!','error','top-right');
        return redirect('/');
      }else{
        $history = new History;
        $history->incident = 'Signing In/Out before schedule';
        $history->full_name= "Anonymous";
        $history->school_year = $status->school_year;
        $history->semester = $status->semester;

        $history->save();

        alert()->error('You cannot sign in/out on this time', '!')->toToast('top');
        return redirect('/attend');
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
    $record = Records::find($id);
    $record->delete();

    return back();
  }

  public function uniformIndex()
  {
    $status = SchoolStatus::first();
    $uniforms = Records::where('record_title', 'Uniform')->where('school_year', $status->school_year)->where('semester', $status->semester)->get();

    return view('records.uniformIndex', ['uniforms' => $uniforms]);
  }
}
