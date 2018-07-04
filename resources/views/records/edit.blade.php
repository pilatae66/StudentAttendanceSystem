@extends('layouts.app')
@section('title')
  Uniform Edit
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Uniform Edit
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="{{ url('uniform') }}">Uniform</a></li>
       <li class="active"><a href="">Uniform Edit</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header"> Uniform Edit </div>
          <div class="box-body"><br>
            {{ Form::open(array('action'=>['RecordController@update', $record->record_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('record_title') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-table" aria-hidden="true"></i></span>
                {{Form::text('record_title', $record->record_title, ['class'=>'form-control', 'placeholder' => 'Record Title', 'id' => 'id'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('record_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('record_title') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('record_amount') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                {{Form::select('record_amount', ['10' => '+10', '1' => '+1'], $record->record_amount, ['class'=>'form-control', 'placeholder' => 'Record Amount...'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('record_amount'))
                  <span class="help-block">
                    <strong>{{ $errors->first('record_amount') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class=" col-md-6 col-md-offset-5">
                {{Form::submit('Update', ['class'=>'btn btn-success'])}}
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
