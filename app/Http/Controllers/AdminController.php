<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $user = User::paginate(10);

    // return $user;
    return view('admin.index', ['user' => $user]);
  }

  public function show($id)
  {
    $user = User::find($id);

    // return $user;
    return view('admin.show', ['user' => $user]);
  }

}
