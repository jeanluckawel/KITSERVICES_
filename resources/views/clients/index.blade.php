@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow dark:bg-gray-900">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Clients</h1>
            <a href="{{ route('clients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ajouter un client</a>
        </div>

        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Company</th>
                    <th class="px-4 py-3">Country</th>
                    <th class="px-4 py-3">ID NAT</th>
                    <th class="px-4 py-3">RCCM</th>
                    <th class="px-4 py-3">NIF</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($clients as $client)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="https://ui-avatars.com/api/?name={{ urlencode($client->company) }}&background=random"
                                         alt="{{ $client->company }}" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $client->company }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $client->country }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-sm">{{ $client->country }}</td>
                        <td class="px-4 py-3 text-sm">{{ $client->id_nat }}</td>
                        <td class="px-4 py-3 text-sm">{{ $client->rccm }}</td>
                        <td class="px-4 py-3 text-sm">{{ $client->nif }}</td>

                        <td class="px-4 py-3 text-sm text-center flex items-center justify-center space-x-4">
                            <!-- Créer Facture -->
                            <a href="{{ route('invoices.create', $client->id) }}" title="Créer une facture">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600 hover:text-blue-800" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </a>





                            <!-- Voir Factures -->



                            <a href="{{ route('clients.invoices.index', $client->id) }}" title="Voir les factures">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600 hover:text-green-800" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
