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
    .red-btn {
        background-color: #ef4444;
        color: white;
        font-weight: bold;
        padding: 0.25rem 0.75rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        font-size: 0.9rem;
    }
    .red-btn:hover {
        background-color: #dc2626;
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
            <x-form.input name="po" label="Numero Po" required autocomplete="off" />
            <br>

            <!-- Zone des lignes de facture -->
            <div id="invoice-items">
                <div class="item-row mb-6 border p-4 rounded-lg shadow-sm bg-gray-50 relative">
                    <button type="button" class="remove-btn red-btn absolute top-2 right-2 hidden" onclick="removeRow(this)">➖</button>

                    <!-- Ligne 1 : Description -->
                    <div class="flex flex-col mb-4">
                        <x-form.input name="description[]" label="Description" required autocomplete="off" />
                    </div>

                    <!-- Ligne 2 : Unité, Quantité, PU -->
                    <div class="flex flex-col md:flex-row gap-6 mb-4">
                        <x-form.input name="unite[]" label="Unité" autocomplete="off" />
                        <x-form.input name="quantity[]" label="Quantité" type="number" required min="1" autocomplete="off" />
                        <x-form.input name="pu[]" label="PU" type="number" step="0.01" required autocomplete="off" />
                    </div>

                    <!-- Ligne 3 : PT/Jours, Nombre des jours, PT/Mois -->
                    <div class="flex flex-col md:flex-row gap-6">
                        <x-form.input name="pt_jours[]" label="PT / Jours" type="number" step="0.01" required autocomplete="off" />
                        <x-form.input name="nb_jours[]" label="Nombre des jours" type="number" step="0.01" required autocomplete="off" />
                        <x-form.input name="pt_mois[]" label="PT / Mois" type="number" step="0.01" required autocomplete="off" />
                    </div>
                </div>
            </div>

            <button type="button" onclick="addRow()" class="mt-4 orange-btn">➕</button>

            <!-- Bloc Facture Proforma -->
            <div class="mt-12 border border-gray-300 dark:border-gray-700 rounded-xl p-6 bg-white dark:bg-gray-800 shadow-md">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Facture Proforma</h2>

                <!-- Informations Client & Facture -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300 mb-4">
                    <div>
                        <p><span class="font-semibold">Client :</span> {{ $customer->name }}</p>
                        <p><span class="font-semibold">Commune :</span> Kolwezi {{--{{ $customer->commune }}--}}</p>
                        <p><span class="font-semibold">Ville :</span> Kolwezi {{--{{ $customer->ville }}--}}</p>
                        <p><span class="font-semibold">Téléphone :</span> 0974453545 {{--{{ $customer->telephone }}--}}</p>
                    </div>
                    <div>
                        <p><span class="font-semibold">N° Proforma :</span> 001 </p>
                        <p><span class="font-semibold">N° PO :</span> <span id="po_display"></span></p>
                        <p><span class="font-semibold">Date :</span> {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                        <p><span class="font-semibold">TVA :</span> 16%</p>
                    </div>
                </div>

                <!-- Tableau récapitulatif des items -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-300 dark:border-gray-700 text-xs md:text-sm text-gray-800 dark:text-gray-200 mt-4">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left">
                        <tr>
                            <th class="p-2 border">#</th>
                            <th class="p-2 border">Description</th>
                            <th class="p-2 border">Unité</th>
                            <th class="p-2 border">Quantité</th>
                            <th class="p-2 border">PU</th>
                            <th class="p-2 border">PT / Jours</th>
                            <th class="p-2 border">Nombre Jours</th>
                            <th class="p-2 border">PT / Mois</th>
                        </tr>
                        </thead>
                        <tbody id="proforma-items">
                        <!-- Le contenu sera mis à jour par JS -->
                        </tbody>
                    </table>
                </div>

                <!-- Résumé montant -->
                <div class="mt-6">
                    <table class="w-full text-sm text-gray-800 dark:text-gray-100">
                        <tr class="border-t">
                            <td class="p-2">Sous-total</td>
                            <td class="p-2 text-right font-semibold">$<span id="subtotal">0.000</span></td>
                        </tr>
                        <tr>
                            <td class="p-2">TVA (16%)</td>
                            <td class="p-2 text-right font-semibold">$<span id="tva">0.000</span></td>
                        </tr>
                        <tr>
                            <td class="p-2 font-bold text-orange-600">Total TTC</td>
                            <td class="p-2 text-right font-bold text-orange-600 text-lg">$<span id="total">0.000</span></td>
                        </tr>
                    </table>
                </div>

                <div class="mt-6 text-xs text-gray-500 dark:text-gray-400 text-center italic">
                    Ceci est une facture proforma. Elle n’a pas valeur comptable et sert uniquement de devis estimatif.
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="orange-btn">Save</button>
            </div>
        </form>
    </div>

    <script>
        // Attache les événements de calcul sur une ligne d'item
        function attachAutoCalcEvents(row) {
            const quantityInput = row.querySelector('input[name="quantity[]"]');
            const puInput = row.querySelector('input[name="pu[]"]');
            const ptJoursInput = row.querySelector('input[name="pt_jours[]"]');
            const nbJoursInput = row.querySelector('input[name="nb_jours[]"]');
            const ptMoisInput = row.querySelector('input[name="pt_mois[]"]');

            function updatePTJours() {
                const quantity = parseFloat(quantityInput.value) || 0;
                const pu = parseFloat(puInput.value) || 0;
                ptJoursInput.value = (quantity * pu).toFixed(2);
                updatePTMois(); // recalculer PT/Mois après changement de PT/Jours
            }

            function updatePTMois() {
                const ptJours = parseFloat(ptJoursInput.value) || 0;
                const nbJours = parseFloat(nbJoursInput.value) || 0;
                ptMoisInput.value = (ptJours * nbJours).toFixed(2);
                updateSummary(); // mise à jour du résumé global
            }

            quantityInput.addEventListener('input', updatePTJours);
            puInput.addEventListener('input', updatePTJours);
            nbJoursInput.addEventListener('input', updatePTMois);
        }

        // Ajoute une nouvelle ligne d'items
        function addRow() {
            const container = document.getElementById('invoice-items');
            const newRow = container.children[0].cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            newRow.querySelector('.remove-btn').classList.remove('hidden');
            container.appendChild(newRow);
            attachAutoCalcEvents(newRow);
            updateSummary();
        }

        // Supprime une ligne, sauf si c'est la dernière
        function removeRow(button) {
            const container = document.getElementById('invoice-items');
            if (container.children.length > 1) {
                button.closest('.item-row').remove();
                updateSummary();
            } else {
                alert("Impossible de supprimer la dernière ligne.");
            }
        }

        // Met à jour le résumé global et le tableau proforma
        function updateSummary() {
            const ptMoisInputs = document.querySelectorAll('input[name="pt_mois[]"]');
            let subtotal = 0;
            ptMoisInputs.forEach(input => {
                subtotal += parseFloat(input.value) || 0;
            });

            const tva = subtotal * 0.16;
            const total = subtotal + tva;

            document.getElementById('subtotal').textContent = subtotal.toFixed(3);
            document.getElementById('tva').textContent = tva.toFixed(3);
            document.getElementById('total').textContent = total.toFixed(3);

            // Mise à jour du tableau récapitulatif (proforma-items)
            const tbody = document.getElementById('proforma-items');
            tbody.innerHTML = ''; // Réinitialise le tableau

            const rows = document.querySelectorAll('#invoice-items .item-row');
            rows.forEach((row, index) => {
                const description = row.querySelector('input[name="description[]"]').value;
                const unite = row.querySelector('input[name="unite[]"]').value;
                const qty = row.querySelector('input[name="quantity[]"]').value;
                const pu = row.querySelector('input[name="pu[]"]').value;
                const ptj = row.querySelector('input[name="pt_jours[]"]').value;
                const nbj = row.querySelector('input[name="nb_jours[]"]').value;
                const ptm = row.querySelector('input[name="pt_mois[]"]').value;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td class="border px-2 py-1 text-center">${index + 1}</td>
                    <td class="border px-2 py-1">${description}</td>
                    <td class="border px-2 py-1">${unite}</td>
                    <td class="border px-2 py-1 text-center">${qty}</td>
                    <td class="border px-2 py-1 text-right">$${parseFloat(pu || 0).toFixed(2)}</td>
                    <td class="border px-2 py-1 text-right">$${parseFloat(ptj || 0).toFixed(2)}</td>
                    <td class="border px-2 py-1 text-center">${nbj}</td>
                    <td class="border px-2 py-1 text-right">$${parseFloat(ptm || 0).toFixed(2)}</td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Synchronisation du numéro PO dans la facture proforma
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('invoice-items');
            if (container.children.length === 1) {
                container.querySelector('.remove-btn').classList.add('hidden');
            }
            attachAutoCalcEvents(container.children[0]);
            updateSummary();

            const poInput = document.querySelector('input[name="po"]');
            const poDisplay = document.getElementById('po_display');
            if (poInput && poDisplay) {
                poDisplay.textContent = poInput.value;
                poInput.addEventListener('input', () => {
                    poDisplay.textContent = poInput.value;
                });
            }
        });
    </script>
@endsection
