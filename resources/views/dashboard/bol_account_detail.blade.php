@extends('layouts.app')


@section('main_content')

<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		h2{
			font-size: 1.5rem !important;
		}
		.exclamation_div
		{
			width: 25px;
			height: 25px;
			border: 1px solid blue;
			border-radius: 25px;
			padding-left: 9px;
			padding-top: 3px;
			color: blue;
		}
		.custom-select
		{
			clear: both;
		}
		.card_pading
		{
			padding-left: 0px;
		}
		.outer_row{
			font-size: small;
		}
		.form_value{
			font-size: small;
			font-weight: 500;
			float: right;
		}
		.form_total1{
			font-size: small;
			font-weight: 600;
			float: right;
		}
		.val_name span{
			font-size: small;
			margin: 0px;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		h2{
			font-size: 1.5rem !important;
		}
		.exclamation_div
		{
			width: 25px;
			height: 25px;
			border: 1px solid blue;
			border-radius: 25px;
			padding-left: 9px;
			padding-top: 3px;
			color: blue;
		}
		.custom-select
		{
			clear: both;
		}
		.card_pading
		{
			padding-left: 0px;
		}
		.outer_row
		{
			font-size: small;
		}
		.form_value{
			font-size: small;
			font-weight: 500;
			float: right;
		}
		.form_total1{
			font-size: small;
			font-weight: 600;
			float: right;
		}
		.val_name span{
			font-size: small;
			margin: 0px;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		h2{
			font-size: 1.5rem !important;
		}
		.exclamation_div
		{
			width: 30px;
			height: 30px;
			border: 1px solid blue;
			border-radius: 25px;
			padding-left: 11px;
			padding-top: 2px;
			color: blue;
			font-size: medium;
		}
		.custom-select
		{
			float: right; 
			width: 200px; 
			clear: both;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_value{
			font-size: 17px;
			font-weight: 500;
			margin: 0px;
			float: right;
		}
		.form_total1{
			margin-bottom: 20px;
			font-size: 17px;
			font-weight: 600;
		}
		.val_name span{
			font-size: 17px;
			margin: 0px;
		}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		.exclamation_div
		{
			width: 30px;
			height: 30px;
			border: 1px solid blue;
			border-radius: 25px;
			padding-left: 11px;
			padding-top: 2px;
			color: blue;
			font-size: medium;
		}
		.custom-select
		{
			float: right; 
			width: 200px; 
			clear: both;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_value{
			font-size: 17px;
			font-weight: 500;
			margin: 0px;
			float: right;
		}
		.form_total1{
			margin-bottom: 20px;
			font-size: 17px;
			font-weight: 600;
		}
		.val_name span{
			font-size: 17px;
			margin: 0px;
		}
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		.exclamation_div
		{
			width: 30px;
			height: 30px;
			border: 1px solid blue;
			border-radius: 25px;
			padding-left: 11px;
			padding-top: 2px;
			color: blue;
			font-size: medium;
		}
		.custom-select
		{
			float: right; 
			width: 200px; 
			clear: both;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_value{
			font-size: 17px;
			font-weight: 500;
			margin: 0px;
			float: right;
		}
		.form_total1{
			margin-bottom: 20px;
			font-size: 17px;
			font-weight: 600;
		}
		.val_name span{
			font-size: 17px;
			margin: 0px;
		}
	}
	.blue_div{
		background-color: blue;
		width: 208px;
		height: 40px;
		color: white;
		padding-left: 25px;
		padding-top: 3px;
		font-size: x-large;
		margin-bottom: 20px
	}
	
	.custom_hr{
		margin-top: 1rem;
		margin-bottom: 1rem;
		border: 0;
		border-top: 1px solid blue;
	}

</style>
<div class="row outer_row">

	<div class="grid-margin col-md-12">
		<div class="card" >
			<div class="card_pading card-body col-md-12">
				<div class="row" style="display: block;">
					<h2 style="color: blue"><b>BOL ACCOUNT DETAILS</b></h2>
					<span>Bekijk de Client ID die we gebr uiken voor het ophalen jouw. Orn veiligheidsredenen vragen we je orn de Secret ID in je verkoper saccount bol.com te bekijken.
					</span>
				</div>
				
				<div class=" row" style="display: block;">
					<div class="col-md-5">
						<div class="blue_div">
							Jouw API Key
						</div>
					</div>
					<div class="col-md-7">
						<span><b>Client ID</b></span>
						<br/>
						<span>{{$data->client_id}}</span>
					</div>
				</div>
				<br/>
				<div class="row" style="display: -webkit-box;">
					<div class="exclamation_div">
						<i class="fa fa-exclamation" aria-hidden="true"></i>
					</div>
					<p style="color: blue;font-weight: 500;font-size: unset;margin-left: 10px;">We kunnen jouw API Keys niet aanpassen. Mocht je willen veranderen dan raden we je aan een nieuw account te openen.</p>
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