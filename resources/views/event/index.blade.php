@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Event List</h4>
            <a href="{{ url('event/create') }}" class="btn btn-default btn-link" data-toggle="tooltip" title="Add Event"><i class="nc-icon nc-simple-add"></i></a>
        </div>
        <div class="card-body">
          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              @forelse($events as $event)
              <tr>
                <td>{{$event->event_name}}</td>
                <td>{{Carbon\Carbon::parse($event->event_date)->format('l, F j, Y')}}</td>
                <td>
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['ScheduleController@show', $event->event_id]]) }}
                  {{Form::button('<i class="fa fa-eye" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-default btn-link', 'data-toggle' => 'tooltip', 'title' => 'Show Event Schedules'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['EventController@edit',   $event->event_id]]) }}
                  {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary btn-link', 'data-toggle' => 'tooltip', 'title' => 'Edit Event'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['EventController@destroy',   $event->event_id]]) }}
                  {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link', 'data-toggle' => 'tooltip', 'title' => 'Delete Event'))}}
                  {{ Form::close() }}
                </td>
              </tr>
              @empty
              <tr><td colspan="3"><center><p>No data available</p></center></td></tr>
              @endforelse
            </tbody>
          </table>
          <div class="card-footer no-padding">
            <div class="description-block">
              <span class="description-text">
                <div class="text-center">
                  {{ $events->links() }}
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
