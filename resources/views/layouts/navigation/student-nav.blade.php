<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        @guest
          &nbsp;
        @else
          <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('student.home') }}"><span class = "glyphicon glyphicon-dashboard"></span> Home</a>
          </li>

          <li class="dropdown {{ Request::path() == 'student' || Request::path() == 'admin' ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Users <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#">
                  Profile
                </a>
                <a href="{{ route('student.report', [ 'id' => Auth::user()->stud_id ]) }}">
                  Reports
                </a>
              </li>
            </ul>
          </li>
      </ul>

    @endguest

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
          <li><a href="{{ route('student.auth.login') }}">Login</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <span class="glyphicon glyphicon-user"> </span>&nbsp {{ Auth::user()->fname }} {{ Auth::user()->lname }}<span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Account Setting</a></li>
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                 <span class="glyphicon glyphicon-off"></span> Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      @endguest
    </ul>
  </div>
</div>
</nav>
