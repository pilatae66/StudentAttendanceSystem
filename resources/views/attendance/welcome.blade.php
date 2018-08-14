<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="{{ asset('css/new/font-awesome.min.css') }}" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('css/new/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/new/paper-dashboard.min.css?v=2.0.1') }}" rel="stylesheet" />
</head>
<body class="login-page">
  
  <div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset('images/DSC_0472.JPG') }}">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="contents"><br><br><br><br>
        <div class="container">
          <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
              <h1 class="text-white text-center" id="time"></h1>
              <h5 class="text-white text-center" id="date"></h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
              <div class="card">
                <div class="card-header text-center"><h4 class="card_title">CCS Student Attendance System</h4></div>
                <div class="card-body">
                  {{ Form::open(array('url'=>'records', 'method'=>'post', 'class'=>'form-horizontal')) }}
                  
                  <div class="col-md-6 mr-auto ml-auto">
                    <div class="input-group{{ $errors->any() ? ' has-danger' : '' }}">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-table" aria-hidden="true"></i>
                        </div>
                      </div>
                      <input type="text" name="id" id="id" placeholder="Enter ID Number" class="form-control" autofocus>
                      {{-- {{Form::text('id', '', ['class'=>'form-control', 'placeholder' => 'ID Number', 'id' => 'id', 'autofocus' => 'autofocus' ])}} --}}
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
            
          </div>
          <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title text-center">Event</h5>
                </div>
                <div class="card-body">
                  @if(!is_null($event))
                  <h3>{{ $event->event_name }}</h3>
                  @else
                  <h3 class="text-center">None</h3>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="#" target="_blank">Facebook</a>
                </li>
                <li>
                  <a href="#" target="_blank">Google+</a>
                </li>
                <li>
                  <a href="#" target="_blank">Instagram</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2017 - 
                <script>document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by LonerWeb
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  
  <!--   Core JS Files   -->
  <script src="{{ asset('js/new/jquery.min.js') }}"></script>
  <script src="{{ asset('js/new/popper.min.js') }}"></script>
  <script src="{{ asset('js/new/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/new/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('js/new/moment.min.js') }}"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('js/new/bootstrap-switch.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('js/new/sweetalert2.all.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('js/new/jquery.validate.min.js') }}"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('js/new/jquery.bootstrap-wizard.js') }}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('js/new/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('js/new/bootstrap-datetimepicker.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="{{ asset('js/new/jquery.dataTables.min.js') }}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('js/new/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('js/new/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('js/new/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('js/new/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Bootstrap Table -->
  <script src="{{ asset('js/new/nouislider.min.js') }}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chart JS -->
  <script src="{{ asset('js/new/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/new/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/new/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('js/new/demo.js') }}"></script>
  <!-- Sharrre libray -->
  <script src="{{ asset('js/new/jquery.sharrre.js') }}"></script>
  
  <script src="{{ asset('js/jquery.mask.js') }}"></script>
  
  @include('sweetalert::alert')
  
  <script>
    $(document).ready(function(){
      
      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');
      
      $full_page = $('.full-page');
      
      $sidebar_responsive = $('body > .navbar-collapse');
      sidebar_mini_active = true;
      
      window_width = $(window).width();
      
      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
      
      // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
        //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
          //         $('.fixed-plugin .dropdown').addClass('show');
          //     }
          //
          // }
          
          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });
          
          $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');
            
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            
            var new_color = $(this).data('color');
            
            if ($sidebar.length != 0) {
              $sidebar.attr('data-active-color', new_color);
            }
            
            if ($full_page.length != 0) {
              $full_page.attr('data-active-color', new_color);
            }
            
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-active-color', new_color);
            }
          });
          
          $('.fixed-plugin .background-color span').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            
            var new_color = $(this).data('color');
            
            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }
            
            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }
            
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });
          
          $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');
            
            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');
            
            
            var new_image = $(this).find("img").attr('src');
            
            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }
            
            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
              
              $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }
            
            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
              
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }
            
            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });
          
          $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
            $full_page_background = $('.full-page-background');
            
            $input = $(this);
            
            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }
              
              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }
              
              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }
              
              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }
              
              background_image = false;
            }
          });
          
          
          $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
            $body = $('body');
            
            $input = $(this);
            
            if (paperDashboard.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              paperDashboard.misc.sidebar_mini_active = false;
              
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
              
            } else {
              
              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
              
              setTimeout(function() {
                $('body').addClass('sidebar-mini');
                
                paperDashboard.misc.sidebar_mini_active = true;
              }, 300);
            }
            
            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);
            
            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
            
          });
          
          // $('#idNumber').val($('input[name="idNumber"]').cleanVal());
          
          function updateTime() {
            $('#time').html(moment().format('hh:mm:ss A'));
          }
          setInterval(updateTime, 500);
          
          $('#date').html(moment().format('MMMM DD, YYYY'));
          $('input[name="id"]').mask("00-0000");
        });
        $("#id").keyup(function (event) {
          if(event.keyCode === 107){
            $("#check").click();
          }
        });
      </script>
      <script>
        $(document).ready(function() {
          demo.checkFullPageBackgroundImage();
        });
      </script>
    </body>
    </html>
    