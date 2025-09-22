@extends('layouts.app')

@section('title', 'Kit Service | Employee Card')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-sm" x-data="{ open: false, selectedEmployee: null }">

        <!-- Header fixe -->
        <div class="sticky top-0 bg-white z-10 pb-4 mb-4">
            <!-- Navigation -->
            <div class="flex space-x-4 mb-4">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-orange-600 hover:border-orange-600 border-b-2 border-transparent">
                    Dashboard
                </a>
                <span class="px-4 py-2 text-sm font-medium text-orange-600 border-b-2 border-orange-600">
                Employee Card
            </span>
            </div>

            <h2 class="text-2xl font-bold mb-4 text-orange-600">Employee Card</h2>

        <!-- Grid des cartes avec scroll si besoin -->
            <!-- Grid des cartes avec scroll si besoin -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-center overflow-y-auto max-h-[calc(100vh-200px)]">
                @foreach($employees as $employee)
                    <div class="w-[220px] bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">

                        <!-- Photo de l'employé -->
                        <div class="w-full h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                            <img
                                src="{{ $employee->photo ? asset('storage/' . $employee->photo) : asset('images/default-avatar.png') }}"
                                alt="{{ $employee->first_name }}"
                                class="max-h-full max-w-full object-contain"
                            >
                        </div>

                        <!-- Infos -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-bold text-gray-800 truncate">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                            <p class="text-[11px] text-gray-500 mb-2">ID: {{ $employee->employee_id }}</p>

                            <div class="text-left text-gray-600 text-[11px] space-y-1 mb-3">
                                <p><strong>Department:</strong> {{ $employee->department }}</p>
                                <p><strong>Function:</strong> {{ $employee->function }}</p>
                                <p><strong>Date d'embauche:</strong> {{ $employee->created_at->format('d M Y') }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-center gap-2 mt-2 flex-wrap">
                                <a href="{{ route('employees.edit', $employee->employee_id) }}"
                                   class="px-3 py-1 bg-orange-500 text-white text-[11px] rounded hover:bg-orange-600 transition">Edit
                                </a>
                                <a href=""
                                   class="px-3 py-1 bg-red-500 text-white text-[11px] rounded hover:bg-red-600 transition">End Contract
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
@endsection
