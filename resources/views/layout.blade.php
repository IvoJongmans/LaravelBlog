<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>
            var text = "";
            var words = [];
            var textreturn = "";

            tinymce.init({selector:'textarea',
            init_instance_callback: function (editor) {
            editor.on('KeyUp', function (e) {
            var text = tinyMCE.activeEditor.getContent();
            console.log(text);
            words = text.split(/\n|\t|\s|<p>/); 
            console.log(words);
            for(let i = 0; i < words.length; i++) {
                    //You can place all your TextExpanders here
                    if (words[i].substr(0,3) == '#cg'){
                        words[i] = "CodeGorilla";
                        textreturn = words.join(" ");
                        console.log(textreturn);
                        $(".text_expander").val(textreturn);
                        tinyMCE.activeEditor.setContent(textreturn);
                    }
                    if (words[i].substr(0,4) == '#ivo'){
                        words[i] = "Ivo Jongmans";
                        textreturn = words.join(" ");
                        console.log(textreturn);
                        $(".text_expander").val(textreturn);
                        tinyMCE.activeEditor.setContent(textreturn).focus();
                    }
                }
            });
        }
});
    </script>
</head>
<style>

    body {
        font-family: 'Playfair Display', serif;
      background-color: #f9f7f1;
      color: black;
    }  

    .blogpost {
        border-right:1px solid black;
        padding: 10px;
    }

    .blogpost:last-child {
        border:none;
    }

    a {
        color:black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }
    

    h1 {
        font-family: 'Playfair Display', serif;
        color: black;
    }

    h2 {
        font-family: 'Playfair Display', serif;
        border-bottom: 1px solid black;
        width: 100%;
    }

    .button {
        background-color: transparent;
        color: black;
        border: 1px solid black;
        border-radius: 10px
    }

    .button:hover {
        color: grey;
    }
      
</style>

<body>   
            
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-right">
                <a href="{{ url('/logout') }}"><button class="button" type="button">LOGOUT</button></a>
                @if(auth()->user()->usertype == 'blogger')
                <a href="/article/create"><button class="button" type="button">CREATE ENTRY</button></a>
                @endif
                @yield('username')
            </div>
        </div>
    </div>       

    @yield('content')

</body>
</html>