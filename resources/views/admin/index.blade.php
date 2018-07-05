@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Admin</h4>
        </div>
        <div class="card-body">
          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Usertype</th>
                <th>Email</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Usertype</th>
                <th>Email</th>
              </tr>
            </tfoot>
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
