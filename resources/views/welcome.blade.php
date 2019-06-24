<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Playfair Display', serif;
                background-color: #f9f7f1;
                color: black;
            }

            .button {
                background-color: transparent;
                color: black;
                border: 1px solid black;
                border-radius: 10px
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #text {
                color: yellow;
            }
        </style>
    </head>
    <body>
        
            @if (Route::has('login'))
                
                    <div class="container text-right">
                    	@auth
                    	    <a href="{{ url('/home') }}"><button class="button" type="button">Home</button></a>
                    	@else
                    	    <a href="{{ route('login') }}"><button class="button" type="button">Login</button></a>
                    
                    	    @if (Route::has('register'))
                    	        <a href="{{ route('register') }}"><button class="button" type="button">Register</button></a>
                    	    @endif
                    	@endauth
                    </div>
                
            @endif

            <div class="container" style="padding:15px;">

                <h1 class="text-center"><b>Welcome to Ivo's blog!</b></h1>
                <p class="text-center">Please login or register to read the full blog.</p>
                    
            </div>

            <div id="allContent" class="container d-flex flex-wrap p-2">

                    @foreach($allBlogs as $blog)
                        
                            <div class= "mx-auto my-3 blogpost" style="width:350px; max-height:240px; overflow:hidden;" >
                                <a href="article/{{$blog->id}}"><h2 style="padding:15px;"><b>{{$blog->blog_title}}</b></h2></a>   
                                
                            @if($blog->blog_image != '')
                                
                            <div class="text-center">
                                <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;filter:grayscale(100%)">
                            </div>
                            
                            @endif
                                    
                            <div style="padding:15px;" class="home_blog_text">
                            {!!$blog->blog_body!!}
                            </div>
                                {{-- @if($blog->blog_image != '')
                                
                                    <img src="{{ asset('img/'.$blog->blog_image) }}" style="max-width:200px;">
                                
                                @endif --}}
                            </div>   
                        
                        
                    @endforeach
                    
                    </div>
            
       
    </body>
</html>
