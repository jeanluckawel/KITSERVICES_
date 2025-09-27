@extends('layouts.app')

@section('title', 'Kit Service | Invoice List')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-sm h-[calc(100vh-100px)] flex flex-col">

        <!-- HEADER FIXE -->
        <div class="sticky top-0 bg-white z-20 pb-4 pt-2">
            <!-- Cartes résumé -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                <!-- Total Invoices -->
                <a href="">
                    <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                        <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-orange-500 bg-orange-100 rounded-full">
                            <i class='bx bx-receipt text-lg sm:text-xl'></i>
                        </div>
                        <div>
                            <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Total Invoices</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $invoicesCount ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>

                <!-- Paid Invoices -->
                <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                    <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-green-500 bg-green-100 rounded-full">
                        <i class='bx bx-check-circle text-lg sm:text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Paid</p>
                        <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $paid ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Pending Invoices -->
                <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                    <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-blue-500 bg-blue-100 rounded-full">
                        <i class='bx bx-time-five text-lg sm:text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Pending</p>
                        <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $pending ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Overdue Invoices -->
                <div class="flex items-center p-2 sm:p-3 bg-white rounded-lg shadow-xs">
                    <div class="p-2 sm:p-3 mr-2 sm:mr-3 text-red-500 bg-red-100 rounded-full">
                        <i class='bx bx-error text-lg sm:text-xl'></i>
                    </div>
                    <div>
                        <p class="mb-1 text-xs sm:text-sm font-medium text-gray-600">Overdue</p>
                        <p class="text-sm sm:text-base font-semibold text-gray-700">{{ $overdue ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation + Recherche -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2 mb-4">
                <!-- Navigation -->
                <nav class="flex items-center space-x-2 text-sm sm:text-base text-gray-500">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600 transition">Dashboard</a>
                    <span class="text-gray-300">/</span>
                    <span class="text-orange-600 font-semibold">Invoices</span>
                </nav>

                <!-- Barre de recherche compacte -->
                <div class="w-52 sm:w-64">
                    <input type="text" placeholder="Search by customer or ID"
                           class="w-full p-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400"
                           x-model="searchQuery" @input="filterInvoices()">
                </div>
            </div>
        </div>

        <!-- LISTE DES INVOICES SCROLLABLE -->
        <div class="overflow-y-auto flex-1 pr-2">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" x-data="{ searchQuery: '' }">
                @foreach($customers as $invoice)
                    <div class="w-full bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                         x-show="searchQuery === '' || '{{ strtolower($invoice->name.' '.$invoice->id_nat.' '.$invoice->rccm) }}'.includes(searchQuery.toLowerCase())">

                        <!-- Avatar client -->
                        <div class="w-full h-40 bg-gray-100 flex items-center justify-center overflow-hidden">
                            @php
                                $colors = ['bg-orange-500','bg-red-500','bg-green-500','bg-blue-500','bg-purple-500','bg-pink-500','bg-yellow-500'];
                                $colorClass = $colors[$loop->index % count($colors)];
                                $initials = strtoupper(substr($invoice->name,0,1) . substr(explode(' ', $invoice->name)[1] ?? '',0,1));
                            @endphp
                            <div class="w-20 h-20 rounded-full flex items-center justify-center text-white font-bold {{ $colorClass }}">
                                {{ $initials }}
                            </div>
                        </div>

                        <!-- Infos invoice -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-bold text-gray-800 truncate">{{ $invoice->name }}</h3>
                            <div class="text-left text-gray-600 text-[11px] space-y-1 mb-3">
                                <p><strong>Invoice #:</strong> {{ $invoice->id_nat }}</p>
                                <p><strong>RCCM:</strong> {{ $invoice->rccm ?? '-' }}</p>
                                <p><strong>Phone:</strong> {{ $invoice->telephone ?? '-' }}</p>
                                <p><strong>Commune:</strong> {{ $invoice->commune ?? '-' }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="flex flex-col sm:flex-row justify-center gap-2 mt-2">
                                <a href="{{ route('invoices.create', $invoice->id) }}"
                                   class="flex-1 px-3 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition text-center">
                                    Créer
                                </a>
                                <a href="{{ route('clients.invoices.index', $invoice->id) }}"
                                   class="flex-1 px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition text-center">
                                    Voir
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function filterInvoices() {
            const query = document.querySelector('input[x-model="searchQuery"]').value.toLowerCase();
            document.querySelectorAll('[x-show]').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>
@endsection
