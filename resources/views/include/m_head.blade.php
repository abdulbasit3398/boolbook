<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
  <title>BolBooks</title>
  <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/" /> -->
  <!-- Bootstrap Core CSS -->
  <link href="{{asset('ui/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">


  <!-- You can change the theme colors from here -->
   
  <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
  <script src="{{asset('ui/assets/plugins/jquery/jquery.min.js')}}"></script>
  @section('head_section')
    @show
</head>
<style type="text/css">
  .form-material .form-control, .form-material .form-control.focus, .form-material .form-control:focus{
    background-image: linear-gradient(#175ade, #175ade), linear-gradient(#d9d9d9, #d9d9d9) !important;
  }
  .align_center{
    text-align: center;
  }
  
</style>