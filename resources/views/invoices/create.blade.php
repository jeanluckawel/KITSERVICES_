@extends('layouts.app')

@section('title', 'Kit Service | Créer une Facture')

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
</style>

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">
            Créer une facture pour <span class="text-orange-500">{{ $customer->name }}</span>
        </h3>


        <form action="{{ route('invoices.store', ['customer' => $customer->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <x-form.input name="po" label="Numero Po" required autocomplete="off"/>
            <br>
            <div id="invoice-items">

                <div class="flex flex-col md:flex-row gap-6 item-row">
                    <x-form.input name="description[]" label="Description" required autocomplete="off"/>
                    <x-form.input name="unite[]" label="Unité" autocomplete="off"/>
                    <x-form.input name="quantity[]" label="Quantité" type="number" required min="1" autocomplete="off"/>
                    <x-form.input name="pu[]" label="PU" type="number" step="0.01" required autocomplete="off"/>
                    <x-form.input name="pt_mois[]" label="PT / Mois" type="number" step="0.01" required autocomplete="off"/>
                </div>
            </div>

            <button type="button" onclick="addRow()" class="mt-4 orange-btn">➕</button>

            <div class="mt-6">
                <button type="submit" class="orange-btn">Save</button>
            </div>
        </form>

       </div>


    <script>
        function addRow() {
            const container = document.getElementById('invoice-items');
            const newRow = container.children[0].cloneNode(true);
            Array.from(newRow.querySelectorAll('input')).forEach(input => input.value = '');
            container.appendChild(newRow);
        }
    </script>

@endsection
