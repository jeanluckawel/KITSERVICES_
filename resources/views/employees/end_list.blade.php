@extends('layouts.app')


@section('title', 'Kit Service | add_new_employee')


<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
    .orange-btn {
        background-color: #f97316; /* orange-500 */
        color: white;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .orange-btn:hover {
        background-color: #ea580c; /* orange-600 */
    }

</style>


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

    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">

        <!-- Scrollable table container with fixed header -->
        <div class="w-full max-h-[500px] overflow-y-auto overflow-x-auto">
            <table class="w-full whitespace-no-wrap border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-800 sticky top-0 z-20 border-b dark:border-gray-700">
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 dark:text-gray-400 uppercase">
                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-800">Full Name</th>
                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-800">EmployeeID</th>
                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-800">Debut</th>
                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-800">Fin</th>
                    <th class="px-4 py-3 bg-gray-50 dark:bg-gray-800">Document</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($employees as $employee)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="{{ asset('storage/' . $employee->photo) }}"
                                         alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <a href="{{ route('employees.show', $employee->employee_id) }}">
                                    <div>
                                        <p class="font-semibold text-black dark:text-gray-100">{{ $employee->first_name }} {{ $employee->last_name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $employee->marital_status }}</p>
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-black dark:text-gray-300">
                            {{ $employee->employee_id }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                                {{ $employee->created_at }}

                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                            {{ $employee->end_contract_date ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center justify-start space-x-2">
                                <a href="{{ route('employees.end_list_certificat', $employee->employee_id) }}" title="Certificat">
                                    <button class="orange-btn">Certificat</button>
                                </a>
                                <a href="{{ route('employees.end_list_certificat', $employee->employee_id) }}" title="Fin contract">
                                    <button class="orange-btn">Fin contract</button>
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
