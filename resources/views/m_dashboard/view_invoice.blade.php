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
		margin-bottom: 30px;
		border-bottom: 1px solid #cccccc;
		padding-bottom: 35px;
	}
</style>



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row" style="border-bottom: 1px solid gainsboro;padding-left: 13px;padding-bottom: 8px;margin-bottom: 15px">
					<div class="col-md-9" style="padding-top: 8px">
						<h5>Bekijk en download al jouw facturen.</h5>
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
					@foreach($payments as $payment)
						<div class="row">
							<div class="col-md-3">
								<div class="blue_div">
									Factuur {{$payment->id+172833}}
									<a href="{{route('download_invoice',$payment->id)}}" target="_blank">
										<i class="mdi mdi-download"></i>
									</a>
								</div>
							</div>

						</div>
						<div class="row custom_row">
							<div class="col-md-4" style="display: grid;">
								<span class="form_total1" >Factuur datum</span>
								<span class="regular_text">
									{{date('d-m-Y',strtotime($payment->createdAt))}}
								</span>
							</div>
							<div class="col-md-4" style="display: grid;">
								<span class="form_total1">Bedrag</span>
								<span class="regular_text">
									€ {{$payment->amount_val}}
								</span>
							</div>
							<div class="col-md-4" style="display: grid;">
								<span class="form_total1">Status</span>
								<span class="regular_text">
									@if($payment->status == 'paid')
										Betaald
									@elseif($payment->status == 'open')
										In afwachting
									@elseif($payment->status == 'canceled')
										Mislukt
									@endif
								</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>


	@endsection

