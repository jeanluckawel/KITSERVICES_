@extends('layouts.app')

@section('title', 'Kit Service | Customers List')

@section('content')

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

        /* Hover highlight on table rows */
        tbody tr:hover {
            background-color: #fef3c7; /* bg-orange-100 */
            cursor: pointer;
            color: #c2410c; /* orange-700 */
        }
    </style>

    <div class="max-w-4xl mx-auto mt-10">

        <h1 class="text-3xl font-semibold mb-6">Liste des clients</h1>

        <!-- Search input -->
        <input
            type="text"
            id="searchInput"
            placeholder="Rechercher un client par nom, ID NAT, RCCM..."
            class="w-full p-3 mb-6 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400"
            autocomplete="off"
        >

        <!-- Customers table container -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap" id="customersTable">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">ID NAT</th>
                        <th class="px-4 py-3">RCCM</th>
                        <th class="px-4 py-3">Téléphone</th>
                        <th class="px-4 py-3">Commune</th>
                        <th class="px-4 py-3">Ville</th>
                    </tr>
                    </thead>
                    <tbody id="customersTableBody" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($customers as $customer)
                        <tr data-href="{{ route('customers.show', $customer->id) }}" class="text-gray-700 dark:text-gray-400">
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

                            <a href="{{ route('invoices.create', $customer->id) }}" class="text-blue-600">Créer facture</a>
                            <a href="{{ route('invoices.show', $customer->id) }}" class="text-green-600">Voir facture</a>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Loading indicator -->
                <div id="loading" class="hidden text-center mt-4 text-orange-500 font-semibold">Chargement...</div>

                <!-- No results message -->
                <div id="noResults" class="hidden mt-4 text-center text-red-600 font-semibold">
                    Aucun client trouvé.
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('customersTableBody');
            const loadingIndicator = document.getElementById('loading');
            const noResults = document.getElementById('noResults');

            // Delegate click event on table rows to redirect to show page
            tableBody.addEventListener('click', function(e) {
                let tr = e.target.closest('tr');
                if(tr && tr.dataset.href){
                    window.location.href = tr.dataset.href;
                }
            });

            // Debounce function to limit requests
            function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            // Search function with fetch AJAX
            async function searchCustomers(query) {
                if(query.length === 0) {
                    // If input empty, reload full list (optional: you can also reload page or restore old data)
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

                    if(!response.ok) throw new Error('Network response was not ok');

                    const data = await response.json();

                    // Clear table
                    tableBody.innerHTML = '';

                    if(data.length === 0) {
                        noResults.classList.remove('hidden');
                        loadingIndicator.classList.add('hidden');
                        return;
                    }

                    // Append rows
                    data.forEach(customer => {
                        const tr = document.createElement('tr');
                        tr.className = 'text-gray-700 dark:text-gray-400 hover:bg-orange-100 cursor-pointer';
                        tr.setAttribute('data-href', `/customers/${customer.id}`);

                        tr.innerHTML = `
                        <td class="px-4 py-3 text-sm font-semibold text-black dark:text-white">${customer.name}</td>
                        <td class="px-4 py-3 text-sm">${customer.id_nat}</td>
                        <td class="px-4 py-3 text-sm">${customer.rccm ?? 'N/A'}</td>
                        <td class="px-4 py-3 text-sm">${customer.telephone ?? '-'}</td>
                        <td class="px-4 py-3 text-sm">${customer.commune}</td>
                        <td class="px-4 py-3 text-sm">${customer.ville}</td>
                    `;
                        tableBody.appendChild(tr);
                    });

                    loadingIndicator.classList.add('hidden');
                } catch(error) {
                    console.error('Fetch error:', error);
                    loadingIndicator.classList.add('hidden');
                }
            }

            // Debounced search input event listener
            searchInput.addEventListener('input', debounce(function() {
                const query = this.value.trim();
                searchCustomers(query);
            }, 300));
        });
    </script>

@endsection
