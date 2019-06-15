<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StripeWebhookController extends Controller
{
    public function handle(Request $request){
       
        $customer_id = $request->data['object']['customer'];
        User::where('stripe_id', $customer_id)->update(array('subscription' => 'premium'));
        
    }
}
