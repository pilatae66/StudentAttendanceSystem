<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\History;
use Auth;
use Notify;

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
    $events = Events::orderBy('event_date', 'asc')->paginate(10);

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

    $event = new Events;
    $event->event_name = $request->input('eventname');
    $event->event_date = $request->input('eventdate');

    $history = new History;
    $history->incident = $request->eventname." Event Added ";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;

    $history->save();
    $event->save();

    Notify::info('Event Created Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
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
    $this->validate($request, [
      'eventname' => 'required',
      'eventdate' => 'required'
    ]);

    $event = Events::find($id);
    $event->event_name = $request->input('eventname');
    $event->event_date = $request->input('eventdate');



    $history = new History;
    $history->incident = $event->event_name." Event Updated";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;

    $history->save();
    $event->save();

    Notify::info('Event Edited Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
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
    $event = Events::find($id);

    $history = new History;
    $history->incident = $event->event_name." Event Deleted";
    $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;

    $history->save();
    $event->delete();

    Notify::info('Event Deleted Successfully','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
    return redirect('/event');
  }
}
