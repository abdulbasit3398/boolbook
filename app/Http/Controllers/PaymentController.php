<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Mail;
use Auth;
use DateTime;
use App\User;
use App\Model\Turnover;
use App\Model\Payment;
use App\Model\AllCosts;
use App\Model\User_invoice;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PaymentController extends Controller
{
	public function check_user_access()
	{
		$users = User::where([['client_id','!=','']])->get();
		foreach ($users as $user) 
		{
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
			elseif($user->access_type == 'recurring')
			{
				$access_ends_at = $user->access_ends_at;
				$today = date('Y-m-d');
				$access_ends_at = new DateTime($access_ends_at);
				$today = new DateTime($today);
				$interval = $today->diff($access_ends_at);
				$interval = $interval->format('%R%a');
			}
			
			if($interval < 0)
			{
				$user_previous_payment = Payment::where([['user_id',$user->id],['sequenceType','recurring'],['status','pending']])->get();

				if(count($user_previous_payment) == 0)
				{
					$user_id = $user->id;
					$customerId = $user->mollie_customer_id;
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
					if($total_revenue > 0 && $total_revenue <= 700)
					{
						$amount_val = 5.99;
					}
					else if($total_revenue > 700 && $total_revenue <= 2000)
					{
						$amount_val = 12.04;
					}
					else if($total_revenue > 2000 && $total_revenue <= 5000)
					{
						$amount_val = 24.14;
					}
					else if($total_revenue > 5000 && $total_revenue <= 10000)
					{
						$amount_val = 36.24;
					}
					else if($total_revenue > 10000 && $total_revenue <= 30000)
					{
						$amount_val = 48.34;
					}
					else if($total_revenue > 30000)
					{
						$amount_val = 84.64;
					}

					$amount_val = strval($amount_val);
					$payment = Mollie::api()->payments()->create([
						'amount' => [
							'currency' => 'EUR',
		        'value' => $amount_val, // You must send the correct number of decimals, thus we enforce the use of strings
		      ],
		      "customerId" => $customerId,
		      "sequenceType" => 'recurring',
		      "description" => "Bolbooks.nl Boekhouding",
			      //"method"      => ['ideal'],//['ideal','creditcard']
			      // "redirectUrl" => "https://bolbooks.nl/dashboard",
		      'webhookUrl' =>	 "https://app.bolbooks.nl/recuring_payment_status",
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

				}//if user has no pending payment
				else{
					echo 'no payment to charge';
				}
			}//if user access date end

		}

	}
	public function first_payment_status(Request $request)
	{
		$payment_id = $request->id;
		$mollie_key = env("MOLLIE_KEY", "null");
		// $select = DB::select("select * from test where name = 'status' ");
		
		// $payment_id = $select[0]->id;

		$payment_status = new Client();
		$result = $payment_status->request('get','https://api.mollie.com/v2/payments/'.$payment_id,[
			'headers' => [
				'Authorization' => 'Bearer '.$mollie_key
			],
		]);
		$response_data = (string) $result->getBody();
		$json = json_decode($response_data);
		$status = $json->status;
		$mollie_customer_id = $json->customerId;
		$mollie_mandate_id = $json->mandateId;
		$trial_ends_at = date('Y-m-d',strtotime($json->paidAt. " + 7 days"));
		if($status == 'paid')
		{
			$payment = Payment::where('payment_id',$payment_id)->first();

			$user = User::find($payment->user_id);
			$user->mollie_customer_id = $mollie_customer_id;
			$user->mollie_mandate_id = $mollie_mandate_id;
			$user->trial_ends_at = $trial_ends_at;
			$user->save();

			$payment->status = 'paid';
			$payment->api_call = 1;
			$payment->save();

			$email = $user->email;
	        Mail::send('mail.newUserMail',
	          array(
	          ), function($message) use ($email)
	          {
	            // $message->from('abdulbasit3398@gmail.com');
	            $message->to($email, 'Admin')->subject('Welkom bij Bolbooks');
	        });
		}
	}


	public function recuring_payment_status(Request $request)
	{
		$payment_id = $request->id;
		$mollie_key = env("MOLLIE_KEY", "null");

		$payment_status = new Client();
		$result = $payment_status->request('get','https://api.mollie.com/v2/payments/'.$payment_id,[
			'headers' => [
				'Authorization' => 'Bearer '.$mollie_key
			],
		]);

		$response_data = (string) $result->getBody();
		$json = json_decode($response_data);
		$status = $json->status;

		$payment = Payment::where('payment_id',$payment_id)->first();
		$user = User::find($payment->user_id);
		
		if($status == 'paid')
		{
			$payment->payment_id = $json->id;
			$payment->amount_val = $json->amount->value;
			$payment->amount_currency = $json->amount->currency;
			$payment->description = $json->description;
			$payment->method = $json->method;
			$payment->status = $json->status;
			$payment->createdAt = $json->createdAt;
			$payment->paidAt = $json->paidAt;
			$payment->sequenceType = $json->sequenceType;
			$payment->customerId = $json->customerId;
			$payment->payment_for = 'recurring';
			$payment->save();

			if($user->access_type == 'trial')
			{
				$access_ends_at = $user->trial_ends_at;
			}
			else if($user->access_type == 'recurring')
			{
				$access_ends_at = $user->access_ends_at;
			}

			$access_ends_at = date('Y-m-d',strtotime($access_ends_at." + 30 days"));
			$user->access_ends_at = $access_ends_at;
			$user->access_type = 'recurring';
			$user->user_access = 1;
			$user->save();
		}
		elseif($status != 'pending')
		{
			$user->user_access = 0;
			$user->save();
		}
	}
}