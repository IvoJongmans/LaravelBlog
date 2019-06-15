@extends('layout')

@section('content')
<div class="container">
    <h1>Create a blog entry!</h1>

    <form method="POST" action="/article" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="blog_title" placeholder="Title" class="@error('blog_title') is-invalid @enderror">
        </div>
        @error('blog_title')
            {{ $message }}
        @enderror
        <div>
            <textarea name="blog_body" class="tiny-mce" id="editor1" class="@error('blog_body') is-invalid @enderror"></textarea>
        </div>
        @error('blog_body')
            {{ $message }}
        @enderror
        <div>
            <input type="file" name="blog_image">
        </div>
        <div>
            <p>Allow Comments? Y/N</p>

            No: <input type="radio" name="blog_allow_comments" value="0" checked>
            Yes: <input type="radio" name="blog_allow_comments" value="1">
        </div>
        @foreach($allCategories as $category)
        <div class="col-sm-4 text-center">
            
        <input type="checkbox" name="categories[]" value="{{$category->id}}">
                {{$category->title}}
                {{-- Sport({{$allSportsCount}}) --}}
            
        </div>
        @endforeach
        <div>
            <button type="submit">CREATE!</button>
        </div>
    </form>
</div>
@endsection

