@extends('layout')

@section('content')

<div class="container">

<a href="/article"><button class="button">Back To Home</button></a>

@if((auth()->user()->usertype == 'blogger') && ($article->user_id == Auth::user()->id) )

    <a href="/article/{{$article->id}}/edit"><button class="button">EDIT</button></a>

@endif

<h2>{{$article->blog_title}}</h2>

<p>{!!$article->blog_body!!}</p>

@if($article->blog_image != '')
<div class="pull-left">
    <img src="{{ asset('img/'.$article->blog_image) }}" style="max-width:200px;">
</div>
@endif

<p>{{$article->created_at}}</p>

</div>

<div class="container">
    <div class="row">
        @foreach ($article->categories as $title)

            <div class="col-sm-2">
            	#{{$title->title}}
            </div>
        @endforeach
    </div>
</div>

@if($article->blog_allow_comments === 1)

<div class="container">

    @if(count($article->comments) >= 1)
       
        <h2>Comments:</h2>

    @foreach($article->comments as $comment)

        <li style="padding:25px;list-style-type:none;">{!!$comment->blog_comment!!}
        
        @if((auth()->user()->usertype == 'blogger') && ($article->user_id == Auth::user()->id) )

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

</div>

@endif

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

@endif


    
@endsection