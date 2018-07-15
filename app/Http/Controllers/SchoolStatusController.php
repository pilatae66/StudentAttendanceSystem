<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolStatusController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
}
