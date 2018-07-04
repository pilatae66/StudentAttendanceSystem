@extends('layouts.app')
@section('title')
  Login
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Student Login</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('student.auth.login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('stud_id') ? ' has-error' : '' }}">

                <div class="col-md-6 col-md-offset-3 input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                  <input placeholder="ID Number" id="stud_id" type="text" class="form-control" name="stud_id" value="{{ old('stud_id') }}" required autofocus>
                </div>
                <div class="col-md-6 col-md-offset-3">
                  @if ($errors->has('stud_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('stud_id') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-6 col-md-offset-3 input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                </div>
                <div class="col-md-6 col-md-offset-3">
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>

                  <a class="btn btn-link" href="{{ route('student.auth.password.request') }}">
                    Forgot Your Password?
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
