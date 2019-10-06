<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/custom.css')}}">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">

	<!-- jQuery library -->
	<script src="{{asset('public/bootstrap/jquery-3.3.1.js')}}"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BOLBOOKS</title>
</head>
<style type="text/css">
	body{
		font-family: 'Poppins', sans-serif !important;
	}
	.navbar-inverse .navbar-nav > li > a
	{
		font-size: 14px !important;
	}
	.popin_regular{
		font-weight: 400;
    font-style: normal;
	}
	.popin_medium{
		font-weight: 500;
    font-style: normal;
	}
	.popin_bold{
		font-weight: 700;
    font-style: normal;
	}
	.popin_extra_bold{
		font-weight: 800;
    font-style: normal;
	}
</style>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" style="border-color: #175ade;background: #175ade;" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="#" style="padding:5px 0px 0px 19px;">
					<img style="width: 145px;" src="{{asset('images/logo.gif')}}" alt="logo" /></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
     <!--  <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul> -->
      <div class="navbar1">
      	<ul class="nav navbar-nav nv-left navbar-right" >
      		<li><a href="#">Voordelen</a></li>
      		<li><a href="#">Tarieven</a></li>
      		<li><a href="#">Contact</a></li>
      		@if(\Auth::check())
      		<li><a href="{{route('logout')}}">Logout</a></li>
      		@else
      		<li><a href="{{route('register')}}" class="nav-btn" style="padding-right:30px;padding-left:30px;padding-top: 6px;margin-top: 10px;padding-bottom: 7px;background-color: #175ade;color:white !important;border-radius: 25px;">Aanmelden</a></li>
      		<li><a href="{{route('login')}}">Login</a></li>
      		@endif
      	</ul>
      </div>
    </div>
  </div>
</nav>
<!-- end of container fluid -->

<div class="container-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="padding">
					<h3 style="font-size:48px; font-weight: 900;padding-bottom: 10px;">Nooit  meer zonder voorraad</h3>
					<p style="font-size:16px;padding-bottom: 10px;">Eenvouding en gedatailleered voorraad overzicht met notificates als het  tijd is om bij te bestellen</p>
							<!-- 	<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4 ">
											<a href="#" 
   												class="btn-yellow"					 
    										>Aanmelden</a>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4 ">
											<a href="#" class="btn-black">Aanmelden</a>
										</div>
									</div> --> <!--end of row-->
									<div class="btn" style="padding: 0px;margin-left: -3px">
										<a href="#" class="btn-yellow" style="border-radius: 25px;margin: 0px;">Aanmelden</a>
										<a href="#" class="btn-black" style="border-radius: 25px;">Aanmelden</a>	
									</div>
								</div>
							</div>
							<div class="col-md-6" style="padding: 30px 0px 30px 0px;">
								<img src="{{asset('public/images/5.png')}}" style="width:64%;height:64%;" class="img-width">
							</div>
						</div> <!--end of row-->	


						
					</div> <!--endof container-->
					
					<div class="row" style="background-color: #175ade;padding-top:50px;padding-bottom: 50px;">
						<div class="container">
							<div class="col-md-4 col-sm-4 col-xs-4  text-center">
								<img src="{{asset('images/approve-invoice (1).png')}}" style="width:60px;height:60px;">
								<h4 style="color:white">We helen jow data  op via  bol.com</h4>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4  text-center">
								<img src="{{asset('images/calculations (1).png')}}" style="width:60px;height:60px;">
								<h4 style="color:white">We helen jow data  op via  bol.com</h4>
							</div>
							<div class="col-md-4  col-sm-4 col-xs-4 text-center">
								<img src="{{asset('images/analytics.png')}}" style="width:60px;height:60px;">
								<h4 style="color:white">We helen jow data  op via  bol.com</h4>
							</div>
						</div>
						<!-- end of container -->
					</div>		
					<!-- end of row -->

					<div class="container">
						<div class="row" style="padding-top: 20px;padding-bottom: 50px;">
							<div class="col-md-12 text-center">
								<h2 style="color:#175ade;font-style: normal;font-weight: 400;">Bekiji zelf alle</h2>
								<h3 style="font-size:30px; font-weight: 900;">Voordelen  van  besteldata</h3>
							</div>

						</div>
						<!-- end of row -->
					</div>
					<!-- end of container -->

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<img src="{{asset('images/1.png')}}" style="width:80%;height:80%;padding-left:35px;" class="img-width">
							</div>
							<div class="col-md-6">
								<div class="padding2">
									<h3 style="font-size:30px; font-weight: 900;padding-bottom: 10px;">Inzicht in besteldata</h3>
									<p style="font-size:20px;padding-bottom: 10px;">Door onxe calculatiescripts weten we prescies wanneer jij mort bestellen om te zorgen dat je niet zonder vooraad komt te zitten</p>
									<h4><a href="" style="color:#175ade;text-decoration: none;">Aanmelden > </a></h4>

								</div>
							</div>
							
						</div> <!--end of row-->	




						
					</div> <!--endof container-->



					<div class="container-fluid">
						<div class="row">

							<div class="col-md-6">
								<div class="padding3">
									<h3 style="font-size:30px; font-weight: 900;padding-bottom: 10px;">Inzicht in besteldata</h3>
									<p style="font-size:20px;padding-bottom: 10px;">Door onxe calculatiescripts weten we prescies wanneer jij mort bestellen om te zorgen dat je niet zonder vooraad komt te zitten</p>
									<h4><a href="" style="color:#175ade;text-decoration: none;">Aanmelden > </a></h4>

								</div>
							</div>
							<div class="col-md-6">
								<img src="{{asset('images/4.png')}}" style="width:80%;height:80%;padding-left:35px;" class="img-width">
							</div>
						</div> <!--end of row-->	


						
					</div> <!--endof container-->

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<img src="{{asset('images/2.png')}}" style="width:80%;height:80%;padding-left:35px;" class="img-width">
							</div>
							<div class="col-md-6">
								<div class="padding2">
									<h3 style="font-size:30px; font-weight: 900;padding-bottom: 10px;">Inzicht in besteldata</h3>
									<p style="font-size:20px;padding-bottom: 10px;">Door onxe calculatiescripts weten we prescies wanneer jij mort bestellen om te zorgen dat je niet zonder vooraad komt te zitten</p>
									<h4><a href="" style="color:#175ade;text-decoration: none;">Aanmelden > </a></h4>

								</div>
							</div>
							
						</div> <!--end of row-->	


						
					</div> <!--endof container-->

					<div class="container-fluid">
						<div class="row">

							<div class="col-md-6">
								<div class="padding3">
									<h3 style="font-size:30px; font-weight: 900;padding-bottom: 10px;">Inzicht in besteldata</h3>
									<p style="font-size:20px;padding-bottom: 10px;">Door onxe calculatiescripts weten we prescies wanneer jij mort bestellen om te zorgen dat je niet zonder vooraad komt te zitten</p>
									<h4><a href="" style="color:#175ade;text-decoration: none;">Aanmelden > </a></h4>

								</div>
							</div>
							<div class="col-md-6">
								<img src="{{asset('images/3.png')}}" style="width:80%;height:80%;padding-left:35px;" class="img-width">
							</div>
						</div> <!--end of row-->	


						
					</div> <!--endof container-->


					
					<div class="row" style="background-color: #175ade;padding-bottom: 60px;">
						<div class="container">
							<div class="col-md-12 text-center" style="padding-top:20px;padding-bottom: 40px;">
								<h3 style="color:#B6D4F9">Enkeele woodran wan</h3>
								<h1 style="color: white;">Ean aantle  van onze klanten</h1>
							</div>

							<div class="row">
								<div class="col-md-4" style="padding-bottom: 10px;">
									<div class="info">

										<p style="padding-bottom: 20px;line-height: 40px;"><img src="{{asset('images/quote.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-right:10px;">
											Super handage tool,zander bolstock zou ik  vell zaker  zander  voorraad zitten end zou me<img src="{{asset('images/quote2.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-left: 10px;"></p>

											<h5>-Dhr .Matti</h5>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info">
											<p style="padding-bottom: 20px;line-height: 40px;"><img src="{{asset('images/quote.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-right:10px;">Super handage tool,zander bolstock zou ik  vell zaker  zander  voorraad zitten end zou me<img src="{{asset('images/quote2.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-left: 10px;"></p>

											<h5>-Dhr .Matti</h5>
										</div>
									</div>

									<div class="col-md-4">
										<div class="info">
											<p style="padding-bottom: 20px;line-height: 40px;"><img src="{{asset('images/quote.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-right:10px;">Super handage tool,zander bolstock zou ik  vell zaker  zander  voorraad zitten end zou me<img src="{{asset('images/quote2.png')}}" alt="" class="img-responsive" width="40px" height="40px" style="display:inline-block;padding-left:10px;"></p>

											<h5>-Dhr .Matti</h5>
										</div>
									</div>
								</div>
								<!-- end of row -->
							</div>
							<!--end of container  -->
						</div>
						<!-- end of row -->

						<div class="row" style="padding-bottom: 60px;">
							<div class="container">
								<div class="col-md-12 text-center" style="padding-top:20px;padding-bottom: 40px;">
									<h3 style="color:#495ADF">100% transparante</h3>
									<h1 style="padding-bottom: 10px;font-size:30px; font-weight: 900;">Tarieven  voor jouw Business</h1>
								</div>
								<div class="row">
									<!-- code here -->

									<!-- Contenedor -->
									<div class="pricing-wrapper clearfix">

										<div class="pricing-table">
											<h3 class="pricing-title">ÉÉN TARIEF</h3>
											<div class="price">Per kwartaal een BTW-overzicht en maandelijks een Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodgedetailleerd winst/verliesoverzicht</div>
											<h3 class="pricing-title">$60.60/m</h3>
											<!-- Lista de Caracteristicas / Propiedades -->
											<ul class="table-list">
												<li>10 GB <span>De almacenamiento</span></li>
												<li>1 Dominio <span>incluido</span></li>
												<li>25 GB <span>De transferencia mensual</span></li>
												<li>Base de datos </li>
												<li>Cuentas de correo </li>
												<li>CPanel <span>incluido</span></li>
											</ul>
											<!-- Contratar / Comprar -->
											<div class="table-buy">
												<a href="#"	class="btn-table-custom" >Aanmelden</a>
											</div>
										</div>



									</div>
















								</div>
								<!-- end of row -->
							</div>
							<!--end of container  -->
						</div>
						<!-- end of row -->

						<div class="row" style="background-color: #175ADF;padding-bottom: 60px;">
							<div class="container">
								<div class="col-md-12 text-center" style="padding-top:20px;padding-bottom: 30px;">
									<h3 style="color:#ABD4FA">We beetanwoodran de</h3>
									<h1 style="color: white;">Ean aantle  van onze klanten</h1>
								</div>
								<div class="row">
									<div class="container">
										<div class="row">
											<div class="col-md-8  col-sm-8 col-xs-10 col-md-offset-3 col-xs-offset-1" >
												<div class="info2 padd3 padd3760">
													<h2 style="font-weight: 700;">Super handage tool,zander bolstock.?</h2>
													<p style="padding-bottom: 20px;font-size: 16px;">Super handage tool,zander bolstock zou ik  vell zaker  zander  voorraad zitten end zou me lroemlroem	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor incididunt ut</p>


												</div>
												<div class="info2 padd3 padd3760">
													<h2 style="font-weight: 700;">Super handage tool,zander bolstock..?</h2>
													<p style="padding-bottom: 20px;font-size: 16px;">Super handage tool,zander bolstock zou ik  vell zaker  zander  voorraad zitten end zou me
													lroemlroem Lorem ipsum dolor sit amet, consectetur adipisici</p>


												</div>
											</div>
										</div>
										<!-- end of row -->
									</div>
									<!-- end of container -->

								</div>
								<!-- end of row -->
							</div>
							<!--end of container  -->
						</div>
						<!-- end of row -->

						<div class="row" style="padding-bottom: 60px;">
							<div class="container">
								<div class="col-md-12 text-center" style="padding-top:20px;">
									<h3 style="color:#1769E5">Heb je een vraag?</h3>
									<h1 style="font-size:27px; font-weight: 600;">Neem Contact OOP</h1>
								</div>
								<div class="row">
									<div class="col-md-7 col-md-offset-3 ">
										<div class="info text-center form-pad">
											<form action="" method="POST" role="form">

												<div class="form-group">
													<label for=""></label>
													<input style="border:2px solid black;" type="text" class="form-control" id="" placeholder="Jouw naam">
												</div>
												<div class="form-group">
													<label for=""></label>
													<input style="border:2px solid black;" type="text" class="form-control" id="" placeholder="Jouw emailadres">
												</div>
												<div class="form-group">
													<br>
													<textarea style="border:2px solid black;padding-top: 20px;" name="" id="input" class="form-control" rows="3" required="required" placeholder="Jouw bericht..."></textarea>
												</div>

												
												<button style="background-color: #175ADF;border-color:#424242;padding: 20px 0px 20px 0px;font-weight: 600;" type="submit" class="btn btn-primary btn-block">Berischt Versutaren</button>
											</form>
										</div>
										
									</div>
									<!-- end of row -->
								</div>
							</div>
							<!--end of container  -->
						</div>
						<!-- end of row -->

						<div class="row" style="background-color: #175ADF;color:white;padding:20px 0px 20px 0px;">
							<div class="" style="text-align: center;">
								<span style="padding:20px 20px 20px 10px;font-size: 16px;">
									Copyright © 2019 BolBooks – Alle Rechten Voorbehouden
								</span>
							</div>	
						</div>


					</div>    <!--end of container fluid-->
					<script>
						var slider = document.getElementById("myRange");
						var output = document.getElementById("demo");
						output.innerHTML = slider.value;

						slider.oninput = function() {
							output.innerHTML = this.value;
						}
					</script>
				</body>
				</html>