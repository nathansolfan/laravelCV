<!-- resources/views/home.blade.php -->
<x-layout>
    <div class="flex items-start justify-center min-h-screen">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold mb-8">Welcome to the Home Page</h1>
            <p class="text-lg mb-4">This is a simple home page for your Laravel application.</p>
            <nav>
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-blue-500 hover:underline">About me</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-blue-500 hover:underline">Contact me</a></li>
                    @if(Auth::check())
                        <li><a href="{{ route('profile') }}" class="text-blue-500 hover:underline">Profile</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" class="text-blue-500 hover:underline"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                        </li>
                    @else
                        <li><a href="{{ url('/login') }}" class="text-blue-500 hover:underline">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="text-blue-500 hover:underline">Register</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</x-layout>
