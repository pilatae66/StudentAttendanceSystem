@extends('layouts.app') 
@section('content')
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Student List</h4>
				</div>
				<div class="card-body">
					<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center">
									ID Number
								</th>
								<th class="text-center">
									Name
								</th>
								<th class="text-center">
									Course
								</th>
								<th class="text-center">
									Year Level
								</th>
								<th class="text-center">
									Status
								</th>
								<th class="text-center">
									Actions
								</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th class="text-center">
									ID Number
								</th>
								<th class="text-center">
									Name
								</th>
								<th class="text-center">
									Course
								</th>
								<th class="text-center">
									Year Level
								</th>
								<th class="text-center">
									Status
								</th>
								<th class="text-center">
									Actions
								</th>
							</tr>
						</tfoot>
						<tbody>
							@forelse($students as $student)
							<tr>
								<td class="text-center">{{$student->stud_id}}</td>
								<td>{{$student->lname}}, {{$student->fname}}</td>
								<td>{{$student->stud_course}}</td>
								<td class="text-center">{{$student->stud_year}} Year</td>
								<td>{{ $student->isActive == 0 ? 'Inactive' : 'Active' }}</td>
								<td class="text-center">
									<a href="{{ route('student.activate', ['id' => $student->stud_id]) }}" class="btn btn-default btn-link btn-icon btn-sm like"
									 data-toggle="tooltip" title="Activate Student">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                  </a> {{ Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@edit',
									$student->stud_id]]) }} {{Form::button('
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-primary
									btn-link btn-icon btn-sm like', 'data-toggle' => 'tooltip', 'title' => 'Edit Student'))}} {{ Form::close() }} {{
									Form::open(['method' => 'GET', 'style'=>'display:inline-block', 'action' => ['StudentController@report', $student->stud_id]])
									}} {{Form::button('
									<i class="fa fa-table" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-success btn-link
									btn-icon btn-sm like', 'data-toggle' => 'tooltip', 'title' => 'Show Student Report'))}} {{ Form::close() }} {{ Form::open(['method'
									=> 'DELETE', 'style'=>'display:inline-block', 'action' => ['StudentController@destroy', $student->stud_id]]) }}
									{{Form::button('
									<i class="fa fa-trash" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-link btn-icon
									btn-sm like', 'data-toggle' => 'tooltip', 'title' => 'Delete Student'))}} {{ Form::close() }}
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="7">
									<center>
										<p>No data available</p>
									</center>
								</td>
							</tr>
							@endforelse
							</trbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection