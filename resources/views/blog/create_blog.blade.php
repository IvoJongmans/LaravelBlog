@extends('layout')

@section('content')
<div class="container">
    <h1>Create a blog entry!</h1>

    <form method="POST" action="/blog" enctype="multipart/form-data">
        @csrf

        <div>
            <input type="text" name="blog_title" placeholder="Title">
        </div>
        <div>
            <textarea name="blog_body" class="tiny-mce" id="editor1"></textarea>
        </div>
        <div>
            <input type="file" name="blog_image">
        </div>
        <div>
            <button type="submit">CREATE!</button>
        </div>
    </form>
</div>
@endsection

