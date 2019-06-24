@extends('layout')

@section('content')

<h1 class="text-center"><b>SUBSCRIBE!</b></h1>
    
<p class="text-center" style="padding:30px;">You've reached the maximum amount of free blog posts!:(</p>

<div class="container">
    <div class="row">
        <div class="col-sm-4 offset-sm-4" style="border:1px solid black;height:250px;">
            <p class="text-center" style="padding:20px;">Go premium!</p>
            <h2 class="text-center" style="padding:20px;">€4.99 p/m</h2>
            <p class="text-center" style="padding:20px;">- Unlimited blog posts!</p>
        </div>
    </div>
</div>

<div class="text-center">
    @if(Auth::user()->payment_method == 'set')
    <a href="/stripe" ><button class="button" style="margin:20px;">Pay!</button></a>
    @endif
    @if(Auth::user()->payment_method == 'not_set')
    <a href="/addPaymentMethod"><button class="button" style="margin:20px;">Add Payment Method</button></a>
    @endif
</div>
@endsection
