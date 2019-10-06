<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Stock;
use App\Leadsafety;
use Session;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;


class BackendController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function dashboard($days){

      $datedays = $days;
      $user_id = Auth::user()->id;
      $date = date('Y-m-d H:i:s',strtotime('-24 hours'));
      $stocks = DB::table('stocks')
      ->where([
        ['user_id', '=', $user_id],
        ['created_at', '>=', $date]
      ])
      ->get();

      if($datedays == 3){
        $datebaseon = date('Y-m-d H:i:s',strtotime('-3 days'));
      }
      elseif($datedays == 7){
        $datebaseon = date('Y-m-d H:i:s',strtotime('-7 days'));
      }
      elseif($datedays == 30){
        $datebaseon = date('Y-m-d H:i:s',strtotime('-30 days'));
      }
      elseif($datedays == 90){
        $datebaseon = date('Y-m-d H:i:s',strtotime('-90 days'));
      }

            // dd($datebaseon);
      $basedOnDays = DB::table('orders')
      ->join('stocks', 'stocks.stock_ean', '=', 'orders.stock_ean')
      ->join('leadsafeties', 'leadsafeties.stock_ean', '=', 'stocks.stock_ean')
      ->where([
        ['orders.user_id', '=', $user_id],
        ['orders.order_date', '>=', $datebaseon],
        ['stocks.created_at', '>=', $date]
      ])
      ->get()
      ->groupBy('stock_ean');

            // dd($basedOn30Days);
      return view('dashboard.dashboard', compact('stocks', 'basedOnDays', 'datedays'));

  }

  public function getToken(Request $request){
    $client_id      = request('client_id');
    $client_secret  = request('client_secret');

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
        // echo $result->getStatusCode();
        // die();
        if($result->getStatusCode() == 200) { // 200 OK

          $user_id =Auth::user()->id;
          $email   = Auth::user()->email;
          DB::table('users')
          ->where('email', $email)
          ->update([
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
          ]);


          $response_data = (string) $result->getBody(); 
          $json = json_decode($response_data); 
          $bearer_token = $json->access_token;

          Session(['bearer_token' => $bearer_token]);
          $client = new Client();
          $stocks = $client->get('https://api.bol.com/retailer/inventory', [
            'headers' => [
              'Accept'         => 'application/vnd.retailer.v3+json',
              'Authorization'  => 'Bearer '.$bearer_token,
            ]
          ]);

          $response_stocks = (string) $stocks->getBody(); 
          $json = json_decode($response_stocks); 
          $stocks = $json->offers;

                    // user found
          foreach($stocks as $stock){
            Stock::create([
              'user_id'    => $user_id,
              'title'      => $stock->title,
              'stock_ean'  => $stock->ean,
              'stock_bsku' => $stock->bsku,
              'nckstock'   => $stock->nckStock,
              'stock'      => $stock->stock,
              'leadtime'   => null,
              'safety_days'=> null,
            ]);

            $check = DB::table('leadsafeties')->where('stock_ean', $stock->ean)->count();

            if($check == 0){
              Leadsafety::create([
                'user_id'    => $user_id,
                'stock_ean'  => $stock->ean,
              ]);
            }
          }
          return redirect()->route('dashboard', 3);
        }
        else{
          return redirect()->route('dashboard', 3)->with('message', "Wrong Credentials");
        }

        // var_dump(response()->json($result));
      }

      public function stock(){
        if(\Auth::check()){
          $user_id = Auth::user()->id;

            // $stocks = DB::table('stocks')
            //     ->select('stock_ean', DB::raw('SUM(stock) as total_amount'))
            //     ->where('user_id', $user_id)
            //     ->groupBy('stock_ean')
            //     ->get();

            // dd($users);
            // $result = $stocks->groupBy('stock_ean');
            // $res    = $result->latest();
          $date = date('Y-m-d H:i:s',strtotime('-24 hours'));
            // dd($date);
            // die();
          $stocks = DB::table('stocks')
          ->where([
            ['user_id', '=', $user_id],
            ['created_at', '>=', $date]
          ])
          ->get();

          $allstock = DB::table('stocks')
          ->where([
            ['user_id', '=', $user_id]
          ])
          ->get();

          $stockGroupBy = DB::table('stocks')
          ->where('user_id', $user_id)
          ->get()
          ->groupBy('stock_ean');

            // foreach($stockGroupBy as $stock => $item)
            // // echo $stock.'<br>';
            // foreach($item as $it){
            //     echo $it->stock_ean.'<br>';
            // }

            // die();

            // dd($stockGroupBy);

          return view('dashboard.stock', compact('stocks', 'stockGroupBy', 'allstock'));
        }
        else{
          return redirect('login');
        }
      }

      public function almostTime($days){
        if(\Auth::check()){
          $datedays = $days;
          $user_id = Auth::user()->id;
          $date = date('Y-m-d H:i:s',strtotime('-24 hours'));
          $stocks = DB::table('stocks')
          ->where([
            ['user_id', '=', $user_id],
            ['created_at', '>=', $date]
          ])
          ->get();

          if($datedays == 3){
            $datebaseon = date('Y-m-d H:i:s',strtotime('-3 days'));
          }
          elseif($datedays == 7){
            $datebaseon = date('Y-m-d H:i:s',strtotime('-7 days'));
          }
          elseif($datedays == 30){
            $datebaseon = date('Y-m-d H:i:s',strtotime('-30 days'));
          }
          elseif($datedays == 90){
            $datebaseon = date('Y-m-d H:i:s',strtotime('-90 days'));
          }

            // dd($datebaseon);
          $basedOnDays = DB::table('orders')
          ->join('stocks', 'stocks.stock_ean', '=', 'orders.stock_ean')
          ->join('leadsafeties', 'leadsafeties.stock_ean', '=', 'stocks.stock_ean')
          ->where([
            ['orders.user_id', '=', $user_id],
            ['orders.order_date', '>=', $datebaseon],
            ['stocks.created_at', '>=', $date]
          ])
          ->get()
          ->groupBy('stock_ean');

            // dd($basedOn30Days);
          return view('dashboard.almosttime', compact('stocks', 'basedOnDays', 'datedays'));
        }
        else{
          return redirect('login');
        }
      }

      public function leadTimes(){
        if(\Auth::check()){
          $user_id = Auth::user()->id;
          $date = date('Y-m-d H:i:s',strtotime('-24 hours'));
          $stocks = DB::table('stocks')
          ->join('leadsafeties', 'leadsafeties.stock_ean', '=', 'stocks.stock_ean')
          ->where([
            ['stocks.user_id', '=', $user_id],
            ['stocks.created_at', '>=', $date]
          ])
          ->get();

            // dd($stocks);
          return view('dashboard.lead', compact('stocks'));
        }
        else{
          return redirect('login');
        }
      }

      public function leadTimesSave(Request $request){
        $stock_ean   = request('stock_ean');
        $leadtime    = request('leadtime');
        $safety_days = request('safety_days');
        $user_id = Auth::user()->id;
        // die();
        DB::table('leadsafeties')
        ->where([
          'user_id' => $user_id, 
          'stock_ean' => $stock_ean
        ])
        ->update([
          'leadtime'      => $leadtime,
          'safety_days'   => $safety_days
        ]);

        return redirect('/lead-times')->with('message', 'Leadtimes successfuly updated!');

      }

      public function refreshResult(){

        $client_id      = Auth::user()->client_id;
        $client_secret  = Auth::user()->client_secret;

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

        $client = new Client();
        $stocks = $client->get('https://api.bol.com/retailer/inventory', [
          'headers' => [
            'Accept'         => 'application/vnd.retailer.v3+json',
            'Authorization'  => 'Bearer '.$bearer_token,
          ]
        ]);

        $response_stocks = (string) $stocks->getBody(); 
        $json = json_decode($response_stocks); 
        $stocks = $json->offers;

        $date = date('Y-m-d H:i:s',strtotime('-24 hours'));

        $dateFromDatabase = Auth::user()->updated_at;
        $dateFromDatabase   = strtotime("$dateFromDatabase + 24 hours");

        $currentTime        = strtotime("now");

        if($dateFromDatabase >= $currentTime){
          DB::table('stocks')
          ->where([
            ['user_id', '=', Auth::user()->id],
            ['created_at', '>=', $date]
          ])
          ->delete();    

          foreach($stocks as $stock){
            Stock::create([
              'user_id'    => Auth::user()->id,
              'title'      => $stock->title,
              'stock_ean'  => $stock->ean,
              'stock_bsku' => $stock->bsku,
              'nckstock'   => $stock->nckStock,
              'stock'      => $stock->stock,
            ]);

            $check = DB::table('leadsafeties')->where('stock_ean', $stock->ean)->count();

            if($check == 0){
              Leadsafety::create([
                'user_id'    => Auth::user()->id,
                'stock_ean'  => $stock->ean,
              ]);
            }
          }
          $currentTime = date('Y-m-d G:i:s');
          DB::table('users')
          ->where('id', $user->id)
          ->update([
            'updated_at'     => $currentTime,
          ]);
        }

        return redirect('/stock')->with('message', 'Refreshed successfuly!');


            // $dateFromDatabase = strtotime("Auth::user()->updated_at + 12 hours");
            // $currentTime = strtotime("now");

            // if(($dateFromDatabase <= $currentTime)  && ($user->client_id != null)){

                // $client_id      = $user->client_id;
                // $client_secret  = $user->client_secret;

                // $client = new Client(); 
                // $result = $client->request('post','https://login.bol.com/token?', [
                //     'headers' => [
                //         'Accept'        => 'application/json',
                //         'Content-Type'  => 'application/x-www-form-urlencoded',
                //     ],
                //     'form_params' => [
                //         'client_id'     => $client_id,
                //         'client_secret' => $client_secret,
                //         'grant_type'    => 'client_credentials',
                //     ]
                // ]);
                // $response_data = (string) $result->getBody(); 
                // $json = json_decode($response_data); 
                // $bearer_token = $json->access_token;


            // $client = new Client();
            // $stocks = $client->get('https://api.bol.com/retailer/inventory', [
            //     'headers' => [
            //         'Accept'         => 'application/vnd.retailer.v3+json',
            //         'Authorization'  => 'Bearer '.$bearer_token,
            //     ]
            // ]);

            // $response_stocks = (string) $stocks->getBody(); 
            // $json = json_decode($response_stocks); 
            // $stocks = $json->offers;

                // user found
                // foreach($stocks as $stock){
                //         Stock::create([
                //             'user_id'    => $user->id,
                //             'title'      => $stock->title,
                //             'stock_ean'  => $stock->ean,
                //             'stock_bsku' => $stock->bsku,
                //             'nckstock'   => $stock->nckStock,
                //             'stock'      => $stock->stock,
                //             'leadtime'   => null,
                //             'safety_days'=> null,
                //     ]);
                //     }
                // $currentTime = date('Y-m-d G:i:s');
                // DB::table('users')
                // ->where('id', $user->id)
                // ->update([
                //     'updated_at'     => $currentTime,
                // ]);
                // }
      }

      public function help()
      {
        return view('dashboard.help');
      }
    }
