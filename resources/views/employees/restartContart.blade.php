@extends('layouts.app')

@section('title', 'Kit Service | Employee List Cdd')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-sm h-[calc(100vh-100px)] flex flex-col">

        <!-- HEADER FIXE -->
        <!-- HEADER FIXE -->
        <div class="sticky top-0 bg-white z-20 pb-4 pt-2">
            <!-- Cartes résumé -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                <!-- Total Employees -->
                <a href="{{ route('employees.index') }}">
                    <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                        <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-orange-500 bg-orange-100 rounded-full">
                            <i class='bx bx-group text-lg sm:text-xl'></i>
                        </div>
                        <div>
                            <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Total Employees</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $employeesAllCount ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Employee CDD -->
                <a href="{{ route('employees.end_list') }}">
                    <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                        <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-blue-500 bg-blue-100 rounded-full">
                            <i class='bx bx-time-five text-lg sm:text-xl'></i>
                        </div>
                        <div>
                            <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Employee CDD</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $count ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Employee CDI -->
                <a href="{{ route('employees.end-list-cdi') }}">
                    <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                        <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-green-500 bg-green-100 rounded-full">
                            <i class='bx bx-briefcase text-lg sm:text-xl'></i>
                        </div>
                        <div>
                            <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Employee CDI</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $employeeesAllCdi ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Others -->
                <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                    <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-purple-500 bg-purple-100 rounded-full">
                        <i class='bx bx-category text-lg sm:text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Others</p>
                        <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $others ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation + Recherche -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2 mb-4">
                <!-- Navigation -->
                <nav class="flex items-center space-x-2 text-sm sm:text-base text-gray-500">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600 transition">Dashboard</a>
                    <span class="text-gray-300">/</span>
                    <span class="text-orange-600 font-semibold">Employee List CDD</span>
                </nav>

                <!-- Barre de recherche compacte -->
                <div class="w-52 sm:w-64">
                    <input type="text" placeholder="Search by name or ID"
                           class="w-full p-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
                           x-model="searchQuery" @input="filterEmployees()">
                </div>
            </div>
        </div>

        <!-- LISTE DES EMPLOYÉS SCROLLABLE -->
        <div class="overflow-y-auto flex-1 pr-2">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" x-data="{ searchQuery: '' }">
                @foreach($employees as $employee)
                    @php
                        $daysSinceEnd = \Carbon\Carbon::parse($employee->end_contract_date)->diffInDays(\Carbon\Carbon::now());
                    @endphp

                    <div class="w-full bg-white rounded-xl shadow-md p-4 mb-4 border-l-4 border-red-500">
                        <h3 class="text-lg font-bold">{{ $employee->employee->first_name }} {{ $employee->employee->last_name }}</h3>
                        <p>ID: {{ $employee->employee->employee_id }}</p>
                        <p>Fin du contrat : {{ \Carbon\Carbon::parse($employee->end_contract_date)->format('d/m/Y') }}</p>
                        <p class="text-red-500">{{ $daysSinceEnd }} jour{{ $daysSinceEnd > 1 ? 's' : '' }} depuis l'expiration</p>

                        <div class="mt-2">
                            <form action="{{ route('employees.restart', $employee->employee_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                    Relancer
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        function filterEmployees() {
            const query = document.querySelector('input[x-model="searchQuery"]').value.toLowerCase();
            document.querySelectorAll('[x-show]').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>
@endsection
