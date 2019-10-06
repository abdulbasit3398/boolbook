<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Payment;

class PaymentConfirmMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user_id = $request->user()->id;
      $payment = Payment::where([['user_id',$user_id],['status','paid'],['payment_for','first_api_data']])->get();
      
      if($payment[0] == null)
      {
        return redirect()->route('dashboard');
      }
      return $next($request);
    }
  }
