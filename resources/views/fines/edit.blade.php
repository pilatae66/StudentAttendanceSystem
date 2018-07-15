@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8 mr-auto ml-auto">
        <div class="card">
          <div class="card-header"> <h5 class="card-title">Edit Fine</h5></div>
          <div class="card-body"><br>
            {{ Form::open(array('action'=>['FinesController@update', $fine->fine_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 mr-auto ml-auto">
            <div class="input-group{{ $errors->has('fine_amount') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <div>&#8369;</div>
                    </div>
                  </div>
                {{Form::text('fine_amount', $fine->fine_amount, ['class'=>'form-control'])}}
               <label for="fine_amount" class="error">{{ $errors->first('fine_amount') }}</label>
              </div>
            </div>

            <div class="form-group">
              <div class=" col-md-6 col-md-offset-4">
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
