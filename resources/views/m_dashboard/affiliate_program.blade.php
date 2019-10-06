@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
		h4{
			font-size: 16px;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up)  */
	@media only screen and (min-width: 600px) {
		h4{
			font-size: 16px;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
		h4{
			font-size: 16px;
		}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
		h4{
			font-size: 16px;
		}
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		h4{
			font-size: 16px;
		}
	}
	.amount_div{
		position: relative;
	}
	.alert-info{
		color: #73777a;
		background-color: #f8fafb;
		border-color: #f5f7f9;
	}
	.btn-secondary, .btn-secondary.disabled{
		background: #727b84;
		border: 1px solid #727b84;
		color: white;
	}
	input{
		font-weight: 500 !important;
	}
	.custom-control{
		padding-left: 0.5rem;
	}
	.padding_top th{
		padding-top: 30px;
	}
	.blue_div{
		color: #175ade;
		margin-bottom: 14px;
		font-weight: 500;
	}
	.card-body .row{
		padding-left: 13px;
	}
	.modal-title{
		font-weight: 500;
	}
</style>

<div class="modal fade" id="account_iban" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin: 200px auto;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="vcenter">Account IBAN</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
					{{csrf_field()}}
					<div class="form-group">
						<input type="text" class="edit_field form-control" id="account_iban" name="account_iban" value="{{$data->account_iban}}" placeholder="Fill out your account IBAN No">
						<label style="font-size: 13px"><i>To change your voornaam, type your new voornaam above and press enter</i></label> 
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
					<div class="col-md-9" style="padding-top: 8px">
						<h4>Verdien maandelijks 20% van de betaling door klanten die jij ons aanlevert.
						</div>

					</div>

					@if(\Session::has('message'))
					<div class="alert alert-success alert-dismissible fade show">
						{!! \Session::get('message') !!}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					@if(\Session::has('error'))
					<div class="alert alert-danger alert-dismissible fade show">
						{!! \Session::get('error') !!}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					@if ($errors->any())
					<div class="alert alert-danger alert-dismissible fade show">
						@foreach ($errors->all() as $error)
						{{ $error }}
						@endforeach
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif

					<br/>
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
								<a data-toggle="modal" data-target="#account_iban" data-toggle="modal" data-target="#lastname" href="#lastname" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
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


	@endsection

