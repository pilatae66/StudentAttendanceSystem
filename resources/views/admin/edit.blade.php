@extends('layouts.app')
@section('title')
  Edit Admin
@endsection
@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Edit Admin</h5>
          </div>
          <div class="card-body">
            {{ Form::open(array('action'=>['AdminController@update', $user->id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 offset-md-3">
                <div class=" input-group{{ $errors->has('id') ? ' has-danger' : '' }}">
                <span class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="nc-icon nc-badge"></i>
                  </div>
                </span>
                <input value="{{ $user->id }}" placeholder="ID Number" id="id" type="text" class="form-control" name="id" required>
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
                <input value="{{ $user->fname }}" placeholder="First Name" id="fname" type="text" class="form-control" name="fname" required>
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
                <input value="{{ $user->lname }}" placeholder="Last Name" id="lname" type="text" class="form-control" name="lname" required>
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
                <input value="{{ $user->email }}" placeholder="Email" id="email" type="text" class="form-control" name="email" required>
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
                  <option {{ $user->usertype == 'Teacher' ? 'selected' : '' }} value="Teacher">Teacher</option>
                  <option {{ $user->usertype == 'President' ? 'selected' : '' }} value="President">President</option>
                  <option {{ $user->usertype == 'Vice President' ? 'selected' : '' }} value="Vice President">Vice President</option>
                  <option {{ $user->usertype == 'Secretary' ? 'selected' : '' }} value="Secretary">Secretary</option>
                  <option {{ $user->usertype == 'Auditor' ? 'selected' : '' }} value="Auditor">Auditor</option>
                  <option {{ $user->usertype == 'Treasurer' ? 'selected' : '' }} value="Treasurer">Treasurer</option>
                  <option {{ $user->usertype == 'PIO' ? 'selected' : '' }} value="PIO">PIO</option>
                </select>
                <label for="cont_title" class="error">{{ $errors->first('usertype') }}</label>
              </div>
            </div>

            <div class="form-group">
              <div class=" col-md-6 offset-md-3">
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
