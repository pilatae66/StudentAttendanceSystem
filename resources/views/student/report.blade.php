@extends('layouts.app')
@section('title')
  Student Report
@endsection
@section('content')
  @guest
    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Student Report</div>
            <div class="panel-body table-responsive"><br>
              <table class="table table-hover">
                <thead>
                  <tr class="bg-primary">
                    <th>Event Name</th>
                    <th>Morning In</th>
                    <th>Morning Out</th>
                    <th>Afternoon In</th>
                    <th>Afternoon Out</th>
                    <th>Evening Out</th>
                    <th>Evening In</th>
                    <th>Fines</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $morning_in_class = " ";
                  $morning_out_class = " ";
                  $afternoon_in_class = " ";
                  $afternoon_out_class = " ";
                  $evening_in_class = " ";
                  $evening_out_class = " ";
                  $total = 0;
                  @endphp
                  @forelse ($reports as $report)
                    @php
                    if ($report["morning_in"] == null){
                      $morning_in_class = "text-danger";
                    }
                    else if ($report["morning_in"] == 'No Schedule'){
                      $morning_in_class = " ";
                    }
                    else{
                      $morning_in_class = "text-success";
                    }
                    if ($report["morning_out"] == null){
                      $morning_out_class = "text-danger";
                    }
                    else if ($report["morning_out"] == 'No Schedule'){
                      $morning_out_class = " ";
                    }
                    else{
                      $morning_out_class = "text-success";
                    }
                    if ($report["afternoon_in"] == null){
                      $afternoon_in_class = "text-danger";
                    }
                    else if ($report["afternoon_in"] == 'No Schedule'){
                      $afternoon_in_class = " ";
                    }
                    else{
                      $afternoon_in_class = "text-success";
                    }
                    if ($report["afternoon_out"] == null){
                      $afternoon_out_class = "text-danger";
                    }
                    else if ($report["afternoon_out"] == 'No Schedule'){
                      $afternoon_out_class = " ";
                    }
                    else{
                      $afternoon_out_class = "text-success";
                    }
                    if ($report["evening_in"] == null){
                      $evening_in_class = "text-danger";
                    }
                    else if ($report["evening_in"] == 'No Schedule'){
                      $evening_in_class = " ";
                    }
                    else{
                      $evening_in_class = "text-success";
                    }
                    if ($report["evening_out"] == null){
                      $evening_out_class = "text-danger";
                    }
                    else if ($report["evening_out"] == 'No Schedule'){
                      $evening_out_class = " ";
                    }
                    else{
                      $evening_out_class = "text-success";
                    }

                    $total += $report['fine'];
                    @endphp
                    <tr>
                      <td>{{ $report["event_name"]  == null ? "No events yet" : $report["event_name"] }}</td>
                      <td style="font-weight:{{ $report["morning_in"] == null || $report["morning_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$morning_in_class}}">{{ $report["morning_in"] == null ? "Failure to Attend" : $report["morning_in"] }}</div></td>
                      <td style="font-weight:{{ $report["morning_out"] == null || $report["morning_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$morning_out_class}}">{{ $report["morning_out"] == null ? "Failure to Attend" : $report["morning_out"] }}</div></td>
                      <td style="font-weight:{{ $report["afternoon_in"] == null || $report["afternoon_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$afternoon_in_class}}">{{ $report["afternoon_in"] == null ? "Failure to Attend" : $report["afternoon_in"] }}</div></td>
                      <td style="font-weight:{{ $report["afternoon_out"] == null || $report["afternoon_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$afternoon_out_class}}">{{ $report["afternoon_out"] == null ? "Failure to Attend" : $report["afternoon_out"] }}</div></td>
                      <td style="font-weight:{{ $report["evening_in"] == null || $report["evening_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$evening_in_class}}">{{ $report["evening_in"] == null ? "Failure to Attend" : $report["evening_in"] }}</div></td>
                      <td style="font-weight:{{ $report["evening_out"] == null || $report["evening_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$evening_out_class}}">{{ $report["evening_out"] == null ? "Failure to Attend" : $report["evening_out"] }}</div></td>
                      <td>&#8369;{{ $report["fine"] == null ? 0 : $report["fine"] }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7"><center>No data available</center></td>
                    </tr>

                  @endforelse
                </tbody>
              </table><br>
            </div>

            <div class="text-center">
                <h3>&#8369;{{ $total }}</h3>
                TOTAL FINE
            </div><br><br>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Student Uniform Fines
            </div>
            <div class="panel-body">
              <table class="table table-hover table-responsive">
                <thead>
                  <tr class="bg-primary">
                    <th class="text-center">Date seen without uniform</th>
                    <th class="text-center">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($uni_fines as $key => $uni_fine)
                    <tr>
                      <td class="text-center">{{ $uni_fine->created_at->format('F d, Y') }}</td>
                      <td class="text-center">&#8369;{{ $uni_fine->record_amount }}</td>
                    </tr>
                  @empty
                    <tr><td colspan="2"><center><p>No data available</p></center></td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="text-center">
                <h3>&#8369;{{ $uni_fines->sum('record_amount') }}</h3>
                TOTAL FINE
            </div><br><br>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary text-center">
            <div class="panel-heading"></div>
            <div class="panel-body">
              <div class="description-block">
                <h3 class="description-header">&#8369;{{ $uni_fines->sum('record_amount') + $total }}</h3>
                <span class="description-text">GRAND TOTAL</span>
              </div><br>

            </div>
          </div>
        </div>
      </div>
      </section
  @else
  <section class="content-header">
    <h1>
      Student Reports
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="{{ url('student') }}">Student</a></li>
      <li class="active"><a href="">Reports</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">Student Report</h3>
            <div class="box-tools pull-right">
              {{ Form::open(['method' => 'GET', 'style' => 'display:inline;', 'action' => ['RecordController@show', $reports[0]['stud_id']]]) }}
              {{ Form::button('<i class="glyphicon glyphicon-eye-open"></i>', array('type' => 'submit', 'class' => 'btn btn-default', 'data-toggle' => 'tooltip', 'title' => 'Show Student Records'))}}
              {{ Form::close() }}
              <a href="" class="btn btn-default" data-toggle="tooltip" title="Print Student Report"><span class="glyphicon glyphicon-print"></span></a>

            </div>
          </div>
          <div class="box-body table-responsive"><br>
            <table class="table table-hover">
              <thead>
                <tr class="bg-primary">
                  <th>Event Name</th>
                  <th>Morning In</th>
                  <th>Morning Out</th>
                  <th>Afternoon In</th>
                  <th>Afternoon Out</th>
                  <th>Evening Out</th>
                  <th>Evening In</th>
                  <th>Fines</th>
                </tr>
              </thead>
              <tbody>
                @php
                $morning_in_class = " ";
                $morning_out_class = " ";
                $afternoon_in_class = " ";
                $afternoon_out_class = " ";
                $evening_in_class = " ";
                $evening_out_class = " ";
                $total = 0;
                @endphp
                @forelse ($reports as $report)
                  @php
                  if ($report["morning_in"] == null){
                    $morning_in_class = "text-danger";
                  }
                  else if ($report["morning_in"] == 'No Schedule'){
                    $morning_in_class = " ";
                  }
                  else{
                    $morning_in_class = "text-success";
                  }
                  if ($report["morning_out"] == null){
                    $morning_out_class = "text-danger";
                  }
                  else if ($report["morning_out"] == 'No Schedule'){
                    $morning_out_class = " ";
                  }
                  else{
                    $morning_out_class = "text-success";
                  }
                  if ($report["afternoon_in"] == null){
                    $afternoon_in_class = "text-danger";
                  }
                  else if ($report["afternoon_in"] == 'No Schedule'){
                    $afternoon_in_class = " ";
                  }
                  else{
                    $afternoon_in_class = "text-success";
                  }
                  if ($report["afternoon_out"] == null){
                    $afternoon_out_class = "text-danger";
                  }
                  else if ($report["afternoon_out"] == 'No Schedule'){
                    $afternoon_out_class = " ";
                  }
                  else{
                    $afternoon_out_class = "text-success";
                  }
                  if ($report["evening_in"] == null){
                    $evening_in_class = "text-danger";
                  }
                  else if ($report["evening_in"] == 'No Schedule'){
                    $evening_in_class = " ";
                  }
                  else{
                    $evening_in_class = "text-success";
                  }
                  if ($report["evening_out"] == null){
                    $evening_out_class = "text-danger";
                  }
                  else if ($report["evening_out"] == 'No Schedule'){
                    $evening_out_class = " ";
                  }
                  else{
                    $evening_out_class = "text-success";
                  }

                  $total += $report['fine'];
                  @endphp
                  <tr>
                    <td>{{ $report["event_name"]  == null ? "No events yet" : $report["event_name"] }}</td>
                    <td style="font-weight:{{ $report["morning_in"] == null || $report["morning_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$morning_in_class}}">{{ $report["morning_in"] == null ? "Failure to Attend" : $report["morning_in"] }}</div></td>
                    <td style="font-weight:{{ $report["morning_out"] == null || $report["morning_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$morning_out_class}}">{{ $report["morning_out"] == null ? "Failure to Attend" : $report["morning_out"] }}</div></td>
                    <td style="font-weight:{{ $report["afternoon_in"] == null || $report["afternoon_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$afternoon_in_class}}">{{ $report["afternoon_in"] == null ? "Failure to Attend" : $report["afternoon_in"] }}</div></td>
                    <td style="font-weight:{{ $report["afternoon_out"] == null || $report["afternoon_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$afternoon_out_class}}">{{ $report["afternoon_out"] == null ? "Failure to Attend" : $report["afternoon_out"] }}</div></td>
                    <td style="font-weight:{{ $report["evening_in"] == null || $report["evening_in"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$evening_in_class}}">{{ $report["evening_in"] == null ? "Failure to Attend" : $report["evening_in"] }}</div></td>
                    <td style="font-weight:{{ $report["evening_out"] == null || $report["evening_out"] != "No Schedule" ? 'bold' : 'normal' }}"><div class="{{$evening_out_class}}">{{ $report["evening_out"] == null ? "Failure to Attend" : $report["evening_out"] }}</div></td>
                    <td>&#8369;{{ $report["fine"] == null ? 0 : $report["fine"] }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7"><center>No data available</center></td>
                  </tr>

                @endforelse
              </tbody>
            </table><br>
          </div>

          <div class="box-footer no-padding">
            <div class="description-block">
              <h3 class="description-header">&#8369;{{ $total }}</h3>
              <span class="description-text">TOTAL FINE</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title">Student Uniform Fines</h3>
          </div>
          <div class="box-body">
            <table class="table table-hover table-responsive">
              <thead>
                <tr class="bg-primary">
                  <th class="text-center">Date seen without uniform</th>
                  <th class="text-center">Amount</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($uni_fines as $key => $uni_fine)
                  <tr>
                    <td class="text-center">{{ $uni_fine->created_at->format('F d, Y') }}</td>
                    <td class="text-center">&#8369;{{ $uni_fine->record_amount }}</td>
                  </tr>
                @empty
                  <tr><td colspan="2"><center><p>No data available</p></center></td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="box-footer no-padding">
            <div class="description-block">
              <h3 class="description-header">&#8369;{{ $uni_fines->sum('record_amount') }}</h3>
              <span class="description-text">TOTAL FINE</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-footer no-paddings">
            <div class="description-block">
              <h3 class="description-header">&#8369;{{ $uni_fines->sum('record_amount') + $total }}</h3>
              <span class="description-text">GRAND TOTAL</span>
            </div>

          </div>
        </div>
      </div>
    </div>
    </section
  @endguest
  @endsection
