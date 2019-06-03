@extends('layout')

@section('content')

<h1>Welcome to our blog!</h1>

<a href="blog/create"><button type="button">CREATE ENTRY</button></a>

@foreach($allBlogs as $blog)

<div>
    <h2>{{$blog->blog_title}}</h2>

    <p>{!!$blog->blog_body!!}</p>

    <p>{{$blog->created_at}}</p>

</div>

@endforeach
    
@endsection