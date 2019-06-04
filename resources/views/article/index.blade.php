@extends('layout')

@section('content')

@if(auth()->user()->id == 1)

<a href="article/create"><button type="button">CREATE ENTRY</button></a>

@endif

<div class="container">

<h1 class="text-center">Welcome to our blog!</h1>



@foreach($allBlogs as $blog)

<div>
<a href="article/{{$blog->id}}"><h2 class="text-center">{{$blog->blog_title}}</h2></a>

    <p>{!!$blog->blog_body!!}</p>

    <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">

    <p>{{$blog->created_at}}</p>

</div>

@endforeach

</div>
    
@endsection
