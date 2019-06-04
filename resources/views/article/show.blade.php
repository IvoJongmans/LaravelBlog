@extends('layout')

@section('content')

<div class="container">

<h2>{{$article->blog_title}}</h2>

<p>{!!$article->blog_body!!}</p>

<img src="{{ asset('img/'.$article->blog_image) }}" style="max-width:200px;">

<p>{{$article->created_at}}</p>

</div>

<div class="container">

    Comments:

    @foreach($article->comments as $comment)

        <li>{!!$comment->blog_comment!!}</li>



    @endforeach

</div>

<div class="container">
    <form action="/article/{{$article->id}}/comment" method="POST">
    @csrf
    <div>
        <textarea name="blog_comment"></textarea>        
    </div>
    {{-- <div>
        <input type="hidden" name="article_id" value="{{$article->id}}">
    </div> --}}
    <div>
        <button type="submit">Add Comment</button>        
    </div>
    </form>
</div>

<div style="height:100px;">

</div>


    
@endsection