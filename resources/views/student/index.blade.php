@extends('layouts.app')
@section('title')
  Student List
@endsection
@section('content')
  <section class="content-header">
    <h1>
      Student Dashboard
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
      <li><a class="active" href="{{ url('student') }}">Student</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="box-title">
              <a href="{{ url('student/create') }}" class="btn btn-default-sm btn-sm" data-toggle="tooltip" title="Add Student"><i class="fa fa-plus" aria-hidden="true"></i></a>
              <a href="" class="btn btn-default-sm btn-sm" data-toggle="tooltip" title="Print Master List"><i class="fa fa-print" aria-hidden="true"></i></a></div>
              <div class="box-tools pull-right">
                <form action="{{ route('student.search') }}" method="post">
                  {{ csrf_field() }}
                  <div class="input-group" style="width: 350px;">
                    <input class="form-control pull-right" type="text" name="searchData" placeholder="Search...">
                    <div class="input-group-btn">
                      <button class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div></form>
                  <!-- Buttons, labels, and many other things can be placed here! -->
                </div><!-- /.box-tools -->
              </div><br>
              <div class="box-body">
                <table class="table table-hover table-responsive">
                  <thead>
                  <tr class="bg-primary">
                    <th class="text-center"><label>ID Number</label></th>
                    <th class="text-center"><label>Name</label></th>
                    <th class="text-center"><label>Email</label></th>
                    <th class="text-center"><label>Course</label></th>
                    <th class="text-center"><label>Year Level</label></th>
                    <th class="text-center"><label>Total Fines</label></th>
                    <th class="text-center"><label>Actions</label></th>
                  </tr>
                </thead>
                  <tbody>
                  @forelse($students as $student)
                    <tr>
                      <td class="text-center">{{$student->stud_id}}</td>
                      <td>{{$student->lname}}, {{$student->fname}}</td>
                      <td>{{$student->email == "" ? 'No Email' : $student->email }}</td>
                      <td>{{$student->stud_course}}</td>
                      <td class="text-center">{{$student->stud_year}} Year</td>
                      <td class="text-center">&#8369;{{$student->stud_fines}}</td>
                      <td class="text-center">
                        <a href="{{ route('student.uniform', ['id' => $student->stud_id]) }}" class="btn btn-default" data-toggle="tooltip" title="Add Student Uniform Fines"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                        {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@edit',   $student->stud_id]]) }}
                        {{Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}}
                        {{ Form::close() }}
                        {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@report', $student->stud_id]]) }}
                        {{Form::button('<i class="fa fa-table" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-success', 'data-toggle' => 'tooltip', 'title' => 'Show Student Report'))}}
                        {{ Form::close() }}
                        {{ Form::open(['method' => 'DELETE', 'style'=>'display:inline-block', 'action' => ['StudentController@destroy',   $student->stud_id]]) }}
                        {{Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}}
                        {{ Form::close() }}
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="6"><center><p>No data available</p></center></td></tr>
                  @endforelse
                </trbody>
                </table>
                <div class="box-footer no-padding">
                  <div class="description-block">
                    <span class="description-text">
                      <div class="text-center">
                        {{ $students->links() }}
                      </div>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </section
      @endsection
