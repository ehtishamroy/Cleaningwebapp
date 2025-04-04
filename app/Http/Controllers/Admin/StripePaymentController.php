<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
   
    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

     public function stripe()

     {
 
         return view('stripe');
 
     }
 
     
 
     /**
 
      * success response method.
 
      *
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function stripePost(Request $request)
 
     {
 
         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
 
     
 
         Stripe\Charge::create ([
 
                 "amount" => 100 * 100,
 
                 "currency" => "usd",
 
                 "source" => $request->stripeToken,
 
                 "description" => "Test payment from" 
 
         ]);
 
       
 
         Session::flash('success', 'Payment successful!');
 
               
 
         return back();
 
     }
}
