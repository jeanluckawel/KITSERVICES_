<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-orange-100 to-orange-50 flex items-center justify-center min-h-screen p-4">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">

    <!-- Partie illustration -->
    <div class="md:w-1/2 bg-orange-100 flex items-center justify-center p-6">
        <svg class="w-40 h-40 text-orange-500 animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="2">
            <rect x="8" y="12" width="48" height="36" rx="4" ry="4" stroke-linecap="round" stroke-linejoin="round"/>
            <line x1="20" y1="22" x2="44" y2="36" stroke="red" stroke-width="3" stroke-linecap="round"/>
            <line x1="44" y1="22" x2="20" y2="36" stroke="red" stroke-width="3" stroke-linecap="round"/>
            <line x1="32" y1="48" x2="32" y2="56" stroke="orange" stroke-width="3"/>
            <circle cx="32" cy="56" r="2" fill="orange"/>
        </svg>
    </div>

    <!-- Partie texte simplifiée et fluide -->
    <div class="md:w-1/2 p-8 flex flex-col items-center justify-center text-center space-y-4">
        <h1 class="text-6xl sm:text-7xl font-extrabold text-orange-500">404</h1>
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">Oups! Page non trouvée</h2>

        <a href="{{ route('dashboard') }}"
           class="px-4 sm:px-8 py-2 sm:py-4 bg-orange-500 text-white font-semibold rounded-full shadow-lg hover:bg-orange-600 transition transform hover:scale-105">
            Dashboard
        </a>

        <p class="text-gray-400 text-xs sm:text-sm mt-4">
            Si vous pensez que c'est une erreur, contactez l'administrateur.
        </p>
    </div>

</div>

</body>
</html>
