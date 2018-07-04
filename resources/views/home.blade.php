@extends('layouts.app')
@section('title')
  Dashboard
@endsection
@section('content')
  <section class="content-header">
     <h1>
       Dashboard
       <small></small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
     </ol>
   </section>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Student</span>
          <span class="info-box-number">{{ $student }}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Events</span>
          <span class="info-box-number">{{ $event }}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Active<br>Students</span>
          <span class="info-box-number">{{ $active }}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-green">&#8369;</span>
        <div class="info-box-content">
          <span class="info-box-text">Total Fines</span>
          <span class="info-box-number">&#8369;{{ $fines }}</span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div>
  </div>
  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-3">
              {!! $chart_student->html() !!}
            </div>
            <div class="col-md-8">
              {!! $chart_records->html() !!}
            </div>
        </div><!-- /.box-body -->
        <br>
        <br>
    </section>
@endsection
