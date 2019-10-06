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
h5, h6{
    float: left;
}
h6{
    margin: 0 !important;
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
                        <h4 style="font-weight:bold;" class="float-left">ALMOST TIME</h4>
                        <div class="dropdown float-right">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Based on <?php echo $datedays ?> days
                              </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{ route('almost-time', 3) }}">Based on 3 days</a>
                              <a class="dropdown-item" href="{{ route('almost-time', 7) }}">Based on 7 days</a>
                              <a class="dropdown-item" href="{{ route('almost-time', 30) }}">Based on 30 days</a>
                              <a class="dropdown-item" href="{{ route('almost-time', 90) }}">Based on 90 days</a>
                            </div>
                          </div>
                        <hr style="margin-top:50px;">

            
                        <table style="width: 100%; text-align:center; font-size:15px;">
                            <thead>
                                <col width="40%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="5%">
                                <th style="text-align:left">TITLLE</th>
                                <th style="text-align:center">STOCK</th>
                                <th style="text-align:center">Avg Sales</th>
                                <th style="text-align:center">Order in</th>
                                <th style="text-align:center"></th>
                            </thead>
                            <tbody>

                                @foreach ($basedOnDays as $stock_ean => $total_quantity)
                                    <?php $result3 = 0 ?>
                                    @foreach($total_quantity as $quantity)
                                        <?php $result3 = $result3+$quantity->quantity; ?>
                                    @endforeach
                                    <?php 
                                        $result3 = round($result3/$datedays); 
                                        $orderin3 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$result3));

                                    ?>
                                    <tr>
                                        <td style="padding: 1%; border-top:1px solid black; text-align:left">{{substr($quantity->title, 0, 70)}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">{{$quantity->stock}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">{{$result3}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">@if($orderin3 <= 0)<p style="color:red; margin:0">Order now!</p>@else{{ round($orderin3/$result3) }} days @endif</td>
                                        <td style="padding: 1%; border-top:1px solid black;">
                                        <tr colspan="5">
                                            <td colspan="5">
                                            <button class="collapsible fa fa-angle-down" type="button"></button>
                                            <div style="display:none" class="row content">                      
                                            <div class="col-md-11 form1-style">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label>DETAILED ORDER SUMMARY<label>    
                                                    </div>
                                                    <div style="color:white" class="col-md-12">
                                                        <div class="col-md-3 col-sm-6">
                                                            <h5>Based on 3 days</h5>
                                                            <?php
                                                                $date3 = date('Y-m-d H:i:s',strtotime('-3 days'));
                                                                $allorders = DB::table('orders')
                                                                            ->where([
                                                                                ['user_id', '=', Auth::user()->id],
                                                                                ['order_date', '>=', $date3],
                                                                                ['stock_ean', '=', $quantity->stock_ean]
                                                                                ])
                                                                            ->get();
                                                                $total = 0;
                                                                foreach ($allorders as $orders) {
                                                                    $total = $total + $orders->quantity;
                                                                }
                                                                $total = round($total/3); 
                                                                $orderin3 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$total));
                                                            ?>
                                                            <h6>@if($orderin3 <= 0) Order now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @else Order in {{ round($orderin3/$total) }} days @endif</h6>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6">
                                                            <h5>Based on 7 days</h5>
                                                            <?php
                                                                $date7 = date('Y-m-d H:i:s',strtotime('-7 days'));
                                                                $allorders = DB::table('orders')
                                                                            ->where([
                                                                                ['user_id', '=', Auth::user()->id],
                                                                                ['order_date', '>=', $date7],
                                                                                ['stock_ean', '=', $quantity->stock_ean]
                                                                                ])
                                                                            ->get();
                                                                $total = 0;
                                                                foreach ($allorders as $orders) {
                                                                    $total = $total + $orders->quantity;
                                                                }
                                                                $total = round($total/7); 
                                                                $orderin7 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$total));
                                                            ?>
                                                            <h6>@if($orderin7 <= 0)Order now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@else Order in {{ round($orderin7/$total) }} days @endif</h6>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6">
                                                            <h5>Based on 30 days</h5>
                                                            <?php
                                                                $date30 = date('Y-m-d H:i:s',strtotime('-30 days'));
                                                                $allorders = DB::table('orders')
                                                                            ->where([
                                                                                ['user_id', '=', Auth::user()->id],
                                                                                ['order_date', '>=', $date30],
                                                                                ['stock_ean', '=', $quantity->stock_ean]
                                                                                ])
                                                                            ->get();
                                                                $total = 0;
                                                                foreach ($allorders as $orders) {
                                                                    $total = $total + $orders->quantity;
                                                                }
                                                                $total = round($total/30); 
                                                                $orderin30 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$total));
                                                            ?>
                                                            <h6>@if($orderin30 <= 0)<h6>Order now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6>@else Order in {{ round($orderin30/$total) }} days @endif</h6>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6">
                                                            <h5>Based on 90 days</h5>
                                                            <?php
                                                                $date90 = date('Y-m-d H:i:s',strtotime('-90 days'));
                                                                $allorders = DB::table('orders')
                                                                            ->where([
                                                                                ['user_id', '=', Auth::user()->id],
                                                                                ['order_date', '>=', $date90],
                                                                                ['stock_ean', '=', $quantity->stock_ean]
                                                                                ])
                                                                            ->get();
                                                                $total = 0;
                                                                foreach ($allorders as $orders) {
                                                                    $total = $total + $orders->quantity;
                                                                }
                                                                $total = round($total/90); 
                                                                $orderin90 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$total));
                                                            ?>
                                                            <h6>@if($orderin90 <= 0)Order now!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@else Order in {{ round($orderin90/$total) }} days @endif</h6>
                                                        </div>
                                                    </div>
                                                </div>
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