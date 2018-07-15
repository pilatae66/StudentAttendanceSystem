@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Student Records</h4>
          </div>
          <div class="card-body"><br>
            <table class="table table-hover">
              <thead>
                <tr class="bg-primary text-white">
                  <th>Event Name</th>
                  <th>Signature Type</th>
                  <th>Timestamp</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr class="bg-primary text-white">
                  <th>Event Name</th>
                  <th>Signature Type</th>
                  <th>Timestamp</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              @forelse ($records as $record)
              <tbody>
                <tr>
                  <td>{{ $record->event->event_name }}</td>
                  <td>{{ $record->sign_type }}</td>
                  <td>{{ $record->updated_at->format('l, F j, Y h:i A') }}</td>
                  <td>
                    {{-- {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@edit', $record->record_id]]) }}
                    {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Record')) }}
                    {{ Form::close() }} --}}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['RecordController@destroy', $record->record_id]]) }}
                    {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link', 'data-toggle' => 'tooltip', 'title' => 'Delete Record')) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              </tbody>
              @empty
                <tr><td colspan="4"><center><p>No data available</p></center></td></tr>
              @endforelse
            </table>
            <center>{{ $records->render() }}</center><br>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
