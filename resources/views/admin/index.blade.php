@extends('layouts.app')
@section('title')
  Admins
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Admin Dashboard
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li class="active"><a href="{{ url('admin') }}">Admin</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Admin</h3>
          </div>
          <div class="box-body table-responsive"><br>
            <table class="table table-hover">
              <thead>
              <tr class="bg-primary">
                <td><label>ID Number</label></td>
                <td><label>Name</label></td>
                <td><label>Usertype</label></td>
                <td><label>Email</label></td>
              </tr>
            </thead>
            <tbody>
              @foreach($user as $users)
                <tr>
                  <td>{{$users->id}}</td>
                  <td>{{$users->fname}} {{$users->lname}}</td>
                  <td>{{$users->usertype}}</td>
                  <td>{{$users->email}}</td>
                </tr>
              @endforeach
            </tbody>
            </table>
            <div class="text-center">
              {{$user->links()}}
            </div><br>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
