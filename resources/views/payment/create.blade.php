@extends('layouts.app')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-md-6 mr-auto ml-auto">
			<div class="card">
				<div class="card-header"><h4 class="card-title">Payment for {{ $student->fullName }}</h4></div>
				<div class="card-body">
					{{ Form::open(array('route'=>'payment.store', 'method'=>'post', 'class'=>'form-horizontal')) }}
					<input type="hidden" name="stud_id" value="{{ $student->stud_id }}">
					<div class="col-md-8 mr-auto ml-auto">
						<div class="input-group{{ $errors->has('pay_type') ? ' has-danger' : '' }}">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-bookmark-o" aria-hidden="true"></i>
								</div>
							</div>
							<select class="form-control" name="pay_type" autofocus>
								<option selected hidden>Choose Payment Type</option>
								@foreach ($contributions as $item)
								<option value="{{ $item->cont_title }}">{{ $item->cont_title }}</option>
								@endforeach
								<option value="Uniform">Uniform</option>
								<option value="Fines">Fines</option>
							</select>
							<label for="pay_type" class="error">{{ $errors->first('pay_type') }}</label>
						</div>
					</div>
					
					<div class="col-md-8 mr-auto ml-auto">
						<div class="input-group{{ $errors->has('pay_amount') ? ' has-danger' : '' }}">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fa fa-money" aria-hidden="true"></i>
								</div>
							</div>
							{{Form::text('pay_amount', '', ['class'=>'form-control', 'placeholder' => 'Contribution Title','id' => 'id'])}}
							<label for="pay_amount" class="error">{{ $errors->first('pay_amount') }}</label>
						</div>
					</div>
					<div class=" col-md-8 mr-auto ml-auto">
					<button class="btn btn-success" type="submit">Submit</button>
					</div>
					
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								@foreach ($contributions as $item)
									<th>{{ $item->cont_title }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								@foreach ($pay as $item)
									<td>{{ $item }}</td>
								@endforeach
							</tr>
						</tbody>
						<tfoot>
							<tr>
								@foreach ($contributions as $item)
									<th>{{ $item->cont_title }}</th>
								@endforeach
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection