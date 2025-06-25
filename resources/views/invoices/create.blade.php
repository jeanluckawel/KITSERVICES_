@extends('layouts.app')

@section('title', 'Kit Service | Ajouter plusieurs factures')

@section('content')
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 border border-red-300">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('invoices.store') }}">
        @csrf

        <input type="hidden" name="client_id" value="{{ $client->id }}">

        <div class="bg-white p-8 rounded-lg shadow mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Ajouter plusieurs factures</h2>
            <p class="text-gray-500 mb-6">Remplissez les détails de chaque facture liée au PO Order</p>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    PO Order commun <sup class="text-red-600">*</sup>
                </label>
                <input name="po_order" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-orange-500 focus:border-orange-500"/>
            </div>

            <div id="items-container">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 item-row">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" name="items[0][date]" required
                               class="w-full border border-gray-300 px-3 py-2 rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Montant</label>
                        <input type="number" step="0.01" name="items[0][amount]" required
                               class="w-full border border-gray-300 px-3 py-2 rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Paiement</label>
                        <input type="number" step="0.01" name="items[0][payment]"
                               class="w-full border border-gray-300 px-3 py-2 rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Solde</label>
                        <input type="number" step="0.01" name="items[0][balance]"
                               class="w-full border border-gray-300 px-3 py-2 rounded-md">
                    </div>

                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="items[0][description]" rows="2"
                                  class="w-full border border-gray-300 px-3 py-2 rounded-md resize-none"></textarea>
                    </div>
                </div>
            </div>

            <button type="button" id="add-row"
                    class="text-sm bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
                + Ajouter une ligne
            </button>

            <div>
                <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-orange-700">
                    Enregistrer toutes les lignes
                </button>
            </div>
        </div>
    </form>

    <script>
        let itemIndex = 1;
        document.getElementById('add-row').addEventListener('click', function () {
            const container = document.getElementById('items-container');
            const row = document.querySelector('.item-row').cloneNode(true);
            row.querySelectorAll('input, textarea').forEach(input => {
                const name = input.getAttribute('name');
                const newName = name.replace(/\[\d+\]/, `[${itemIndex}]`);
                input.setAttribute('name', newName);
                input.value = '';
            });
            container.appendChild(row);
            itemIndex++;
        });
    </script>
@endsection
