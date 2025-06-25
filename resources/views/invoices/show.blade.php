@extends('layouts.app')

@section('title', 'Kit Service | Facture')

<style>
    .logo-kitservice {
        height: 80px;
        display: block;
        margin: 0 auto 8px auto;
    }

</style>

@section('content')
    <div class="max-w-6xl mx-auto bg-white px-6 py-8 text-xs font-sans leading-tight">
        <!-- En-tête -->
        <div class="flex justify-between border-b pb-4 mb-6">
            <!-- À gauche -->
            <div>
                <h1 class="font-bold uppercase text-sm">KIT SERVICE SARL</h1>
                <p>1627 B Avenue Kamina,<br>Q/ Mutoshi Kolwezi<br>LUALABA RDC</p>
                <p class="mt-1">
                    <span class="block">00243 977 333 977</span>
                    <span class="block">kitservice17@gmail.com</span>
                    <span class="block text-blue-600">www.kitservice.net</span>
                </p>
                <p class="mt-2">
                    ID. Nat: 05-H5300-N87645R<br>
                    RCCM: CD/LSH/RCCM/20-8-00584
                </p>
            </div>

            <!-- Centre -->
            <div>
                <h2 class="text-lg font-bold uppercase mb-2 text-blue-700">STATEMENT  {{ $invoice->po_order ?? ''}}</h2>
                <p class="font-semibold">To : {{ $invoice->client->company ?? 'N/A' }} </p>
                <p class="mt-2">
                    Appartements 3 et 4, Batiment 2404, 999, RN 39,<br>
                    Avenue Route Likasi, Quartier Joli-Site<br>
                    Commune de Manika, Ville de Kolwezi,<br>
                    Province du Lualaba,<br>
                    République Démocratique du Congo,<br>
                    ID NAT : 05-B0500-N37233J,<br>
                    RCCM: {{$invoice->client->rccm ?? 'N/A'}}<br>
                    NIF: {{$invoice->client->nif ?? 'N/A'}}
                </p>
            </div>

            <!-- À droite -->
            <div class="text-right">
                <img src="{{ asset('assets/logo/logo.png') }}" class="logo-kitservice" alt="logo kit service">

{{--                <img src="{{ asset('assets/logo/logo.png') }}" class="h-12 mb-2 mx-auto" alt="logo kit service">--}}
                <h3 class="font-bold uppercase text-sm">STATEMENT PO5925OS</h3>
                <table class="mt-2 border text-xs w-full">
                    <tr>
                        <td class="border px-2 py-1">Account terms</td>
                        <td class="border px-2 py-1">Current</td>
                    </tr>
                    <tr>
                        <td class="border px-2 py-1">Date</td>
                        <td class="border px-2 py-1">5/12/2025</td>
                    </tr>
                    <tr>
                        <td class="border px-2 py-1">Amount due</td>
                        <td class="border px-2 py-1">$33,510.08</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Client -->
        <p class="mb-2 text-xs">Client: <br> <span class="uppercase italic"><strong>{{ $invoice->client->company ?? 'N/A' }}</strong></span></p><br>

        <!-- Tableau principal -->
        <table class="w-full border text-xs text-left mb-6">
            <thead class="bg-gray-100 uppercase text-gray-600">
            <tr>
                <th class="border p-1">Date</th>
                <th class="border p-1">PO ORDER</th>
                <th class="border p-1">DESCRIPTION</th>
                <th class="border p-1">N° FACTURE</th>
                <th class="border p-1">MONTANT</th>
                <th class="border p-1">PAIEMENT</th>
                <th class="border p-1">SOLDE</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border p-1">{{ \Carbon\Carbon::parse($invoice->date)->format('d/m/Y') }}</td>
                <td class="border p-1">{{ $invoice->po_order }}</td>
                <td class="border p-1">{{ $invoice->description }}</td>
                <td class="border p-1">N 17/04/2025AA009</td>
                <td class="border p-1">${{ number_format($invoice->amount, 2) }}</td>
                <td class="border p-1">${{ number_format($invoice->payment, 2) }}</td>
                <td class="border p-1">${{ number_format($invoice->balance, 2) }}</td>
            </tr>
            <tr>
                <td colspan="7" class="border-t text-right pr-4 font-bold">$33,510.08</td>
            </tr>
            </tbody>
        </table>

{{--        <!-- Cachet ou signature -->--}}
{{--        <div class="text-center mt-6">--}}
{{--            <img src="{{ asset('images/stamp.png') }}" alt="Stamp" class="h-20 mx-auto opacity-70">--}}
{{--        </div>--}}


        <!-- en-tête déjà partagé ci-dessus -->

        <!-- Boutons -->
        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('invoices.downloadPdf', $invoice->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                Télécharger PDF
            </a>
        </div>

    </div>





@endsection


