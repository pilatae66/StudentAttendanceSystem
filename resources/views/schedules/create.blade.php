@extends('layouts.app')
@section('title')
  Create Schedule
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Create Schedule
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="">Schedule</a></li>
       <li class="active"><a href="">Create</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header"> Add Schedule </div>
          <div class="box-body"><br>
            {{ Form::open(array('url'=>'schedules', 'method'=>'post', 'class'=>'form-horizontal')) }}

            {{Form::hidden('id', $id)}}

            <div class="form-group{{ $errors->all() ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-clock-o" aria-hidden="true"></i></span>
                {{Form::time('event_time', '', ['class'=>'form-control'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('event_time'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_time') }}</strong>
                  </span>
                @elseif ($errors->has('dup'))
                  <span class="help-block">
                    <strong>{{ $errors->first('dup') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->all() ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-hourglass-o" aria-hidden="true"></i></span>
                {{Form::number('duration', '', ['class'=>'form-control', 'placeholder' => 'Time Duration'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
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

            <div class="form-group{{ $errors->has('sign_type') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-paperclip" aria-hidden="true"></i></span>
                {{Form::select('sign_type', ['In' => 'In', 'Out' => 'Out'], null, ['class'=>'form-control', 'placeholder' => 'Select Signature Type'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('event_time'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_time') }}</strong>
                  </span>
                @elseif ($errors->has('dup'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_time') }}</strong>
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
@endsection
