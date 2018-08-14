@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8 mr-auto ml-auto">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Add Event</h4>
           </div>
          <div class="card-body"><br>
            {{ Form::open(array('url'=>'event', 'method'=>'post', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 mr-auto ml-auto">
              <div class="input-group{{ $errors->has('eventname') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>
                </div>
                {{Form::text('eventname', '', ['class'=>'form-control', 'placeholder' => 'Event Name'])}}
                @if ($errors->has('eventname'))
                <label for="eventname" class="error">{{ $errors->first('eventname') }}</label>
                @endif
              </div>
            </div>

            <div class="col-md-6 mr-auto ml-auto">
                <div class="input-group{{ $errors->has('eventdate') ? ' has-danger' : '' }}">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                </span>
                {{Form::date('eventdate', '', ['class'=>'form-control'])}}
                @if ($errors->has('eventdate'))
                <label for="eventdate" class="error">{{ $errors->first('eventdate') }}</label>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class=" col-md-6 mr-auto ml-auto">
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
