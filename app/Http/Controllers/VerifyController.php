<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VerifyController extends Controller
{
    public function index() {
        $id = Auth::user();

        session()->flash('succes', 'Payment succesfull!');
        
        return view('article.verifypayment', compact('id'));
    }
}
