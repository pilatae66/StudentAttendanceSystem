@extends('layouts.app')
@section('title')
  Edit Fine Amount
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Edit Fine Amount
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="{{ url('fines') }}"></i> Fines</a></li>
       <li class="active"><a href="">Edit Fines</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success box-solid">
          <div class="box-header"> Edit Fine </div>
          <div class="box-body"><br>
            {{ Form::open(array('action'=>['FinesController@update', $fine->fine_id], 'method'=>'PATCH', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->has('fine_amount') ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3 input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><div style="color:white;">&#8369;</div></span>
                {{Form::text('fine_amount', $fine->fine_amount, ['class'=>'form-control'])}}
                @if ($errors->has('fine_amount'))
                  <span class="help-block">
                    <strong>{{ $errors->first('fine_amount') }}</strong>
                  </span>
                @endif
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
</section>
@endsection
