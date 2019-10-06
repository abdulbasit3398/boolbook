@extends('layouts.app')


@section('main_content')

<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		.pencil{
			width: 14px;
			margin-left: 5px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
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
		.form_total1{
			font-size: small;
			font-weight: 600;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
		.pencil{
			width: 14px;
			margin-left: 5px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
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
		.form_total1{
			font-size: small;
			font-weight: 600;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		.pencil{
			width: 18px;
			margin-left: 10px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_total1{
			margin-bottom: 10px;
			font-size: 17px;
			font-weight: 600;
		}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		.pencil{
			width: 18px;
			margin-left: 10px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
			width: 660px;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_total1{
			margin-bottom: 10px;
			font-size: 17px;
			font-weight: 600;
		}
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		.pencil{
			width: 18px;
			margin-left: 10px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
			width: 660px;
		}
		.card_pading
		{
			padding-left:45px !important;
		}
		.outer_row{
			font-size: large;
		}
		.form_total1{
			margin-bottom: 10px;
			font-size: 17px;
			font-weight: 600;
		}
	}
	.blue_div{
		background-color: blue;
		width: 208px;
		height: 40px;
		color: white;
		padding-left: 25px;
		padding-top: 6px;
		font-size: unset;
		margin-bottom: 20px;
	}
	.edit_field{
		border-radius: 10px;
		background-color: blue;
		border: 1px solid blue;
		color: white;
		font-size: 16px;
		font-weight: 500;
	}
	.btn-save{
		border: 3px solid blue;
		border-radius: 25px;
		color: blue;
		font-size: 16px;
		font-weight: 500;
		padding: 10px 26px;
	}
	.edit_field::placeholder{
		color: white;
	}
	.form-control:focus
	{
		color: white;
		background-color: blue;
	}
	.btn-save:hover{
		color: white;
		background-color: blue;
	}
	.download_icon{
		width: 22px;
		margin-right: 10px;
	}
	a{
		text-decoration: none !important;
	}
	.custom_row{
		margin-bottom: 30px;
		border-bottom: 1px solid #cccccc;
		padding-bottom: 35px;
	}
</style>
<div class="row outer_row">
	<div class="grid-margin col-md-12">
		<div class="card" >
			<div class="card_pading card-body col-md-12">
				<div class="row" style="display: block;">
					<h2 style="color: blue"><b>INVOICES</b></h2>
					<span>Bekijk en download al jouw facturen.
					</span>
				</div>
				<br/><br/>
				@foreach($payments as $payment)
				<div class="row">
					<div class="col-md-3">
						<div class="blue_div">
							Factuur {{$payment->id+172833}}
						</div>
					</div>
					<div class="col-md-3">
						<a href="{{route('download_invoice',$payment->id)}}" target="_blank">
							 
							<img class="download_icon" src="{{asset('images/download.png')}}">
							downloaden
						</a>
					</div>
				</div>
				<div class="row custom_row">
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1" >Factuur datum</span>
						<span>
							{{date('d-m-Y',strtotime($payment->createdAt))}}
						</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Bedrag</span>
						<span>
							{{$payment->amount_val}}
						</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Status</span>
						<span>
							{{$payment->status}}
						</span>
					</div>
				</div>
				@endforeach

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