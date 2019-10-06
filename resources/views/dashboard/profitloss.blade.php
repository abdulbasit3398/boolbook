@extends('layouts.app')


@section('main_content')
<?php 
$current_month_year = $data['invoice_for_year'].$data['invoice_for_month'];
$previous_month_num = $previous_month_name = $previous_year = [];
	// var_dump($data['invoice_for_month']);
	// die();
$date = DateTime::createFromFormat("Ym", $current_month_year);

$invoice_for_month = $data['invoice_for_month'];
$invoice_for_year = $data['invoice_for_year'];
$dateObj = DateTime::createFromFormat('!m', $invoice_for_month);
$invoice_for_month_name = $dateObj->format('F');

for($i=0; $i<=11; $i++)
{
	$date = $date->format('Y-m-d h:i:s');
	$date = date("Y-m-01", strtotime($date));
	$date = DateTime::createFromFormat("Y-m-d", $date);
	$date->modify('-1 DAYS');
	$previous_month_num[$i] = $date->format("m");
	$previous_year[$i] = $date->format("Y");
	$dateObj = DateTime::createFromFormat('!m', $previous_month_num[$i]);
	$previous_month_name[$i] = $dateObj->format('F');
		// echo $previous_month_num[$i]."<br>";
		// echo $previous_month_name[$i]."<br>";
		// echo $previous_year[$i]."<br>";
		// $interval = new DateInterval("P".$i."M");
		// var_dump($interval);
		// $MonthsEarlier = $date->sub($interval);
		// var_dump($MonthsEarlier);
		// $date=date_create("2013-03-31");
		// date_add($date,date_interval_create_from_date_string("30 days"));
		// echo date_format($date,"Y-m-d");
		// $date = new DateTime('now');
		// $date->modify('-15 DAYS'); 
		// $date = $date->format('Y-m-d h:i:s');
		// echo $date;
		// echo date("Y-m-01", strtotime($date));
		// echo date('d',strtotime(date("Y-m-01", strtotime($date))));
	
		// $previous_year[$i] = $MonthsEarlier->format("Y");
		// $previous_month_num[$i] = $MonthsEarlier->format("m");

		// $dateObj = DateTime::createFromFormat('!m', $previous_month_num[$i]);
		// $previous_month_name[$i] = $dateObj->format('F');
	
}
// 	$set_correction_pick_pack = $set_pick_pack = $set_correction_outbound = $set_outbound = $set_turnover = $set_correction_turnover = $set_correction_commission = $set_commission = $total_costs = 0;
// 	// var_dump($data['all_costs']);
// 	if($data['all_costs'][0]->for_month)
// 	{
// 		$month = $data['all_costs'][0]->for_month;
// 		$year = $data['all_costs'][0]->for_year;
// 		$dateObj   = DateTime::createFromFormat('!m', $month);
// 		$monthName = $dateObj->format('F');
// 	}

// 	for($i = 0; $i<count($data['all_costs']); $i++)
// 	{
// 		if($data['all_costs'][$i]->cost_name == 'CORRECTION_CORRECTION')
// 		{
// 			$correction_correction_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$correction_correction_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$correction_correction = $correction_correction_line_ext_val + $correction_correction_tax_amnt_val;
// 			$total_costs += $correction_correction;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'SHIPMENT_LABEL_POST')
// 		{
// 			$shipment_label_post_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$shipment_label_post_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$shipment_label_post = ($shipment_label_post_line_ext_val + $shipment_label_post_tax_amnt_val);
// 			$total_costs += $shipment_label_post;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'SHIPMENT_LABEL')
// 		{
// 			$shipment_label_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$shipment_label_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$shipment_label = ($shipment_label_line_ext_val + $shipment_label_tax_amnt_val);
// 			$total_costs += $shipment_label;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'CORRECTION_PICK_PACK')
// 		{
// 			$correction_pick_pack_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$correction_pick_pack_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_correction_pick_pack = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'PICK_PACK')
// 		{
// 			$pick_pack_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$pick_pack_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_pick_pack = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'CORRECTION_OUTBOUND')
// 		{
// 			$correction_outbound_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$correction_outbound_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_correction_outbound = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'OUTBOUND')
// 		{
// 			$outbound_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$outbound_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_outbound = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'STOCK')
// 		{
// 			$stock_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$stock_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$stock = $stock_line_ext_val + $stock_tax_amnt_val;
// 			$total_costs += $stock;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'NCK_STOCK')
// 		{
// 			$nck_stock_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$nck_stock_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$nck_stock = $nck_stock_line_ext_val + $nck_stock_tax_amnt_val;
// 			$total_costs += $nck_stock;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'COMPENSATION_LOST_GOODS')
// 		{
// 			$compensation_lost_goods_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$compensation_lost_goods_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$compensation_lost_goods = $compensation_lost_goods_line_ext_val + $compensation_lost_goods_tax_amnt_val;
// 			$total_costs += $compensation_lost_goods;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'COMPENSATION')
// 		{
// 			$compensation_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$compensation_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$compensation = $compensation_line_ext_val + $compensation_tax_amnt_val;
// 			$total_costs += $compensation;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'CORRECTION_TURNOVER')
// 		{
// 			$correction_turnover_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$correction_turnover_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_correction_turnover = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'TURNOVER')
// 		{
// 			$turnover_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$turnover_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_turnover = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'CORRECTION_COMMISSION')
// 		{
// 			$correction_commission_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$correction_commission_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_correction_commission = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'COMMISSION')
// 		{
// 			$commission_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$commission_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$set_commission = 1;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'PLAZA_RETURN_SHIPPING_LABEL')
// 		{
// 			$plaza_return_shipping_label_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$plaza_return_shipping_label_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$plaza_return_shipping_label = $plaza_return_shipping_label_line_ext_val + $plaza_return_shipping_label_tax_amnt_val;
// 			$total_costs += $plaza_return_shipping_label;
// 		}
// 		elseif($data['all_costs'][$i]->cost_name == 'LOGISTICAL_CHARGE')
// 		{
// 			$logistical_charge_line_ext_val = $data['all_costs'][$i]->line_ext_val;
// 			$logistical_charge_tax_amnt_val = $data['all_costs'][$i]->tax_amount_val;
// 			$logistical_charge = $logistical_charge_line_ext_val + $logistical_charge_tax_amnt_val;
// 			$total_costs += $logistical_charge;
// 		}

// 	}


// if($set_correction_turnover == 1 && $set_turnover == 1)
// {
// 	$total_revenue = ($turnover_line_ext_val * (-1)) + ($correction_turnover_line_ext_val * (-1));
// }

// if($set_correction_commission == 1 && $set_commission == 1)
// {
// 	$commission = ($commission_line_ext_val + $commission_tax_amnt_val) + ($correction_commission_line_ext_val + $correction_commission_tax_amnt_val);
// 	$total_costs += $commission;
// }


// if($set_correction_pick_pack == 1 && $set_pick_pack == 1)
// {
// 	$pick_pack = ($correction_pick_pack_line_ext_val + $correction_pick_pack_tax_amnt_val) + ($pick_pack_line_ext_val + $pick_pack_tax_amnt_val);
// 	$total_costs += $pick_pack;
// }

// if($set_correction_outbound == 1 && $set_outbound == 1)
// {
// 	$outbound = ($correction_outbound_line_ext_val + $correction_outbound_tax_amnt_val) + ($outbound_line_ext_val + $outbound_tax_amnt_val);
// 	$total_costs += $outbound;
// }

// $profit_before_tax = $total_revenue - $total_costs;


	// var_dump($data['all_costs'][1]->cost_name); 
?>
<style type="text/css">
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {
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
			<div class="card_pading card-body col-md-11 ">
				<div class="row" style="display: block;">
					<h2 style="color: blue"><b>PROFIT & LOSS</b></h2>
					<span>This is your result in 
						<span id="monthName">{{$data['monthName']}}</span>
						<span id="year">{{$data['invoice_for_year']}}</span>
					</span>


					<input type="hidden" name="invoice_for_month" id="invoice_for_month" value="{{$data['invoice_for_month']}}">
					<input type="hidden" name="invoice_for_year" id="invoice_for_year" value="{{$data['invoice_for_year']}}">

					<select class="custom-select" id="select_month" name="select_month">
						<option value="">Select Month</option>
						<option value="<?= $invoice_for_month.$invoice_for_year ?>">
							<?= $invoice_for_month_name.' '.$invoice_for_year ?>
						</option>
						<?php for($i=0; $i< count($previous_month_num); $i++): ?>
							
							<option value="<?= $previous_month_num[$i].$previous_year[$i] ?>">
								<?= $previous_month_name[$i].' '.$previous_year[$i] ?>
							</option>

						<?php endfor; ?>

					</select>
				</div>
				<br/>
				<div class=" row">
					<div class="blue_div">
						Revenue
					</div>
				</div>
				<div class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Turnover</span>
						<p class="form_value">
							€ <span id="total_revenue">
								0.00
							</span>
						</p>
					</div>
				</div>
				<div class="val_name_row row">
					<div class="val_name col-md-5">
						
					</div>
					<div class=" col-md-6">
						<hr class="custom_hr">
					</div>
				</div>
				<div class="val_name_row row">
					<div class=" col-md-10">
						<span><b>Total</b></span>
						<span class="form_total1">
							€ <span id="total_revenue1">
								0.00
							</span>
						</span>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="blue_div">
						Cost
					</div>
				</div>
				<div id="custom_costs_div">
					
				</div>
				<div id="commission_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Commission</span>
						<p class="form_value">
							€ <span id="commission"></span>
						</p>
					</div>
				</div>
				
				<div id="shipment_label_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Shipment_label</span>
						<p class="form_value">
							€ <span id="shipment_label"></span>
						</p>
					</div>
				</div>

				<div id="shipment_label_post_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Shipment_label_post</span>
						<p class="form_value">
							€ <span id="shipment_label_post"></span>
						</p>
					</div>
				</div>

				<div id="plaza_return_shipping_label_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Plaza_return_shipment_label</span>
						<p class="form_value">
							€ <span id="plaza_return_shipping_label">
								
							</span>
						</p>
					</div>
				</div>

				<div id="pick_pack_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Pick_Pack</span>
						<p class="form_value">
							€ <span id="pick_pack"></span>
						</p>
					</div>
				</div>

				<div id="outbound_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Outbound</span>
						<p class="form_value">
							€ <span id="outbound"></span>
						</p>
					</div>
				</div>

				<div id="stock_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Stock</span>
						<p class="form_value">
							€ <span id="stock"></span>
						</p>
					</div>
				</div>

				<div id="nck_stock_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>NCK_Stock</span>
						<p class="form_value">
							€ <span id="nck_stock"></span>
						</p>
					</div>
				</div>

				<div id="compensation_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Compensation</span>
						<p class="form_value">
							€ <span id="compensation"></span>
						</p>
					</div>
				</div>

				<div id="logistical_charge_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Logistical_charge</span>
						<p class="form_value">
							€ <span id="logistical_charge"></span>
						</p>
					</div>
				</div>

				<div id="correction_correction_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Correction Correction</span>
						<p class="form_value">€ 
							<span id="correction_correction"></span>
						</p>
					</div>
				</div>

				<div id="compensation_lost_goods_div" class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Compensation_lost_goods</span>
						<p class="form_value">€ 
							<span id="compensation_lost_goods"></span>
						</p>
					</div>
				</div>

				<div class="val_name_row row">
					<div class="val_name col-md-5">
						
					</div>
					<div class=" col-md-6">
						<hr class="custom_hr">
					</div>
				</div>
				<div class="val_name_row row">
					<div class=" col-md-10">
						<span><b>Total</b></span>
						<span class="form_total1">
							€ <span id="total_costs"></span>
						</span>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="blue_div">
						Revenue
					</div>
				</div>
				
				<div class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Profit before taxes</span>
						<p class="form_value">
							€ <span id="profit_before_tax"></span>
						</p>
					</div>
				</div>
				<div class="val_name_row row">
					<div class="val_name col-md-7">
						<span>Taxes to pay</span>
						<p class="form_value">€ <span id="taxes_to_pay_div"></span></p>
					</div>
				</div>
				<div class="val_name_row row">
					<div class="val_name col-md-5">
						
					</div>
					<div class=" col-md-6">
						<hr class="custom_hr">
					</div>
				</div>
				<div class="val_name_row row">
					<div class=" col-md-10">
						<span><b>Total</b></span>
						<span class="form_total1">€ <span id="total_profit_and_tax_div"></span></span>
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

<script>
	$(document).ready(function(){

		var invoice_for_month = $('#invoice_for_month').val();
		var invoice_for_year = $('#invoice_for_year').val();
		ajaxCall(invoice_for_month,invoice_for_year);

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
			$('#custom_costs_div').hide();
			$('#custom_costs_div').empty();

			$('#compensation_div').hide();
			$('#commission_div').hide();
			$('#shipment_label_div').hide();
			$('#shipment_label_post_div').hide();
			$('#plaza_return_shipping_label_div').hide();
			$('#pick_pack_div').hide();
			$('#outbound_div').hide();
			$('#stock_div').hide();
			$('#nck_stock_div').hide();
			$('#compensation_div').hide();
			$('#logistical_charge_div').hide();
			$('#correction_correction_div').hide();
			$('#compensation_lost_goods_div').hide();
			$('#total_revenue').html('0.00');
			$('#total_revenue1').html('0.00');
			$('#taxes_to_pay_div').html('0.00');
			$('#total_profit_and_tax_div').html('0.00');

			var month = month;
			$.ajax({
				method: 'POST',
				url: '{{route("retrive_costs_by_month")}}',
				data: {"_token": "{{ csrf_token() }}",month:month,year:year},
				async: false,
				success: function(response)
				{
					response_custom_cost = response['custom_costs'];
					response = response['all_costs'];
					
					var set_correction_pick_pack = set_pick_pack = set_correction_outbound = set_outbound = set_turnover = set_correction_turnover = set_correction_commission = set_commission = total_costs = custom_cost_tax_amount_val = correction_correction_tax = shipment_label_tax = stock_tax = nck_stock_tax = plaza_return_shipping_label_tax = logistical_charge_tax = commission_tax = pick_pack_tax = outbound_tax = total_revenue = 0;
					if (response.length == 0)
					{
						
					}
					for(var i = 0; i < response_custom_cost.length; i++)
					{
						custom_cost = response_custom_cost[i]['custom_cost'];
						if(custom_cost != 0)
						{
							custom_cost_name = response_custom_cost[i]["cost_name"];
							custom_cost_val = response_custom_cost[i]["line_ext_val"] + response_custom_cost[i]["tax_amount_val"];
							custom_cost_tax_amount_val += response_custom_cost[i]["tax_amount_val"];

							$('#custom_costs_div').show();
							$('#custom_costs_div').append('<div id="" class="val_name_row row"><div class="val_name col-md-7"><span>'+custom_cost_name+'</span><p class="form_value">€ <span id="">'+custom_cost_val.toFixed(2)+'</span></p></div></div>');
							total_costs += custom_cost_val;
						}
					}
					for(var i = 0; i < response.length; i++)
					{

						if(response[i]['cost_name'] == 'CORRECTION_CORRECTION')
						{
							var correction_correction_line_ext_val = response[i]['line_ext_val'];
							var correction_correction_tax_amnt_val = response[i]['tax_amount_val'];
							var correction_correction = correction_correction_line_ext_val + correction_correction_tax_amnt_val;
							total_costs = total_costs + correction_correction;
							correction_correction_tax = (correction_correction/121)*21;

							$('#correction_correction_div').show();
							$('#correction_correction').html(correction_correction.toFixed(2));

						}
						else if(response[i]['cost_name'] == 'SHIPMENT_LABEL_POST')
						{
							var shipment_label_post_line_ext_val = response[i]['line_ext_val'];
							var shipment_label_post_tax_amnt_val = response[i]['tax_amount_val'];
							var shipment_label_post = (shipment_label_post_line_ext_val + shipment_label_post_tax_amnt_val);
							total_costs += shipment_label_post;

							$('#shipment_label_post_div').show();
							$('#shipment_label_post').html(shipment_label_post.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'SHIPMENT_LABEL')
						{
							var shipment_label_line_ext_val = response[i]['line_ext_val'];
							var shipment_label_tax_amnt_val = response[i]['tax_amount_val'];
							var shipment_label = (shipment_label_line_ext_val + shipment_label_tax_amnt_val);
							shipment_label_tax = (shipment_label/121)*21;
							total_costs += shipment_label;

							$('#shipment_label_div').show();
							$('#shipment_label').html(shipment_label.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'CORRECTION_PICK_PACK')
						{
							var correction_pick_pack_line_ext_val = response[i]['line_ext_val'];
							var correction_pick_pack_tax_amnt_val = response[i]['tax_amount_val'];
							set_correction_pick_pack = 1;
						}
						else if(response[i]['cost_name'] == 'PICK_PACK')
						{
							var pick_pack_line_ext_val = response[i]['line_ext_val'];
							var pick_pack_tax_amnt_val = response[i]['tax_amount_val'];
							set_pick_pack = 1;
						}
						else if(response[i]['cost_name'] == 'CORRECTION_OUTBOUND')
						{
							var correction_outbound_line_ext_val = response[i]['line_ext_val'];
							var correction_outbound_tax_amnt_val = response[i]['tax_amount_val'];
							set_correction_outbound = 1;
						}
						else if(response[i]['cost_name'] == 'OUTBOUND')
						{
							var outbound_line_ext_val = response[i]['line_ext_val'];
							var outbound_tax_amnt_val = response[i]['tax_amount_val'];
							set_outbound = 1;
						}
						else if(response[i]['cost_name'] == 'STOCK')
						{
							var stock_line_ext_val = response[i]['line_ext_val'];
							var stock_tax_amnt_val = response[i]['tax_amount_val'];
							var stock = stock_line_ext_val + stock_tax_amnt_val;
							stock_tax = (stock/121)*21;
							total_costs += stock;

							$('#stock_div').show();
							$('#stock').html(stock.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'NCK_STOCK')
						{
							var nck_stock_line_ext_val = response[i]['line_ext_val'];
							var nck_stock_tax_amnt_val = response[i]['tax_amount_val'];
							var nck_stock = nck_stock_line_ext_val + nck_stock_tax_amnt_val;
							nck_stock_tax = (nck_stock/121)*21;
							total_costs += nck_stock;

							$('#nck_stock_div').show();
							$('#nck_stock').html(nck_stock.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'COMPENSATION_LOST_GOODS')
						{
							var compensation_lost_goods_line_ext_val = response[i]['line_ext_val'];
							var compensation_lost_goods_tax_amnt_val = response[i]['tax_amount_val'];
							var compensation_lost_goods = compensation_lost_goods_line_ext_val + compensation_lost_goods_tax_amnt_val;
							total_costs += compensation_lost_goods;

							$('#compensation_lost_goods_div').show();
							$('#compensation_lost_goods').html(compensation_lost_goods.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'COMPENSATION')
						{
							var compensation_line_ext_val = response[i]['line_ext_val'];
							var compensation_tax_amnt_val = response[i]['tax_amount_val'];
							var compensation = compensation_line_ext_val + compensation_tax_amnt_val;
							total_costs += compensation;

							$('#compensation_div').show();
							$('#compensation').html(compensation.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'CORRECTION_TURNOVER')
						{
							var correction_turnover_line_ext_val = response[i]['line_ext_val'];
							var correction_turnover_tax_amnt_val = response[i]['tax_amount_val'];
							set_correction_turnover = 1;
						}
						else if(response[i]['cost_name'] == 'TURNOVER')
						{
							var turnover_line_ext_val = response[i]['line_ext_val'];
							var turnover_tax_amnt_val = response[i]['tax_amount_val'];
							set_turnover = 1;
						}
						else if(response[i]['cost_name'] == 'CORRECTION_COMMISSION')
						{
							var correction_commission_line_ext_val = response[i]['line_ext_val'];
							var correction_commission_tax_amnt_val = response[i]['tax_amount_val'];
							set_correction_commission = 1;
						}
						else if(response[i]['cost_name'] == 'COMMISSION')
						{
							var commission_line_ext_val = response[i]['line_ext_val'];
							var commission_tax_amnt_val = response[i]['tax_amount_val'];
							set_commission = 1;
						}
						else if(response[i]['cost_name'] == 'PLAZA_RETURN_SHIPPING_LABEL')
						{
							var plaza_return_shipping_label_line_ext_val = response[i]['line_ext_val'];
							var plaza_return_shipping_label_tax_amnt_val = response[i]['tax_amount_val'];
							var plaza_return_shipping_label = plaza_return_shipping_label_line_ext_val + plaza_return_shipping_label_tax_amnt_val;
							plaza_return_shipping_label_tax = (plaza_return_shipping_label/121)*21;
							total_costs += plaza_return_shipping_label;

							$('#plaza_return_shipping_label_div').show();
							$('#plaza_return_shipping_label').html(plaza_return_shipping_label.toFixed(2));
						}
						else if(response[i]['cost_name'] == 'LOGISTICAL_CHARGE')
						{
							var logistical_charge_line_ext_val = response[i]['line_ext_val'];
							var logistical_charge_tax_amnt_val = response[i]['tax_amount_val'];
							var logistical_charge = logistical_charge_line_ext_val + logistical_charge_tax_amnt_val;
							logistical_charge_tax = (logistical_charge/121)*21;
							total_costs += logistical_charge;

							$('#logistical_charge_div').show();
							$('#logistical_charge').html(logistical_charge.toFixed(2));
						}
					}
					if(set_correction_turnover == 1 && set_turnover == 1)
					{
						total_revenue = (turnover_line_ext_val * (-1)) + (correction_turnover_line_ext_val * (-1));
						$('#total_revenue').html(total_revenue.toFixed(2));
						$('#total_revenue1').html(total_revenue.toFixed(2));
					}

					if(set_correction_commission == 1 && set_commission == 1)
					{
						var commission = (commission_line_ext_val + commission_tax_amnt_val) + (correction_commission_line_ext_val + correction_commission_tax_amnt_val);
						commission_tax = (commission/121)*21;
						total_costs += commission;

						$('#commission_div').show();
						$('#commission').html(commission.toFixed(2));
					}


					if(set_correction_pick_pack == 1 && set_pick_pack == 1)
					{
						pick_pack = (correction_pick_pack_line_ext_val + correction_pick_pack_tax_amnt_val) + (pick_pack_line_ext_val + pick_pack_tax_amnt_val);
						pick_pack_tax = (pick_pack/121)*21;
						total_costs += pick_pack;

						$('#pick_pack_div').show();
						$('#pick_pack').html(pick_pack.toFixed(2));
					}

					if(set_correction_outbound == 1 && set_outbound == 1)
					{
						outbound = (correction_outbound_line_ext_val + correction_outbound_tax_amnt_val) + (outbound_line_ext_val + outbound_tax_amnt_val);
						outbound_tax = (outbound/121)*21;
						total_costs += outbound;

						$('#outbound_div').show();
						$('#outbound').html(outbound.toFixed(2));
					}
					
					profit_before_tax = total_revenue - total_costs;
					console.log(total_revenue);
					console.log(total_costs);
					console.log(profit_before_tax);
					$('#profit_before_tax').html(profit_before_tax.toFixed(2));
					$('#total_costs').html(total_costs.toFixed(2));

					var total_costs_tax = custom_cost_tax_amount_val + correction_correction_tax + shipment_label_tax + stock_tax + nck_stock_tax + plaza_return_shipping_label_tax + logistical_charge_tax + commission_tax + pick_pack_tax + outbound_tax;

					var total_revenue_tax = (total_revenue/121)*21;

					var taxes_to_pay = total_revenue_tax - total_costs_tax;
					$('#taxes_to_pay_div').html(taxes_to_pay.toFixed(2));

					var total_profit_and_tax = profit_before_tax-taxes_to_pay;
					$('#total_profit_and_tax_div').html(total_profit_and_tax.toFixed(2));

					console.log(response);
					console.log(response_custom_cost);
					
				}

			});
}
});
</script>

@endsection