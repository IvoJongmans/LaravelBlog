<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Auth;   

class AddPaymentController extends Controller
{
    public function index(){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // $customer= \Stripe\Customer::retrieve('cus_FFgs4n1MQc55DC');
        $customer_id = Auth::user()->stripe_id;
        Stripe\Customer::createSource(
            $customer_id,
            [
              'source' => 'tok_visa',
            ]
          );

        return view('article.addpayment');
    }
}
