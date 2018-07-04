@extends('layouts.app')
@section('title')
  Edit Admin
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Update User Dashboard</div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading"> Update User </div>
          <div class="panel-body">
            {{ Form::open(array('action'=>['AdminController@update', $student->stud_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                <input placeholder="ID Number" id="id" type="text" class="form-control" name="id" required>

                @if ($errors->has('id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input placeholder="First Name" id="fname" type="text" class="form-control" name="fname" required>

                @if ($errors->has('fname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('fname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input placeholder="Last Name" id="lname" type="text" class="form-control" name="lname" required>

                @if ($errors->has('lname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('lname') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input placeholder="Email" id="email" type="text" class="form-control" name="email" required>

                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('usertype') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
                <select class="form-control" name="usertype">
                  <option value="" disabled selected>Select Usertype...</option>
                  <option value="Teacher">Teacher</option>
                  <option value="President">President</option>
                  <option value="Vice President">Vice President</option>
                  <option value="Secretary">Secretary</option>
                  <option value="Auditor">Auditor</option>
                  <option value="Treasurer">Treasurer</option>
                  <option value="PIO">PIO</option>
                </select>

                @if ($errors->has('usertype'))
                  <span class="help-block">
                    <strong>{{ $errors->first('usertype') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">

              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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

  @section('script')
    <script>
      $(document).ready(function(){
        $('input[name="stud_id"]').mask("00-0000");
        $('#idNumber').val($('input[name="idNumber"]').cleanVal());
      });
    </script>
  @endsection
@endsection
