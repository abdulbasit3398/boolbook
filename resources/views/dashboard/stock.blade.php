<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<style>
  
.form1-style{
  height: 134px;
  background-color:  rgb(51, 47, 47);
  padding: 10px 50px 30px 50px;
  margin-left: 40px;
}
.form1-style label{
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
  width: 100%;
  margin: 15px 0px;
  padding: 0 18px;
  display: none;
  overflow: hidden;
  /* background-color: #f1f1f1; */
}
#chartContainer1{
  color: red;
}
#chartContainer2{
  color: blue;
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


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
                        <h4 style="font-weight:bold;">STOCK</h4>
                        <hr>
                        
                        <table style="width: 100%; text-align:center; font-size:15px;">
                            <thead>
                                <col width="50%">
                                <col width="10%">
                                <col width="10%">
                                <col width="5%">
                                <th style="text-align:left">TITLLE</th>
                                <th style="text-align:center">EAN</th>
                                <th style="text-align:center">STOCK</th>
                                <th style="text-align:center"></th>
                            </thead>
                            <tbody>
                              <?php $i = 0;?>
                                @foreach ($stocks as $stock)
                                <?php $i++; ?>
                                    <tr>
                                        <td style="padding: 1%; border-top:1px solid black; text-align:left">{{substr($stock->title, 0, 70)}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">{{$stock->stock_ean}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">{{$stock->stock}}</td>
                                        <td style="padding: 1%; border-top:1px solid black;">
                                          <tr colspan="4">
                                            <td colspan="4">
                                              <button class="collapsible fa fa-angle-down" type="button"></button>
                                              <div style="display:none" class="row content">                      
                                                <div id="chartContainer{{$i}}" style="margin-left: 10%; height: 200px; width: 80%;"></div>
                                                
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
    $("#formButton").click(function(){
        $("#form1").toggle();
    });
    </script>

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

<?php $j = 0; ?>
@foreach ($stockGroupBy as $stock_ean => $stock)


<?php $j++; ?>
<script>
    // window.onload = function () {
    
    var chart{!!$j!!} = new CanvasJS.Chart("chartContainer{!!$j!!}", {
      // width:800,//in pixels
      height:200,	
      backgroundColor: "rgb(51, 47, 47)",
      axisX: {
        valueFormatString: "DD",
        intervalType: "day",
        // interval: 6,
        labelFontColor: "white"
      },
      axisY: {
        labelFontColor: "white",
        interval: 20
      },
      data: [{
        markerType: "none",
        lineColor: "white",
        xValueType: "dateTime",
        yValueFormatString: "0",
        xValueFormatString: "DD/MM/YYYY",
        type: "spline",
        
          <?php 

            foreach($stock as $sk){
            $dataPoints[$j][] = array("x"=> (strtotime($sk->created_at)*1000), "y"=> $sk->stock);
            }
          ?>
        dataPoints: <?php echo json_encode($dataPoints[$j], JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart{!!$j!!}.render();
// }
</script>
@endforeach

</body>
</html>