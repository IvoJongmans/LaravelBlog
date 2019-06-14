@extends('layout')

@section('content')

<h1 class="text-center">SUBSCRIBE!</h1>
    
<p class="text-center" style="padding:30px;">You've reached the maximum amount of free blog posts!:( 
     Please click the button below to subscribe to our paid platform.</p>

<div class="text-center">
    <a href="/stripe"><button class="button">Pay!</button></a>
    <a href="/addPaymentMethod"><button class="button">Add Payment Method</button></a>
</div>
@endsection
