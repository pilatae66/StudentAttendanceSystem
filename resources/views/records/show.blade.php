@extends('layouts.app')
@section('title')
  Show Student Record
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Student Records
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
       <li><a href="{{ url('student') }}">Student</a></li>
       <li class="active"><a href="">Records</a></li>
     </ol>
   </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">Student Records</h3>
          </div>
          <div class="box-body table-responsive"><br>
            <table class="table table-hover">
              <tr class="bg-primary">
                <td><label>Event Name</label></td>
                <td><label>Signature Type</label></td>
                <td><label>Timestamp</label></td>
                <td><label>Actions</label></td>
              </tr>
              @forelse ($records as $record)
                <tr>
                  <td>{{ $record->event->event_name }}</td>
                  <td>{{ $record->sign_type }}</td>
                  <td>{{ $record->updated_at->format('l, F j, Y h:i A') }}</td>
                  <td>
                    {{-- {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@edit', $record->record_id]]) }}
                    {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Record')) }}
                    {{ Form::close() }} --}}
                    {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['RecordController@destroy', $record->record_id]]) }}
                    {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Record')) }}
                    {{ Form::close() }}
                  </td>
                </tr>
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
