@extends('layouts.app')
@section('title')
  Admin Profile
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Admin Dashboard</div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">Admin</div>
          <div class="panel-body table-responsive">
            <table class="table table-hover">
              <tr style="background-color: #388e3c; color: white;">
                <td><label>ID Number</label></td>
                <td><label>Name</label></td>
                <td><label>Usertype</label></td>
                <td><label>Email</label></td>
              </tr>
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->fname}} {{$user->lname}}</td>
                  <td>{{$user->usertype}}</td>
                  <td>{{$user->email}}</td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
