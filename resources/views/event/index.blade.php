@extends('layouts.app')
@section('title')
  Events
@endsection
@section('content')
  <section class="content-header">
    <h1>
      Events Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active" href="{{ url('student') }}">Student</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Events</h3>
            <div class="box-tools pull-right">
              <a href="{{ url('event/create') }}" class="btn btn-default" data-toggle="tooltip" title="Add Event"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
          </div>
          <div class="box-body table-responsive"><br>
            <table class="table table-hover">
              <thead>
                <tr class="bg-primary">
                  <td><label>Event Name</label></td>
                  <td><label>Event Date</label></td>
                  <td><label>Actions</label></td>
                </tr>
              </thead>
              <tbody>
                @forelse($events as $event)
                  <tr>
                    <td>{{$event->event_name}}</td>
                    <td>{{Carbon\Carbon::parse($event->event_date)->format('l, F j, Y')}}</td>
                    <td>
                      {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['ScheduleController@show', $event->event_id]]) }}
                      {{Form::button('<i class="fa fa-eye" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => 'Show Event Schedules'))}}
                      {{ Form::close() }}
                      {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['EventController@edit',   $event->event_id]]) }}
                      {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Event'))}}
                      {{ Form::close() }}
                      {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['EventController@destroy',   $event->event_id]]) }}
                      {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Event'))}}
                      {{ Form::close() }}
                    </td>
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
                    {{ $events->links() }}
                  </div>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
