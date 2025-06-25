@extends('layouts.app')

@section('title', 'Kit Service | Facture')

@section('content')
    <div class="max-w-7xl mx-auto bg-white px-4 py-6">
        <!-- En-tête -->
        <div class="flex justify-between border-b pb-4 mb-6">
            <!-- Section gauche -->
            <div class="text-xs">
                <h1 class="font-bold uppercase">KIT SERVICE SARL</h1>
                <p>1627 B Avenue Kamina,<br>Q/ Mutoshi Kolwezi<br>LUALABA RDC</p>
                <p class="mt-1">
                    <span class="block">00243 977 333 977</span>
                    <span class="block">kitservice17@gmail.com</span>
                    <span class="block">www.kitservice.net</span>
                </p>
                <p class="mt-2">
                    ID. Nat: 05-H5300-N87645R<br>
                    RCCM: CD/LSH/RCCM/20-8-00584
                </p>
            </div>

            <!-- Section centrale -->
            <div class=" text-xs">
                <h2 class="text-lg font-bold uppercase mb-2">STATEMENT PO 6175 OS</h2>
                <p class="font-semibold">TO : KAMOA COPPER SA</p>
                <p class="mt-2">
                    Appartements 3 et 4, Batiment 2404, 999, RN 39,<br>
                    Avenue Route Likasi, Quartier Joli-Site<br>
                    Commune de Manika, Ville de Kolwezi,<br>
                    Province du Lualaba,<br>
                    République Démocratique du Congo,<br>
                    ID NAT : 05-B0500-N37233J,<br>
                    RCCM: 14-B-1683<br>
                    NIF: A0901048A
                </p>
            </div>

            <!-- Section droite -->
            <div class="text-xs text-right">
                <img src="{{ asset('images/logo-kitservice.png') }}" class="h-12 mb-2">
                <h3 class="font-bold uppercase">STATEMENT PO6175OS</h3>

                <table class="mt-2 border">
                    <tr>
                        <td class="px-2 border">Account terms</td>
                        <td class="px-2 border">Current</td>
                    </tr>
                    <tr>
                        <td class="px-2 border">Date</td>
                        <td class="px-2 border">07/03/2025</td>
                    </tr>
                    <tr>
                        <td class="px-2 border">Amount due</td>
                        <td class="px-2 border">$</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Tableau principal -->
        <table class="w-full border text-xs">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
            <tr>
                <th class="border p-1">DATE</th>
                <th class="border p-1">PO ORDER</th>
                <th class="border p-1">DESCRIPTION</th>
                <th class="border p-1">N° FACTURE</th>
                <th class="border p-1">MONTANT</th>
                <th class="border p-1">PAIEMENT</th>
                <th class="border p-1">SOLDE</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white">
                <td class="border p-1">07/03/2025</td>
                <td class="border p-1">PO 6175 OS</td>
                <td class="border p-1">
                    Construct, Building: Type Brick Wall,<br>
                    Dimensions: 8M X 2.4M ,<br>
                    Location : Kolwezi Bus Parking,<br>
                    Additional Task : Install Barber Wire
                </td>
                <td class="border p-1">N 07/03/2025AA005</td>
                <td class="border p-1">$</td>
                <td class="border p-1">$0.00</td>
                <td class="border p-1">$</td>
            </tr>
            <tr class="bg-white"><td colspan="7" class="p-2"></td></tr>
            </tbody>
        </table>
    </div>
@endsection
