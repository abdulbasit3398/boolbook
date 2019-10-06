<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    background-color: rgb(51, 47, 47);
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    /* background: #000; */
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    background-color: rgb(51, 47, 47);
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

span{
    padding-left: 20px;
    font-size: 15px;
    font-weight: bold;
    text-transform: uppercase;
}

.sidebar-nav li {
    text-indent: 45px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #fff;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 60px;
    font-weight: bold;
}


.sidebar-nav > .sidebar-brand a {
    color: rgb(51, 47, 47);    
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #eee;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- cdn for chart -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
        <div style="@if(Session::get('bearer_token') != null)display:none;@endif" id="myModal" class="modal">
          
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span><br>
                
                @if(Session::has('message'))
                <br>
                <div class="session-message">{{ Session::get('message') }}</div>
                <br>
                @endif
                
            <div class="container">
                <form action="{{ route('get-token') }}" method="POST">
                @csrf
                <label for="client_id"><b>Client ID</b></label>
                <input type="text" placeholder="Enter Client ID" name="client_id" required>
            
                <label for="client_secret"><b>Client Secret</b></label>
                <input type="text" placeholder="Enter Client Secret" name="client_secret" required>
                    
                <input type="submit" value="login">
                </form>
                </div>
            </div>
            
        </div>

        <div class="header-section">
        <div>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a style="background-color:white;" href="#">
                        BOLSTOCK
                    </a>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>

                </li>
                <li>
                    <a href="#">
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
                    <a href="#">
                        <i class="icon-size"><img src="{{asset('images/icons/warehouse.png')}}"></i> 
                        <span>Almost Time</a></span>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-size"><img src="{{asset('images/icons/statistics.png')}}"></i> 
                        <span>Insight</span>
                    </a>
                </li>
                <li class="bottom-setting">
                    <a href="{{ url('/setting') }}">
                        <i class="icon-size"><img src="{{asset('images/icons/settings.png')}}"></i> 
                        <span>Settings</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{route('logout')}}">
                        <i class="icon-size" style="padding-right:40px;"></i> 
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 graph-section">
                            <h2>ORDERS</h2>
                        </div>
                        <div id="myfirstchart" style="height: 250px;"></div>
                          
                        {{-- <div class="graph1">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
     


    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
{{-- {{$orderdate}}<br>{{$orderquantity}} --}}
<?php
// dd($dateTimeOrderPlaced);
  // foreach ($month as $row) {
  $dateTime='dateTimeOrderPlaced';
  $quant='quantity';
  //$chart_data[] = array('y' =>'y: $date->date', 'a' => 'a: 123', 'b' => 'b: 33' );
  // $sale2 = $this->Dashboard_model->get_sales_by_date($row['date']);
  // $sale=$sale2->a;
  // $invoice = $this->Dashboard_model->get_invoice_by_date($row['date']);
  // if($invoice!=null){


    for($i = 0 ; $i < sizeof($dateTimeOrderPlaced); $i++){
      $chart_data[]= array($dateTime => $dateTimeOrderPlaced[$i], $quant => $orderquantity[$i]);
    }
    // dd($chart_data);
    // }
    // else{
    //     $chart_data22[]= array($y => $row['date'], $a => $sale , $b => '0');
    // }

    // } 
  // if($chart_data == null){
  //   $chart_data[]= array($dateTime => '2019-01-01', $quant => '');
  // }

  $chart_data=json_encode($chart_data);
  // dd($chart_data);

?>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>

<script type="text/javascript">
new Morris.Line({
// ID of the element in which to draw the chart.
element: 'myfirstchart',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.

data: {!! $chart_data !!},

// The name of the data record attribute that contains x-values.
xkey: 'dateTimeOrderPlaced',
// A list of names of data record attributes that contain y-values.
ykeys: ['quantity'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['Quantity'],
lineColors: ['rgb(51, 47, 47)'],
yLabelFormat: function(y){return y != Math.round(y)?'':y;},
});
</script>
</body>
</html>