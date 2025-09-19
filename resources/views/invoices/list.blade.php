@extends('layouts.app')

@section('title', 'Factures de ' . $customer->name)

@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow p-6 rounded">
        <h2 class="text-xl font-bold text-orange-600 mb-4">
            Factures de {{ $customer->name }}
        </h2>

        @if($invoices->isEmpty())
            <p class="text-gray-500">Aucune facture trouvée pour ce client.</p>
        @else
            <table class="w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2">N° Facture</th>
                    <th class="border px-3 py-2">PO</th>
                    <th class="border px-3 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td class="border px-3 py-2">{{ $invoice->numero_invoice }}</td>
                        <td class="border px-3 py-2">{{ $invoice->po }}</td>
                        <td class="border px-3 py-2">
                            <a href="{{ route('invoices.show', $invoice->id) }}"
                               class="text-orange-600 inline-flex items-center gap-1">
                                <i data-lucide="eye" class="w-4 h-4"></i> Voir
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('customers.index') }}" class="mt-4 inline-block text-gray-600">
            ← Retour aux clients
        </a>
    </div>
@endsection
