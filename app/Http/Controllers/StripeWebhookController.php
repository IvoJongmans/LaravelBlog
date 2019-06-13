<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StripeWebhookController extends Controller
{
    public function handle(Request $request){
       
        $user_id = $request->data['object']['metadata']['user_id'];
        User::where('id', $user_id)->update(array('subscription' => 'premium'));
        
    }
}
