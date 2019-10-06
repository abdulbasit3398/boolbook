<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
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
		else{
			$user->user_access = 0;
			$user->save();
		}
	}
}
