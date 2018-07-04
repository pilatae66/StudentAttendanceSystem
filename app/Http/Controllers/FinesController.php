<?php

namespace App\Http\Controllers;
use App\Fines;
use App\History;
use Auth;
use Illuminate\Http\Request;
use Notify;

class FinesController extends Controller
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
      $fines = Fines::first();

      return view('fines.index', ['fines' => $fines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $fine = Fines::find($id);

      return view('fines.edit', ['fine' => $fine]);
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
      $fine = Fines::find($id);

      $history = new History;
      $history->incident = "&#8369;".$fine->fine_amount." Fine Edit to &#8369;".$request->fine_amount;
      $history->full_name = Auth::user()->fname ." ". Auth::user()->lname;

      $history->save();
      $fine->fine_amount = $request->fine_amount;
      $fine->save();

      Notify::info('Fine Amount Updated Successfully!','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
      return redirect('fines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
