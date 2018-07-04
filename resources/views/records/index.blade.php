@extends('layouts.app')
@section('title')
  Records
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">History Dashboard</div>
        </div>
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading" style="height:57px;"><p class="pull-left" style="font-size:20px;">History</p>
            <a href="" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span></a>
          </div>
          <div class="panel-body table-responsive">
            <table class="table table-hover">
              <tr style="background-color: #388e3c; color: white;">
                <td><label>Record ID</label></td>
                <td><label>Student Name</label></td>
                <td><label>Event Name</label></td>
                <td><label>Signature Type</label></td>
                <td><label>Time</label></td>
                {{-- <td><label>Actions</label></td> --}}
              </tr>
              @forelse($records as $record)
                <tr>
                  <td>{{$record->record_id}}</td>
                  <td>{{$record->student->stud_fname}} {{$record->student->stud_lname}}</td>
                  <td>{{$record->event->event_name}}</td>
                  <td>{{$record->sign_type}}</td>
                  <td>{{$record->created_at->diffForHumans()}}</td>
                  {{-- <td>
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@edit', $record->record_id]]) }}
                  {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['RecordController@destroy', $record->record_id]]) }}
                  {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                  {{ Form::close() }}
                </td> --}}
              </tr>
            @empty
              <tr><td colspan="6"><center><p>No data available</p></center></td></tr>
            @endforelse
          </table>
          <div class="text-center">
            {{$records->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
