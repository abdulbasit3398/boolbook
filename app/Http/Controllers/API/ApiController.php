<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use DB;
use Auth;
use App\User;
use App\Model\Turnover;
use App\Model\Payment;
use App\Model\AllCosts;
use App\Model\User_invoice;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Auth; 

class ApiController extends Controller
{
  // public function __construct()
  // {
  //     $this->middleware('auth');
  // }
  // public $successStatus = 200;
  public function getResponse()
  {
    $first_date_last_month = new Carbon('first day of last month');
        // $start_date = date('Y-m-d',strtotime($first_date_last_month));
    $start_date = date('Y-m-01');

    // $last_date_last_month = new Carbon('last day of last month');
        // $last_date = date('Y-m-d',strtotime($last_date_last_month));
    $last_date = date('Y-m-t');
    
    $invoice_for_month = date('m',strtotime($first_date_last_month));
    $invoice_for_year = date('Y',strtotime($first_date_last_month));

    // $to_check = User_invoice::where([['for_month',$invoice_for_month],['for_year',$invoice_for_year],])->get();
    
    // if(count($to_check) != 0)
      // die();

    $users = User::all();
    foreach ($users as $user)
    {
      if($user->client_id)
      {
        $user_id = $user->id;
        $client_id = $user->client_id;
        $client_secret = $user->client_secret;
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

        $retailer_invoice = $client->request('get','https://api.bol.com/retailer/invoices?period-start='.$start_date.'&period-end='.$last_date,[

         'headers' => [
          'Accept'  => 'application/vnd.retailer.v3+json',
          'Authorization' => 'Bearer '.$bearer_token,
          'Content-Type'  => 'application/x-www-form-urlencoded',
          ]
        ]);

        $response_invoice = (string) $retailer_invoice->getBody();
        $json = json_decode($response_invoice);
        $invoice_id = $json->invoiceListItems[0]->invoiceId;
        $invoice_request_period = $json->period;
        $previous_invoice = User_invoice::where([['user_id',$user_id],['invoice_id',$invoice_id]])->first();
        
        if($invoice_id && count($previous_invoice) == 0)
        {
          $invoice = new User_invoice;
          $invoice->user_id = $user_id;
          $invoice->period = $invoice_request_period;
          $invoice->invoice_id = $invoice_id;
          $invoice->for_month = $invoice_for_month;
          $invoice->for_year = $invoice_for_year;
          $invoice->save();
          
          $invoice_detail = $client->request('get','https://api.bol.com/retailer/invoices/'.$invoice_id,[

            'headers' => [
              'Accept'    => 'application/vnd.retailer.v3+json',
              'Authorization' => 'Bearer '.$bearer_token,
            ]
          ]);
          $response_invoice_detail = (string) $invoice_detail->getBody();
          $json_invoic_detail = json_decode($response_invoice_detail);
          $array_length = count($json_invoic_detail->InvoiceLine);
                // var_dump($json_invoic_detail->InvoiceLine->item)
                // echo $response_invoice_detail;
        }else{
          $array_length = 0;
        }

        for($i=0 ; $i< $array_length; $i++)
        {
          $all_cost = new AllCosts;
          $all_cost->user_id = $user_id;
          $all_cost->user_invoice_id = $invoice_id;
          $all_cost->for_month = $invoice_for_month;
          $all_cost->for_year = $invoice_for_year;
          $all_cost->cost_name = $json_invoic_detail->InvoiceLine[$i]->Item->Name->value;
          $all_cost->custom_cost = 0;
          $all_cost->line_ext_val = $json_invoic_detail->InvoiceLine[$i]->LineExtensionAmount->value;
          $all_cost->tax_amount_val = $json_invoic_detail->InvoiceLine[$i]->TaxTotal[0]->TaxAmount->value;
          $all_cost->save();
        }
      }
    }
  }
  public function to_test_command()
  {
    $now_date = date('Y-m-d h:i:s A');
    var_dump($now_date);
    die();
    $data = array(
      'id' => 1,
      'name' => $now_date,
    );
    DB::table('test')->insert($data);
    // DB::table('test')->delete();
  }
  public function fetch_data_again(Request $request)
  {
    $user = User::find($request->user_id);

    $date = date('Y-m-d');
    $user_id = $user->id;
    $client_id = $user->client_id;
    $client_secret = $user->client_secret;

    $payment = Payment::where([['user_id',$user_id],['status','paid'],['payment_for','first_api_data']])->first();

    if(isset($request->new_user))
    {
      $payment->api_call = 0;
      $payment->save();

      $user->new_user = 1;
      $user->save();
      return 'success';
    }
    
    
    if($payment->api_call != 1)
      die();
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

    for($j = 0; $j < 12; $j++)
    {
      if($j == 9)
        sleep(60);
      $start_date = date('Y-m-01',strtotime($date));
      // echo 'start date'.$start_date.'<br/>';
      $last_date = date('Y-m-t',strtotime($date));
      // echo 'last date'.$last_date.'<br/>';
      $date = date("Y-m-d", strtotime("-1 day",strtotime($start_date)));
      // echo 'date'.$date.'<br/>';
      $invoice_for_month = date('m',strtotime($date));
      $invoice_for_year = date( 'Y',strtotime($date));

      $retailer_invoice = $client->request('get','https://api.bol.com/retailer/invoices?period-start='.$start_date.'&period-end='.$last_date,[

       'headers' => [
        'Accept'  => 'application/vnd.retailer.v3+json',
        'Authorization' => 'Bearer '.$bearer_token,
        'Content-Type'  => 'application/x-www-form-urlencoded',
        ]
      ]);

      $response_invoice = (string) $retailer_invoice->getBody();
      $json = json_decode($response_invoice);
      $invoice_id = $json->invoiceListItems[0]->invoiceId;
      $invoice_request_period = $json->period;

      // echo 'invoice id '.$invoice_id.' <br/>';
      if($invoice_id)
      {
        $invoice = new User_invoice;
        $invoice->user_id = $user_id;
        $invoice->period = $invoice_request_period;
        $invoice->invoice_id = $invoice_id;
        $invoice->for_month = $invoice_for_month;
        $invoice->for_year = $invoice_for_year;
        $invoice->save();
        
        $invoice_detail = $client->request('get','https://api.bol.com/retailer/invoices/'.$invoice_id,[

          'headers' => [
            'Accept'    => 'application/vnd.retailer.v3+json',
            'Authorization' => 'Bearer '.$bearer_token,
          ]
        ]);
        $response_invoice_detail = (string) $invoice_detail->getBody();
        $json_invoic_detail = json_decode($response_invoice_detail);
        $array_length = count($json_invoic_detail->InvoiceLine);
              // var_dump($json_invoic_detail->InvoiceLine->item)
              // echo $response_invoice_detail.'<br/>';
        for($i=0 ; $i< $array_length; $i++)
        {
          $all_cost = new AllCosts;
          $all_cost->user_id = $user_id;
          $all_cost->user_invoice_id = $invoice_id;
          $all_cost->for_month = $invoice_for_month;
          $all_cost->for_year = $invoice_for_year;
          $all_cost->cost_name = $json_invoic_detail->InvoiceLine[$i]->Item->Name->value;
          $all_cost->custom_cost = 0;
          $all_cost->line_ext_val = $json_invoic_detail->InvoiceLine[$i]->LineExtensionAmount->value;
          $all_cost->tax_amount_val = $json_invoic_detail->InvoiceLine[$i]->TaxTotal[0]->TaxAmount->value;
          $all_cost->save();

        }
      }else{
        break;
      }

    }

    $payment->api_call = 0;
    $payment->save();
    return 'success';
  }

  public function first_user_data(Request $request)
  {
    $user = User::find($request->user_id);

    $date = date('Y-m-d');
    $user_id = $user->id;
    $client_id = $user->client_id;
    $client_secret = $user->client_secret;

    $payment = Payment::where([['user_id',$user_id],['status','paid'],['payment_for','first_api_data']])->first();
    if($payment->api_call != 1)
      die();
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

    for($j = 0; $j < 12; $j++)
    {
      if($j == 9)
        sleep(60);
      $start_date = date('Y-m-01',strtotime($date));
      // echo 'start date'.$start_date.'<br/>';
      $last_date = date('Y-m-t',strtotime($date));
      // echo 'last date'.$last_date.'<br/>';
      $date = date("Y-m-d", strtotime("-1 day",strtotime($start_date)));
      // echo 'date'.$date.'<br/>';
      $invoice_for_month = date('m',strtotime($date));
      $invoice_for_year = date( 'Y',strtotime($date));

      $retailer_invoice = $client->request('get','https://api.bol.com/retailer/invoices?period-start='.$start_date.'&period-end='.$last_date,[

       'headers' => [
        'Accept'  => 'application/vnd.retailer.v3+json',
        'Authorization' => 'Bearer '.$bearer_token,
        'Content-Type'  => 'application/x-www-form-urlencoded',
        ]
      ]);

      $response_invoice = (string) $retailer_invoice->getBody();
      $json = json_decode($response_invoice);
      $invoice_id = $json->invoiceListItems[0]->invoiceId;
      $invoice_request_period = $json->period;

      // echo 'invoice id '.$invoice_id.' <br/>';
      if($invoice_id)
      {
        $invoice = new User_invoice;
        $invoice->user_id = $user_id;
        $invoice->period = $invoice_request_period;
        $invoice->invoice_id = $invoice_id;
        $invoice->for_month = $invoice_for_month;
        $invoice->for_year = $invoice_for_year;
        $invoice->save();
        
        $invoice_detail = $client->request('get','https://api.bol.com/retailer/invoices/'.$invoice_id,[

          'headers' => [
            'Accept'    => 'application/vnd.retailer.v3+json',
            'Authorization' => 'Bearer '.$bearer_token,
          ]
        ]);
        $response_invoice_detail = (string) $invoice_detail->getBody();
        $json_invoic_detail = json_decode($response_invoice_detail);
        $array_length = count($json_invoic_detail->InvoiceLine);
              // var_dump($json_invoic_detail->InvoiceLine->item)
              // echo $response_invoice_detail.'<br/>';
        for($i=0 ; $i< $array_length; $i++)
        {
          $all_cost = new AllCosts;
          $all_cost->user_id = $user_id;
          $all_cost->user_invoice_id = $invoice_id;
          $all_cost->for_month = $invoice_for_month;
          $all_cost->for_year = $invoice_for_year;
          $all_cost->cost_name = $json_invoic_detail->InvoiceLine[$i]->Item->Name->value;
          $all_cost->custom_cost = 0;
          $all_cost->line_ext_val = $json_invoic_detail->InvoiceLine[$i]->LineExtensionAmount->value;
          $all_cost->tax_amount_val = $json_invoic_detail->InvoiceLine[$i]->TaxTotal[0]->TaxAmount->value;
          $all_cost->save();

        }
      }else{
        break;
      }

    }

    $payment->api_call = 0;
    $payment->save();
    return 'success';
  }
}
