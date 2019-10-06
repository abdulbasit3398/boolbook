<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

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


 	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

<!-- jQuery library -->
<script src="{{asset('bootstrap/jquery-3.3.1.js')}}"></script>

<!-- Latest compiled JavaScript -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body style="background-color:#eee;">

<div style="@if(Session::get('bearer_token') != null)display:none;@endif" id="myModal" class="login-modal">          
  <!-- Modal content -->
  <div class="modal-content2">
      <span class="close2">&times;</span><br>
      
      
    <div class="" style="padding-left: 65px">
        <iframe width="650" height="315" src="https://www.youtube.com/embed/-5mJVLNL5fs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
  </div>      
</div>

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
                      <h4 style="font-weight:bold;" class="float-left">TIME TO ORDER!</h4>
                      <div class="dropdown float-right">
                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Based on <?php echo $datedays ?> days
                            </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('dashboard', 3) }}">Based on 3 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 7) }}">Based on 7 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 30) }}">Based on 30 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 90) }}">Based on 90 days</a>
                          </div>
                        </div>
                      <hr style="margin-top:50px;">

                  <div style="height:120px;width:100%;overflow:auto;">
                      <table style="width: 100%; text-align:center; font-size:15px;">
                          <thead>
                              <col width="15%">
                              <col width="10%">
                              <col width="10%">
                              <col width="10%">
                              <col width="10%">
                              <th style="text-align:left">TITLLE</th>
                              <th style="text-align:center">EAN</th>
                              <th style="text-align:center">Stock left</th>
                              <th style="text-align:center">Days stock left</th>
                              <th style="text-align:center">Status</th>
                          </thead>
                          <tbody>

                              @foreach ($basedOnDays as $stock_ean => $total_quantity)
                                  <?php 
                                    $result3 = 0;
                                    $remainingstock = 0;
                                  ?>
                                  @foreach($total_quantity as $quantity)
                                      <?php 
                                        $result3 = $result3+$quantity->quantity; 
                                      ?>
                                  @endforeach
                                  <?php 
                                      $remainingstock = $quantity->stock - $result3;
                                      $result3 = round($result3/$datedays); 
                                      $orderin3 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$result3));

                                  ?>
                                  <tr>
                                      <td style="padding: 1%; border-top:1px solid black; text-align:left"><?php echo $out = strlen($quantity->title) > 30 ? substr($quantity->title,0,30)."..." : $quantity->title; ?></td>
                                      <td style="padding: 1%; border-top:1px solid black;">{{$quantity->stock_ean}}</td>
                                      <td style="padding: 1%; border-top:1px solid black;">{{$remainingstock}}</td>
                                      <td style="padding: 1%; border-top:1px solid black;">@if($orderin3 <= 0)<p style="color:red; margin:0">Order now!</p>@else{{ round($orderin3/$result3) }} days @endif</td>
                                      <td style="padding: 1%; border-top:1px solid black;"><button style="background-color:white;">Mark as orderd</button></td>                                      
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  </div>
              </div>

              <div class="col-md-12 graph-section" style="margin-top:20px;">  
                  <div class="graph-heading">
                      <h4 style="font-weight:bold;" class="float-left">ALMOST TIME TO ORDER</h4>
                      <div class="dropdown float-right">
                          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Based on <?php echo $datedays ?> days
                            </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('dashboard', 3) }}">Based on 3 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 7) }}">Based on 7 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 30) }}">Based on 30 days</a>
                            <a class="dropdown-item" href="{{ route('dashboard', 90) }}">Based on 90 days</a>
                          </div>
                        </div>
                      <hr style="margin-top:50px;">

          
                    <div style="height:110px;width:100%;overflow:auto;">
                      <table style="width: 100%; text-align:center; font-size:15px;">
                          <thead>
                              <col width="15%">
                              <col width="10%">
                              <col width="10%">
                              <col width="10%">
                              <col width="20%">
                              <th style="text-align:left">TITLLE</th>
                              <th style="text-align:center">EAN</th>
                              <th style="text-align:center">Stock left</th>
                              <th style="text-align:center">Order in how many days?</th>
                          </thead>
                          <tbody>

                              @foreach ($basedOnDays as $stock_ean => $total_quantity)
                                  <?php 
                                    $result3 = 0;
                                    $remainingstock = 0;
                                  ?>
                                  @foreach($total_quantity as $quantity)
                                      <?php 
                                        $result3 = $result3+$quantity->quantity; 
                                      ?>
                                  @endforeach
                                  <?php 
                                      $remainingstock = $quantity->stock - $result3;
                                      $result3 = round($result3/$datedays); 
                                      $orderin3 = ($quantity->stock - (($quantity->leadtime + $quantity->safety_days)*$result3));

                                  ?>
                                  <tr>
                                      <td style="padding: 1%; border-top:1px solid black; text-align:left"><?php echo $out = strlen($quantity->title) > 30 ? substr($quantity->title,0,30)."..." : $quantity->title; ?></td>
                                      <td style="padding: 1%; border-top:1px solid black;">{{$quantity->stock_ean}}</td>
                                      <td style="padding: 1%; border-top:1px solid black;">{{$remainingstock}}</td>
                                      <td style="padding: 1%; border-top:1px solid black;">@if($orderin3 <= 0)<p style="color:red; margin:0">Order now!</p>@else{{ round($orderin3/$result3) }} days @endif</td>
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
var modal2 = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal2.style.display = "none";
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