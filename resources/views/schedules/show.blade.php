@extends('layouts.app')
@section('title')
  Schedules
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Schedule
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"><a href="">Schedule</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">Schedule</h3>
            <div class="box-tools pull-right">
              <a href="{{url('schedules/'.$schedules->event.'/create')}}" class="btn btn-default" data-toggle="tooltip" title="Add Schedule"><i class="fa fa-plus" aria-hidden="true"></i></a></div>

            </div>
          <div class="box-body table-responsive"><br>
            <table class="table table-hover">
              <tr class="bg-primary">
                <td><label>Schedule ID</label></td>
                <td><label>Time</label></td>
                <td><label>Time Duration</label></td>
                <td><label>Signature Type</label></td>
                <td><label>Actions</label></td>
              </tr>
              @forelse ($schedules as $schedule)
                <tr>
                  <td>{{$schedule->id}}</td>
                  <td>{{Carbon\Carbon::parse($schedule->event_time)->format('h:i A')}}</td>
                  <td>{{$schedule->duration}} minutes</td>
                  <td>{{$schedule->sign_type}}</td>
                  <td>
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['ScheduleController@edit', $schedule->id]]) }}
                    {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Schedule'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['ScheduleController@destroy', $schedule->id]]) }}
                    {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Schedule'))}}
                    {{ Form::close() }}
                  </td>
                </tr>
              @empty
                <tr><td colspan="4"><center><p>No data available</p></center></td></tr>
              @endforelse
            </table>
            <center>{{ $schedules->links() }}</center>
          </div><br>
        </div>
      </div>
    </div>
  </section>
  @endsection
