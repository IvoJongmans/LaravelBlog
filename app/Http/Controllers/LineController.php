<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \LINE\LINEBot\SignatureValidator as SignatureValidator;

class LineController extends Controller
{
    public function eventx(Request $request) {

        return $request;
        // // First we fetch the Request instance
        // $request = Request::instance();

        // // Now we can get the content from it
        // $content = $request->getContent();     
        
        
//    ?     return $content;
    }
   
}
