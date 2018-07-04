@extends('layouts.app')
@section('title')
Contribution
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Contribution
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a class="active" href="{{ url('contribution') }}"><i class="fa fa-dashboard"></i>Contribution</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Contribution</h3>
            <div class="box-tools pull-right">
            <a href="{{ route('cont.create') }}" class="btn btn-default" data-toggle="tooltip" title="Add Contribution"><span class="glyphicon glyphicon-plus"></span></a>
            <a href="" class="btn btn-default pull-right" data-toggle="tooltip" title="Print Master List"><span class="glyphicon glyphicon-print"></span></a>
            </div>
          </div><br>
          <div class="box-body">
            <table class="table table-hover table-responsive">
              <thead>
              <tr class="text-center bg-primary" >
                <td><label>Contribution Title</label></td>
                <td><label>Contribution Amount</label></td>
                <td><label>Semester</label></td>
                <td><label>School Year</label></td>
                <td><label>Actions</label></td>
              </tr>
            </thead>
            <tbody>
              @forelse($contributions as $contribution)
                <tr>
                  <td>{{$contribution->cont_title}}</td>
                  <td class="text-center">&#8369;{{$contribution->cont_amount}}</td>
                  <td class="text-center">{{$contribution->semester}} Semester</td>
                  <td class="text-center">SY {{$contribution->school_year}}-{{ date('Y')+1 }}</td>
                  <td class="text-center">
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@edit',   $contribution->cont_id]]) }}
                    {{Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['StudentController@destroy',   $contribution->cont_id]]) }}
                    {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}}
                    {{ Form::close() }}
                  </td>
                </tr>
              @empty
                <tr><td colspan="6"><center><p>No data available</p></center></td></tr>
              @endforelse
            </tbody>
            </table>
            <div class="box-footer no-padding">
                <div class="description-block">
                  <span class="description-text">
                    <div class="text-center">
                      {{ $contributions->links() }}
                    </div>
                  </span>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
