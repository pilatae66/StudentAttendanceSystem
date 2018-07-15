@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header with-border">
            <h3 class="card-title">Contribution</h3>
            <div class="card-tools pull-right">
            <a href="{{ route('cont.create') }}" class="btn btn-default btn-link" data-toggle="tooltip" title="Add Contribution"><span class="nc-icon nc-simple-add"></span></a>
            <a href="" class="btn btn-default btn-link pull-right" data-toggle="tooltip" title="Print Master List"><span class="fa fa-print"></span></a>
            </div>
          </div><br>
          <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              <tr>
                <th>Contribution Title</th>
                <th>Contribution Amount</th>
                <th>Semester</th>
                <th>School Year</th>
                <th>Actions</th>
              </tr>
            </thead>
              <tfoot>
              <tr>
                <th>Contribution Title</th>
                <th>Contribution Amount</th>
                <th>Semester</th>
                <th>School Year</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              @forelse($contributions as $contribution)
                <tr>
                  <td>{{$contribution->cont_title}}</td>
                  <td class="text-center">&#8369;{{$contribution->cont_amount}}</td>
                  <td class="text-center">{{$contribution->semester}} Semester</td>
                  <td class="text-center">SY {{$contribution->school_year}}</td>
                  <td class="text-center">
                    {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['ContributionController@edit',   $contribution->cont_id]]) }}
                    {{Form::button('<i class="fa fa-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary btn-link', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}}
                    {{ Form::close() }}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['ContributionController@destroy',   $contribution->cont_id]]) }}
                    {{Form::button('<i class="nc-icon nc-basket"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}}
                    {{ Form::close() }}
                  </td>
                </tr>
              @empty
                <tr><td colspan="6"><center><p>No data available</p></center></td></tr>
              @endforelse
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
