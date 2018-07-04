<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  {!! Charts::styles() !!}
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @guest

  @else
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/allskin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Ionicons.min.css') }}">
  @endguest

</head>
<body class="hold-transition fixed skin-black-light sidebar-mini">
  <div id="app">
    @guest
      @include('layouts.navigation.guest-nav')
    @else
      @include('layouts.navigation.admin-nav')
    @endguest
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <br>
  <br>
  <br>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  @guest

  @else
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
  @endguest
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <script src="{{ asset('js/jquery.mask.js') }}"></script>

  @yield('script')
  <script>
  $(document).ready(function(event){
    $('input[name="id"]').mask("00-0000");
  });

  document.body.addEventListener("keydown", function (event) {
    if(event.keyCode === 109){
      window.location.href="http://modeling.dev/";
    }
  });
  </script>

  <script>
  $(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
  @if (Request::is('dashboard'))
    {!! Charts::scripts() !!}
    {!! $chart_student->script() !!}
    {!! $chart_records->script() !!}
  @endif
  @include('laravelPnotify::notify')
</body>
</html>
