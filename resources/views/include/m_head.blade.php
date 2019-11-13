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
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-151726843-1');
  </script>
  <script type="text/javascript">
      _linkedin_partner_id = "1654697";
      window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
      window._linkedin_data_partner_ids.push(_linkedin_partner_id);
  </script>
  <script type="text/javascript">
      (function(){var s = document.getElementsByTagName("script")[0];
      var b = document.createElement("script");
      b.type = "text/javascript";b.async = true;
      b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
      s.parentNode.insertBefore(b, s);})();
  </script>
  <noscript>
      <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1654697&fmt=gif" />
  </noscript>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2360437487540939');
    fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2360437487540939&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
</head>
<style type="text/css">
  .form-material .form-control, .form-material .form-control.focus, .form-material .form-control:focus{
    background-image: linear-gradient(#175ade, #175ade), linear-gradient(#d9d9d9, #d9d9d9) !important;
  }
  .align_center{
    text-align: center;
  }
  
</style>