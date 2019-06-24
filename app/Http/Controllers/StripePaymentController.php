<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
   
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
        
        $customer_id = Auth::user()->stripe_id;

        \Stripe\Subscription::create([
            "customer" => $customer_id,
            "items" => [
              [
                "plan" => "plan_FFh3EomI5tQ7vF",
              ],
            ]
          ]);
  
        session()->flash('succes', 'Payment succesfull!');
          
        return redirect('/verify');
    }
}
