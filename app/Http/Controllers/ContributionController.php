<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;
use Notify;

class ContributionController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:web');
  }

  public function index()
  {
    $contributions = Contribution::paginate(10);

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
      'school_year' => 'required',
      'semester' => 'required',
    ]);

    $contribution = new Contribution;
    $contribution->cont_title = $request->cont_title;
    $contribution->cont_amount = $request->cont_amount;
    $contribution->school_year = $request->school_year;
    $contribution->semester = $request->semester;

    $contribution->save();

    Notify::info('Contribution Added Successfully!','Success!')->override(['delay' => '2000', 'animate_speed' => 'normal', 'width' => '340px', 'icon' => 'glyphicon glyphicon-ok']);
    return redirect()->route('cont.index');
  }

}
