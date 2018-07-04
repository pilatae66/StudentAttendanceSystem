@extends('layouts.app')
@section('title')
  Edit Event
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Edit Event
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="{{ url('event') }}">Event</a></li>
       <li class="active"><a href="">Edit Event</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header"> Edit Event </div>
          <div class="box-body"><br>
            {{ Form::open(array('action'=>['EventController@update', $event->event_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('eventname') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-star-o" aria-hidden="true"></i></span>
                {{Form::text('eventname', $event->event_name, ['class'=>'form-control', 'placeholder' => 'Event Name'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('eventname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('eventname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('eventdate') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-calendar" aria-hidden="true"></i></span>
                {{Form::date('eventdate', $event->event_date, ['class'=>'form-control'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('eventdate'))
                  <span class="help-block">
                    <strong>{{ $errors->first('eventdate') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class=" col-md-6 col-md-offset-4">
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
