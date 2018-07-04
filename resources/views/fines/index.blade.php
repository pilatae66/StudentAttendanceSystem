@extends('layouts.app')
@section('title')
  Fine Amount
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Fines
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a class="active" href="{{ url('dashboard') }}">Fines</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Fines</h3>
          </div>
          <div class="box-body">
            <br>
            <ul class="list-group col-md-4 col-md-offset-4">
              <li class="list-group-item"><br>Fine Amount<span class="badge">&#8369;{{ $fines->fine_amount }}
              {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['FinesController@edit',   $fines->fine_id]]) }}
              {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary col-md-offset-1'))}}
              {{ Form::close() }}</span><br><br></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
