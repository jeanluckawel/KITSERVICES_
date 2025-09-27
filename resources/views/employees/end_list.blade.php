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
                    <div class="w-full bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                         x-show="searchQuery === '' || '{{ strtolower($employee->first_name.' '.$employee->last_name.' '.$employee->employee_id) }}'.includes(searchQuery.toLowerCase())">

                        <!-- Photo de l'employé -->
                        <div class="w-full h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                            @php
                                $gender = strtolower($employee->gender);
                                $photoPath = $gender === 'female' ? 'assets/profil/female.png' : ($gender === 'male' ? 'assets/profil/male.png' : 'assets/profil/other.png');
                            @endphp
                            <img src="{{ asset($photoPath) }}" alt="{{ $employee->first_name }}" class="max-h-full max-w-full object-contain"/>
                        </div>

                        <!-- Infos -->
                        <div class="p-4 text-center">
                            <a href="{{ route('employees.show', [$employee->employee_id]) }}">
                                <h3 class="text-sm font-bold text-gray-800 truncate">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                                <p class="text-[11px] text-gray-500 mb-2">ID: {{ $employee->employee_id }}</p>
                                <div class="text-left text-gray-600 text-[11px] space-y-1 mb-3">
                                    <p><strong>Department:</strong> {{ $employee->department }}</p>
                                    <p><strong>Date debut:</strong> {{ $employee->created_at->format('d-m-Y') }}</p>
                                    <p><strong>Date Fin:</strong> {{ $employee->end_contract_date ? \Carbon\Carbon::parse($employee->end_contract_date)->format('d-m-Y') : 'N/A' }}</p>
                                </div>
                            </a>

                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row justify-center gap-2 mt-2">
                                <a href="{{ route('employees.end_list_certificat', $employee->employee_id) }}"
                                   class="flex-1 px-3 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition text-center">
                                    Certificate
                                </a>
                                <a href="{{ route('employees.end_list_cdd', $employee->employee_id) }}"
                                   class="flex-1 px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition text-center">
                                    End contract
                                </a>
                            </div>
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
