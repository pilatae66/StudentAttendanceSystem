@extends('layouts.app')
@section('title')
  Add Event
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Add Event
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="{{ url('event') }}">Event</a></li>
       <li class="active"><a href="">Add Event</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header">
              <h3 class="box-title">Add Event</h3>
           </div>
          <div class="box-body"><br>
            {{ Form::open(array('url'=>'event', 'method'=>'post', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('eventname') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-star-o" aria-hidden="true"></i></span>
                {{Form::text('eventname', '', ['class'=>'form-control', 'placeholder' => 'Event Name'])}}
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
                {{Form::date('eventdate', '', ['class'=>'form-control'])}}
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
              <div class=" col-md-6 col-md-offset-3">
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
