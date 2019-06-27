@extends('layouts.app')
@section('title')
  Edit Schedule
@endsection
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card card-success card-solid">
          <div class="card-header">
            <h3 class="card-title">Edit Schedule</h3>
          </div>
          <div class="card-body"><br>
            {{ Form::open(array('action'=>['ScheduleController@update', $schedule->id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 offset-md-3">
              <div class="input-group{{ $errors->all() ? ' has-error' : '' }}">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                  </div>
                </span>
                {{Form::time('event_time', $schedule->event_time, ['class'=>'form-control'])}}
              </div>
              <div class="col-md-6 offset-md-3">
                @if ($errors->has('event_time'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_time') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <div class=" input-group{{ $errors->all() ? ' has-error' : '' }}">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-hourglass-o" aria-hidden="true"></i>
                  </div>
                </span>
                {{Form::number('duration', $schedule->duration, ['class'=>'form-control', 'placeholder' => 'Time Duration'])}}
              </div>
              <div class="col-md-6 offset-md-3">
                @if ($errors->has('duration'))
                  <span class="help-block">
                    <strong>{{ $errors->first('duration') }}</strong>
                  </span>
                @elseif ($errors->has('dup'))
                  <span class="help-block">
                    <strong>{{ $errors->first('dup') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <div class=" input-group{{ $errors->has('sign_type') ? ' has-error' : '' }}">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                  </div>
                </span>
                {{Form::select('sign_type', ['In' => 'In', 'Out' => 'Out'],null, ['class'=>'form-control', 'placeholder' => 'Select Signature Type'])}}
              </div>
              <div class="col-md-6 offset-md-3">
                @if ($errors->has('sign_type'))
                  <span class="help-block">
                    <strong>{{ $errors->first('sign_type') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class=" col-md-6 offset-md-3">
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
