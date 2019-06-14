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
        // $user_id = Auth::id();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Stripe\Charge::create ([
        //         "amount" => 100 * 100,
        //         "currency" => "usd",
        //         "source" => $request->stripeToken,
        //         "description" => "Test payment from itsolutionstuff.com.",
        //         "metadata" => ['user_id' => $user_id]
        // ]);
        $customer_id = Auth::user()->stripe_id;

        \Stripe\Subscription::create([
            "customer" => $customer_id,
            "items" => [
              [
                "plan" => "plan_FFh3EomI5tQ7vF",
              ],
            ]
          ]);
  
        Session::flash('success', 'Payment successful!');
          
        // return back();
    }
}
