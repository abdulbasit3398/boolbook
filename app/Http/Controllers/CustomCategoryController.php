<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Auth;
use App\Model\CustomCategory;
use App\Model\AllCosts;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class CustomCategoryController extends Controller
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
      $user_id = Auth::user()->id;
      $category_name = strtolower($request->category_name);
      $category_name = ucfirst($category_name);
        // $category_name = str_replace(' ', '_', $category_name);

      $validator = $this->validate($request,[
        'category_name' => 'required',
      ]);
      $custom_category = CustomCategory::where([['user_id',$user_id],['category_name',$category_name]])->get();
      
      if($validator->fails)
      {
        return redirect()->back()->with('errors');
      }
      elseif (count($custom_category) > 0)
      {
        return redirect()->back()->with('error','Deze naam bestaat al.');
      }
      else
      {
        $custom_category = new CustomCategory;
        $custom_category->user_id = $user_id;
        $custom_category->category_name = $category_name;
        $custom_category->save();
        // session(['message' => 'Kostenpost succesvol toegevoegd.']);
        // return redirect()->route('kosten.index');
        return redirect(route('kosten.index'))->with('message','Kostenpost succesvol toegevoegd.');
      }
      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CustomCategory  $customCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CustomCategory $customCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CustomCategory  $customCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($customCategory)
    {
      $data['custom_category'] = CustomCategory::where('id',$customCategory)->get();
      return view('dashboard.edit_category_name',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CustomCategory  $customCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$customCategory)
    {
      

      $category_id = $request->category_id;
      
      $category_name = $request->category_name;
        // $category_name = ucfirst($category_name);

      $category = CustomCategory::find($category_id);
      $category->category_name = $category_name;
      $category->save();

      $all_costs_category = AllCosts::where('custom_cost',$category_id)->get();
      
      foreach($all_costs_category as $cost_category)
      {
        $custom_cost = AllCosts::find($cost_category->id);
        $custom_cost->cost_name = $category_name;
        $custom_cost->save();
      }
      // session(['message' => 'Kostenpost succesvol gewijzigd.']);
      // return redirect()->route('kosten.index');
      return redirect(route('kosten.index'))->with('message' => 'Kostenpost succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CustomCategory  $customCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($customCategory)
    {
      $user_id = Auth::user()->id;
      $custom_category = AllCosts::where([['user_id',$user_id],['custom_cost',$customCategory],])->delete();
      CustomCategory::where('id',$customCategory)->delete();

      return redirect()->back()->with('message','Kostenpost succesvol verwijderd.');
      
        // if(count($custom_category) > 0)
        // {
        //     return redirect()->back()->with('error','This category has values in it.');
        // }
        // else
        // {
            // CustomCategory::where('id',$customCategory)->delete();
      
        // }
      
    }
  }
