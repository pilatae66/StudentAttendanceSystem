@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-8 mr-auto ml-auto">
      <div class="card">
        <div class="card-header"> 
          <h4 class="card-title">Add Schedule</h4>
        </div>
        <div class="card-body">
          {{ Form::open(array('url'=>'schedules', 'method'=>'post', 'class'=>'form-horizontal')) }}
          
          {{Form::hidden('id', $id)}}
          
          <div class="col-md-6 mr-auto ml-auto">
            <div class="input-group{{ $errors->all() ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::time('event_time', '', ['class'=>'form-control'])}}
              @if ($errors->has('event_time'))
              <label for="event_time" class="error">{{ $errors->first('event_time') }}</label>
              @endif
              
              @if ($errors->has('dup'))
              <label for="dup" class="error">{{ $errors->first('dup') }}</label>
              @endif
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
          <div class="input-group{{ $errors->all() ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-hourglass-o" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::number('duration', '', ['class'=>'form-control', 'placeholder' => 'Time Duration'])}}
              @if ($errors->has('duration'))
              <label for="duration" class="error">{{ $errors->first('duration') }}</label>
              @endif
              @if ($errors->has('dup'))
              <label for="dup" class="error">{{ $errors->first('dup') }}</label>
              @endif
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
              <div class="input-group{{ $errors->has('sign_type') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fa fa-paperclip" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::select('sign_type', ['In' => 'In', 'Out' => 'Out'], null, ['class'=>'form-control', 'placeholder' => 'Select Signature Type'])}}
              @if ($errors->has('sign_type'))
              <label for="sign_type" class="error">{{ $errors->first('sign_type') }}</label>
              @endif
              @if ($errors->has('dup'))
              <label for="dup" class="error">{{ $errors->first('dup') }}</label>
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
@endsection
