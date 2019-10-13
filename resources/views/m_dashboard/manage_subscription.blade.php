@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
	
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

	.mdi-download{
		color: #175ade;
		font-size: 20px;
		margin-left: 5px;
	}
	.custom_row{
		margin-bottom: 10px;
		padding-bottom: 10px;
	}
	.arrow_right:hover, .arrow_right:hover i{
		color: #175ade;
	}
	.mdi-arrow-right-drop-circle-outline{
		font-size: 16px;
	}
	.arrow_right{
		font-size: 14px;
	    font-weight: 400;
	    color: #34373c;
	}
</style>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
					<div class="col-md-9" style="padding-top: 8px">
						<h5>Beheer jouw abbonement bij Bolbooks.</h5>
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
					<div class="col-md-3">
						<div class="blue_div">
							Jouw abbonement
						</div>
					</div>

				</div>
				<div class="row custom_row">
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1" >Maandelijks bedrag</span>
						<span class="regular_text">
							{{$data['amount_val']}}
						</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Volgende afschrijving</span>
						<span class="regular_text">
							{{$data['next_payment_date']}}
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<a class="arrow_right" href="{{route('view_invoice')}}">
							Alle afschrijvingen bekijken&nbsp;&nbsp;
							<i class="mdi mdi-arrow-right-drop-circle-outline"></i>
						</a>
					</div>

				</div>

				<br/>
				<br/>
				<br/>
				<div class="row">
					<div class="col-md-3">
						<div class="blue_div">
							Jouw betaalgegevens
						</div>
					</div>

				</div>
				<div class="row custom_row">
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1" >Betalingswijze</span>
						<span class="regular_text">
							{{$data['method']}}
						</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Rekeningnummer</span>
						<span class="regular_text">
							{{$data['consumerAccount']}}
						</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Op naam van</span>
						<span class="regular_text">
							{{$data['consumerName']}}
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<a href="#" class="arrow_right">Betalingswijze veranderen&nbsp;&nbsp;
							<i class="mdi mdi-arrow-right-drop-circle-outline"></i>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#" class="arrow_right">Abonnement opzeggen &nbsp;&nbsp;
							<i class="mdi mdi-arrow-right-drop-circle-outline"></i>
						</a>
					</div>
				</div>
				<br/>
				<br/>
				<br/>
			</div>
		</div>
	</div>


	@endsection

