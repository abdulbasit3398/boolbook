<!DOCTYPE html>
<html lang="en">

@include('include.m_head')

<style type="text/css">
  @media only screen and (min-width: 768px) {
    .page-wrapper {padding-top: 30px;}
  }
  @media only screen and (max-width: 768px) {
    .page-wrapper {padding-top: 120px;}
  }
  body{
    color: #6d6d6d !important;
  }
  .page-wrapper{
    background: #fbfcfc !important;
  }
  .form-material .form-control, .form-material .form-control.focus, .form-material .form-control:focus{
    background-image: linear-gradient(#175ade, #175ade), linear-gradient(#d9d9d9, #d9d9d9) !important;
  }
  .table td{
    font-size: 14px !important;
    color: #6d6d6d !important;
  }
  .table th{
    font-size: 14px !important;
    color: #34373c !important;
  }
  h1, h2, h3, h4, h5, h6{
    color: #34373c !important;
  }
  .table thead th, .table th{
    font-weight: 400 !important;
  }
  [type="radio"]:not(:checked) + label, [type="radio"]:checked + label{
    font-size: 14px !important;
    color: #6d6d6d !important;
  }
  .blue_div{
    font-size: 16px !important;
  }
  .normal_text{
    color: #6d6d6d !important;
    font-size: 14px !important;
  }
  .alert{
    font-size: 14px;
  }
  .form_total1{
    font-weight: 500;
    font-size: 14px !important;
    color: #34373c !important;
  }
</style>

<body class="fix-header fix-sidebar card-no-border">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">

    @include('include.m_header')
    
    @include('include.m_sidebar')
    <div class="page-wrapper">

      <div class="container-fluid">

        <!-- <div class="row page-titles">
          <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">@yield('page_title')</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
          
        </div> -->

            @section('main_content')
              @show

            @include('include.m_right_sidebar')

          </div>

          @include('include.m_footer')
        </div>
      </div>

      @include('include.m_scripts')
    </body>

    </html>