<div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a style="background-color:white; font-size:30px;" href="#">
                    BOLSTOCK
                </a>
                {{-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> --}}

            </li>
            <li>
                <a href="{{ route('dashboard',3)}}">
                    <i class="icon-size"><img src="{{asset('images/icons/web-page-home.png')}}"></i>
                    <span>DASHBOARD</span>
                </a>
            </li>
            <li>
                <a href="{{ route('stock') }}">
                    <i class="icon-size"><img src="{{asset('images/icons/warehouse.png')}}"></i> 
                    <span>Stock</span>
               </a>
            </li>
            <li>
                <a href="{{ route('almost-time', 3) }}">
                    <i class="icon-size"><img src="{{asset('images/icons/calendar.png')}}"></i> 
                    <span>Almost Time</a></span>
            </li>
            <li>
                <a href="{{ route('lead-times') }}">
                    <i class="icon-size"><img src="{{asset('images/icons/statistics.png')}}"></i> 
                    <span>leadTimes</span>
                </a>
            </li>

            <li class="bottom-setting">
                <a href="{{ url('/setting') }}">
                    <i class="icon-size"><img src="{{asset('images/icons/settings.png')}}"></i> 
                    <span>Settings</span>
                </a>
            </li>
           <!--  <li>
                <a href="{{ route('refresh-result') }}">
                    <i class="icon-size"><img src="{{asset('images/icons/settings.png')}}"></i> 
                    <span>Refresh</span>
                </a>
            </li> -->
            <li>
                <a href="{{route('logout')}}">
                    <i class="icon-size" style="padding-right:40px;"></i> 
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>