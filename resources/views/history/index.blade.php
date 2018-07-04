@extends('layouts.app')
@section('title')
  History
@endsection
@section('content')
  <section class="content-header">
     <h1>
       History
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a class="active" href="{{ url('history') }}">History</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">History</h3>
          </div><br>
          <div class="box-body table-responsive">
            <table class="table table-hover">
              <thead>
              <tr class="bg-primary">
                <td><label>Action</label></td>
                <td><label>Done By</label></td>
                <td><label>Time</label></td>
              </tr>
            </thead>
            <tbody>
              @forelse($historys as $history)
                <tr>
                  <td>{{$history->incident}}</td>
                  <td>{{$history->full_name}}</td>
                  <td>{{$history->created_at->diffForHumans()}}</td>
                  {{-- <td>
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@show', $student->stud_id]]) }}
                    {{Form::button('<i class="glyphicon glyphicon-eye-open"></i>', array('type' => 'submit', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => 'Show Student Records'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@edit',   $student->stud_id]]) }}
                    {{Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['StudentController@destroy',   $student->stud_id]]) }}
                    {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}}
                    {{ Form::close() }}
                  </td> --}}
                </tr>
              @empty
                <tr><td colspan="3"><center><p>No data available</p></center></td></tr>
              @endforelse
            </tbody>
            </table>
            <div class="box-footer no-padding">
                <div class="description-block">
                  <span class="description-text">
                    <div class="text-center">
                      {{ $historys->links() }}
                    </div>
                  </span>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
