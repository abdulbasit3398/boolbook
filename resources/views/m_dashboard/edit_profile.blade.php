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
  .modal-title{
  	font-weight: 500;
  }
</style>

<!-- Modal First Name -->
<div class="modal fade" id="firstname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
        <h4 class="modal-title" id="vcenter">Voornaam bewerken</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}

        	<div class="form-group">
	        	<input class="form-control" type="text" class="edit_field form-control" id="name" name="name" value="{{$data->name}}" >
	        	<label style="font-size: 13px"><i>Typ je voornaam hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Last Name -->
<div class="modal fade" id="lastname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
        <h4 class="modal-title" id="vcenter">Achternaam bewerken</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="last_name" name="last_name" value="{{$data->last_name}}" >
	        	<label style="font-size: 13px"><i>Typ je achternaam hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Street Name  -->
<div class="modal fade" id="streetname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">Straatnaam bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="street_name" name="street_name" value="{{$data->street_name}}" >
	        	<label style="font-size: 13px"><i>Typ je straatnaam hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Street Number -->
<div class="modal fade" id="houseno" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">Huisnummer bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}

        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" name="house_no" value="{{$data->house_no}}" >
	        	<label style="font-size: 13px"><i>Typ je huisnummer hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal City Name -->
<div class="modal fade" id="residence_modal" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">Woonplaats bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="residence" name="residence" value="{{$data->residence}}" >
	        	<label style="font-size: 13px"><i>Typ je woonplaats hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Post Code -->
<div class="modal fade" id="postcode" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">Postcode bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="post_code" name="post_code" value="{{$data->post_code}}" >
	        	<label style="font-size: 13px"><i>Typ je postcode hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Company Name -->
<div class="modal fade" id="companyname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">Bedrijfsnaam bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="company_name" name="company_name" value="{{$data->company_name}}" >
	        	<label style="font-size: 13px"><i>Typ je bedrijfsnaam hierboven en druk vervolgens op enter</i></label> 
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal VAT Number -->
<div class="modal fade" id="vatnumber" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
    	<div class="modal-header">
	      <h4 class="modal-title" id="vcenter">BTW-Nummer bewerken</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  	</div>
      <div class="modal-body">
        <h2 style="color: blue"><b></b></h2>
        <form method="post" class="col-md-12 form-material" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="vat_number" name="vat_number" value="{{$data->vat_number}}" >
	        	<label style="font-size: 13px"><i>Typ je BTW-nummer hierboven en druk vervolgens op enter</i></label> 
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
						<h5>Jouw gegevens aanpassen. Let op, deze zijn ook zichtbaar op je factuur.</h5>
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
								Persoonsgegevens
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1" >Jouw voornaam</span>
							<span>
								{{$data->name}}
								<a data-toggle="modal" data-target="#firstname" href="#firstname" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1">Jouw achternaam</span>
							<span>
								{{$data->last_name}}
								<a data-toggle="modal" data-target="#lastname" data-toggle="modal" data-target="#lastname" href="#lastname" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-5">
							<div class="blue_div">
								(Bedrijfs)adres
							</div>
						</div>
					</div>
					<div class=" row">
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1" >Straatnaam</span>
							<span>
								{{$data->street_name}}
								<a data-toggle="modal" data-target="#streetname" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                				</a>
							</span>
						</div>
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1" >Huisnummer</span>
							<span>
								{{$data->house_no}}
								<a data-toggle="modal" data-target="#houseno" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                				</a>
							</span>
						</div>
					</div>
					<br/><br/>
					<div class=" row">
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1" >Woonplaats</span>
							<span>
								{{$data->residence}}
								<a data-toggle="modal" data-target="#residence_modal" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1">Postcode</span>
							<span>
								{{$data->post_code}}
								<a data-toggle="modal" data-target="#postcode" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-5">
							<div class="blue_div">
								Bedrijfsgegevens
							</div>
						</div>
					</div>
					<div class=" row">
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1">Bedrijfsnaam</span>
							<span>
								{{$data->company_name}}
								<a data-toggle="modal" data-target="#companyname" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
						<div class="col-md-5" style="display: grid;">
							<span class="form_total1">BTW-Nummer</span>
							<span>
								{{$data->vat_number}}
								<a data-toggle="modal" data-target="#vatnumber" data-toggle="modal" data-toggle="tooltip" data-original-title="Edit"> <i class="mdi mdi-pencil-circle text-inverse"></i> 
                </a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@endsection

