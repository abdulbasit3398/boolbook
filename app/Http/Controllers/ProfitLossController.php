<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Auth;
use DateTime;
use App\User;
use App\Model\Turnover;
use App\Model\AllCosts;
use App\Model\User_invoice;
use Illuminate\Http\Request;

class ProfitLossController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('firstPayment');
  }
  public function index()
  {
    // $first_date_last_month = new Carbon('first day of last month');
    // $data['invoice_for_month'] = date('m',strtotime($first_date_last_month));
    // $data['invoice_for_year'] = date('Y',strtotime($first_date_last_month));

    $data['invoice_for_month'] = date('m');
    $data['invoice_for_year'] = date('Y');
    $data['monthName'] = date("F", mktime(0, 0, 0, $data['invoice_for_month'], 10));

        // var_dump($invoice_for_year);
        // die();

        // $dateObj   = DateTime::createFromFormat('!m', $month);
        // $data['monthName'] = $dateObj->format('F');
    	// $user_id = Auth::user()->id;
    	// $data['all_costs'] = AllCosts::where([['user_id',$user_id],['for_month',$invoice_for_month],])->get();
    	// foreach ($all_costs as $key) {
    	// 	var_dump($key['cost_name']);
    	// }
    	// var_dump($data['all_costs']);
    	// die();
    // return view('dashboard.profitloss',compact('data'));
    return view('m_dashboard.profitloss',compact('data'));
  }
}
