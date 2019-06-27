@extends('layouts.app')
@section('title')
  Register
@endsection
@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header"><h5 class="card-title">Register</h5></div>
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}

              
              <div class="col-md-6 offset-md-3">
                  <div class=" input-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="nc-icon nc-badge"></i>
                    </div>
                  </span>
                  <input value="{{ old('id') }}" placeholder="ID Number" id="id" type="text" class="form-control" name="id" required>
                  <label for="cont_title" class="error">{{ $errors->first('id') }}</label>
                </div>
              </div>
              <div class="col-md-6 offset-md-3">
                  <div class=" input-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                    </div>
                  </span>
                  <input value="{{ old('fname') }}" placeholder="First Name" id="fname" type="text" class="form-control" name="fname" required>
                  <label for="cont_title" class="error">{{ $errors->first('fname') }}</label>
                </div>
              </div>

              <div class="col-md-6 offset-md-3">
                  <div class=" input-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="nc-icon nc-single-02"></i>
                    </div>
                  </span>
                  <input value="{{ old('lname') }}" placeholder="Last Name" id="lname" type="text" class="form-control" name="lname" required>
                  <label for="cont_title" class="error">{{ $errors->first('lname') }}</label>
                </div>
              </div>
              <div class="col-md-6 offset-md-3">
                  <div class=" input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </div>
                  </span>
                  <input value="{{ old('email') }}" placeholder="Email" id="email" type="text" class="form-control" name="email" required>
                  <label for="cont_title" class="error">{{ $errors->first('email') }}</label>
                </div>
              </div>

              <div class="col-md-6 offset-md-3">
                  <div class=" input-group{{ $errors->has('usertype') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="nc-icon nc-circle-10"></i>
                    </div>
                  </span>
                  <select class="form-control" name="usertype">
                    <option value="" disabled selected>Select Usertype...</option>
                    <option {{ old('usertype') == 'Teacher' ? 'selected' : '' }} value="Teacher">Teacher</option>
                    <option {{ old('usertype') == 'President' ? 'selected' : '' }} value="President">President</option>
                    <option {{ old('usertype') == 'Vice President' ? 'selected' : '' }} value="Vice President">Vice President</option>
                    <option {{ old('usertype') == 'Secretary' ? 'selected' : '' }} value="Secretary">Secretary</option>
                    <option {{ old('usertype') == 'Auditor' ? 'selected' : '' }} value="Auditor">Auditor</option>
                    <option {{ old('usertype') == 'Treasurer' ? 'selected' : '' }} value="Treasurer">Treasurer</option>
                    <option {{ old('usertype') == 'PIO' ? 'selected' : '' }} value="PIO">PIO</option>
                  </select>
                  <label for="cont_title" class="error">{{ $errors->first('usertype') }}</label>
                </div>
              </div>

              <div class="col-md-6 offset-md-3">
                  <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="nc-icon nc-key-25"></i>
                    </div>
                  </span>
                  <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                  <label for="cont_title" class="error">{{ $errors->first('password') }}</label>
                </div>
              </div>

              
              <div class="col-md-6 offset-md-3">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="nc-icon nc-key-25"></i>
                    </div>
                  </span>
                  <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
              </div>
              <br/>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
