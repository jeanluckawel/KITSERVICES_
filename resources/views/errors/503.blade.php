<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service indisponible</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-yellow-100 to-orange-50 flex items-center justify-center min-h-screen p-4">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">

    <!-- Illustration -->
    <div class="md:w-1/2 bg-yellow-100 flex items-center justify-center p-6">
        <svg class="w-40 h-40 text-yellow-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="2">
            <circle cx="32" cy="32" r="28" stroke="currentColor" stroke-opacity="0.3" stroke-width="4"/>
            <path d="M32 4a28 28 0 0 1 0 56" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
        </svg>
    </div>

    <!-- Texte -->
    <div class="md:w-1/2 p-8 flex flex-col items-center justify-center text-center space-y-4">
        <h1 class="text-6xl sm:text-7xl font-extrabold text-yellow-500">503</h1>
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">Service indisponible</h2>

        <a href="{{ route('dashboard') }}"
           class="px-4 sm:px-8 py-2 sm:py-4 bg-yellow-500 text-white font-semibold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">
            Dashboard
        </a>

        <p class="text-gray-400 text-xs sm:text-sm mt-4">
            Le serveur est temporairement indisponible.<br>Veuillez réessayer dans quelques instants.
        </p>
    </div>

</div>

</body>
</html>
