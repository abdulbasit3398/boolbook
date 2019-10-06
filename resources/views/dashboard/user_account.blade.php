@extends('layouts.app')


@section('main_content')

<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		.blue_div{
			background-color: blue;
	    width: 205px;
	    height: 205px;
	    color: white;
	    padding: 10px;
	    box-shadow: 1px 1px 4px 2px #888888;
	    margin-bottom: 10px;
		}
		.inner_blue_div{
			background-color: blue;
	    width: 185px;
	    height: 185px;
	    color: white;
	    border: 2px solid white;
	    font-size: 24px;
	    padding: 35px 5px 5px 5px;
	    font-weight: 500;
	    text-align: center;
		}
		.card_pading
		{
			padding-left: 0px;
		}
		.outer_row{
			font-size: small;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		.blue_div{
			background-color: blue;
	    width: 205px;
	    height: 205px;
	    color: white;
	    padding: 10px;
	    box-shadow: 1px 1px 4px 2px #888888;
	    margin-bottom: 10px;
		}
		.inner_blue_div{
			background-color: blue;
	    width: 185px;
	    height: 185px;
	    color: white;
	    border: 2px solid white;
	    font-size: 24px;
	    padding: 35px 5px 5px 5px;
	    font-weight: 500;
	    text-align: center;
		}
		.card_pading
		{
			padding-left: 0px;
		}
		.outer_row
		{
			font-size: small;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		.blue_div{
			background-color: blue;
	    width: 205px;
	    height: 205px;
	    color: white;
	    padding: 10px;
	    box-shadow: 1px 1px 4px 2px #888888;
	    margin-bottom: 10px;
		}
		.inner_blue_div{
			background-color: blue;
	    width: 185px;
	    height: 185px;
	    color: white;
	    border: 2px solid white;
	    font-size: 24px;
	    padding: 35px 5px 5px 5px;
	    font-weight: 500;
	    text-align: center;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		.blue_div{
			background-color: blue;
	    width: 207px;
	    height: 196px;
	    color: white;
	    padding: 10px;
	    box-shadow: 1px 1px 4px 2px #888888;
	    margin-bottom: 10px;
		}
		.inner_blue_div{
			background-color: blue;
	    width: 188px;
	    height: 174px;
	    color: white;
	    border: 2px solid white;
	    font-size: 23px;
	    padding: 45px 5px 5px 5px;
	    font-weight: 500;
	    text-align: center;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		.blue_div{
			background-color: blue;
			width: 248px;
			height: 235px;
			color: white;
			padding: 10px;
			box-shadow: 1px 1px 4px 2px #888888;
			margin-bottom: 10px;
		}
		.inner_blue_div{
			background-color: blue;
		    width: 225px;
		    height: 215px;
		    color: white;
		    border: 2px solid white;
		    font-size: 26px;
		    padding: 60px 5px 5px 5px;
		    font-weight: 500;
		    text-align: center;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
	}

</style>
<div class="row outer_row">

	<div class="grid-margin col-md-12">
		<div class="card" >
			<div class="card_pading card-body col-md-12">
				<div class="row" style="display: block;">
					<h2 style="color: blue"><b>ACCOUNT</b></h2>
					<span>Kies de optie waar jij naar opzoek bent.
					</span>
				</div>
				<br/><br/>
				<div class=" row">
					<div class="col-md-4">
						<a style="text-decoration: none;" href="{{route('edit_profile')}}"> 
							<div class="blue_div">
								<div class="inner_blue_div">
									EDIT<br/>PROFILE
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a style="text-decoration: none;" href="{{route('view_invoice')}}">
							<div class="blue_div">
								<div class="inner_blue_div">
									VIEW<br/>INVOICES
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<div class="blue_div">
							<div class="inner_blue_div">
								MANAGE SUBSCRIPTION
							</div>
						</div>
					</div>
				</div>
				<br/>
				<div class=" row">
					<div class="col-md-4">
						<a style="text-decoration: none;" href="{{route('bol_account_detail')}}">
							<div class="blue_div">
								<div class="inner_blue_div">
									BOL ACCOUNT<br/>DETAILS
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a style="text-decoration: none;" href="{{route('affiliate_program')}}">
							<div class="blue_div">
								<div class="inner_blue_div">
									AFFILIATE<br/>PROGRAM
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.th1
	{
		color: blue !important;
	}
</style>


@endsection