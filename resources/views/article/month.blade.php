@extends('layout')

@section('content')

<div class="container">

        <h1 class="text-center">{{$monthName}}</h1>
        
        </div>

@foreach($allBlogs as $blog)

<div class="container" style="padding:30px;">
        
            <a href="/article/{{$blog->id}}"><h2>{{$blog->blog_title}}</h2></a>
        
       
    
        
    
           
               
                    {!!$blog->blog_body!!}
                
                
                @if($blog->blog_image != '')
                <div class="pull-left">
                    <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
                </div>
                @endif
            
    
            
        </div>

@endforeach
    
@endsection
