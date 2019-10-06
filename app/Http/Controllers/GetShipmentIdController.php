<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Model\UserShipmentId;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class GetShipmentIdController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function get_user_shipment_id()
	{
		$user_id = Auth::user()->id;
		$client_id = Auth::user()->client_id;
		$client_secret = Auth::user()->client_secret;

		$april_last = new Carbon('last day of April');
		$april_last = strtotime($april_last);
		$april_last = date('Y-m-d',$april_last);

		$august_last = new Carbon('last day of August');
		$august_last = strtotime($august_last);
		$august_last = date('Y-m-d',$august_last);

		$december_last = new Carbon('last day of December');
		$december_last = strtotime($december_last);
		$december_last = date('Y-m-d',$december_last);

		$ToDayDate = date('Y-m-d');

		// $client = new Client();
		// $result = $client->request('post','https://login.bol.com/token?', [
		// 			      'headers' => [
		// 			        'Accept'        => 'application/json',
		// 			        'Content-Type'  => 'application/x-www-form-urlencoded',
		// 			      ],
		// 			      'form_params' => [
		// 			        'client_id'     => $client_id,
		// 			        'client_secret' => $client_secret,
		// 			        'grant_type'    => 'client_credentials',
		// 			      ]
		// 			    ]);
  //   $response_data = (string) $result->getBody(); 
  //   $json = json_decode($response_data); 
  //   $bearer_token = $json->access_token;

		if($ToDayDate <= $april_last)
		{
			$first_january = new Carbon('first day of January');
			$DateUntil = date('Y-m-d',strtotime('-1 day', strtotime($first_january)));
			var_dump($DateUntil);
			die();
		}
		elseif($ToDayDate <= $august_last)
		{
			$DateUntil = $april_last;
			$users = User::all();
			$i = 0;
			foreach($users as $user)
			{
				$user_id = $user->id;
				$shipment_ids[$i] = UserShipmentId::where([['user_id', '=', $user_id],['shipment_date', '>', $DateUntil],])->get();
				$i++;
			}
			for($i=0;$i<count($shipment_ids);$i++)
			{
				if($shipment_ids[$i] != '')
				{
					for($j = 0; $j < count($shipment_ids[$i]); $j++)
					{
						echo $shipment_ids[$i].'<br>';
					}
				}
			}
			// var_dump($shipment_ids[0]);
			die();
			// $DateUntil = '2019-04-30';
			$page = $calls = 1;
			$type = 'FBR';
			$found = 0;
			$j =0;
			while($found == 0)
			{
				if($calls % 7 == 0)
					sleep(59);
				$client = new Client();
				$result = $client->request('post','https://login.bol.com/token?', [
					'headers' => [
						'Accept'        => 'application/json',
						'Content-Type'  => 'application/x-www-form-urlencoded',
					],
					'form_params' => [
						'client_id'     => $client_id,
						'client_secret' => $client_secret,
						'grant_type'    => 'client_credentials',
					]
				]);
				$response_data = (string) $result->getBody(); 
				$json = json_decode($response_data); 
				$bearer_token = $json->access_token;
				$shipment = $client->request('get','https://api.bol.com/retailer/shipments?fulfilment-method='.$type.'&page='.$page,[
					'headers' => [
						'Accept' => 'application/vnd.retailer.v3+json',
						'Authorization'  => 'Bearer '.$bearer_token,
						'Content-Type' => 'application/x-www-form-urlencoded',
					],
				]);

				$shipment = (string)$shipment->getBody();
				$shipment_json = json_decode($shipment);
				$count_shipment = count($shipment_json->shipments);

				for($i = 0; $i < $count_shipment; $i++)
				{
					$shipment_date = date('Y-m-d',strtotime($shipment_json->shipments[$i]->shipmentDate));

					if($shipment_date > $DateUntil)
					{

						$data = array(
							'user_id' => $user_id,
							'shipment_id' => $shipment_json->shipments[$i]->shipmentId,
							'shipment_date' => $shipment_date,
							'shipment_type' => $type,
						);
						DB::table('user_shipment_ids')->insert($data);
						
					}
					else
					{
						$found = 1;
					}
				}
				$calls ++;
				$page ++;
			}

			$DateUntil = $april_last;
			$page = $calls = 1;
			$type = 'FBB';
			$found = 0;
			$j =0;
			while($found == 0)
			{
				if($calls % 7 == 0)
					sleep(59);
				$client = new Client();
				$result = $client->request('post','https://login.bol.com/token?', [
					'headers' => [
						'Accept'        => 'application/json',
						'Content-Type'  => 'application/x-www-form-urlencoded',
					],
					'form_params' => [
						'client_id'     => $client_id,
						'client_secret' => $client_secret,
						'grant_type'    => 'client_credentials',
					]
				]);
				$response_data = (string) $result->getBody(); 
				$json = json_decode($response_data); 
				$bearer_token = $json->access_token;
				$shipment = $client->request('get','https://api.bol.com/retailer/shipments?fulfilment-method='.$type.'&page='.$page,[
					'headers' => [
						'Accept' => 'application/vnd.retailer.v3+json',
						'Authorization'  => 'Bearer '.$bearer_token,
						'Content-Type' => 'application/x-www-form-urlencoded',
					],
				]);

				$shipment = (string)$shipment->getBody();
				$shipment_json = json_decode($shipment);
				$count_shipment = count($shipment_json->shipments);

				for($i = 0; $i < $count_shipment; $i++)
				{
					$shipment_date = date('Y-m-d',strtotime($shipment_json->shipments[$i]->shipmentDate));

					if($shipment_date > $DateUntil)
					{

						$data = array(
							'user_id' => $user_id,
							'shipment_id' => $shipment_json->shipments[$i]->shipmentId,
							'shipment_date' => $shipment_date,
							'shipment_type' => $type,
						);
						DB::table('user_shipment_ids')->insert($data);
						
					}
					else
					{
						$found = 1;
					}
				}
				$calls ++;
				$page ++;
			}
			die();

		}
		elseif($ToDayDate <= $december_last)
		{
			$DateUntil = $august_last;
			var_dump($december_last);
			die();
		}

		

		$page = 3;
		$type = 'FBR';
		$shipment = $client->request('get','https://api.bol.com/retailer/shipments?fulfilment-method='.$type.'&page='.$page,[
			'headers' => [
				'Accept' => 'application/vnd.retailer.v3+json',
				'Authorization'  => 'Bearer '.$bearer_token,
				'Content-Type' => 'application/x-www-form-urlencoded',
			],
	    	// 'form_params' => [
	     //      'fulfilment-method' => 'FBR',
	     //      'page' => $page,
	     //  ]
		]);
		$date1 = '2019-06-13';
		$date1 = strtotime($date1);
		$date1 = date('Y-m-d',$date1);
		$shipment = (string)$shipment->getBody();
		$shipment_json = json_decode($shipment);
		$count_shipment = count($shipment_json->shipments);
		$count_shipment = $count_shipment - 1;
		var_dump($shipment_json->shipments[$count_shipment]->shipmentDate);
		$date = strtotime($shipment_json->shipments[$count_shipment]->shipmentDate);
		$date = date('Y-m-d',$date);

		if($date < $date1)
		{
			echo "GREATER";
		}
		else{
			echo "NOT GREATER";
		}
		var_dump($date);	
		die();
	}
}
