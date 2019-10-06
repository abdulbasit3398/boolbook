<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use DB;
use Auth;
use App\User;
use App\Model\Turnover;
use App\Model\AllCosts;
use App\Model\User_invoice;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Command;

class RetailerInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:retailerinvoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save Invoices every month.';

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
      DB::table('test')->delete();
      $users = User::all();
      foreach ($users as $user) {
        if($user->client_id)
        {
          $invoice = new User_invoice;
          $invoice->user_id = '155';
          $invoice->period = '2019-06-01T00:00:00.000+02:00/2019-06-30T00:00:00.000+02:00';
          $invoice->invoice_id = '1234567';
          $invoice->for_month = '09';
          $invoice->for_year = '2019';
          $invoice->save();
        //   $user_id = $user->id;
        //   $client_id = $user->client_id;
        //   $client_secret = $user->client_secret;
        //   $client = new Client();
        //   $result = $client->request('post','https://login.bol.com/token?', [
        //     'headers' => [
        //       'Accept'        => 'application/json',
        //       'Content-Type'  => 'application/x-www-form-urlencoded',
        //     ],
        //     'form_params' => [
        //       'client_id'     => $client_id,
        //       'client_secret' => $client_secret,
        //       'grant_type'    => 'client_credentials',
        //     ]
        //   ]);
        //   $response_data = (string) $result->getBody(); 
        //   $json = json_decode($response_data); 
        //   $bearer_token = $json->access_token;

        //   $first_date_last_month = new Carbon('first day of last month');
        //       // $start_date = date('Y-m-d',strtotime($first_date_last_month));
        //   $start_date = date('Y-m-01');

        //   $last_date_last_month = new Carbon('last day of last month');
        //       // $last_date = date('Y-m-d',strtotime($last_date_last_month));
        //   $last_date = date('Y-m-t');
          
        //   $invoice_for_month = date('m',strtotime($first_date_last_month));
        //   $invoice_for_year = date('Y',strtotime($first_date_last_month));
          
        //   $retailer_invoice = $client->request('get','https://api.bol.com/retailer/invoices?period-start='.$start_date.'&period-end='.$last_date,[

        //    'headers' => [
        //     'Accept'  => 'application/vnd.retailer.v3+json',
        //     'Authorization' => 'Bearer '.$bearer_token,
        //     'Content-Type'  => 'application/x-www-form-urlencoded',
        //     ],
        //               // 'form_params' => [
        //               //     'period-start' => 2019-04-01,
        //               //     'period-end' => 2019-04-30,
        //               // ]
        //   ]);

        //   $response_invoice = (string) $retailer_invoice->getBody();
        //   $json = json_decode($response_invoice);
        //   $invoice_id = $json->invoiceListItems[0]->invoiceId;
        //   $invoice_request_period = $json->period;

        //   if($invoice_id)
        //   {
        //     $invoice = new User_invoice;
        //     $invoice->user_id = $user_id;
        //     $invoice->period = $invoice_request_period;
        //     $invoice->invoice_id = $invoice_id;
        //     $invoice->for_month = $invoice_for_month;
        //     $invoice->for_year = $invoice_for_year;
        //     // $invoice->save();
        //     echo 'DATA';
        //     $invoice_detail = $client->request('get','https://api.bol.com/retailer/invoices/'.$invoice_id,[

        //       'headers' => [
        //         'Accept'    => 'application/vnd.retailer.v3+json',
        //         'Authorization' => 'Bearer '.$bearer_token,
        //       ]
        //     ]);
        //     $response_invoice_detail = (string) $invoice_detail->getBody();
        //     $json_invoic_detail = json_decode($response_invoice_detail);
        //     $array_length = count($json_invoic_detail->InvoiceLine);
        //           // var_dump($json_invoic_detail->InvoiceLine->item)
        //           // echo $response_invoice_detail;
        //   }else{
        //     echo "NO DATA";
        //   }

        //   for($i=0 ; $i< $array_length; $i++)
        //   {
        //     $all_cost = new AllCosts;
        //     $all_cost->user_id = $user_id;
        //     $all_cost->user_invoice_id = $invoice_id;
        //     $all_cost->for_month = $invoice_for_month;
        //     $all_cost->for_year = $invoice_for_year;
        //     $all_cost->cost_name = $json_invoic_detail->InvoiceLine[$i]->Item->Name->value;
        //     $all_cost->custom_cost = 0;
        //     $all_cost->line_ext_val = $json_invoic_detail->InvoiceLine[$i]->LineExtensionAmount->value;
        //     $all_cost->tax_amount_val = $json_invoic_detail->InvoiceLine[$i]->TaxTotal[0]->TaxAmount->value;
        //     // $all_cost->save();

        //           // echo $i.' '.$json_invoic_detail->InvoiceLine[$i]->ID->value.'\n';
        //     //       echo $i.' '.$json_invoic_detail->InvoiceLine[$i]->Item->Name->value.'<br/>';
        //     //       echo $i.' '.$json_invoic_detail->InvoiceLine[$i]->LineExtensionAmount->value.'<br/>';

        //       // echo $i.' '.$json_invoic_detail->InvoiceLine[$i]->TaxTotal[0]->TaxAmount->value.'<br/>';

        //       // if($json->InvoiceLine[$i]->ID->value == $invoice_id.'#TURNOVER')
        //       //  echo 'PICK_PACK';
        //   }
        }
      }
    }
  }
