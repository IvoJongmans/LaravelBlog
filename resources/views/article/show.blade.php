@extends('layout')

@section('content')

<div class="container">

<h2>{{$article->blog_title}}</h2>

<a href="/article"><button>Back To Home</button></a>

<p>{!!$article->blog_body!!}</p>

<div class="text-center">
    <img src="{{ asset('img/'.$article->blog_image) }}" style="max-width:200px;">
</div>

<p>{{$article->created_at}}</p>

</div>

<div class="container">

    @if(count($article->comments) >= 1)
       
        <h2>Comments:</h2>

    @foreach($article->comments as $comment)

        <li style="padding:25px;list-style-type:none;border-top:3px solid black;">{!!$comment->blog_comment!!}
        
        @if(auth()->user()->id == 1)

        <form method="POST" action="/article/{{$article->id}}/comment/{{$comment->id}}">
            @csrf
            @method("DELETE")
            <button type="submit">DELETE COMMENT</button>
        </form>
        
        @endif
        
        </li>

    @endforeach
    @elseif (count($article->comments) == 0)

        <h2>Be the first to comment!</h2>

    @endif

</div>

<div class="container">
    <form action="/article/{{$article->id}}/comment" method="POST">
    @csrf
    <div>
        <textarea name="blog_comment"></textarea>        
    </div>
    <div>
        <button type="submit">Add Comment</button>        
    </div>
    </form>
</div>

<div style="height:100px;">

</div>


    
@endsection