<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Registered At: {{ $user->created_at->format('d M Y') }}</p>
    <nav>
        <ul>
            <li><a href="{{ url('/about') }}">About me</a></li>
            <li><a href="{{ url('/contact') }}">Contact me</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @if (Auth::check())
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                </li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            @endif
        </ul>
    </nav>
</body>
</html>
