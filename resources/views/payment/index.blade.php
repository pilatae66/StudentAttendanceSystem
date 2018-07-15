@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Payment History</h5>
        </div>
        <div class="card-body">
          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Amount</th>
                <th>Time</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Student Name</th>
                <th>Amount</th>
                <th>Time</th>
              </tr>
            </tfoot>
            <tbody>
              @forelse($payments as $payment)
              <tr>
                <td>{{$payment->student->fullName}}</td>
                <td>{{$payment->pay_amount}}</td>
                <td>{{$payment->created_at->diffForHumans()}}</td>
                {{-- <td>
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@show', $student->stud_id]]) }}
                  {{Form::button('<i class="glyphicon glyphicon-eye-open"></i>', array('type' => 'submit', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => 'Show Student Records'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@edit',   $student->stud_id]]) }}
                  {{Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['StudentController@destroy',   $student->stud_id]]) }}
                  {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}}
                  {{ Form::close() }}
                </td> --}}
              </tr>
              @empty
              <tr><td colspan="3"><center><p>No data available</p></center></td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
