@extends('layouts.m_app')


@section('main_content')
<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {

		.exclamation_p{
			width: 84%;
			font-weight: 300;
			font-size: 14px;
			margin-left: 10px;
			padding-top: 5px;
			color: #6d6d6d;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up)  */
	@media only screen and (min-width: 600px) {

		.exclamation_p{
			width: 84%;
			font-weight: 300;
			font-size: 14px;
			margin-left: 10px;
			padding-top: 5px;
			color: #6d6d6d;
		}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {

		.exclamation_p{
			width: 100%;
			font-weight: 300;
			font-size: 14px;
			margin-left: 10px;
			padding-top: 5px;
			color: #6d6d6d;
		}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {

		.exclamation_p{
			width: 100%;
			font-weight: 300;
			font-size: 14px;
			margin-left: 10px;
			padding-top: 5px;
			color: #6d6d6d;
		}
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
		
		.exclamation_p{
			width: 100%;
			font-weight: 300;
			font-size: 14px;
			margin-left: 10px;
			padding-top: 5px;
			color: #6d6d6d;
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

	.mdi-alert-circle{
		color: #67757c;
		font-size: 20px;
	}
</style>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
					<div class="col-md-9" style="padding-top: 8px">
						<h5>Deze Client ID gebruiken we voor het ophalen van jouw gegevens.</h5>
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
								Jouw API Key
							</div>
						</div>
					</div>
					<div class=" row">
						
						<div class="col-md-6">
							<span class="form_total1">Client ID</span>
							<br/>
							<span>{{$data->client_id}}</span>
						</div>
						<div class="col-md-6">
							<span class="form_total1">Secret ID</span>
							<br/>
							<span>Om veiligheidsredenen niet zichtbaar.</span>
						</div>
					</div>
					<br/>
					<div class="row" style="display: -webkit-box;padding-left: 25px">
						<div class="exclamation_div">
							<i class="mdi mdi-alert-circle" aria-hidden="true"></i>
						</div>
						<p class="exclamation_p"><i>We kunnen jouw API Keys niet aanpassen. Mocht je willen veranderen dan raden we je aan een nieuw account te openen.</i></p>
					</div>
				</div>
			</div>
		</div>
	</div>


	@endsection

