<style type="text/css">
  .sidebar > .nav > .nav-item:not(.nav-profile) > .nav-link:before
  {
    content: "";
    position: absolute;
    left: 30px;
    right: 50%;
    width: 10px;
    height: 10px;
    border-radius: 100%;
    border: 2px solid #fff;
    display: none !important;
  }
  .sidebar > .nav .nav-item .nav-link
  {
    padding: 15px 30px 15px 28px !important;
  }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{asset('assets/images/faces/face8.jpg')}}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">Allen Moreno</p>
          <p class="designation">Premium user</p>
        </div>
      </a>
    </li> -->
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <!-- <i class="fas fa-cloud"></i> -->
        <img src="{{asset('images/dashboard.png')}}" style="width: 25px;margin-right: 20px;">
        <span class="menu-title">DASHBOARD</span>

      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('profitloss')}}">
        <img src="{{asset('images/profitloss.png')}}" style="width: 25px;margin-right: 20px;">
        <span class="menu-title">PROFIT & LOSS</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('customcost.index')}}">
        <img src="{{asset('images/addcost.png')}}" style="width: 25px;margin-right: 20px;">
        <span class="menu-title">ADD COSTS</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('taxreport')}}">
        <img src="{{asset('images/taxreport.png')}}" style="width: 25px;margin-right: 20px;">
        <span class="menu-title">TAX REPORT</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('user_account')}}">
        <img src="{{asset('images/user.png')}}" style="width: 25px;margin-right: 20px;">
        <span class="menu-title">ACCOUNT</span>
      </a>
    </li>
  </ul>
</nav>