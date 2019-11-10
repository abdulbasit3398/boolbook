<style type="text/css">
    /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  .custom_sm_hidde{
    display: contents;
  }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  .custom_sm_hidde{
    display: contents;
  }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
  .custom_sm_hidde{
    display: none;
  }
  .mini-sidebar .left-sidebar{
    width: 82px;
  }
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
  .custom_sm_hidde{
    display: contents;
  }
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
  .custom_sm_hidde{
    display: contents;
  }
}
.customvtab .tabs-vertical li .nav-link.active, .customvtab .tabs-vertical li .nav-link:hover, .customvtab .tabs-vertical li .nav-link:focus{
    border-right: 2px solid #175ade !important;
    color: #175ade !important;
}
.sidebar-nav ul li a{
    padding: 8px 35px 8px 5px
}
.sidebar-nav{
    padding: 5px;
}
.sidebar-nav ul li a{
    color: #263238;
}
.sidebar-nav > ul > li.active > a, .sidebar-nav > ul > li.active:hover > a{
    color: #ffffff;
    background: #175ade !important;
}
.sidebar-nav ul li a.active, .sidebar-nav ul li a:hover{
    color: #175ade;
}
.sidebar-nav > ul > li > a i{
    color: #263238;
}
.sidebar-nav > ul > li:hover > i{
    color: #175ade !important;
}

/*.sidebar-nav > ul > li > a i:hover{
    color: #175ade !important;
}*/
.mini-sidebar .sidebar-nav #sidebarnav > li:hover > a{
    width: 260px;
    background: #175ade !important;
    color: #ffffff;
    border-color: #175ade !important;
}
.icon_span{
  margin-right: 8px;
}
.left-sidebar{
  box-shadow: 1px 0px 0px rgba(218, 218, 218, 1) !important;
}
</style>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- User profile -->
      
        <div class="vtabs customvtab" style="width: 101%;margin-top: 50px">
            <ul class="nav nav-tabs tabs-vertical" role="tablist" style="padding-left: 21px;">
                <li class="nav-item"> 
                    <a class="nav-link @if(\Route::current()->getName() == 'dashboard') active @endif" href="{{route('dashboard')}}">
                        <span class="icon_span"><i class="mdi mdi-speedometer" style="font-size: 20px"></i></span> 
                        <span class="custom_sm_hidde hide-menu">Dashboard</span> </a> 
                </li>
                <li class="nav-item"> <a class="nav-link @if(\Route::current()->getName() == 'profitloss') active @endif " href="{{route('profitloss')}}"><span class="icon_span"><i class="mdi mdi-developer-board" style="font-size: 20px"></i></span> <span class="custom_sm_hidde hide-menu">Resultaat</span></a> </li>

                <li class="nav-item"> <a class="nav-link @if(\Route::current()->getName() == 'kosten.index') active @endif" href="{{route('kosten.index')}}" role="tab"><span class="icon_span"><i class="mdi mdi-note-plus-outline" style="font-size: 20px"></i></span> <span class="custom_sm_hidde hide-menu">Kosten</span></a> </li>

                <li class="nav-item"> <a class="nav-link @if(\Route::current()->getName() == 'taxreport') active @endif" href="{{route('taxreport')}}" role="tab"><span class="icon_span"><i class="mdi mdi-file-document-box" style="font-size: 20px"></i></span> <span class="custom_sm_hidde hide-menu">BTW Aangifte</span></a> </li>

                <li class="nav-item"> <a class="nav-link 
                  @if(
                  \Route::current()->getName() == 'user_account' ||
                  \Route::current()->getName() == 'affiliate_program' ||
                  \Route::current()->getName() == 'edit_profile' ||
                  \Route::current()->getName() == 'manage_subscription' ||
                  \Route::current()->getName() == 'view_invoice' ||
                  \Route::current()->getName() == 'bol_account_detail'
                   ) active @endif" href="{{route('user_account')}}" role="tab"><span class="icon_span"><i class="mdi mdi-account" style="font-size: 20px"></i></span> <span class="custom_sm_hidde hide-menu">Account</span></a> </li>

                   <li class="nav-item"> <a class="nav-link" href="{{route('logout')}}" role="tab"><span class="icon_span"><i class="mdi mdi-power" style="font-size: 20px"></i></span> <span class="custom_sm_hidde hide-menu">Uitloggen</span></a> </li>
            </ul>
            <!-- Tab panes -->
            <!-- <div class="tab-content">
                <div class="tab-pane active" id="home3" role="tabpanel">
                    <div class="p-20">
                        <h3>Best Clean Tab ever</h3>
                        <h4>you can use it with the small code</h4>
                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                    </div>
                </div>
                <div class="tab-pane  p-20" id="profile3" role="tabpanel">2</div>
                <div class="tab-pane p-20" id="messages3" role="tabpanel">3</div>
            </div> -->
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
      <!-- Bottom points-->
      <!-- <div class="sidebar-footer">
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div> -->
        <!-- End Bottom points-->
      </aside>