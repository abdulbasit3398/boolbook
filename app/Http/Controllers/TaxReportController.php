<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Model\AllCosts;
use App\Model\UserShipmentId;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class TaxReportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('firstPayment');
	}
	public function index()
	{
		$day = date('d');
		
		$quarter = 0;
		$sub = -1;
		while ($quarter != 1) 
		{
			if($day == 31)
			{
				$monthYear = date("d-m-Y", strtotime("-31 days"));
				$month = date("m", strtotime("-31 days"));
				$day == 0;
			}
			else
			{
				$monthYear = date("d-m-Y", strtotime($sub." months"));
				$month = date("m", strtotime($sub." months"));
			}
			

			if($month % 3 == 0)
				$quarter = 1;
			$sub --;
		}
		// $monthYear = date('d-m-Y',strtotime($monthYear));
		$data['firstQuarterM'] = date("m", strtotime("-3 months",strtotime($monthYear)));
		$data['firstQuarterY'] = date("Y", strtotime("-3 months",strtotime($monthYear)));
		$data['secondQuarterM'] = date("m", strtotime("-6 months",strtotime($monthYear)));
		$data['secondQuarterY'] = date("Y", strtotime("-6 months",strtotime($monthYear)));
		$data['thirdQuarterM'] = date("m", strtotime("-9 months",strtotime($monthYear)));
		$data['thirdQuarterY'] = date("Y", strtotime("-9 months",strtotime($monthYear)));
		$data['fourthQuarterM'] = date("m", strtotime("-12 months",strtotime($monthYear)));
		$data['fourthQuarterY'] = date("Y", strtotime("-12 months",strtotime($monthYear)));
		$data['costs_years'] = AllCosts::where('user_id',Auth::id())->groupBy('for_year')->orderBy('for_year','DESC')->limit(7)->get();
		if($data['firstQuarterM'] == '12')
			$data['firstQuarterNum'] = 1;
		else if($data['firstQuarterM'] == '03')
			$data['firstQuarterNum'] = 2;
		else if($data['firstQuarterM'] == '06')
			$data['firstQuarterNum'] = 3;
		else if($data['firstQuarterM'] == '09')
			$data['firstQuarterNum'] = 4;

		if($data['secondQuarterM'] == '12')
			$data['secondQuarterNum'] = 1;
		else if($data['secondQuarterM'] == '03')
			$data['secondQuarterNum'] = 2;
		else if($data['secondQuarterM'] == '06')
			$data['secondQuarterNum'] = 3;
		else if($data['secondQuarterM'] == '09')
			$data['secondQuarterNum'] = 4;

		if($data['thirdQuarterM'] == '12')
			$data['thirdQuarterNum'] = 1;
		else if($data['thirdQuarterM'] == '03')
			$data['thirdQuarterNum'] = 2;
		else if($data['thirdQuarterM'] == '06')
			$data['thirdQuarterNum'] = 3;
		else if($data['thirdQuarterM'] == '09')
			$data['thirdQuarterNum'] = 4;

		if($data['fourthQuarterM'] == '12')
			$data['fourthQuarterNum'] = 1;
		else if($data['fourthQuarterM'] == '03')
			$data['fourthQuarterNum'] = 2;
		else if($data['fourthQuarterM'] == '06')
			$data['fourthQuarterNum'] = 3;
		else if($data['fourthQuarterM'] == '09')
			$data['fourthQuarterNum'] = 4;

		return view('m_dashboard.taxreport',compact('data'));
	}
}
