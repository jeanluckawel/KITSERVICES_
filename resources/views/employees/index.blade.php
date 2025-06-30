@extends('layouts.app')

@section('title', 'Kit Service | Customers List')

@section('content')
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM5 13a7 7 0 0114 0v1H5v-1z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Customers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $customers->count() }}
                </p>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">ID NAT</th>
                    <th class="px-4 py-3">RCCM</th>
                    <th class="px-4 py-3">Téléphone</th>
                    <th class="px-4 py-3">Commune</th>
                    <th class="px-4 py-3">Ville</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($customers as $customer)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm font-semibold text-black dark:text-white">
                            {{ $customer->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $customer->id_nat }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $customer->rccm ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $customer->telephone ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $customer->commune }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $customer->ville }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('customers.show', $customer->id) }}" title="View">
                                <button class="orange-btn">👁️ Voir</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
