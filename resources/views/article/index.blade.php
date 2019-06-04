@extends('layout')

@section('content')

<div class="container">

<h1>Welcome to our blog!</h1>

<a href="article/create"><button type="button">CREATE ENTRY</button></a>

@foreach($allBlogs as $blog)

<div>
<a href="article/{{$blog->id}}"><h2>{{$blog->blog_title}}</h2></a>

    <p>{!!$blog->blog_body!!}</p>

    <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">

    <p>{{$blog->created_at}}</p>

</div>

@endforeach

</div>
    
@endsection
