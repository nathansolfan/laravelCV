<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>This is a simple home page for your Laravel application.</p>
    <nav>
        <ul>
            <li><a href="{{url('/about')}}">About me</a></li>
            <li><a href="{{url('/contact')}}">Contact me</a></li>
        @if(Auth::check())
        <li><a href="{{route('profile')}}">Profile</a>
        </li>
        <li>
            <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none">
                @csrf
            </form>
            <a href="{{route('logout')}}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
        </li>
        @else
                
            <li><a href="{{url('/login')}}">Login</a></li>
            <li><a href="{{url('/register')}}">Register</a></li>       
            
        @endif
        </ul>
    </nav>
</body>
</html>
