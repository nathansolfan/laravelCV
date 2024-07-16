<!-- resources/views/profile.blade.php -->
<x-layout>
    <div class="flex items-start justify-center min-h-screen">
        <div class="container mx-auto px-4 py-12 text-center">
            <h1 class="text-4xl font-bold mb-8">User Profile</h1>
            <p class="text-lg mb-4">Name: {{ $user->name }}</p>
            <p class="text-lg mb-4">Email: {{ $user->email }}</p>
            <p class="text-lg mb-4">Registered At: {{ $user->created_at->format('d M Y') }}</p>

            <!-- Update User Info Form -->
            <h2 class="text-2xl font-bold mb-4">Update Profile</h2>
            @if (session('success'))
                <div class="text-green-500 mb-4">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-lg mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-lg mb-2">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-lg mb-2">New Password:</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-lg mb-2">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded-lg">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Update Profile</button>
            </form>

            <nav class="mt-6">
                <ul class="space-y-2">
                    <li><a href="{{ url('/about') }}" class="text-blue-500 hover:underline">About me</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-blue-500 hover:underline">Contact me</a></li>
                    @if (Auth::check())
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
