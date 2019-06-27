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

  public function edit(User $user)
  {
    return view('admin.edit', compact('user'));
  }

  public function update(User $user, Request $request)
  {
    $this->validate($request, [
      'id' => 'required',
      'fname' => 'required|string|max:255',
      'lname' => 'required|string|max:255',
      'email' => 'required|email',
      'usertype' => 'required|string',
    ]);

    $user->update($request->all());

    alert()->success('Admin Updated', 'Successfully')->toToast('top');

    return redirect()->route('admin.index');
  }

  public function destroy(User $user)
  {
    $user->delete();

    alert()->success('Admin Deleted', 'Successfully')->toToast('top');

    return redirect()->route('admin.index');
  }

}
