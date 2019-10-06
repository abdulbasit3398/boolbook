@extends('layouts.app')


@section('main_content')

<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
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
		.pencil{
			width: 14px;
			margin-left: 5px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
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
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
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
		.pencil{
			width: 14px;
			margin-left: 5px;
		}
		.modal-content{
			text-align: center;
			padding: 20px 10px 20px 10px;
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
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
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
		width: fit-content;
		height: 40px;
		color: white;
		font-size: unset;
		margin-bottom: 20px;
		padding: 6px 25px 0px 25px;
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
</style>
<div class="row outer_row">

	<!-- Modal First Name -->
	<div class="modal fade" id="account_iban" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="margin: 200px auto;">
			<div class="modal-content">
				<div class="modal-body">
					<h2 style="color: blue"><b>Account IBAN</b></h2>
					<form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" class="edit_field form-control" id="account_iban" name="account_iban" value="{{$data->account_iban}}" placeholder="Fill out your account IBAN No">
						</div>
						<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="grid-margin col-md-12">
		<div class="card" >
			<div class="card_pading card-body col-md-12">
				<div class="row" style="display: block;">
					<h2 style="color: blue"><b>AFFILIATE PROGRAM</b></h2>
					<span>Wij staan altijd open voor nieuwe klanten en als jij ons daarbij helpt willen weje daar graag voor belonen! Van elke klant die jij bij ons aanlevert ontvang je 20% van het maandelijkse betalingsbedrag. Gebruik hiervoor jouw persooniijke link.
					</span>
				</div>
				<br/><br/>
				<div class="row">
					<div class="col-md-5">
						<div class="blue_div">
							Jouw Affiliate-gegevens
						</div>
					</div>
				</div>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Jouw persoonlijke Affilliate link</span>
						<span>
							{{ Auth::user()->referral_link }}
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1">Jouw IBAN-nummer voor betalingen</span>
						<span>
							{{($data->account_iban == '') ? 'Enter your Account IBAN' : $data->account_iban }}
							<img data-toggle="modal" data-target="#account_iban" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
				</div>
				<br/>
				<div class="row" style="display: -webkit-box;">
					<div class="exclamation_div">
						<i class="fa fa-exclamation" aria-hidden="true"></i>
					</div>
					<p style="color: blue;font-weight: 500;font-size: unset;margin-left: 10px;">Maandelijkse uitbetaling tussen de 1* en de 10* van de maand.</p>
				</div>
				<br/>
				<div class="row">
					<div class="col-md-5">
						<div class="blue_div">
							Jouw resultaat
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7" style="display: grid;">
						<span>This is your affiliate result of {{$affiliate_data['current_month'].' '.$affiliate_data['current_year']}} so far.</span>
					</div>
				</div>
				<br/>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Totaal aantal aangeleverde klanten</span>
						<span>
							{{ count(Auth::user()->referrals)  ?? '0' }}
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Totaal ontvangen bedrag</span>
						<span>
							{{$affiliate_data['amount_referrals_paid_to_company_this_month']}}
						</span>
					</div>
				</div>
				<br/><br/>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Aantal nieuwe klanten deze maand</span>
						<span>
							{{$affiliate_data['referrals_this_month']}}
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1">Jouw uitbetaling op ditmoment</span>
						<span>
							{{$affiliate_data['payout_amount_in_this_month']}}
						</span>
					</div>
				</div>
				<br/><br/>
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