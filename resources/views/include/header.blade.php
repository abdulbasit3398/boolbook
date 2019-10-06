<style type="text/css">
  .navbar.default-layout .navbar-brand-wrapper
  {
    background-color: white !important;
  }
  .navbar.default-layout .navbar-menu-wrapper
  {
    webkit-box-shadow: none;
    box-shadow: none;
  }
</style>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
        <img src="{{asset('images/logo.gif')}}" alt="logo" /> </a>
      <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}">
        <img src="{{asset('images/logo.gif')}}" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-email-outline"></i>
            <span class="count bg-success">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                <p class="font-weight-light small-text mb-0"> Just now </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-settings m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                <p class="font-weight-light small-text mb-0"> Private message </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-airballoon m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                <p class="font-weight-light small-text mb-0"> 2 days ago </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item font-weight-semibold d-none d-lg-block">
        	{{Auth::user()->name}}
        </li>
        <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/user.png')}}" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{asset('assets/images/faces/user.png')}}" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->name}}</p>
              <p class="font-weight-light text-muted mb-0">{{Auth::user()->email}}</p>
            </div>
            <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
            <a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
            <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a>
            <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Sign Out') }}<i class="dropdown-item-icon ti-power-off"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>