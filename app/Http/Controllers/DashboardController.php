<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Auth;
use DateTime;
use App\User;
use Ramsey\Uuid\Uuid;
use App\Model\Payment;
use App\Model\Turnover;
use App\Model\AllCosts;
use App\Model\User_invoice;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$user_id = Auth::user()->id;

		$first_date_last_month = new Carbon('first day of this month');
		$data['invoice_for_month'] = date('m',strtotime($first_date_last_month));
		$data['invoice_for_year'] = date('Y',strtotime($first_date_last_month));
		$current_month_year = $data['invoice_for_year'].$data['invoice_for_month'];
		$date = DateTime::createFromFormat("Ym", $current_month_year);
		$invoice_for_month = $data['invoice_for_month'];
		$invoice_for_year = $data['invoice_for_year'];
		$dateObj = DateTime::createFromFormat('!m', $invoice_for_month);
		$invoice_for_month_name = $dateObj->format('F');

		for($j=0; $j< 12; $j++)
		{
			$total_costs_tax = $custom_cost_tax_amount_val = $correction_correction_tax = $shipment_label_tax = $stock_tax = $nck_stock_tax = $plaza_return_shipping_label_tax = $logistical_charge_tax = $commission_tax = $pick_pack_tax = $outbound_tax = $total_revenue_tax = $total_revenue = $total_profit_and_tax = $profit_before_tax = $taxes_to_pay = $total_costs = $total_custom_costs = $second_graph = 0;

			$date = $date->format('Y-m-d h:i:s');
			$date = date("Y-m-01", strtotime($date));
			$date = DateTime::createFromFormat("Y-m-d", $date);
			$date->modify('-1 DAYS');
			$previous_month_num[$j] = $date->format("m");
			$previous_year[$j] = $date->format("Y");
			$dateObj = DateTime::createFromFormat('!m', $previous_month_num[$j]);
			$previous_month_name[$j] = $dateObj->format('F');

			$dashboard['month_name'][] = $previous_month_name[$j];
			$dashboard['month'][] = $previous_year[$j].'-'.$previous_month_num[$j];
			// echo $previous_month_num[$j].' '.$previous_year[$j].'<br/>';
			// echo $previous_month_name[$j].'<br/>';

			$for_month = $previous_month_num[$j];
			$for_year = $previous_year[$j];

			$user_costs = AllCosts::where([['user_id',$user_id],['for_month',$for_month],['for_year',$for_year],['custom_cost','=','0'],])->groupBy('cost_name')->get();

			$user_custom_costs = AllCosts::where([['user_id',$user_id],['for_month',$for_month],['for_year',$for_year],['custom_cost','!=','0'],])->get();
			
			for($i = 0; $i < count($user_custom_costs); $i++)
			{
				$custom_cost = $user_custom_costs[$i]['custom_cost'];
				if($custom_cost != 0)
				{
					$custom_cost_name = $user_custom_costs[$i]["cost_name"];
					$custom_cost_val = $user_custom_costs[$i]["line_ext_val"] + $user_custom_costs[$i]["tax_amount_val"];
					$custom_cost_tax_amount_val += $user_custom_costs[$i]["tax_amount_val"];

					$total_custom_costs += $custom_cost_val;
				}
			}
			
			for($i = 0; $i < count($user_costs); $i++)
			{
				if($user_costs[$i]['cost_name'] == 'CORRECTION_CORRECTION')
				{
					$correction_correction_line_ext_val = $user_costs[$i]['line_ext_val'];
					$correction_correction_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$correction_correction = $correction_correction_line_ext_val + $correction_correction_tax_amnt_val;

					$total_costs = $total_costs + $correction_correction;
					$correction_correction_tax = ($correction_correction/121)*21;

				}
				else if($user_costs[$i]['cost_name'] == 'SHIPMENT_LABEL_POST')
				{
					$shipment_label_post_line_ext_val = $user_costs[$i]['line_ext_val'];
					$shipment_label_post_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$shipment_label_post = ($shipment_label_post_line_ext_val + $shipment_label_post_tax_amnt_val);
					$total_costs += $shipment_label_post;

				}
				else if($user_costs[$i]['cost_name'] == 'SHIPMENT_LABEL')
				{
					$shipment_label_line_ext_val = $user_costs[$i]['line_ext_val'];
					$shipment_label_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$shipment_label = ($shipment_label_line_ext_val + $shipment_label_tax_amnt_val);

					$shipment_label_tax = ($shipment_label/121)*21;
					$total_costs += $shipment_label;


				}
				else if($user_costs[$i]['cost_name'] == 'CORRECTION_PICK_PACK')
				{
					$correction_pick_pack_line_ext_val = $user_costs[$i]['line_ext_val'];
					$correction_pick_pack_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_correction_pick_pack = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'PICK_PACK')
				{
					$pick_pack_line_ext_val = $user_costs[$i]['line_ext_val'];
					$pick_pack_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_pick_pack = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'CORRECTION_OUTBOUND')
				{
					$correction_outbound_line_ext_val = $user_costs[$i]['line_ext_val'];
					$correction_outbound_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_correction_outbound = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'OUTBOUND')
				{
					$outbound_line_ext_val = $user_costs[$i]['line_ext_val'];
					$outbound_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_outbound = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'STOCK')
				{
					$stock_line_ext_val = $user_costs[$i]['line_ext_val'];
					$stock_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$stock = $stock_line_ext_val + $stock_tax_amnt_val;
					$stock_tax = ($stock/121)*21;
					$total_costs += $stock;

				}
				else if($user_costs[$i]['cost_name'] == 'NCK_STOCK')
				{
					$nck_stock_line_ext_val = $user_costs[$i]['line_ext_val'];
					$nck_stock_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$nck_stock = $nck_stock_line_ext_val + $nck_stock_tax_amnt_val;
					$nck_stock_tax = ($nck_stock/121)*21;
					$total_costs += $nck_stock;

				}
				else if($user_costs[$i]['cost_name'] == 'COMPENSATION_LOST_GOODS')
				{
					$compensation_lost_goods_line_ext_val = $user_costs[$i]['line_ext_val'];
					$compensation_lost_goods_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$compensation_lost_goods = $compensation_lost_goods_line_ext_val + $compensation_lost_goods_tax_amnt_val;
					$total_costs += $compensation_lost_goods;

				}
				else if($user_costs[$i]['cost_name'] == 'COMPENSATION')
				{
					$compensation_line_ext_val = $user_costs[$i]['line_ext_val'];
					$compensation_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$compensation = $compensation_line_ext_val + $compensation_tax_amnt_val;
					$total_costs += $compensation;


				}
				else if($user_costs[$i]['cost_name'] == 'CORRECTION_TURNOVER')
				{
					$correction_turnover_line_ext_val = $user_costs[$i]['line_ext_val'];
					$correction_turnover_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_correction_turnover = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'TURNOVER')
				{
					$turnover_line_ext_val = $user_costs[$i]['line_ext_val'];
					$turnover_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_turnover = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'CORRECTION_COMMISSION')
				{
					$correction_commission_line_ext_val = $user_costs[$i]['line_ext_val'];
					$correction_commission_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_correction_commission = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'COMMISSION')
				{
					$commission_line_ext_val = $user_costs[$i]['line_ext_val'];
					$commission_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$set_commission = 1;
				}
				else if($user_costs[$i]['cost_name'] == 'PLAZA_RETURN_SHIPPING_LABEL')
				{
					$plaza_return_shipping_label_line_ext_val = $user_costs[$i]['line_ext_val'];
					$plaza_return_shipping_label_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$plaza_return_shipping_label = $plaza_return_shipping_label_line_ext_val + $plaza_return_shipping_label_tax_amnt_val;
					$plaza_return_shipping_label_tax = ($plaza_return_shipping_label/121)*21;
					$total_costs += $plaza_return_shipping_label;

				}
				else if($user_costs[$i]['cost_name'] == 'LOGISTICAL_CHARGE')
				{
					$logistical_charge_line_ext_val = $user_costs[$i]['line_ext_val'];
					$logistical_charge_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
					$logistical_charge = $logistical_charge_line_ext_val + $logistical_charge_tax_amnt_val;
					$logistical_charge_tax = ($logistical_charge/121)*21;
					$total_costs += $logistical_charge;

				}
			}

			if($set_correction_turnover == 1 && $set_turnover == 1)
			{
				$total_revenue = ($turnover_line_ext_val * (-1)) + ($correction_turnover_line_ext_val * (-1));

				$set_correction_turnover = $set_turnover = 0;
			}
			else{
				$total_revenue = 0;
			}

			if($set_correction_commission == 1 && $set_commission == 1)
			{
				$commission = ($commission_line_ext_val + $commission_tax_amnt_val) + ($correction_commission_line_ext_val + $correction_commission_tax_amnt_val);
				$commission_tax = ($commission/121)*21;
				$total_costs += $commission;

				$set_correction_commission = $set_commission = 0;
			}


			if($set_correction_pick_pack == 1 && $set_pick_pack == 1)
			{
				$pick_pack = ($correction_pick_pack_line_ext_val + $correction_pick_pack_tax_amnt_val) + ($pick_pack_line_ext_val + $pick_pack_tax_amnt_val);
				$pick_pack_tax = ($pick_pack/121)*21;
				$total_costs += $pick_pack;

				$set_correction_pick_pack = $set_pick_pack = 0;
			}

			if($set_correction_outbound == 1 && $set_outbound == 1)
			{
				$outbound = ($correction_outbound_line_ext_val + $correction_outbound_tax_amnt_val) + ($outbound_line_ext_val + $outbound_tax_amnt_val);
				$outbound_tax = ($outbound/121)*21;
				$total_costs += $outbound;

				$set_correction_outbound = $set_outbound = 0;
			}

			$total_costs += $total_custom_costs;

			$total_costs_tax = $custom_cost_tax_amount_val + $correction_correction_tax + $shipment_label_tax + $stock_tax + $nck_stock_tax + $plaza_return_shipping_label_tax + $logistical_charge_tax + $commission_tax + $pick_pack_tax + $outbound_tax;

			$total_revenue_tax = ($total_revenue/121)*21;
			$taxes_to_pay = $total_revenue_tax - $total_costs_tax;

			$profit_before_tax = $total_revenue - $total_costs;

			$total_profit_and_tax = $profit_before_tax - $taxes_to_pay;

			$second_graph = $total_revenue - ($total_costs-$total_custom_costs);

			$dashboard['profit_before_tax'][] = round($profit_before_tax,2);
			$dashboard['profit_after_tax'][] = round($total_profit_and_tax,2);
			$dashboard['second_graph'][] = round($second_graph,2);
			// echo $total_costs.'<br>';
		}
		$payment['exists'] = $payment['paid'] = 0;
		$pay = Payment::where('user_id',$user_id)->first();
		$payment['exists'] = count($pay);

		$pay = Payment::where([['user_id',$user_id],['status','paid']])->first();
		$payment['paid'] = count($pay);

		//check user has trial or recurring status
		$user = User::find($user_id);
		$interval = 0;
		if($user->access_type == 'trial')
		{
			$trial_ends_at = $user->trial_ends_at;
			if($trial_ends_at != '')
			{
				$today = date('Y-m-d');
				$trial_ends_at = new DateTime($trial_ends_at);
				$today = new DateTime($today);
				$interval = $today->diff($trial_ends_at);
				$interval = $interval->format('%R%a');
			}
		}
		else if($user->access_type == 'recurring'){
			$access_ends_at = $user->access_ends_at;
			$today = date('Y-m-d');
			$access_ends_at = new DateTime($access_ends_at);
			$today = new DateTime($today);
			$interval = $today->diff($access_ends_at);
			$interval = $interval->format('%R%a');
		}
		$payment['recurring'] = $interval;
		return view('m_dashboard.dashboard',compact('dashboard','payment'));
		// return view('dashboard.dashboard',compact('dashboard','payment'));
	}
	
	public function molli_payment()
	{
		// $mollie = new \Mollie\Api\MollieApiClient();
		// $mollie->setApiKey("live_v9SsMRguFfqRMtrKkuw8FrNBz2x5Wh");
		// $payment = $mollie->payments->create([
		//     "amount" => [
		//         "currency" => "EUR",
		//         "value" => "10.00"
		//     ],
		//     "description" => "My first API payment",
		//     "redirectUrl" => "http://localhost/boolbook/public/",
		//     "method"      => \Mollie\Api\Types\PaymentMethod::IDEAL,
		//     "issuer"      => $selectedIssuerId, // e.g. "ideal_INGBNL2A"
		// ]);

		$name = Auth::user()->name.' '.Auth::user()->last_name;
		$email = Auth::user()->email;
		$user_id = Auth::user()->id;

		$customer = Mollie::api()->customers()->create([
			"name" => $name,
			"email" => $email,
		]);

		$customerId = $customer->id;
		$mandates = Mollie::api()->mandates()->listFor($customer);
		// dd($mandates);
		$payment = Mollie::api()->payments()->create([
			'amount' => [
				'currency' => 'EUR',
		        'value' => '1.00', // You must send the correct number of decimals, thus we enforce the use of strings
		      ],
		      "customerId" => $customerId,
		      "sequenceType" => 'first',
		      "description" => "My first Payment",
		      "method"      => \Mollie\Api\Types\PaymentMethod::IDEAL,
		      "redirectUrl" => "https://bolbooks.nl/dashboard",
		      'webhookUrl' =>	 "https://bolbooks.nl/first_payment_status",
		    ]);

		$payment = Mollie::api()->payments()->get($payment->id);

		// dd($payment->amount);
		$user_payment = new Payment;
		$user_payment->user_id = $user_id;
		$user_payment->payment_id = $payment->id;
		$user_payment->amount_val = $payment->amount->value;
		$user_payment->amount_currency = $payment->amount->currency;
		$user_payment->description = $payment->description;
		$user_payment->method = $payment->method;
		$user_payment->status = $payment->status;
		$user_payment->createdAt = $payment->createdAt;
		$user_payment->sequenceType = $payment->sequenceType;
		$user_payment->customerId = $customerId;
		$user_payment->payment_for = 'first_api_data';
		$user_payment->save();

		// dd($payment);
		return redirect($payment->getCheckoutUrl(), 303);
	}

	public function recuring_payment(Request $request)
	{
		$user_id = Auth::user()->id;
		$customerId = Auth::user()->mollie_customer_id;
		$first_date_last_month = new Carbon('first day of last month');
		$last_month = date('m',strtotime($first_date_last_month));
		$user_costs = AllCosts::where([['user_id',$user_id],['custom_cost',0],['for_month',$last_month]])->get();

		for($i = 0; $i < count($user_costs); $i++)
		{
			if($user_costs[$i]['cost_name'] == 'CORRECTION_TURNOVER')
			{
				$correction_turnover_line_ext_val = $user_costs[$i]['line_ext_val'];
				$correction_turnover_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
			}
			if($user_costs[$i]['cost_name'] == 'TURNOVER')
			{
				$turnover_line_ext_val = $user_costs[$i]['line_ext_val'];
				$turnover_tax_amnt_val = $user_costs[$i]['tax_amount_val'];
			}
		}

		$total_revenue = ($turnover_line_ext_val * (-1)) + ($correction_turnover_line_ext_val * (-1));
		$total_revenue = round($total_revenue,2);
		if($total_revenue > 0 && $total_revenue < 2000)
		{
			$amount_val = 5.99;
		}
		else if($total_revenue > 2000 && $total_revenue < 5000)
		{
			$amount_val = 24.14;
		}
		else if($total_revenue > 5000 && $total_revenue < 10000)
		{
			$amount_val = 36.24;
		}
		else if($total_revenue > 10000 && $total_revenue < 30000)
		{
			$amount_val = 48.34;
		}
		else if($total_revenue > 30000)
		{
			$amount_val = 84.64;
		}

		$amount_val = strval($amount_val);
		// $customer = Mollie::api()->customers()->get('cst_C2Mt2bTHWA');
		
		// $name = Auth::user()->name.' '.Auth::user()->last_name;
		// $email = Auth::user()->email;
		// $user_id = Auth::user()->id;

		// $customer = Mollie::api()->customers()->create([
		// 	"name" => $name,
		// 	"email" => $email,
		// ]);
		// $customerId = $customer->id;

		$payment = Mollie::api()->payments()->create([
			'amount' => [
				'currency' => 'EUR',
        'value' => $amount_val, // You must send the correct number of decimals, thus we enforce the use of strings
      ],
      "customerId" => $customerId,
      "sequenceType" => 'recurring',
      "description" => "Payment for month of ".$last_month,
      //"method"      => ['ideal'],//['ideal','creditcard']
      // "redirectUrl" => "https://bolbooks.nl/dashboard",
      'webhookUrl' =>	 "https://bolbooks.nl/recuring_payment_status",
    ]);
		$payment = Mollie::api()->payments()->get($payment->id);

		// dd($payment->amount);
		$user_payment = new Payment;
		$user_payment->user_id = $user_id;
		$user_payment->payment_id = $payment->id;
		$user_payment->amount_val = $payment->amount->value;
		$user_payment->amount_currency = $payment->amount->currency;
		$user_payment->description = $payment->description;
		$user_payment->method = $payment->method;
		$user_payment->status = $payment->status;
		$user_payment->createdAt = $payment->createdAt;
		$user_payment->sequenceType = $payment->sequenceType;
		$user_payment->customerId = $customerId;
		$user_payment->payment_for = 'first_api_data';
		$user_payment->save();
		// return redirect($payment->getCheckoutUrl(), 303);

		// $mandate = $mollie->customers->get($customerId)->createMandate([
		//    "method" => \Mollie\Api\Types\MandateMethod::DIRECTDEBIT,
		//    "testmode" => true,
		//    "consumerName" => "John Doe",
		//    "consumerAccount" => "NL55INGB0000000000",
		//    "consumerBic" => "INGBNL2A",
		//    "signatureDate" => "2018-05-07",
		//    "mandateReference" => "YOUR-COMPANY-MD13804",
		// ]);
		// $mandates = Mollie::api()->mandates()->listFor($customer);
		// dd($mandates);
	}
}
