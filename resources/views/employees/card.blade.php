@extends('layouts.app')

@section('title', 'Kit Service | Employee Card')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-sm" x-data="{ open: false, selectedEmployee: null }">

        <!-- Header fixe -->


        <!-- HEADER FIXE -->
        <div class="sticky top-0 bg-white z-10 pb-4">
            <!-- Cartes résumé -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Total Employees -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                        <i class='bx bx-group text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">Total Employees</p>
                        <p class="text-lg font-semibold text-gray-700">{{ $count ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Employee CDD -->
                <a href="{{ route('employees.end_list') }}">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                            <i class='bx bx-time-five text-xl'></i>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600">Employee CDD</p>
                            <p class="text-lg font-semibold text-gray-700">{{ $cdd ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Employee CDI -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                        <i class='bx bx-briefcase text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">Employee CDI</p>
                        <p class="text-lg font-semibold text-gray-700">{{ $cdi ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Others -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                        <i class='bx bx-category text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600">Others</p>
                        <p class="text-lg font-semibold text-gray-700">{{ $others ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>


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
                            @php
                                $gender = strtolower($employee->gender);

                                if ($gender === 'female') {
                                    $photoPath = 'assets/profil/female.png';
                                } elseif ($gender === 'male') {
                                    $photoPath = 'assets/profil/male.png';
                                } else {
                                    $photoPath = 'assets/profil/other.png';
                                }
                            @endphp

                            <img
                                src="{{ asset($photoPath) }}"
                                alt="{{ $employee->first_name }}"
                                class="max-h-full max-w-full object-contain"
                            />
                        </div>

                        <!-- Infos -->
                        <div class="p-4 text-center">
                            <a href="{{ route('employees.show', [$employee->employee_id]) }}">
                                <h3 class="text-sm font-bold text-gray-800 truncate">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </h3>
                                <p class="text-[11px] text-gray-500 mb-2">ID: {{ $employee->employee_id }}</p>

                                <div class="text-left text-gray-600 text-[11px] space-y-1 mb-3">
                                    <p><strong>Department:</strong> {{ $employee->department }}</p>
                                    <p><strong>Function:</strong> {{ $employee->function }}</p>
                                    <p><strong>Hire Date:</strong> {{ $employee->created_at->format('d M Y') }}</p>
                                </div>
                            </a>

                            <!-- Buttons -->
                            <div class="flex justify-center gap-2 mt-2 flex-wrap">
                                <!-- Edit -->
                                <a href="{{ route('employees.edit', $employee->employee_id) }}"
                                   class="px-3 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition">
                                    Edit
                                </a>

{{--                                <!-- Badge -->--}}
{{--                                <a href="{{ route('employees.profile', ['employee' => $employee->employee_id]) }}"--}}
{{--                                   class="px-3 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition">--}}
{{--                                    Badge--}}
{{--                                </a>--}}

                                <!-- Add Child -->
                                <a href="{{ route('children.create', ['employee' => $employee->employee_id]) }}"
                                   class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">
                                     Child
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

@endsection
