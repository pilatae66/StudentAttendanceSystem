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
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Usertype</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($user as $users)
              <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->fname}} {{$users->lname}}</td>
                <td>{{$users->usertype}}</td>
                <td>{{$users->email}}</td>
                <td>
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['AdminController@edit',
                    $users->id]]) }} 
                    {{Form::button('
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary
                    btn-link btn-icon btn-sm like', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}} {{ Form::close()
                    }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['AdminController@destroy',
                    $users->id]]) }} {{Form::button('
                    <i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link
                    btn-icon btn-sm like', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}} {{ Form::close() }}
                </td>
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
