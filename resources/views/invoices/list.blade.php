@extends('layouts.app')

@section('title', 'Factures pour ' . $client->name)

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Factures de {{ $client->name }}</h2>

        <table class="table-auto w-full border">
            <thead>
            <tr>
                <th class="border px-2 py-1">Date</th>
                <th class="border px-2 py-1">Montant</th>
                <th class="border px-2 py-1">Paiement</th>
                <th class="border px-2 py-1">Solde</th>
                <th class="border px-2 py-1">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td class="border px-2 py-1">{{ $invoice->date }}</td>
                    <td class="border px-2 py-1">{{ $invoice->amount }} $</td>
                    <td class="border px-2 py-1">{{ $invoice->payment }} $</td>
                    <td class="border px-2 py-1">{{ $invoice->balance }} $</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-600 hover:underline">
                            Détails
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
