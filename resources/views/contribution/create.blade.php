@extends('layouts.app')
@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-8 mr-auto ml-auto">
        <div class="card card-default">
          <div class="card-header"><h5 class="card-title">Add Contribution</h5></div>
          <div class="card-body">
            {{ Form::open(array('route'=>'cont.store', 'method'=>'post', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 mr-auto ml-auto">
            <div class="input-group{{ $errors->has('cont_title') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    </div>
                  </div>
                {{Form::text('cont_title', '', ['class'=>'form-control', 'placeholder' => 'Contribution Title','id' => 'id'])}}
                <label for="cont_title" class="error">{{ $errors->first('cont_title') }}</label>
              </div>
            </div>

            <div class="col-md-6 mr-auto ml-auto">
            <div class="input-group{{ $errors->has('cont_amount') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <div>&#8369;</div>
                    </div>
                  </div>
                {{Form::text('cont_amount', '', ['class'=>'form-control', 'placeholder' => 'Contribution Amount'])}}
                <label for="cont_amount" class="error">{{ $errors->first('cont_amount') }}</label>
              </div>
            </div>

            <div class=" col-md-6 mr-auto ml-auto">
            <div class="input-group">
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
