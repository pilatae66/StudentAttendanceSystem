@extends('layouts.app')
@section('title')
  Edit Student
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Update Student
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="{{ url('student') }}">Student</a></li>
       <li class="active"><a href="">Update</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header"> Update Student </div>
          <div class="box-body"><br>
            {{ Form::open(array('action'=>['StudentController@update', $student->stud_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('stud_id') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-table" aria-hidden="true"></i></span>
                {{Form::text('stud_id', $student->stud_id, ['class'=>'form-control', 'placeholder' => 'ID Number', 'id' => 'id'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('stud_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('stud_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-user-o" aria-hidden="true"></i></span>
                {{Form::text('fname', $student->fname, ['class'=>'form-control', 'placeholder' => 'First Name'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('fname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('fname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-user-o" aria-hidden="true"></i></span>
                {{Form::text('lname', $student->lname, ['class'=>'form-control', 'placeholder' => 'Last Name'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('lname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('lname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('course') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                {{Form::select('course', ['BSIT' => 'BSIT', 'BSCS' => 'BSCS'], $student->stud_course, ['class'=>'form-control', 'placeholder' => 'Select Course...'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('course'))
                  <span class="help-block">
                    <strong>{{ $errors->first('course') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('yearlvl') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                {{Form::select('yearlvl', ['1st' => '1st Year', '2nd' => '2nd Year', '3rd' => '3rd Year', '4th' => '4th Year', ], $student->stud_year, ['class'=>'form-control', 'placeholder' => 'Select Year Level...'])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('yearlvl'))
                  <span class="help-block">
                    <strong>{{ $errors->first('yearlvl') }}</strong>
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

  @section('script')
    <script>
      $(document).ready(function(){
        $('input[name="stud_id"]').mask("00-0000");
        $('#idNumber').val($('input[name="idNumber"]').cleanVal());
      });
    </script>
  @endsection
@endsection
