<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use DateTime;
use App\User;
use Carbon\Carbon;
use App\Model\Payment;
use App\Model\AllCosts;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UserAccountController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('firstPayment');
  }
  public function index()
  {
    // return view('dashboard.user_account');
    return view('m_dashboard.user_account');
  }

  public function edit_profile()
  {
    $data = Auth::user();
    return view('m_dashboard.edit_profile',compact('data'));
  }

  public function update_profile(Request $request)
  {

    $name = $request->name;
    $last_name = $request->last_name;
    $street_name = $request->street_name;
    $house_no = $request->house_no;
    $residence = $request->residence;
    $post_code = $request->post_code;
    $company_name = $request->company_name;
    $vat_number = $request->vat_number;
    $account_iban = $request->account_iban;

    $user_id = Auth::user()->id;

    $user = User::find($user_id);

    if($name)
      $user->name = $name;
    elseif($last_name)
      $user->last_name = $last_name;
    elseif($residence)
      $user->residence = $residence;
    elseif($post_code)
      $user->post_code = $post_code;
    elseif($street_name)
      $user->street_name = $street_name;
    elseif($house_no)
      $user->house_no = $house_no;
    elseif($company_name)
      $user->company_name = $company_name;
    elseif($vat_number)
      $user->vat_number = $vat_number;
    elseif($account_iban)
      $user->account_iban = $account_iban;
    
    $user->save();
    return redirect()->back();
  }

  public function view_invoice()
  {
    $user_id = Auth::user()->id;
    $payments = Payment::where([['user_id',$user_id],['sequenceType','recurring'],['status','paid']])->get();
    // dd($payment);
    return view('m_dashboard.view_invoice',compact('payments'));
  }

  public function bol_account_detail()
  {
    $data = Auth::user();
    return view('m_dashboard.bol_account_detail',compact('data'));
  }

  public function affiliate_program()
  {
    $data = Auth::user();
    $user_id = Auth::user()->id;
    $affiliate_data['current_month'] = date('F');
    $current_month = date('m');
    $affiliate_data['current_year'] = date('Y');
    $user = User::where('referrer_id',$user_id)->whereMonth('created_at', $current_month)->get();
    $affiliate_data['referrals_this_month'] = count($user);

    $payments = Payment::where([['status','paid'],['user_id',$user_id]])->whereMonth('createdAt',$current_month)->get();
    $affiliate_data['amount_referrals_paid_to_company_this_month'] = 0;
    $affiliate_data['payout_amount_in_this_month'] = 0;
    foreach ($payments as $payment) {
      $affiliate_data['amount_referrals_paid_to_company_this_month'] += $payment->amount_val;
    }
    $affiliate_data['payout_amount_in_this_month'] = ($affiliate_data['amount_referrals_paid_to_company_this_month']/121)*100;
    $affiliate_data['payout_amount_in_this_month'] = $affiliate_data['payout_amount_in_this_month'] * 0.2;
    $affiliate_data['payout_amount_in_this_month'] = round($affiliate_data['payout_amount_in_this_month'],2);

    // dd($affiliate_data);
    return view('m_dashboard.affiliate_program',compact('data','affiliate_data'));
  }

  public function download_invoice($id)
  {
    $payment = Payment::find($id);
    $invoice_no = 172833+$id;

    //user can generate only its own invoice
    if($payment->user_id != Auth::user()->id)
      die();

    $kosten = ($payment->amount_val/121)*100;
    $total_btw = ($payment->amount_val/121)*21;
    $turnover_category = '';

    if($payment->amount_val == 5.99)
    {
      $turnover_category = '0-2000';
    }
    else if($payment->amount_val == 24.14)
    {
      $turnover_category = '2000-5000';
    }
    else if($payment->amount_val == 36.24)
    {
      $turnover_category = '5000-10000';
    }
    else if($payment->amount_val == 48.34)
    {
      $turnover_category = '10000-30000';
    }
    else if($payment->amount_val == 84.64)
    {
      $turnover_category = '> 30000';
    }

    $data = [
      'invoice_nr' => $invoice_no,
      'kosten' => round($kosten,2),
      'total_btw' => round($total_btw,2),
      'turnover_category' => $turnover_category,
      'payment_data' => 'PayPal',
      'street_name' => 'St. Burnham',
      'number' => '12',
      'postal_code' => '7821',
      'city' => 'San Jose',
      'vat_number' => '123902'
    ];
    // dd($data);
        $pdf = PDF::loadView('dashboard.download_invoice',compact('payment'),$data);
        return $pdf->download('invoice.pdf');
    // $pdf = PDF::loadView('dashboard.download_invoice');
    // return $pdf->stream('invoice.pdf');
    // return $pdf->download('invoice.pdf');
  }

  public function manage_subscription()
  {
    $user_id = Auth::user()->id;
    $customerId = Auth::user()->mollie_customer_id;
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
    if($total_revenue > 0 && $total_revenue < 2000)
    {
      $amount_val = 5.99;
    }
    else if($total_revenue > 2000 && $total_revenue < 5000)
    {
      $amount_val = 24.14;
    }
    else if($total_revenue > 5000 && $total_revenue < 10000)
    {
      $amount_val = 36.24;
    }
    else if($total_revenue > 10000 && $total_revenue < 30000)
    {
      $amount_val = 48.34;
    }
    else if($total_revenue > 30000)
    {
      $amount_val = 84.64;
    }

    $amount_val = strval($amount_val);

    $user = User::find($user_id);

    $interval = 0;
    if($user->access_type == 'trial')
    {
      $trial_ends_at = $user->trial_ends_at;
      $next_payment_date = date('Y-m-d',strtotime($trial_ends_at));

      // if($trial_ends_at != '')
      // {
      //   $today = date('Y-m-d');
      //   $trial_ends_at = new DateTime($trial_ends_at);
      //   $today = new DateTime($today);
      //   $interval = $today->diff($trial_ends_at);
      //   $interval = $interval->format('%R%a');
      // }
    }
    else if($user->access_type == 'recurring'){
      $access_ends_at = $user->access_ends_at;
      $next_payment_date = date('Y-m-d',strtotime($access_ends_at));
      // $today = date('Y-m-d');
      // $access_ends_at = new DateTime($access_ends_at);
      // $today = new DateTime($today);
      // $interval = $today->diff($access_ends_at);
      // $interval = $interval->format('%R%a');
    }
    $customer_id = $user->mollie_customer_id;
    $mendate_id = $user->mollie_mandate_id;
    // $client = new Client();
    // $result = $client->request('get','https://api.mollie.com/v2/customers/'.$customer_id.'/mandates/'.$mendate_id,[
    //             'headers' => [
    //               'Content-Type' => 'application/json',
    //               'Authorization' => 'Bearer '.
    //             ],
    //           ]);
    $customer = Mollie::api()->customers()->get($customer_id);
    $customer_mendate = $customer->getMandate($mendate_id);
    // dd($customer_mendate);

    $method = $customer_mendate->method;
    if($method == 'directdebit')
    {
      $method = 'iDeal';
    }
    $consumerName = $customer_mendate->details->consumerName;
    $consumerAccount = $customer_mendate->details->consumerAccount;

    $data = array(
      'amount_val' => $amount_val,
      'next_payment_date' => $next_payment_date,
      'method' => $method,
      'consumerAccount' => $consumerAccount,
      'consumerName' => $consumerName

    );
    return view('m_dashboard.manage_subscription',compact('data'));
  }

}
 