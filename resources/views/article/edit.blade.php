@extends('layout')

@section('content')

<div class="container">
    <a href="/article"><button class="button" style="margin:15px;">Back To Home</button></a>
    
    
    <form action="/article/{{$article->id}}" method="POST">
        @csrf
        @method("PATCH")
        <input type="text" name="blog_title" value="{{$article->blog_title}}">
        <textarea name="blog_body" style="margin:15px;">{{$article->blog_body}}</textarea>
        <button type="submit" style="margin:15px;" class="button" >Save</button>
    </form>
</div>

    
@endsection