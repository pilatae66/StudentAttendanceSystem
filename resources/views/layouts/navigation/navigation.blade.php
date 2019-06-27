<div class="wrapper ">
  <div class="sidebar" data-color="green" data-active-color="success">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
      <a href="#" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{ asset('images/CCS.png') }}">
        </div>
      </a>
      <a href="#" class="simple-text logo-normal">
        CCSSAS
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="{{ asset('images/CCS.png') }}" />
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <span>
              {{ Auth::user()->fullName }}
              <b class="caret"></b>
            </span>
          </a>
          <div class="clearfix"></div>
          <div class="collapse" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon"> <i class="nc-icon nc-touch-id"></i></span>
                  <span class="sidebar-normal">My Profile</span>
                </a>
              </li>
              <li>
                <a href="{{ route('register') }}">
                  <span class="sidebar-mini-icon"> <i class="nc-icon nc-single-02"></i></span>
                  <span class="sidebar-normal">Register New Admin</span>
                </a>
              </li>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-button-power"></i></span>
                <span class="sidebar-normal">Logout</span>
              </a>
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ url('dashboard') }}">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{ Request::is('student*') ? 'active' : '' ||  Request::is('admin*') ? 'active' : ''  }}">
        <a data-toggle="collapse" href="#user">
          <i class="nc-icon nc-single-02"></i>
          <p>
            Users
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ Request::is('student*') ? 'show' : '' || Request::is('admin*') ? 'show' : '' }}" id="user">
          <ul class="nav">
            <li class="{{ Request::is('student*') ? 'active' : '' }}">
              <a href="{{ route('student.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-hat-3"></i></span>
                <span class="sidebar-normal"> Student </span>
              </a>
            </li>
            <li class="{{ Request::is('admin*') ? 'active' : '' }}">
              <a href="{{ route('admin.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-badge"></i></span>
                <span class="sidebar-normal"> Admin </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="{{ Request::is('event*') || Request::is('schedule*')? 'active' : '' }}">
        <a href="{{ url('event') }}">
          <i class="fa fa-star-o"></i>
          <p>Events</p>
        </a>
      </li>
      <li class="{{ Request::is('contribution*') ? 'active' : '' ||  Request::is('fines*') ? 'active' : '' ||  Request::is('uniform*') ? 'active' : ''  }}">
        <a data-toggle="collapse" href="#payables">
          <i class="nc-icon nc-credit-card"></i>
          <p>
            Payables
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ Request::is('contribution*') ? 'show' : '' ||  Request::is('fines*') ? 'show' : '' ||  Request::is('uniform*') ? 'show' : ''  }}" id="payables">
          <ul class="nav">
            <li class="{{ Request::is('contribution*') ? 'active' : '' }}">
              <a href="{{ route('cont.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-box"></i></span>
                <span class="sidebar-normal"> Contribution </span>
              </a>
            </li>
            <li class="{{ Request::is('uniform*') ? 'active' : '' }}">
              <a href="{{ route('uniform.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-circle-10"></i></span>
                <span class="sidebar-normal"> Uniform </span>
              </a>
            </li>
            <li class="{{ Request::is('fines*') ? 'active' : '' }}">
              <a href="{{ route('fines.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-money-coins"></i></span>
                <span class="sidebar-normal"> Fines </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="{{ Request::is('history*') ? 'active' : '' }}">
        <a href="{{ url('history') }}">
          <i class="nc-icon nc-refresh-69"></i>
          <p>History</p>
        </a>
      </li>
      
      <li class="{{ Request::is('payment*') ? 'active' : '' }}">
        <a href="{{ url('payment') }}">
          <i class="nc-icon nc-money-coins"></i>
          <p>Payment</p>
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
        </div>
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#pablo">CCS STUDENT ATTENDANCE SYSTEM</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->