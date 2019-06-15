@extends('layout')

@section('content')

{{-- @if(auth()->user()->usertype == 'blogger')


    <div class="col-sm-6">
        <a href="article/create"><button type="button">CREATE ENTRY</button></a>
    </div>
</div>
{{ Auth::user()->id }}

@endif --}}

<div class="container" style="padding:15px;">

<h1 class="text-center">Welcome to Ivo's blog!</h1>

</div>

<div class="container" style="padding:15px;">

    {{-- <div class="row"> --}}
        <form action="category" method="GET" class="row text-center">
        @foreach($allCategories as $category)
        <div class="col-sm-3 text-center">
            
                <input type="checkbox" name="categories[]" value="{{$category->id}}">
                {{$category->title}}
                {{-- Sport({{$allSportsCount}}) --}}
            
        </div>
        @endforeach
            @if(count($allCategories))
            <button class="button" type="submit">Submit</button>
            @endif
        {{-- </div> --}}
    </form>
    </div>


<div class="container" style="padding-bottom:15px;">
    <div class="row">
        <div class="col-sm-1">
            <a href="article/month/1">Jan</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Feb</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Mar</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Apr</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">May</a>
        </div>
        <div class="col-sm-1">
            <a href="article/month/6">Jun</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Jul</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Aug</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Sep</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Oct</a> 
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Nov</a>
        </div>
        <div class="col-sm-1">
                <a href="article/month/1">Dec</a>
        </div>
    </div>
</div>

<div class="container" style="padding:15px;">    
        <div class="text-center">
            <form action="search" method="GET">
                <input type="text" name="search_input" placeholder="Search...">
                <button class="button" type="submit">Search!</button>
            </form>
        </div>    
</div>

<div id="allContent" class="container d-flex flex-wrap p-2">

@foreach($allBlogs as $blog)
    
        <div class= "mx-auto my-3" style="border:5px solid white; width:350px; max-height:500px; overflow:hidden;border-radius:10px;" >
            <a href="article/{{$blog->id}}"><h2 style="padding:15px;">{{$blog->blog_title}}</h2></a>   
            
        @if($blog->blog_image != '')
            
        <div class="text-center">
            <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
        </div>
        
        @endif
                
        <div style="padding:15px;">
        {!!$blog->blog_body!!}
        </div>

            {{-- @if($blog->blog_image != '')
            
                <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
            
            @endif --}}
        </div>   
    
    
@endforeach

</div>

@if(session('succes'))
    {{session('succes')}}
@endif
    
@endsection
