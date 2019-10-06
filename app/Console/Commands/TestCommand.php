<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class TestCommand extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'command:deleteTestTable';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Call Shipment API.';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $users = User::all();
    foreach($users as $user)
    {
      if($user->client_id)
      {
        $user_id = $user->id;
        $client_id = $user->client_id;
        $client_secret = $user->client_secret;

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
        $DateUntil = date('Y-m-d',strtotime('+1 day', strtotime($ToDayDate)));

        if($ToDayDate <= $april_last)
        {
          $first_january = new Carbon('first day of January');
          $DateUntil = date('Y-m-d',strtotime('-1 day', strtotime($first_january)));
        }
        elseif($ToDayDate <= $august_last)
        {
          $DateUntil = $april_last;
        }
        elseif($ToDayDate <= $december_last)
        {
          $DateUntil = $august_last;
        }

        $page = $calls = 1;
        $type = 'FBR';
        $found = 0;
        while($found != 2)
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
              
            }else{
              $found = 2;
            }
          }
          $calls ++;
          $page ++;
        }

        $page = $calls = 1;
        $type = 'FBB';
        $found = 0;
        while($found != 2)
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
              
            }else{
              $found = 2;
            }
          }
          $calls ++;
          $page ++;
        }
      }
    }
    echo "DONE";
  }
}
