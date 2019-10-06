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
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/-5mJVLNL5fs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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