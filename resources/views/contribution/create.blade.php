@extends('layouts.app')
@section('title')
  Create Contribution
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Add Contribution Dashboard</div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading"> Add Contribution </div>
          <div class="panel-body">
            {{ Form::open(array('route'=>'cont.store', 'method'=>'post', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('cont_title') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-bookmark-o" aria-hidden="true"></i></span>
                {{Form::text('cont_title', '', ['class'=>'form-control', 'placeholder' => 'Contribution Title','id' => 'id'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('cont_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cont_title') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('cont_amount') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><div style="color:white;">&#8369;</div></span>
                {{Form::text('cont_amount', '', ['class'=>'form-control', 'placeholder' => 'Contribution Amount'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('cont_amount'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cont_amount') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-hourglass-o" aria-hidden="true"></i></span>
                {{Form::select('semester', ['1st' => '1st Semester', '2nd' => '2nd Semester'], '', ['class'=>'form-control', 'placeholder' => 'Semester'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('semester'))
                  <span class="help-block">
                    <strong>{{ $errors->first('semester') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('school_year') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-calendar" aria-hidden="true"></i></span>
                {{ Form::select('school_year', ['2018' => '2018','2019' => '2019','2020' => '2020','2021' => '2021','2022' => '2022'],'', ['class' => 'form-control', 'placeholder' => 'Select School Year']) }}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('school_year'))
                  <span class="help-block">
                    <strong>{{ $errors->first('school_year') }}</strong>
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
@endsection
