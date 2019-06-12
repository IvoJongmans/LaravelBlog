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
            <button class="button" type="submit">Submit</button>
            
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

<div id="allContent">

@foreach($allBlogs as $blog)

<div class="container">
    <div class="row">
        <a href="article/{{$blog->id}}" class="text-center"><h2>{{$blog->blog_title}}</h2></a>
    </div>
</div>



    <div class="container">
        <div class="row">

        <div class="col-sm-12">
            <div class="pull-left">
                {!!$blog->blog_body!!}
            </div>
            @if($blog->blog_image != '')
            <div class="pull-left">
                <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
            </div>
            @endif
        </div>

        </div>
    </div>
    
@endforeach

</div>
    
@endsection
