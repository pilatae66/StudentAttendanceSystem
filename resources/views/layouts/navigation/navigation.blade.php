<div class="wrapper ">
  <div class="sidebar" data-color="brown" data-active-color="success">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
      <a href="#" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{ asset('images/logo.png') }}">
        </div>
      </a>
      <a href="#" class="simple-text logo-normal">
        Creative Tim
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="{{ asset('images/logo.png') }}" />
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <span>
              Chet Faker
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
              <li><a class="dropdown-item" href="{{ route('logout') }}"
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
      <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
        <a href="{{ url('dashboard') }}">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="{{ Request::path() == 'student' ? 'active' : '' ||  Request::path() == 'admin' ? 'active' : ''  }}">
        <a data-toggle="collapse" href="#user">
          <i class="nc-icon nc-single-02"></i>
          <p>
            Users
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse " id="user">
          <ul class="nav">
            <li>
              <a href="{{ route('student.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-hat-3"></i></span>
                <span class="sidebar-normal"> Student </span>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.index') }}">
                <span class="sidebar-mini-icon"><i class="nc-icon nc-badge"></i></span>
                <span class="sidebar-normal"> Admin </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="{{ Request::path() == 'contribution' ? 'active' : '' ||  Request::path() == 'fines' ? 'active' : '' ||  Request::path() == 'uniform' ? 'active' : ''  }}">
          <a data-toggle="collapse" href="#payables">
            <i class="nc-icon nc-credit-card"></i>
            <p>
              Payables
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse " id="payables">
            <ul class="nav">
              <li>
                <a href="{{ route('cont.index') }}">
                  <span class="sidebar-mini-icon"><i class="nc-icon nc-box"></i></span>
                  <span class="sidebar-normal"> Contribution </span>
                </a>
              </li>
              <li>
                <a href="{{ route('uniform.index') }}">
                  <span class="sidebar-mini-icon"><i class="nc-icon nc-circle-10"></i></span>
                  <span class="sidebar-normal"> Uniform </span>
                </a>
              </li>
              <li>
                  <a href="{{ route('fines.index') }}">
                    <span class="sidebar-mini-icon"><i class="nc-icon nc-money-coins"></i></span>
                    <span class="sidebar-normal"> Fines </span>
                  </a>
                </li>
            </ul>
          </div>
        </li>
        <li class="{{ Request::path() == 'history' ? 'active' : '' }}">
            <a href="{{ url('history') }}">
              <i class="nc-icon nc-refresh-69"></i>
              <p>History</p>
            </a>
          </li>
          
        <li class="{{ Request::path() == 'payment' ? 'active' : '' }}">
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