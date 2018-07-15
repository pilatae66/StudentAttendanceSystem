@extends('layouts.app')
@section('content')
<div class="content">
  <div class="box box-success box-solid">
    <div class="box-header with-border"> Add Student Uniform Fine</div>
    <div class="box-body">
      {{ Form::open(array('action' => ['StudentController@addUniformFine', $student], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}
      <div class="form-group{{ $errors->has('uni_fine') ? ' has-error' : '' }}">
        <div class="col-md-6 col-md-offset-3 input-group">
          <span class="input-group-addon" style="background-color:#5cb85c;"><div style="color:white;">&#8369;</div></span>
          {{Form::select('uni_fine', ['10' => '+10', '1' => '+1'], null, ['class'=>'form-control', 'placeholder' => 'Select Amount'])}}
        </div>
        <div class="col-md-6 col-md-offset-3">
          @if ($errors->has('uni_fine'))
          <span class="help-block">
            <strong>{{ $errors->first('uni_fine') }}</strong>
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
@endsection
