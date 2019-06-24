<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Auth;   
use App\User;

class AddPaymentController extends Controller
{
    public function index(){

        Stripe::setApiKey(env('pk_test_9GgUgNx8TfFAFPLEQWW5P4Hw00qF0wNQYJ'));
        $customer_id = Auth::user()->stripe_id;
        Stripe\Customer::createSource(
            $customer_id,
            [
              'source' => 'tok_visa',
            ]
          );
      
          User::where('stripe_id', $customer_id)->update(array('payment_method' => 'set'));

        return view('article.addpayment');
    }
}
