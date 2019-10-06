<?php

namespace App\Http\Controllers\Auth;


use DB;
use Auth;
use Session;
use Artisan;
use App\User;
use App\Stock;
use App\Order;
use App\Leadsafety;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cache;


class LoginController extends Controller
{
    protected function authenticated() {
    if (Auth::check()) {
            $users = User::all();
            
            // foreach($users as $user){
            //     $dateFromDatabase = strtotime("$user->updated_at + 12 hours");
                
            //     $currentTime = strtotime("now");
            //     if($dateFromDatabase <= $currentTime  && ($user->client_id != null)){
            //         echo $user->name.'<br>';
            //         echo 'success'.'<br>';
            //     }
            //     else{
            //         echo 'fail'.'<br>';
            //     }
            // }
            // die();
            
            // foreach($users as $user){
                
            //     $dateFromDatabase = strtotime("$user->updated_at + 24 hours");
            //     $currentTime = strtotime("now");

            //     if(($dateFromDatabase <= $currentTime)  and ($user->client_id != null)){
            //         $client_id      = $user->client_id;
            //         $client_secret  = $user->client_secret;

            //         $client = new Client(); 
            //         $result = $client->request('post','https://login.bol.com/token?', [
            //             'headers' => [
            //                 'Accept'        => 'application/json',
            //                 'Content-Type'  => 'application/x-www-form-urlencoded',
            //             ],
            //             'form_params' => [
            //                 'client_id'     => $client_id,
            //                 'client_secret' => $client_secret,
            //                 'grant_type'    => 'client_credentials',
            //             ]
            //         ]);
            //         $response_data = (string) $result->getBody(); 
            //         $json = json_decode($response_data); 
            //         $bearer_token = $json->access_token;
            
                
            //     $client = new Client();
            //     $offer_csv = $client->post('https://api.bol.com/retailer/offers/export', [
            //         'headers' => [
            //             'Accept'         => 'application/vnd.retailer.v3+json',
            //             'Content-Type'   => 'application/vnd.retailer.v3+json',
            //             'Authorization'  => 'Bearer '.$bearer_token,
            //         ],
            //         'body' => json_encode(
            //             [
            //                 'format' => 'CSV'
            //             ]
            //         )
            //     ]);
            
            //     $response_offer_csv = (string) $offer_csv->getBody(); 
            //     $json = json_decode($response_offer_csv); 

            //     $offer_csv = $json->id;
            //     // sleep(2);

            //     $client = new Client();
            //     $offer_entity_id = $client->get('https://api.bol.com/retailer/process-status/'.$offer_csv, [
            //         'headers' => [
            //             'Accept'         => 'application/vnd.retailer.v3+json',
            //             'Content-Type'   => 'application/vnd.retailer.v3+json',
            //             'Authorization'  => 'Bearer '.$bearer_token,
            //         ]
            //     ]);
                
            //     $response_offer_entity_id = (string) $offer_entity_id->getBody(); 
            //     $json1 = json_decode($response_offer_entity_id);
                
            //     $offer_entity_id = $json1->entityId;
                
            //     $client = new Client();
            //     $retrieve_csv = $client->get('https://api.bol.com/retailer/offers/export/'.$offer_entity_id, [
            //         'headers' => [
            //             'Accept'         => 'application/vnd.retailer.v3+csv',
            //             'Authorization'  => 'Bearer '.$bearer_token,
            //         ]
            //     ]);
                
            //     $response_retrieve_csv = (string) $retrieve_csv->getBody(); 
            //     $response_array = (explode("\n",$response_retrieve_csv));
                
            //     // dd($response_array);
            //     $j = [];
            //     for($i = 1 ; $i < count($response_array) ; $i++){
            //         $j[$i] = explode(",",$response_array[$i]);
            //     }
            //     for($s = 1 ; $s < count($j); $s++){
            //         $offerId =$j[$s][0];
            
                    
            //         $client = new Client();
            //         $offer_csv = $client->get('https://api.bol.com/retailer/offers/'.$offerId, [
            //             'headers' => [
            //                 'Accept'         => 'application/vnd.retailer.v3+json',
            //                 'Authorization'  => 'Bearer '.$bearer_token,
            //             ]
            //         ]);
            
            //         $response_offer_csv = (string) $offer_csv->getBody(); 
            //         $json = json_decode($response_offer_csv);
            
            //         $offer_ean = $json->ean;
            //         $offer_amount = $json->stock->correctedStock;
            //         // $offer_amount = 973;
            //         $offer_title = $json->store->productTitle;
            
            //         Stock::create([
            //             'user_id'    => $user->id,
            //             'title'      => $offer_title,
            //             'stock_ean'  => $offer_ean,
            //             'stock_bsku' => 123,
            //             'nckstock'   => 123,
            //             'stock'      => $offer_amount,
            //             'leadtime'   => null,
            //             'safety_days'=> null,
            //     ]);
                    
            //         $check = DB::table('leadsafeties')->where('stock_ean', $offer_ean)->count();
                            
            //         // if($check == 0){
            //         //     Leadsafety::create([
            //         //         'user_id'    => $user->id,
            //         //         'stock_ean'  => $offer_ean,
            //         //     ]);
            //         // }       
            //     }

            //         // $date  = date('Y-m-d',strtotime('-1 day'));
            //         // $date2 = date('Y-m-d',strtotime('now'));
            //         // $previousStock = Stock::whereDate('created_at', $date)->get();
            //         // // dd($previousStock);
            //         // $stocks = Stock::whereDate('created_at', $date2)->get();
            //         // foreach($stocks as $stock){
            //         //     foreach($previousStock as $pstock){
            //         //         $result = 0;                            
            //         //         if($pstock->stock_ean == $stock->stock_ean){
            //         //             $result = $pstock->stock;
                    
            //         //         if($stock->stock < $result){
            //         //             Order::create([
            //         //                 'user_id'    => $user->id,
            //         //                 'stock_ean'  => $stock->stock_ean,
            //         //                 'quantity'   => $result - $stock->stock,
            //         //                 'order_date' => $date,
            //         //             ]);
            //         //         }
            //                 // elseif($stock->stock > $result){
            //                 //     $client      = new Client();
            //                 //     $shipmentFBB = $client->get('https://api.bol.com/retailer/shipments', [
            //                 //         'headers' => [
            //                 //             'Accept'         => 'application/vnd.retailer.v3+json',
            //                 //             'Authorization'  => 'Bearer '.$bearer_token,
            //                 //         ],
            //                 //         'form_params' => [
            //                 //             'fulfilment-method'     => 'FBB',
            //                 //         ]
            //                 //     ]);
                    
            //                 //     $response_shipment = (string) $shipmentFBB->getBody(); 
            //                 //     $json = json_decode($response_shipment); 
            //                 //     $shipmentFBB = $json->shipments;

            //                 //     foreach($shipmentFBB as $fbb){
            //                 //             echo $fbb->shipmentId.'<br>';
                                    
            //                 //     }
            //                 // }
            //             }
            //         }
            //     }
            //     // dd($shipmentFBB);
            //     // die();

            //         $currentTime = date('Y-m-d G:i:s');
            //         DB::table('users')
            //         ->where('id', $user->id)
            //         ->update([
            //             'updated_at'     => $currentTime,
            //         ]);
            //         }
            // }
        if(Auth::user()->client_id != null){
            Session::put('bearer_token', 'Available');
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('dashboard');
        }
    }
}

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    
    protected $redirectTo = '/dashboard';

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
