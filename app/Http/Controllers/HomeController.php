<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(Request $request)
    {

      if ($request->has('ref')) {
        session(['referrer' => $request->query('ref')]);
        Session::save();
        return redirect()->away('http://bolbooks.nl/');
        
      }

      if(!Auth::user())
      {
        return view('auth.login');
      }
      return redirect()->route('dashboard');
      // return view('index');
    }
  }
