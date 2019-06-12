@extends('layout')

@section('content')

<div class="container">

        <h1 class="text-center">{{$monthName}}</h1>
        
        </div>

@foreach($allBlogs as $blog)

<div class="container">
        <div class="row">
            <a href="/article/{{$blog->id}}"><h2>{{$blog->blog_title}}</h2></a>
        </div>
    </div>    
    
        <div class="container">
            <div class="row">
    
            <div class="col-sm-12">
                <div class="pull-left">
                    {!!$blog->blog_body!!}
                </div>
                
                <div class="pull-left">
                    <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
                </div>
            </div>
    
            </div>
        </div>

@endforeach
    
@endsection
