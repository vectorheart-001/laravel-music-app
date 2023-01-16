<!DOCTYPE html>
<html>
@vite('resources/css/app.css')
<head>
    <title>DnBCentral</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="bg-gray-500 flex space-x-8 pl-3">
    <a class = "text-left no-underline text-white" href="">Home</a>
    <a class = "text-left no-underline text-white" href="">Track list</a>
    <a class = "text-left no-underline text-white"  href="">Log in</a>
    <a class = "text-left no-underline text-white" href="">Log out</a>
</div>
<br>
<br>
<br>
<br>
<div class="container ">

    <br>

    @yield('content')
</div>

</body>
</html>
