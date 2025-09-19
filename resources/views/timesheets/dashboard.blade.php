<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="max-w-lg mx-auto mt-20 bg-white shadow-xl rounded-2xl p-8 text-center">
    <!-- Header -->
    <h2 class="text-2xl font-bold text-orange-600 mb-6">
        Bonjour {{ $employee->first_name }} {{ $employee->last_name }}
    </h2>

    <!-- Boutons -->
    <div class="flex justify-center gap-6 mb-6">
        <!-- Start -->
        <form action="{{ route('timesheets.start') }}" method="POST">
            @csrf
            <button type="submit"
                    class="px-8 py-3 rounded-xl font-semibold shadow-lg transition
                       {{ $todaySheet && $todaySheet->start_time ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-green-600 text-white hover:bg-green-700' }}"
                {{ $todaySheet && $todaySheet->start_time ? 'disabled' : '' }}>
                <i class='bx bx-play-circle text-xl mr-1'></i> Start
            </button>
        </form>

        <!-- End -->
        <form action="{{ route('timesheets.end') }}" method="POST">
            @csrf
            <button type="submit"
                    class="px-8 py-3 rounded-xl font-semibold shadow-lg transition
                       {{ !$todaySheet || $todaySheet->end_time ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-red-600 text-white hover:bg-red-700' }}"
                {{ !$todaySheet || $todaySheet->end_time ? 'disabled' : '' }}>
                <i class='bx bx-stop-circle text-xl mr-1'></i> End
            </button>
        </form>
    </div>

    <!-- Résumé -->
    @if($todaySheet)
        <div class="bg-gray-50 rounded-xl p-5 shadow-inner text-left space-y-2">
            <p class="text-sm text-gray-600">
                <span class="font-bold text-gray-800">Début :</span>
                {{ $todaySheet->start_time ? \Carbon\Carbon::parse($todaySheet->start_time)->format('H:i') : 'Non enregistré' }}
            </p>
            <p class="text-sm text-gray-600">
                <span class="font-bold text-gray-800">Fin :</span>
                {{ $todaySheet->end_time ? \Carbon\Carbon::parse($todaySheet->end_time)->format('H:i') : 'Non enregistré' }}
            </p>
            <p class="text-sm text-gray-600">
                <span class="font-bold text-gray-800">Heures travaillées :</span>
                {{ $todaySheet->hours_worked ?? '0' }}
            </p>
        </div>
    @endif
</div>

</body>
</html>
