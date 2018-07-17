@extends('layouts.app')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-8 mr-auto ml-auto">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Student</h4>
        </div>
        <div class="card-body"><br>
          {{ Form::open(array('url'=>'student', 'method'=>'post', 'class'=>'form-horizontal')) }}
          <div class="col-md-6 mr-auto ml-auto">
            <div class="input-group{{ $errors->has('stud_id') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="nc-icon nc-tag-content" aria-hidden="true"></i>
                </span>
              </div>
              {{Form::text('stud_id', '', ['class'=>'form-control', 'placeholder' => 'ID Number','id' => 'id', 'autofocus'=> 'autofocus'])}}
              @if ($errors->has('stud_id'))
              <label for="stud_id" class="error">{{ $errors->first('stud_id') }}</label>
              @endif
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
          <div class="input-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="nc-icon nc-single-02" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::text('fname', '', ['class'=>'form-control', 'placeholder' => 'First Name'])}}
              <label for="fname" class="error">{{ $errors->first('fname') }}</label>
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
          <div class="input-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="nc-icon nc-single-02" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::text('lname', '', ['class'=>'form-control', 'placeholder' => 'Last Name'])}}
              <label for="lname" class="error">{{ $errors->first('lname') }}</label>
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
          <div class="input-group{{ $errors->has('course') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="nc-icon nc-hat-3" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::select('course', ['BSIT' => 'BSIT', 'BSCS' => 'BSCS'], null, ['class'=>'form-control', 'placeholder' => 'Select Course...'])}}
              <label for="course" class="error">{{ $errors->first('course') }}</label>
            </div>
          </div>
          
          <div class="col-md-6 mr-auto ml-auto">
          <div class="input-group{{ $errors->has('yearlvl') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="nc-icon nc-hat-3" aria-hidden="true"></i>
                </div>
              </div>
              {{Form::select('yearlvl', ['1st' => '1st Year', '2nd' => '2nd Year', '3rd' => '3rd Year', '4th' => '4th Year', ], null, ['class'=>'form-control', 'placeholder' => 'Select Year Level...'])}}
            </div>
            <label for="yearlvl" class="error">{{ $errors->first('yearlvl') }}</label>
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
@section('script')
<script>
  $(document).ready(function(){
    $('input[name="stud_id"]').mask("00-0000");
    $('#idNumber').val($('input[name="idNumber"]').cleanVal());
  });
</script>
@endsection
@endsection
