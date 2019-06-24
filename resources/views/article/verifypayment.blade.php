<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;URL=/verify" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style> 

    body {
        font-family: 'Playfair Display', serif;
      background-color: #f9f7f1;
      color: black;
    }  

</style>
<body>
    <div class="container">
        <h2 class="text-center" style="padding:25px;"><b>Verifying payment for {{$id->name}}</b></h2>
    </div>
    <div class="container text-center">
            <i class="fas fa-spinner fa-spin"></i>
    </div>
    @if($id->subscription == 'premium')
        <script>window.location = "/article";</script>
    @endif
</body>
</html>
