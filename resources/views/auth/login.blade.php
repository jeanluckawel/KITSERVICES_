<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Kit Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white rounded-xl shadow-lg p-4 sm:p-8">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('logo/logo.png') }}" alt="Kit Service Logo" class="h-28 w-auto">
    </div>

    <!-- Titre -->
    <h2 class="text-center text-2xl font-bold text-gray-800 mb-8">
        Sign in to your account
    </h2>

    <!-- Session status -->
    @if (session('status'))
        <div class="mb-4 text-sm text-green-600 font-semibold">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
            @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
            @error('password')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="remember" class="text-orange-500 focus:ring-orange-500">
                <span class="text-gray-700">Remember me</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-orange-500 hover:underline">Forgot password?</a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
            Sign in
        </button>
    </form>
</div>

</body>
</html>
