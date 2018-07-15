<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;
use Notify;
use App\SchoolStatus;

class ContributionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:web');
  }

  public function index()
  {
    $status = SchoolStatus::first();
    $contributions = Contribution::where('school_year', $status->school_year)->where('semester', $status->semester)->get();

    return view('contribution.index', compact('contributions'));
  }

  public function create()
  {
    return view('contribution.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'cont_title' => 'required',
      'cont_amount' => 'required',
    ]);

    $status = SchoolStatus::first();

    $contribution = new Contribution;
    $contribution->cont_title = $request->cont_title;
    $contribution->cont_amount = $request->cont_amount;
    $contribution->school_year = $status->school_year;
    $contribution->semester = $status->semester;

    $contribution->save();

    alert()->success('Contribution Created', 'Successfully')->toToast('top'); 
    return redirect()->route('cont.index');
  }

  public function edit($id)
  {
    
  }

  public function destroy($id)
  {
    $cont = Contribution::where('cont_id', $id)->first();
    $cont->delete();

    alert()->success('Contribution Deleted', 'Successfully')->toToast('top'); 
    return redirect()->route('cont.index');
  }

}
