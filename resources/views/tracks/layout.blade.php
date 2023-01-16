<!DOCTYPE html>
<html>
@vite('resources/css/app.css')
<head>
    <title>DnBCentral</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="bg-gray-500 flex space-x-8 pl-3">

    <a class = "text-left no-underline text-white" href="{{ URL::route('tracks.index') }}">Home</a>
    <a class = "text-left no-underline text-white" href="{{ URL::route('tracks.index') }}">Track list</a>
    @if(\Illuminate\Support\Facades\Auth::guest())
        <a class = "text-left no-underline text-white"  href="{{ URL::route('login') }}">Log in</a>
    @else
        <a class = "text-left no-underline text-white" href=" {{ URL::route('profile.show') }}">Profile</a>
    @endif
        <a class = "text-left no-underline text-white" href="{{ URL::route('register') }}">Register</a>
</div>

<div class="container ">


    @yield('content')
</div>

</body>
</html>
