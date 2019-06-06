@extends('layout')

@section('content')

@if(auth()->user()->id == 1)

<a href="article/create"><button type="button">CREATE ENTRY</button></a>

@endif

<div class="container">

<h1 class="text-center">Welcome to our blog!</h1>

</div>

<div class="container" style="padding:50px;">

    <div class="row">
        <div class="col-sm-4">
            <form action="category" method="GET">
                <input type="checkbox" name="categories[]" value="sport">
                Sport
            
        </div>
        <div class="col-sm-4">
            
            <input type="checkbox" name="categories[]" value="food">
            Food
        </div>
        <div class="col-sm-4">
            
            <input type="checkbox" name="categories[]" value="leisure">
            Leisure
            </form>
        </div>
    </div>

</div>

<div class="container">    
        <div class="text-center">
            <form action="search" method="GET">
                <input type="text" name="search_input" placeholder="Search...">
                <button type="submit">Search!</button>
            </form>
        </div>    
</div>


@foreach($allBlogs as $blog)

<div class="container">
    <div class="row">
        <a href="article/{{$blog->id}}"><h2>{{$blog->blog_title}}</h2></a>
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

</div>
    
@endsection
