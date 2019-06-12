@extends('layout')

@section('content')

<a href="/article"><button>Back To Home</button></a>


<form action="/article/{{$article->id}}" method="POST">
    @csrf
    @method("PATCH")
    <input type="text" name="blog_title" value="{{$article->blog_title}}">
    <textarea name="blog_body">{{$article->blog_body}}</textarea>
    <button type="submit">SAVE</button>
</form>

    
@endsection