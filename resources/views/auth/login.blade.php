<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Kit Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white rounded-xl shadow-lg p-6 sm:p-8 mx-2">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('logo/logo.png') }}" alt="Kit Service Logo" class="h-24 sm:h-28 w-auto">
    </div>

    <!-- Titre -->
    <h2 class="text-center text-2xl sm:text-3xl font-bold text-gray-800 mb-6 sm:mb-8">
        Sign in to your account
    </h2>

    <!-- Session status -->
    @if (session('status'))
        <div class="mb-4 text-sm text-green-600 font-semibold text-center">
            {{ session('status') }}
        </div>
    @endif

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5" id="loginForm">
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
        <div class="relative">
            <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10">

            <!-- Bouton œil -->
            <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 focus:outline-none">
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </button>

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
        </div>

        <!-- Submit -->
        <button type="submit" id="loginButton"
                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 flex items-center justify-center">
            <span class="mr-2">Sign in</span>
            <svg id="loadingSpinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
        </button>
    </form>
</div>

<script>
    // Toggle mot de passe
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });

    // Afficher le loading spinner
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');
    const spinner = document.getElementById('loadingSpinner');

    loginForm.addEventListener('submit', function () {
        // Désactive le bouton et affiche le spinner
        loginButton.disabled = true;
        spinner.classList.remove('hidden');
    });
</script>

</body>
</html>
