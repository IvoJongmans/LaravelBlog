@extends('layout')

@section('content')
    <h1>Create a blog entry!</h1>

    <form method="POST" action="/blog">
        @csrf

        <div>
            <input type="text" name="blog_title" placeholder="Title">
        </div>
        <div>
            <textarea name="blog_body"></textarea>
        </div>
        <div>
            <button type="submit">CREATE!</button>
        </div>
    </form>

@endsection

