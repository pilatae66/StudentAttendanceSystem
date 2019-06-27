@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8 mr-auto ml-auto">
        <div class="card">
          <div class="card-header"> <h5 class="card-title">Edit Contribution</h5></div>
          <div class="card-body"><br>
            {{ Form::open(array('action'=>['ContributionController@update', $contribution->cont_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="col-md-6 mr-auto ml-auto">
              <div class="input-group{{ $errors->has('cont_title') ? ' has-danger' : '' }}">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <div>&#8369;</div>
                      </div>
                    </div>
                  {{Form::text('cont_title', $contribution->cont_title, ['class'=>'form-control'])}}
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
                  {{Form::text('cont_amount', $contribution->cont_amount, ['class'=>'form-control'])}}
                <label for="cont_amount" class="error">{{ $errors->first('cont_amount') }}</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class=" col-md-6 offset-md-3">
                {{Form::submit('Submit', ['class' => 'btn btn-success', 'data-toggle' => 'tooltip', 'title' => 'Edit Fines'])}}
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
