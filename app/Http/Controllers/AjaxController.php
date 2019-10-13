<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Auth;
use App\User;
use App\Model\Turnover;
use App\Model\AllCosts;
use App\Model\User_invoice;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AjaxController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function retrive_costs_by_month(Request $request)
  {
   $user_id = Auth::user()->id;
   $invoice_for_month = $request['month'];
   $invoice_for_year = $request['year'];
   $data['all_costs'] = AllCosts::where([['user_id',$user_id],['for_month',$invoice_for_month],['for_year',$invoice_for_year],['custom_cost','=','0'],])->groupBy('cost_name')->get();
   // $data['custom_costs'] = AllCosts::where([['user_id',$user_id],['for_month',$invoice_for_month],['for_year',$invoice_for_year],['custom_cost','!=','0'],])->get();
   $data['custom_costs'] = DB::table('all_costs')->select(DB::raw(" cost_name,sum(line_ext_val) as line_ext_val,sum(tax_amount_val) as tax_amount_val "))->where("user_id",$user_id)->where("for_month",$invoice_for_month)->where("for_year",$invoice_for_year)->where("custom_cost","!=","0")->groupBy('custom_cost')->get();

   return $data;
 }

  public function check_client_credentials(Request $request)
  {
    $user_id = Auth::user()->id;
    $user = User::find($user_id);
    $client_id = $request->client_id;
    $client_secret = $request->client_secret;
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
    if($json->access_token != '')
    {
      $user->client_id = $client_id;
      $user->client_secret = $client_secret;
      $user->save();
    }
    return $json->access_token;
  }

  public function calculate_tax_report_quarterly(Request $request)
  {
    $user_id = Auth::user()->id;
    $date = '01-'.$request['month'].'-'.$request['year'];
    // $date = '01-12-2018';

    $date = date('d-m-Y',strtotime($date));
    $firstMonthM = date("m", strtotime("+1 months",strtotime($date)));
    $firstMonthY = date("Y", strtotime("+1 months",strtotime($date)));

    $secondMonthM = date("m", strtotime("+2 months",strtotime($date)));
    $secondMonthY = date("Y", strtotime("+2 months",strtotime($date)));

    $thirdMonthM = date("m", strtotime("+3 months",strtotime($date)));
    $thirdMonthY = date("Y", strtotime("+3 months",strtotime($date)));

    $data['firstMonthCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$firstMonthM],['for_year',$firstMonthY],['custom_cost','=','0'],])->groupBy('cost_name')->get();

    $data['secondMonthCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$secondMonthM],['for_year',$secondMonthY],['custom_cost','=','0'],])->groupBy('cost_name')->get();

    $data['thirdMonthCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$thirdMonthM],['for_year',$thirdMonthY],['custom_cost','=','0'],])->groupBy('cost_name')->get();

    $data['firstMonthCustomCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$firstMonthM],['for_year',$firstMonthY],['custom_cost','!=','0'],])->get();

    $data['secondMonthCustomCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$secondMonthM],['for_year',$secondMonthY],['custom_cost','!=','0'],])->get();

    $data['thirdMonthCustomCosts'] = AllCosts::where([['user_id',$user_id],['for_month',$thirdMonthM],['for_year',$thirdMonthY],['custom_cost','!=','0'],])->get();

    return $data;
  }
}
