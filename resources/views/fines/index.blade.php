@extends('layouts.app')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-4 mr-auto ml-auto">
      <div class="row">
        <div class="col-lg-10">
          <div class="card card-pricing">
            <div class="card-header">
              <h6 class="card-category">Fines</h6>
            </div>
            <div class="card-body">
              <div class="card-icon icon-success">
                <i class="nc-icon nc-box"></i>
              </div>
              <h3 class="card-title">&#8369;{{ $fine->fine_amount }}</h3>
              <ul>
                <li>Fines for students who does not attend events</li>
                <li>This can be changed after the General Assembly</li>
              </ul>
            </div>
            <div class="card-footer">
              <a href="{{ route('fines.edit', $fine->fine_id) }}" class="btn btn-round btn-success">Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
