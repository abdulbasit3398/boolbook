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
					<h2 style="color: blue"><b>TAX REPORT</b></h2>
					<span>This report contains the information you have to fill out at the Belastingdienst.
					</span>

					<input type="hidden" name="firstQuarterM" id="firstQuarterM" value="{{$data['firstQuarterM']}}">
					<input type="hidden" name="firstQuarterY" id="firstQuarterY" value="{{$data['firstQuarterY']}}">

					<select class="custom-select" id="select_month" name="select_month" style="margin-top: 10px">
						<option value="{{$data['firstQuarterM'].$data['firstQuarterY']}}">
							Quarter <?= $data['firstQuarterNum']; ?>
						</option>
						<option value="{{$data['secondQuarterM'].$data['secondQuarterY']}}">
							Quarter <?= $data['secondQuarterNum']; ?>
						</option>
						<option value="{{$data['thirdQuarterM'].$data['thirdQuarterY']}}">
							Quarter <?= $data['thirdQuarterNum']; ?>
						</option>
						<option value="{{$data['fourthQuarterM'].$data['fourthQuarterY']}}">
							Quarter <?= $data['fourthQuarterNum']; ?>
						</option>
					</select>
				</div>
				<br/><br/><br/>
				<div class=" row">
					<div class="col-md-5">
						<div class="blue_div">
							Rubriek 1
						</div>
						<span style="margin-left: 20px">1a. Leveringen/diensten met hoog tarief</span>
					</div>
					<div class="col-md-4" style="display: grid;">
						<span class="form_total1">Bedrag Waarover wordt berekend</span>
						<span>€ <span id="turnover"></span></span>
					</div>
					<div class="col-md-3" style="display: grid;">
						<span class="form_total1">Omzetbelasting</span>
						<span>€ <span id="turnover_percent"></span></span>
					</div>
				</div>
				<br/><br/>
				<div class=" row">
					<div class="col-md-5">
						<div class="blue_div">
							Rubriek 5
						</div>
						<span style="margin-left: 20px">5b. Voorbelasting</span>
					</div>
					<div class="col-md-3" style="display: grid;">
						<span class="form_total1">Omzetbelasting</span>
						<span>€ <span id="all_costs_tax"></span></span>
					</div>
				</div>
				<br/><br/>
				<div class=" row">
					<div class="col-md-5">
						<div class="blue_div">
							Summary
						</div>
						<span style="margin-left: 20px">Amount to pay to the Beleastingdienst</span>
					</div>
					<div class="col-md-3" style="display: grid;">
						<span class="form_total1">Omzetbelasting</span>
						<span>€ <span id="amount_to_pay"></span></span>
					</div>
				</div>
				<br/>
				<div class="row" style="display: -webkit-box;">
					<div class="exclamation_div">
						<i class="fa fa-exclamation" aria-hidden="true"></i>
					</div>
					<span style="color: blue;font-weight: 500;font-size: unset;margin-left: 10px;margin-top: 4px;">Let op: bij de rubrieken die je niet ziet hoeft niets ingevuld te worden.</span>
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

<script>
$(document).ready(function(){

	var firstQuarterM = $('#firstQuarterM').val();
	var firstQuarterY = $('#firstQuarterY').val();
	$('#turnover').html('0.00');
	$('#turnover_percent').html('0.00');
	$('#all_costs_tax').html('0.00');
	$('#amount_to_pay').html('0.00');
	ajaxCall(firstQuarterM,firstQuarterY);

	$("#select_month").change(function(){
		var select_month_year = $(this).val();
		var month = select_month_year.substr(0,2);
		var year = select_month_year.substr(-4);
		var monthName = GetMonthName(month);

		$('#monthName').html(monthName);
		$('#year').html(year);
		ajaxCall(month,year);
	});
	function GetMonthName(monthNumber) {
		var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		return months[monthNumber - 1];
	}
	
	function ajaxCall(month,year)
	{
		var custom_cost = custom_cost_name = custom_cost_val = '';
		var first_revenue = second_revenue = third_revenue = totalTurnover = turnoverPercent = first_commission = first_compensation_lost_goods = first_compensation = first_correction_correction = first_logistical_charge = first_nck_stock = first_outbound = first_pick_pack = first_plaza_return_shipping_label = first_shipment_label = first_shipment_label_post = first_stock = second_commission = second_compensation_lost_goods = second_compensation = second_correction_correction = second_logistical_charge = second_nck_stock = second_outbound = second_pick_pack = second_plaza_return_shipping_label = second_shipment_label = second_shipment_label_post = second_stock = third_commission = third_compensation_lost_goods = third_compensation = third_correction_correction = third_logistical_charge = third_nck_stock = third_outbound = third_pick_pack = third_plaza_return_shipping_label = third_shipment_label = third_shipment_label_post = third_stock = set_correction_pick_pack = set_pick_pack = set_correction_outbound = set_outbound = set_commission = set_correction_commission = total_commission = total_shipment_label = total_plaza_return_shipping_label = total_pick_pack = total_outbound = total_stock = total_nck_stock = total_logistical_charge = total_correction_correction = total_custom_cost_tax = set_turnover = set_correction_turnover = 0;
		var month = month;
		var year = year;
		$.ajax({
			method: 'POST',
			url: '{{route("calculate_tax_report_quarterly")}}',
			data: {"_token": "{{ csrf_token() }}",month:month,year:year},
			async: false,
			success: function(response)
			{
				if(response.length != 0)
				{
					for(var i = 0; i < response['firstMonthCosts'].length; i++)
					{
						if(response['firstMonthCosts'][i]['cost_name'] == "TURNOVER")
						{
							var turnover_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var turnover_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_turnover = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
						{
							var correction_turnover_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var correction_turnover_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_correction_turnover = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "COMMISSION")
						{
							var commission_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var commission_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_commission = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
						{
							var correction_commission_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var correction_commission_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_correction_commission = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
						{
							var compensation_lost_goods_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var compensation_lost_goods_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "COMPENSATION")
						{
							var compensation_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var compensation_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
						{
							var correction_correction_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var correction_correction_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
						{
							var correction_outbound_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var correction_outbound_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_correction_outbound = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "OUTBOUND")
						{
							var outbound_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var outbound_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_outbound = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
						{
							var correction_pick_pack_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var correction_pick_pack_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_correction_pick_pack = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "PICK_PACK")
						{
							var pick_pack_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var pick_pack_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							set_pick_pack = 1;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
						{
							var logistical_charge_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var logistical_charge_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "NCK_STOCK")
						{
							var nck_stock_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var nck_stock_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
						{
							var plaza_return_shipping_label_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var plaza_return_shipping_label_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
						{
							var shipment_label_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var shipment_label_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
						{
							var shipment_label_post_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var shipment_label_post_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
						}
						if(response['firstMonthCosts'][i]['cost_name'] == "STOCK")
						{
							var stock_line_ext_val = response['firstMonthCosts'][i]['line_ext_val'];
							var stock_tax_amnt_val = response['firstMonthCosts'][i]['tax_amount_val'];
							first_stock = stock_line_ext_val + stock_tax_amnt_val;
						}
					}
					if(set_correction_turnover == 1 && set_turnover == 1)
					{
						var first_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
						set_correction_turnover = set_turnover = 0;
					}
					if(set_correction_commission == 1 && set_commission == 1)
					{
						first_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
						set_correction_commission = set_commission = 0;
					}
					if(set_correction_pick_pack == 1 && set_pick_pack == 1)
					{
						first_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
						set_correction_pick_pack = set_pick_pack = 0;
					}
					if(set_correction_outbound == 1 && set_outbound == 1)
					{
						first_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
						set_correction_outbound = set_outbound = 0;
					}

					for(var i = 0; i < response['secondMonthCosts'].length; i++)
					{
						if(response['secondMonthCosts'][i]['cost_name'] == "TURNOVER")
						{
							var turnover_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var turnover_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_turnover = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
						{
							var correction_turnover_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var correction_turnover_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_correction_turnover = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "COMMISSION")
						{
							var commission_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var commission_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_commission = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
						{
							var correction_commission_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var correction_commission_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_correction_commission = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
						{
							var compensation_lost_goods_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var compensation_lost_goods_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "COMPENSATION")
						{
							var compensation_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var compensation_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
						{
							var correction_correction_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var correction_correction_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
						{
							var correction_outbound_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var correction_outbound_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_correction_outbound = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "OUTBOUND")
						{
							var outbound_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var outbound_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_outbound = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
						{
							var correction_pick_pack_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var correction_pick_pack_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_correction_pick_pack = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "PICK_PACK")
						{
							var pick_pack_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var pick_pack_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							set_pick_pack = 1;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
						{
							var logistical_charge_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var logistical_charge_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "NCK_STOCK")
						{
							var nck_stock_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var nck_stock_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
						{
							var plaza_return_shipping_label_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var plaza_return_shipping_label_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
						{
							var shipment_label_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var shipment_label_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
						{
							var shipment_label_post_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var shipment_label_post_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
						}
						if(response['secondMonthCosts'][i]['cost_name'] == "STOCK")
						{
							var stock_line_ext_val = response['secondMonthCosts'][i]['line_ext_val'];
							var stock_tax_amnt_val = response['secondMonthCosts'][i]['tax_amount_val'];
							second_stock = stock_line_ext_val + stock_tax_amnt_val;
						}

					}
					if(set_correction_turnover == 1 && set_turnover == 1)
					{
						var second_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
						set_correction_turnover = set_turnover = 0;
					}
					if(set_correction_commission == 1 && set_commission == 1)
					{
						second_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
						set_correction_commission = set_commission = 0;
					}
					if(set_correction_pick_pack == 1 && set_pick_pack == 1)
					{
						second_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
						set_correction_pick_pack = set_pick_pack = 0;
					}
					if(set_correction_outbound == 1 && set_outbound == 1)
					{
						second_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
						set_correction_outbound = set_outbound = 0;
					}

					for(var i = 0; i < response['thirdMonthCosts'].length; i++)
					{
						if(response['thirdMonthCosts'][i]['cost_name'] == "TURNOVER")
						{
							var turnover_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var turnover_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_turnover = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_TURNOVER")
						{
							var correction_turnover_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var correction_turnover_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_correction_turnover = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "COMMISSION")
						{
							var commission_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var commission_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_commission = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_COMMISSION")
						{
							var correction_commission_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var correction_commission_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_correction_commission = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "COMPENSATION_LOST_GOODS")
						{
							var compensation_lost_goods_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var compensation_lost_goods_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "COMPENSATION")
						{
							var compensation_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var compensation_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_compensation = compensation_line_ext_val + compensation_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_CORRECTION")
						{
							var correction_correction_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var correction_correction_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_OUTBOUND")
						{
							var correction_outbound_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var correction_outbound_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_correction_outbound = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "OUTBOUND")
						{
							var outbound_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var outbound_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_outbound = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "CORRECTION_PICK_PACK")
						{
							var correction_pick_pack_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var correction_pick_pack_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_correction_pick_pack = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "PICK_PACK")
						{
							var pick_pack_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var pick_pack_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							set_pick_pack = 1;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "LOGISTICAL_CHARGE")
						{
							var logistical_charge_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var logistical_charge_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "NCK_STOCK")
						{
							var nck_stock_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var nck_stock_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "PLAZA_RETURN_SHIPPING_LABEL")
						{
							var plaza_return_shipping_label_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var plaza_return_shipping_label_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL")
						{
							var shipment_label_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var shipment_label_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "SHIPMENT_LABEL_POST")
						{
							var shipment_label_post_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var shipment_label_post_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
						}
						if(response['thirdMonthCosts'][i]['cost_name'] == "STOCK")
						{
							var stock_line_ext_val = response['thirdMonthCosts'][i]['line_ext_val'];
							var stock_tax_amnt_val = response['thirdMonthCosts'][i]['tax_amount_val'];
							third_stock = stock_line_ext_val + stock_tax_amnt_val;
						}

					}
					if(set_correction_turnover == 1 && set_turnover == 1)
					{
						var third_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
						set_correction_turnover = set_turnover = 0;
					}
					if(set_correction_commission == 1 && set_commission == 1)
					{
						third_commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
						set_correction_commission = set_commission = 0;
					}
					if(set_correction_pick_pack == 1 && set_pick_pack == 1)
					{
						third_pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
						set_correction_pick_pack = set_pick_pack = 0;
					}
					if(set_correction_outbound == 1 && set_outbound == 1)
					{
						third_outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
						set_correction_outbound = set_outbound = 0;
					}

					for(var i = 0; i < response['firstMonthCustomCosts'].length; i++)
					{
						total_custom_cost_tax += response['firstMonthCustomCosts'][i]['tax_amount_val'];
					}
					for(var i = 0; i < response['secondMonthCustomCosts'].length; i++)
					{
						total_custom_cost_tax += response['secondMonthCustomCosts'][i]['tax_amount_val'];
					}
					for(var i = 0; i < response['thirdMonthCustomCosts'].length; i++)
					{
						total_custom_cost_tax += response['thirdMonthCustomCosts'][i]['tax_amount_val'];
					}

					totalTurnover = first_revenue + second_revenue + third_revenue;
					$('#turnover').html(Math.floor(totalTurnover));
					turnoverPercent = (totalTurnover/121)*21;
					$('#turnover_percent').html(Math.floor(turnoverPercent));

					total_commission = first_commission + second_commission + third_commission;
					total_commission = (total_commission/121)*21;

					total_shipment_label = first_shipment_label + second_shipment_label + third_shipment_label;
					total_shipment_label = (total_shipment_label/121)*21;

					total_plaza_return_shipping_label = first_plaza_return_shipping_label + second_plaza_return_shipping_label + third_plaza_return_shipping_label;
					total_plaza_return_shipping_label = (total_plaza_return_shipping_label/121)*21;

					total_pick_pack = first_pick_pack + second_pick_pack + third_pick_pack;
					total_pick_pack = (total_pick_pack/121)*21;

					total_outbound = first_outbound + second_outbound + third_outbound;
					total_outbound = (total_outbound/121)*21;

					total_stock = first_stock + second_stock + third_stock;
					total_stock = (total_stock/121)*21;

					total_nck_stock = first_nck_stock + second_nck_stock + third_nck_stock;
					total_nck_stock = (total_nck_stock/121)*21;

					total_logistical_charge = first_logistical_charge + second_logistical_charge + third_logistical_charge;
					total_logistical_charge = (total_logistical_charge/121)*21;

					total_correction_correction = first_correction_correction + second_correction_correction + third_correction_correction;
					total_correction_correction = (total_correction_correction/121)*21;

					total_costs_tax = total_commission + total_shipment_label + total_plaza_return_shipping_label + total_pick_pack + total_outbound +total_stock + total_nck_stock + total_logistical_charge + total_correction_correction;

					$('#all_costs_tax').html(Math.floor(total_custom_cost_tax+total_costs_tax));
					$('#amount_to_pay').html(Math.floor(turnoverPercent-(total_custom_cost_tax+total_costs_tax)));
				}
				
				console.log(response);
			}

		});
}
});
</script>

@endsection