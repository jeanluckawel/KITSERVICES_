<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur interne du serveur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-red-100 to-orange-50 flex items-center justify-center min-h-screen p-4">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row">

    <!-- Partie illustration -->
    <div class="md:w-1/2 bg-red-100 flex items-center justify-center p-6">
        <svg class="w-40 h-40 text-red-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" stroke="currentColor" stroke-width="2">
            <circle cx="32" cy="32" r="28" stroke="currentColor" stroke-width="3"/>
            <line x1="32" y1="18" x2="32" y2="38" stroke="red" stroke-width="4" stroke-linecap="round"/>
            <circle cx="32" cy="48" r="2.5" fill="red"/>
        </svg>
    </div>

    <!-- Partie texte -->
    <div class="md:w-1/2 p-8 flex flex-col items-center justify-center text-center space-y-4">
        <h1 class="text-6xl sm:text-7xl font-extrabold text-red-500">500</h1>
        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">Erreur interne du serveur</h2>

        <a href="{{ route('dashboard') }}"
           class="px-4 sm:px-8 py-2 sm:py-4 bg-red-500 text-white font-semibold rounded-full shadow-lg hover:bg-red-600 transition transform hover:scale-105">
            Dashboard
        </a>

        <p class="text-gray-400 text-xs sm:text-sm mt-4">
            Une erreur inattendue est survenue.<br>Veuillez réessayer plus tard ou contacter l’administrateur.
        </p>
    </div>

</div>

</body>
</html>
