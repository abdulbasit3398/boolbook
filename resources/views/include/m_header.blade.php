<style type="text/css">
  @media only screen and (min-width: 768px) {
    .navbar-nav {
      margin-left: 95%;
    }
    .navbar-header{
      width: 241px;
      padding-right: 68px;
      border-right: 1px solid #dadada;
    }
    .feedback-button {
      display: block;
      box-shadow: 0 4px 16px 0 rgba(167, 175, 183, 0.33);
      height: 39px;
      /* border: solid 3px #CCCCCC; */
      background: white;
      width: 109px;
      line-height: 32px;
      -webkit-transform: rotate(-90deg);
      font-weight: 500;
      color: #34373c;
      transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      text-align: center;
      font-size: 15px;
      position: fixed;
      right: -40px;
      top: 45%;
      z-index: 999;
      border-radius: 8px;
    }
  }
  @media only screen and (max-width: 768px) {
    .navbar-nav {
      margin-left: 85%;
    }
    .navbar-header{
      padding-right: 68px;
      border-bottom: 1px solid #dadada;
      height: 67px;
    }
    .feedback-button {
      display: none;
      box-shadow: 0 4px 16px 0 rgba(167, 175, 183, 0.33);
      height: 39px;
      /* border: solid 3px #CCCCCC; */
      background: white;
      width: 109px;
      line-height: 32px;
      -webkit-transform: rotate(-90deg);
      font-weight: 500;
      color: #34373c;
      transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      text-align: center;
      font-size: 15px;
      position: fixed;
      right: -40px;
      top: 45%;
      z-index: 999;
      border-radius: 8px;
    }
  }
  .topbar .navbar-light .navbar-nav .nav-item > a.nav-link{
    color: #175ade !important;
  }
  .topbar .navbar-light .navbar-nav .nav-item > a.nav-link:hover{
    color: #175ade !important;
  }
  .topbar .navbar-header{
    background: white;
  }
  .topbar{
    /*box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.5);*/
    box-shadow: none !important;
  }
  .mini-sidebar .top-navbar .navbar-header{
    width: 83px;
  }
  .topbar .top-navbar {
    min-height: 70px;
    padding: 0px 0px 0 0;
  }

  



</style>

<header class="topbar" style="background: white">
  <nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">
        <!-- Logo icon -->
        <b>
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <!-- <img src="{{asset('ui/assets/images/logo-light-icon.png')}}" alt="homepage" class="dark-logo" /> -->
          <!-- Light Logo icon -->
          <img src="{{asset('images/small.gif')}}" alt="homepage" style="width: 33px; margin-top: 0px;margin-left: 21px;" class="light-logo" />
        </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span>
         <!-- dark Logo text -->
         <!-- <img src="{{asset('images/logo.gif')}}" alt="homepage" class="dark-logo" /> -->
         <!-- Light Logo text -->    
         <img src="{{asset('images/logo.jpg')}}" class="light-logo" style="width: 75px; margin-top: 0px;" alt="homepage" /></span> </a>
       </div>
       <!-- ============================================================== -->
       <!-- End Logo -->
       <!-- ============================================================== -->
       <div class="navbar-collapse" style="border-bottom: 1px solid #dadada;">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
          <!-- This is  -->
          <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
          <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted" style="color: #175ade;font-size: 30px;margin-left: -15px;"><i class="ti-menu"></i></a> </li>
          <!-- ============================================================== -->
          <!-- Search -->
          <!-- ============================================================== -->
          <!-- <li class="nav-item hidden-sm-down search-box">
            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
            <form class="app-search">
              <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
            </li> -->
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <!-- <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
              <div class="dropdown-menu scale-up-left">
                <ul class="mega-dropdown-menu row">
                  <li class="col-lg-3 col-xlg-2 m-b-30">
                    <h4 class="m-b-20">CAROUSEL</h4> -->
                    <!-- CAROUSEL -->
                    <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <div class="container"> <img class="d-block img-fluid" src="{{asset('ui/assets/images/big/img1.jpg')}}" alt="First slide"></div>
                        </div>
                        <div class="carousel-item">
                          <div class="container"><img class="d-block img-fluid" src="{{asset('ui/assets/images/big/img2.jpg')}}" alt="Second slide"></div>
                        </div>
                        <div class="carousel-item">
                          <div class="container"><img class="d-block img-fluid" src="{{asset('ui/assets/images/big/img3.jpg')}}" alt="Third slide"></div>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                    </div> -->
                    <!-- End CAROUSEL -->
                  <!-- </li>
                  <li class="col-lg-3 m-b-30">
                    <h4 class="m-b-20">ACCORDION</h4> -->
                    <!-- Accordian -->
                    <!-- <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                      <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                          <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Collapsible Group Item #1
                            </a>
                          </h5> </div>
                          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                              </a>
                            </h5> </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Collapsible Group Item #3
                                </a>
                              </h5> </div>
                              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="col-lg-3  m-b-30">
                          <h4 class="m-b-20">CONTACT US</h4> -->
                          <!-- Contact -->
                          <!-- <form>
                            <div class="form-group">
                              <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                              <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                <div class="form-group">
                                  <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                              </form>
                            </li>
                            <li class="col-lg-3 col-xlg-4 m-b-30">
                              <h4 class="m-b-20">List style</h4> -->
                              <!-- List style -->
                              <!-- <ul class="list-style-none">
                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </li> -->
                      <!-- ============================================================== -->
                      <!-- End Messages -->
                      <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    
                  </div>
                </nav>
              </header>


<!-- Modal Last Name -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 100px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="vcenter">We waarderen jouw feedback!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 10px 0px 25px 0px;">
          {{csrf_field()}}
          <div class="form-group">
            <h6>Wat vind je van Bolbooks?</h6>
            <div class="row" style="margin-top: 17px">
              <div class="col-md-4" style="padding-left: 12px">
                <input name="feedback_option" type="radio" id="radio_7" class="radio-col-blue-grey" value="ontevreden">
                <label for="radio_7">Ontevreden</label>
              </div>
              <div class="col-md-4" style="padding-left: 12px">
                <input name="feedback_option" type="radio" id="radio_8" class="radio-col-blue-grey" value="wel_oke">
                <label for="radio_8">Wel oke</label>
              </div>
              <div class="col-md-4" style="padding-left: 12px">
                <input name="feedback_option" type="radio" id="radio_9" class="radio-col-blue-grey" value="top_software">
                <label for="radio_9">Top software</label>
              </div>
              
            </div>
          </div>
          <div id="feedback_empty_div" style="height: 180px">
            
          </div>
          <div class="form-group" id="feedback_form_div" style="display: none;">
            <textarea class="form-control" rows="5"></textarea>
            <label style="font-size: 13px" id="first_lable">
              <i>Typ hierboven wat we kunnen verbeteren om aan jouw wensen te voldoen!</i>
            </label>
            <label style="font-size: 13px" id="second_lable">
              <i>Typ hierboven wat je het fijnst vindt aan Bolbooks.</i>
            </label>
            
          </div>
          <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-secondary">Feedback versturen</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<button id="popup" class="feedback-button" data-toggle="modal" data-target="#myModal">Feedback</button>


