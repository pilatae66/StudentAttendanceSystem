@extends('layouts.app')
@section('title')
  Edit Event
@endsection
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card card-success card-solid">
          <div class="card-header"><h3> Edit Event </h3></div>
          <div class="card-body"><br>
            {{ Form::open(array('action'=>['EventController@update', $event->event_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="input-group{{ $errors->has('eventname') ? ' has-error' : '' }}">
              <div class="col-md-6 offset-md-3">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-star-o" aria-hidden="true"></i></span>
                  </div>
                {{Form::text('eventname', $event->event_name, ['class'=>'form-control', 'placeholder' => 'Event Name'])}}
              </div>
              <div class="col-md-6 offset-md-3">
                @if ($errors->has('eventname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('eventname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="input-group{{ $errors->has('eventdate') ? ' has-error' : '' }}">
              <div class="col-md-6 offset-md-3">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i></span>
                  </div>
                {{Form::date('eventdate', $event->event_date, ['class'=>'form-control'])}}
              </div>
              <div class="col-md-6 offset-md-3">
                @if ($errors->has('eventdate'))
                  <span class="help-block">
                    <strong>{{ $errors->first('eventdate') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class=" col-md-6 offset-md-4">
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
