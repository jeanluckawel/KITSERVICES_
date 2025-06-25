@extends('layouts.app')


@section('title', 'Kit Service | add_new_employee')


<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


@section('content')



    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Total employees
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $count ?? 0 }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Account balance
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    -----
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    New sales
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    -----
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
            <div
                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <div>
                <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                    Pending contacts
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    --------
                </p>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Full Name</th>
                    <th class="px-4 py-3">Department</th>
                    <th class="px-4 py-3">Function</th>
                    <th class="px-4 py-3">Echelon</th>
                    <th class="px-4 py-3">Niveau</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($employees as $employee)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                         alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <a href="{{ route('employees.show', $employee->employee_id) }}">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $employee->employee_id }}</p>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm dark:text-gray-300">
                            {{ $employee->department }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1     rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $employee->function }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                            {{ $employee->echelon ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                           {{ $employee->niveau ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center justify-start space-x-2">


                                {{-- payroll --}}
                                <a href="{{ route('payroll.oneEmployee', $employee->employee_id) }}" title="Pay employee">
                                    <button class="px-4 py-2 bg-black text-white font-semibold rounded hover:bg-orange-600 shadow">
                                        💰 Pay
                                    </button>
                                </a>


                            </div>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
