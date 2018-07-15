@extends('layouts.app')
@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><h5 class="card-title">Uniform Fines</h5>
              <a href="" class="btn btn-default btn-link pull-right"><span class="fa fa-print"></span></a>
          </div>
          <div class="card-body"><br>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              <tr>
                <th>Student Name</th>
                <th>Record Title</th>
                <th>Amount</th>
                <th>Paid At</th>
                <th>Actions</th>
              </tr>
            </thead>
              <tfoot>
              <tr>
                <th>Student Name</th>
                <th>Record Title</th>
                <th>Amount</th>
                <th>Paid At</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              @forelse($uniforms as $uniform)
                <tr>
                  <td>{{$uniform->student->fname}} {{$uniform->student->lname}}</td>
                  <td>{{$uniform->record_title}}</td>
                  <td>{{$uniform->record_amount}}</td>
                  <td>{{$uniform->created_at->format('F d, Y || h:i a')}}</td>
                  <td>
                  {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['RecordController@destroy', $uniform->record_id]]) }}
                  {{ Form::button('<i class="nc-icon nc-basket"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link'))}}
                  {{ Form::close() }}
                </td>
              </tr>
            @empty
              <tr><td colspan="5"><center><p>No data available</p></center></td></tr>
            @endforelse
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
