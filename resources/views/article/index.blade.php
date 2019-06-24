@extends('layout')

@section('username')
<a href="/user/{{$currentUser->id}}"><button class="button" type="button">{{$currentUser->name}}</button></a>
@endsection

@section('content')

<div class="container" style="padding:15px;">

<h1 class="text-center"><b>Welcome to Ivo's blog!</b></h1>

</div>

<div class="container" style="padding:15px;border-top:3px solid black">

    {{-- <div class="row"> --}}
        <form action="category" method="GET" class="row text-center">
        @foreach($allCategories as $category)
        <div class="col-sm-3 text-center">
            
                <input type="checkbox" name="categories[]" value="{{$category->id}}">
                {{$category->title}}
                {{-- Sport({{$allSportsCount}}) --}}
            
        </div>
        @endforeach
            @if(count($allCategories))
            <button class="button" type="submit">Submit</button>
            @endif
        {{-- </div> --}}
    </form>
    </div>


<div class="container" style="padding:15px;border-top:3px solid black">
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

<div class="container" style="padding:15px;border-top:3px solid black;border-bottom:3px solid black">    
        <div class="text-center">
            <form action="search" method="GET">
                <input type="text" name="search_input" placeholder="Search..." style="border:1px solid black;border-radius:10px;">
                <button class="button" type="submit">Search!</button>
            </form>
        </div>    
</div>

<div id="allContent" class="container d-flex flex-wrap p-2">

@foreach($allBlogs as $blog)
    
        <div class= "mx-auto my-3 blogpost" style="width:350px; max-height:500px; overflow:hidden;" >
            <a href="article/{{$blog->id}}"><h2 style="padding:15px;"><b>{{$blog->blog_title}}</b></h2></a>   
            
        @if($blog->blog_image != '')
            
        <div class="text-center">
            <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;filter:grayscale(100%)">
        </div>
        
        @endif
                
        <div style="padding:15px;">
        {!!$blog->blog_body!!}
        </div>

            {{-- @if($blog->blog_image != '')
            
                <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
            
            @endif --}}
        </div>   
    
    
@endforeach

</div>

@if((session('succes')) && ($currentUser->subscription == 'premium'))
<script type="text/javascript">
    $(document).ready(function() {
      $('#popupmodal').modal();
    });
 </script>
 <div id="popupmodal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="background-color:#f9f7f1;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Paymnet succesful!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>You can now use all the premium features that this site has to offer! Check your account details to see your new subscription.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="button" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endif
    
@endsection
