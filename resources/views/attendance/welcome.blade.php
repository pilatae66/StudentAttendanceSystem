<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 12vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .top-left {
    position: absolute;
    left: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
    margin-left: 100px;
    margin-right: 100px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }
  </style>
</head>
<body>
  {{ csrf_field() }}
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
      @auth
        <div class="top-left links">
          <a href="{{ url('/dashboard') }}">Admin</a>
        </div>
      @else
        <div class="top-right links">
          <a href="{{ route('login') }}">Login</a>
        </div>
      @endauth
    @endif
  </div>
  <div class="container">
    <div class="row text-center">
      <iframe src="http://free.timeanddate.com/clock/i5z9h9rd/n145/tlph/fn12/fs30/fc555/bacccc/pa20/tt0/tw1/td2/th2/ts1/ta1/tb4" frameborder="0" width="440" height="102"></iframe>
    </div><br>
    <div class="row">
      <div class=" col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center"><h4>CCS Student Attendance System</h4></div>
          <div class="panel-body">
            {{ Form::open(array('url'=>'records', 'method'=>'post', 'class'=>'form-horizontal')) }}

            <div class="form-group{{ $errors->any() ? ' has-error' : '' }}">
              <div class="col-md-6 col-md-offset-3  input-group">
                <span class="input-group-addon" style="background-color:#5cb85c;"><i style="color:white;" class="fa fa-table" aria-hidden="true"></i></span>
                {{Form::text('id', '', ['class'=>'form-control', 'placeholder' => 'ID Number', 'id' => 'id', 'autofocus' => 'autofocus' ])}}
              </div>
              <div class="col-md-6 col-md-offset-3">
                @if ($errors->has('id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            @if(!is_null($event))
              {{Form::hidden('event_id', $event->event_id)}}
              {{Form::hidden('sign_type', $event->sign_type)}}
            @endif

            <div class="form-group">
              <div class="text-center">
                {{Form::button('Sign In/Out', ['class'=>'btn btn-success', 'name' => 'submitButton', 'value' => 'sign', 'type' => 'submit', 'id' => 'sign' ])}}
                {{Form::button('Check Account', ['class'=>'btn btn-primary', 'name' => 'submitButton', 'value' => 'check', 'type' => 'submit', 'id' => 'check' ])}}
              </div>
            </div>

            {{ Form::close() }}
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
          <div class="panel-body">
            @if(!is_null($event))
              <h3 class="text-center">Event: {{ $event->event_name }}</h3>
            @else
              <h3 class="text-center">Event: None</h3>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>

<script>
$(document).ready(function(){
  $('input[name="id"]').mask("00-0000");
  $('#idNumber').val($('input[name="idNumber"]').cleanVal());

});
$("#id").keyup(function (event) {
  if(event.keyCode === 107){
    $("#check").click();
  }
});
</script>
<script>
$(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@if (Request::is('home'))
  {!! Charts::scripts() !!}
  {!! $chart->script() !!}
@endif
</body>
</html>
