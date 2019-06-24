@extends('layout')

@section('content')

<div class="container">
    <h2>Account Details</h2>
</div>

<div class="container">
    Name: {{$user->name}}<br/>
    Articles: {{$art_count}}<br/>
    Subscription: {{$user->subscription}}<br/>
    <a href="/article"><button class="button" style="margin:15px;">Back To Home</button></a>
    
</div>

@endsection
