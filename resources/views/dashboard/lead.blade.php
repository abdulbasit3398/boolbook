<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<style>
    /* #form1 {
    
        display:none;
        
        } */
    .form1-style{
    height: 134px;
    background-color:  rgb(51, 47, 47);
    padding: 10px 50px 30px 50px;
    margin-left: 40px;
    }
    .form1-style label{
    float: left;
    color: white;
    font-family: inherit;
    margin-top: 15px;
    font-weight: bold;
    }
    .form1-style input{
    padding: 5px !important;
    }
    .form1-style .submit-btn{
    background-color: white;
    color: #000;
    font-weight: bold;
    }
    
    
    
    
    
    
    
    
    
.collapsible {
    border: none;
    background-color: black;
    color: white;
    cursor: pointer;
    padding: 10px;
    /* width: 100%; */
    border-radius: 50%;
    text-align: left;
    outline: none;
    float: right;
    margin-top: -37px;
    margin-right: 20px;
    font-size: 25px;
}

    .active, .collapsible:hover {
    background-color: #555;
    }
    
    .content {
    margin: 15px 0px;
    padding: 0 18px;
    display: none;
    overflow: hidden;
    /* background-color: #f1f1f1; */
    }
</style>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- cdn for chart -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


  	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

<!-- jQuery library -->
<script src="{{asset('bootstrap/jquery-3.3.1.js')}}"></script>

<!-- Latest compiled JavaScript -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body style="background-color:#eee;">
  
        <div id="wrapper">
    
    <!-- Sidebar -->
    @include('include.sidenav')
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="header-section">
    </div>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 graph-section">  
                    <div class="graph-heading">
                            @if (session('message'))
                                <div class="alert alert-success">
                                {{ session('message') }}
                                </div>  
                            @endif
                        <h4 style="font-weight:bold;">LEADTIMES</h4>
                        <hr>

                        <table style="width: 100%; text-align:center; font-size:15px;">
                            <thead>
                                <col width="50%">
                                <col width="10%">
                                <col width="10%">
                                <col width="5%">
                                <th style="text-align:left">TITLLE</th>
                                <th style="text-align:center">Leadtime</th>
                                <th style="text-align:center">Safety days</th>
                                <th style="text-align:center"></th>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td style="padding: 1%; border-top:1px solid black; text-align:left">{{substr($stock->title, 0, 70)}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">@if($stock->leadtime == null)<p style="color:red; margin:0">Please fill in</p>@else{{$stock->leadtime}}@endif</td>
                                        <td style="padding: 1%; border-top:1px solid black;">@if($stock->safety_days == null)<p style="color:red; margin:0">Please fill in</p>@else{{$stock->safety_days}}@endif</td>
                                        <td  style="padding: 1%; border-top:1px solid black;">
                                            <tr colspan="4">
                                                <td colspan="4">
                                                <button class="collapsible fa fa-angle-down" type="button"></button>
                                                <div style="display:none" class="row content">                      
                                                <div class="col-md-11 form1-style">
                                                    <form action="{{ route('leadtimes-save') }}" method="POST">
                                                    @csrf
                                                    <div class="col-md-4 float-left ">
                                                        <label>Leadtime </label>
                                                        
                                                        <input hidden type="text" value="{{$stock->stock_ean}}" name="stock_ean">
                                                        <input width="50" placeholder="Type here.." type="text" value="{{$stock->leadtime}}" name="leadtime">
                                                    </div>
                                                    <div class="col-md-4 float-left">
                                                        <label>Safety days</label>
                                                        <input type="text" placeholder="Type here.." value="{{$stock->safety_days}}" name="safety_days">
                                                    </div>
                                                    <div class="col-md-3 float-right">
                                                        <label>&nbsp;</label>
                                                        <input type="submit" class="submit-btn" id="submit">
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                                </td>
                                            
                                            </tr>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
      </div>
    
</div>
<script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }
    </script>
</body>
</html>