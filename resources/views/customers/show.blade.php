@extends('layouts.app')

@section('title', 'Kit Service | Liste des clients')

@section('content')

    <!-- Lucide icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <style>
        .orange-btn {
            background-color: #f97316;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .orange-btn:hover {
            background-color: #ea580c;
        }

        tbody tr:hover {
            background-color: #fef3c7;
            cursor: pointer;
        }

        .action-links a {
            margin-right: 0.5rem;
        }
    </style>

    <div class="max-w-6xl mx-auto mt-10">

        <div class="flex justify-between items-center mb-6">
            <!-- Titre -->
            <h1 class="text-3xl font-semibold flex items-center gap-2">
                <i data-lucide="users" class="w-6 h-6 text-orange-500"></i>
                Customer list
            </h1>

            <div class="flex gap-3">
                <a href="{{ route('customers.create') }}" class="orange-btn inline-flex items-center gap-2">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i> Add New Customer
                </a>
            </div>
        </div>


        <div class="flex items-center gap-2 mb-6">
            <i data-lucide="search" class="w-5 h-5 text-gray-400"></i>
            <input
                type="text"
                id="searchInput"
                placeholder="Rechercher par nom, ID NAT, RCCM..."
                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400"
                autocomplete="off"
            >
        </div>

        <div class="overflow-hidden rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 uppercase text-xs font-semibold text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">ID NAT</th>
                        <th class="px-4 py-3">RCCM</th>
                        <th class="px-4 py-3">Téléphone</th>
                        <th class="px-4 py-3">Commune</th>
                        <th class="px-4 py-3">Ville</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="customersTableBody" class="bg-white divide-y">
                    @foreach($customers as $customer)
                        <tr class="hover:bg-orange-50">
                            <td class="px-4 py-3 font-medium text-black">{{ $customer->name }}</td>
                            <td class="px-4 py-3">{{ $customer->id_nat }}</td>
                            <td class="px-4 py-3">{{ $customer->rccm ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $customer->telephone ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $customer->commune }}</td>
                            <td class="px-4 py-3">{{ $customer->ville }}</td>
                            <td class="px-4 py-3 text-center action-links">
                                <a href="{{ route('invoices.create', $customer->id) }}" class="text-blue-600 inline-flex items-center gap-1">
                                    <i data-lucide="file-plus" class="w-4 h-4"></i> Créer
                                </a>
                                <a href="{{ route('clients.invoices.index', $customer->id) }}"
                                   class="text-green-600 inline-flex items-center gap-1">
                                    <i data-lucide="eye" class="w-4 h-4"></i> Voir
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div id="loading" class="hidden text-center mt-4 text-orange-500 font-semibold">Chargement...</div>
                <div id="noResults" class="hidden mt-4 text-center text-red-600 font-semibold">Aucun client trouvé.</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons(); // Init Lucide

            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('customersTableBody');
            const loadingIndicator = document.getElementById('loading');
            const noResults = document.getElementById('noResults');

            function debounce(func, wait) {
                let timeout;
                return function (...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            async function searchCustomers(query) {
                if (query.length === 0) {
                    window.location.reload();
                    return;
                }

                loadingIndicator.classList.remove('hidden');
                noResults.classList.add('hidden');

                try {
                    const response = await fetch('{{ route('customers.search') }}?q=' + encodeURIComponent(query), {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) throw new Error('Erreur réseau');

                    const data = await response.json();
                    tableBody.innerHTML = '';

                    if (data.length === 0) {
                        noResults.classList.remove('hidden');
                        loadingIndicator.classList.add('hidden');
                        return;
                    }

                    data.forEach(customer => {
                        const tr = document.createElement('tr');
                        tr.className = 'hover:bg-orange-50';
                        tr.innerHTML = `
                        <td class="px-4 py-3 font-medium text-black">${customer.name}</td>
                        <td class="px-4 py-3">${customer.id_nat}</td>
                        <td class="px-4 py-3">${customer.rccm ?? 'N/A'}</td>
                        <td class="px-4 py-3">${customer.telephone ?? '-'}</td>
                        <td class="px-4 py-3">${customer.commune}</td>
                        <td class="px-4 py-3">${customer.ville}</td>
                        <td class="px-4 py-3 text-center action-links">
                            <a href="/invoices/create/${customer.id}" class="text-blue-600 inline-flex items-center gap-1">
                                <i data-lucide="file-plus" class="w-4 h-4"></i> Créer
                            </a>
                            <a href="/invoices/${customer.id}" class="text-green-600 inline-flex items-center gap-1">
                                <i data-lucide="eye" class="w-4 h-4"></i> Voir
                            </a>
                        </td>
                    `;
                        tableBody.appendChild(tr);
                    });

                    lucide.createIcons(); // Refresh icons after DOM update
                    loadingIndicator.classList.add('hidden');
                } catch (error) {
                    console.error('Erreur AJAX:', error);
                    loadingIndicator.classList.add('hidden');
                }
            }

            searchInput.addEventListener('input', debounce(function () {
                const query = this.value.trim();
                searchCustomers(query);
            }, 300));
        });
    </script>

@endsection
