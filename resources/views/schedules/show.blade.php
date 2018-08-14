@extends('layouts.app') 
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Schedule</h3>
            <a href="{{url('schedules/'.$schedules->event.'/create')}}" class="btn btn-default btn-link" data-toggle="tooltip" title="Add Schedule"><i class="nc-icon nc-simple-add" aria-hidden="true"></i></a></div>
          <div class="card-body"><br>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Schedule ID</th>
                  <th>Time</th>
                  <th>Time Duration</th>
                  <th>Signature Type</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Schedule ID</th>
                  <th>Time</th>
                  <th>Time Duration</th>
                  <th>Signature Type</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse ($schedules as $schedule)
                <tr>
                  <td>{{$schedule->id}}</td>
                  <td>{{Carbon\Carbon::parse($schedule->event_time)->format('h:i A')}}</td>
                  <td>{{$schedule->duration}} minutes</td>
                  <td>{{$schedule->sign_type}}</td>
                  <td>
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['ScheduleController@edit', $schedule->id]]) }}
                    {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary btn-link', 'data-toggle' => 'tooltip', 'title' => 'Edit Schedule'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['ScheduleController@destroy', $schedule->id]]) }}
                    {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link', 'data-toggle' => 'tooltip', 'title' => 'Delete Schedule'))}}
                    {{ Form::close() }}
                  </td>
                </tr>
                @empty
                <tr><td colspan="5"><center><p>No data available</p></center></td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  