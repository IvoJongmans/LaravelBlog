<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class SubscribeController extends Controller
{
    public function index(){

        $user = Auth::user();

        return view('article.subscribe', compact('user'));
    }
}
