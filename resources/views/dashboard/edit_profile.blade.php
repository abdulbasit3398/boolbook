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
</style>
<div class="row outer_row">

<!-- Modal First Name -->
<div class="modal fade" id="firstname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT FIRSTNAME</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="first_name" name="first_name" value="{{$data->name}}" placeholder="Fill out your first name">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Last Name -->
<div class="modal fade" id="lastname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT LASTNAME</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="last_name" name="last_name" value="{{$data->last_name}}" placeholder="Fill out your last name">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Street Name and Number -->
<div class="modal fade" id="streetname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT STREET NAME AND HOUSE NO</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="street_name" name="street_name" value="{{$data->street_name}}" placeholder="Fill out your street name">
        	</div>
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="house_no" name="house_no" value="{{$data->house_no}}" placeholder="Fill out your house no">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal City Name -->
<div class="modal fade" id="residence_modal" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT CITY</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="residence" name="residence" value="{{$data->residence}}" placeholder="Fill out your city name">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Post Code -->
<div class="modal fade" id="postcode" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT POST CODE</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="post_code" name="post_code" value="{{$data->post_code}}" placeholder="Fill out your city name">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Company Name -->
<div class="modal fade" id="companyname" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT COMPANY NAME</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="company_name" name="company_name" value="{{$data->company_name}}" placeholder="Fill out your company name">
        	</div>
        	<input type="submit" class="btn btn-default btn-save" name="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal VAT Number -->
<div class="modal fade" id="vatnumber" tabindex="-1" role="dialog" aria-labelledby="firstnamelabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 200px auto;">
    <div class="modal-content">
      <div class="modal-body">
        <h2 style="color: blue"><b>EDIT VAT NUMBER</b></h2>
        <form method="post" class="col-md-12" action="{{route('update_profile')}}" style="margin: 40px 0px 25px 0px;">
        	{{csrf_field()}}
        	<div class="form-group">
	        	<input type="text" class="edit_field form-control" id="vat_number" name="vat_number" value="{{$data->vat_number}}" placeholder="Fill out your VAT Number">
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
					<h2 style="color: blue"><b>EDIT PROFILE</b></h2>
					<span>jouw gegevens aanpassen. Let op, deze zijn ook zichtbaar op je factuur.
					</span>
				</div>
				<br/><br/>
				<div class="row">
					<div class="col-md-5">
						<div class="blue_div">
							Persoonsgegevens
						</div>
					</div>
				</div>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Jouw voornaam</span>
						<span>
							{{$data->name}}
							<img data-toggle="modal" data-target="#firstname" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1">Jouw achternaam</span>
						<span>
							{{$data->last_name}}
							<img data-toggle="modal" data-target="#lastname" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
				</div>
				<br/><br/>
				<div class="row">
					<div class="col-md-5">
						<div class="blue_div">
							(Benrijfs)adres
						</div>
					</div>
				</div>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Straatnaam + Huisnummer</span>
						<span>
							{{$data->street_name.' '.$data->house_no}}
							<img data-toggle="modal" data-target="#streetname" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
				</div>
				<br/><br/>
				<div class=" row">
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1" >Plaatsnaam</span>
						<span>
							{{$data->residence}}
							<img data-toggle="modal" data-target="#residence_modal" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1">Postcode</span>
						<span>
							{{$data->post_code}}
							<img data-toggle="modal" data-target="#postcode" src="{{asset('images/pencil.png')}}" class="pencil">
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
							<img data-toggle="modal" data-target="#companyname" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
					</div>
					<div class="col-md-5" style="display: grid;">
						<span class="form_total1">BTW-Nummer</span>
						<span>
							{{$data->vat_number}}
							<img data-toggle="modal" data-target="#vatnumber" src="{{asset('images/pencil.png')}}" class="pencil">
						</span>
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