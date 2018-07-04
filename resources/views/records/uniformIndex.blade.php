@extends('layouts.app')
@section('title')
  Uniform Fines
@endsection
@section('content')
  <section class="content-header">
    <h1>
      Student Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
      <li><a class="active" href="{{ url('uniform') }}">Uniform</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header"><h3 class="box-title">Uniform Fines</h3>
            <div class="box-tools">
              <a href="" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span></a>
            </div>
          </div>
          <div class="box-body"><br>
            <table class="table table-responsive table-hover">
              <thead class="bg-primary">
              <tr>
                <td><label>Student Name</label></td>
                <td><label>Record Title</label></td>
                <td><label>Amount</label></td>
                <td><label>Time</label></td>
                <td><label>Actions</label></td>
              </tr>
            </thead>
            <tbody>
              @forelse($uniforms as $uniform)
                <tr>
                  <td>{{$uniform->student->fname}} {{$uniform->student->lname}}</td>
                  <td>{{$uniform->record_title}}</td>
                  <td>{{$uniform->record_amount}}</td>
                  <td>{{$uniform->created_at->format('F d, Y || h:i a')}}</td>
                  <td>
                  {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['RecordController@edit', $uniform->record_id]]) }}
                  {{ Form::button('<i class="glyphicon glyphicon-edit"></i>', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                  {{ Form::close() }}
                  {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['RecordController@destroy', $uniform->record_id]]) }}
                  {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                  {{ Form::close() }}
                </td>
              </tr>
            @empty
              <tr><td colspan="4"><center><p>No data available</p></center></td></tr>
            @endforelse
          </tbody>
          </table>
          <div class="text-center">
            {{$uniforms->links()}}
          </div><br>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
