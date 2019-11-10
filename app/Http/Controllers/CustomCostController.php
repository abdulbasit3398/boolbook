<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Auth;
use App\Model\AllCosts;
use App\Model\CustomCategory;
use App\Model\CustomCost;
use Illuminate\Http\Request;

class CustomCostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('firstPayment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $first_date_last_month = new Carbon('first day of last month');
      $data['invoice_for_month'] = date('m',strtotime($first_date_last_month));
      $data['invoice_for_year'] = date('Y',strtotime($first_date_last_month));
      $data['monthName'] = date("F", mktime(0, 0, 0, $data['invoice_for_month'], 10));

      $user_id = Auth::user()->id;
      $data['custom_category'] = CustomCategory::where('user_id',$user_id)->get();
      //Fetch all custom costs
      $data['custom_costs'] = AllCosts::where([['user_id',$user_id],['custom_cost','!=','0']])->orderBy('for_year','desc')->orderBy('for_month','desc')->orderBy('id','desc')->get();
      //Fetch custom costs group by for_month
      $data['custom_costs_group'] = AllCosts::where([['user_id',$user_id],['custom_cost','!=','0']])->groupBy('for_month')->orderBy('for_year','desc')->orderBy('for_month','desc')->get();

      return view('m_dashboard.customcosts',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
          'for_month' => 'required',
          'custom_category' => 'required',
          'cost_amount' => 'required',
          'tax_amount' => 'required',
          'category_description' => 'required',
        ]);
        if($validator->fails)
        {
          return redirect()->back()->with('errors');
        }
        else
        {
          $cost_amount = $request->cost_amount;
          $cost_amount = str_replace(',', '.', $cost_amount);
          $tax_amount = $request->tax_amount;
          $tax_amount = str_replace(',', '.', $tax_amount);
          // dd($cost_amount);
          if(!is_numeric($cost_amount) || !is_numeric($tax_amount))
          {
            return redirect()->back()->with('error','Vul alsjeblieft alleen getallen in.');
          }
          $user_id = Auth::user()->id;
          $month = substr($request->for_month,0,2);
          $year = substr($request->for_month,2);

          $category_description = $request->category_description;
          $custom_category_id = $request->custom_category;
          $custom_cost = CustomCategory::find($custom_category_id);
          $custom_category_name = $custom_cost->category_name;

          // $cost_amount = $request->cost_amount;
          // $tax_amount = $request->tax_amount;

          // $cost_amount_opt = $request->cost_amount_opt;
          // $tax_amount_opt = $request->tax_amount_opt;

          // if($cost_amount_opt == 1 && $tax_amount_opt == 1)
          // {
          //   $tax_amount_100 = $tax_amount + 100;
          //   $cost = ($cost_amount/$tax_amount_100) * 100;
          //   $tax = ($cost_amount/$tax_amount_100) * 21;

          // }
          // elseif($cost_amount_opt == 0 && $tax_amount_opt == 1)
          // {
          //   $cost = $cost_amount;
          //   $tax = ($cost_amount/100) * $tax_amount;
          // }
          // elseif($cost_amount_opt == 1 && $tax_amount_opt == 0)
          // {
          //   $cost = $cost_amount - $tax_amount;
          //   $tax = $tax_amount;
          // }
          // elseif($cost_amount_opt == 0 && $tax_amount_opt == 0)
          // {
          //   $cost = $cost_amount;
          //   $tax = $tax_amount;
          // }
          

          $cost = $request->result_cost;
          $tax = $request->result_tax;
          
          $all_costs = new AllCosts;
          $all_costs->user_id = $user_id;
          $all_costs->user_invoice_id = 0;
          $all_costs->for_month = $month;
          $all_costs->for_year = $year;
          $all_costs->cost_name = $custom_category_name;
          $all_costs->custom_cost = $custom_category_id;
          $all_costs->line_ext_val = $cost;
          $all_costs->tax_amount_val = $tax;
          $all_costs->description = $category_description;
          $all_costs->save();

          return redirect()->back()->with('message','Kosten succesvol toegevoegd.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CustomCost  $customCost
     * @return \Illuminate\Http\Response
     */
    public function show(CustomCost $customCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CustomCost  $customCost
     * @return \Illuminate\Http\Response
     */
    public function edit($customCost)
    {
      dd($custom_cost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CustomCost  $customCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomCost $customCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CustomCost  $customCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($customCost)
    {
        AllCosts::where('id',$customCost)->delete();
        return redirect()->back()->with('message','Kosten succesvol verwijderd.');
    }

  }
