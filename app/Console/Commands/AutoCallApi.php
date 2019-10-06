<?php

namespace App\Console\Commands;

use DB;
use Auth;
use Session;
use App\User;
use App\Stock;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

use Illuminate\Console\Command;

class AutoCallApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autocall:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Updated!';

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
        foreach($users as $user){
            $client_id      = $user->client_id;
            $client_secret  = $user->client_secret;
            $user_id        = $user->id;
            
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
            
            // Cache::put('bearer_token', $bearer_token, 4);
            // Session(['bearer_token' => $bearer_token]);
            // Session::put('bearer_token', 'hello');
            // Cache::put('bearer_token', $bearer_token, 299);
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

            // dd($stocks);
            if (Stock::where('user_id', '=', $user_id)->exists()) {
                // user found
                foreach($stocks as $stock){
                    $check = DB::table('stocks')->where('stock_ean',$stock->ean)->count();
                    // dd($data);
                    if($check == 0)
                    {
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
                    }
                }
            }
            else{
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
                    }
                }
            }

            $this->info('Database Updated Successfuly!');
    }
}
