@extends('layouts.app')

@section('title', 'Factures')

@section('content')

    <!-- Bouton pour télécharger la facture -->
    <div class="text-right mb-4 mr-10">
        <button onclick="downloadPDF()" class="bg-black text-white font-bold py-2 px-4 rounded">
            Télécharger la facture PDF
        </button>
    </div>

    <!-- Contenu de la facture -->
    <div id="invoice-content">
        <div class="bg-white mx-auto p-10 shadow-lg text-sm font-sans text-gray-800" style="width: 21cm; min-height: 29.7cm">
            <!-- Header -->
            <div class="flex justify-between border-b pb-4 mb-4">
                <!-- KIT SERVICE Infos -->
                <div class="w-1/3 space-y-1">
                    <h2 class="text-orange-500 font-bold text-lg">KIT SERVICE SARL</h2>
                    <p>1627 B Avenue Kamina, Q/ Mutoshi Kolwezi</p>
                    <p>LUALABA RDC</p>
                    <p>00243 977 333 977</p>
                    <p><a href="mailto:kitservice17@gmail.com" class="text-blue-600 underline">kitservice17@gmail.com</a></p>
                    <p><a href="http://www.kitservice.net" class="text-blue-600 underline">www.kitservice.net</a></p>
                    <p>ID NAT: 05-H5300-N876458R</p>
                    <p>RCCM: CD/LSH/RCCM/20-B-00584</p>
                </div>

                <!-- Client Infos -->
                <div class="w-1/3 space-y-1 text-sm">
                    <h2 class="text-gray-700 font-semibold">To :{{' '. $customer->name ?? '' }}</h2>
                    <p>Appartements 3 et 4, Bâtiment 2404, 999, RN 39</p>
                    <p>Avenue Route Likasi, Quartier Joli-Site</p>
                    <p>Commune de Manika, Ville de Kolwezi</p>
                    <p>Province du Lualaba, RDC</p>
                    <p>ID NAT : {{ $customer->id_nat }}</p>
                    <p>RCCM :{{ $customer->rccm }}</p>
                    <p>NIF :  {{ $customer->nif }}</p>
                </div>

                <!-- Logo -->
                <div class="w-1/3 text-right">
                    <img src="{{ asset('logo/logo.png') }}" alt="Kit Service Logo" class="h-20 inline-block">
                    <h3 class="text-xl font-bold text-gray-800 mt-2">INVOICE</h3>
                    <p class="text-xs">No. 12/05/2025AA009</p>
                    <p class="text-xs">Date: 5/12/2025</p>
                    <p class="text-xs">Order No: PO 5950 OS</p>
                </div>
            </div>

            <!-- Client résumé -->
            <div class="mb-7 mt-7">
                <h2 class="text-gray-700 font-semibold">Client</h2>
                <h2 class="text-gray-700 font-semibold"><i>KAMOA COPPER SA</i></h2>
                <p><i>Kolwezi - Lualaba</i></p>
            </div>

            <!-- Table -->
            <table class="w-full  border text-xs mb-7 mt-7">
                <thead class="bg-gray-100 text-left">
                <tr class="border">
                    <th class="border px-2 py-1">N°</th>
                    <th class="border px-2 py-1">DESCRIPTION</th>
                    <th class="border px-2 py-1 text-center">Unité</th>
                    <th class="border px-2 py-1 text-center">Quantity</th>
                    <th class="border px-2 py-1 text-right">PU</th>
                    <th class="border px-2 py-1 text-right">PT/Mois</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border">
                    <td class="border px-2 py-1">1</td>
                    <td class="border px-2 py-1">Provide, Support Service February Daily Cleaning Bus</td>
                    <td class="border px-2 py-1 text-center">1</td>
                    <td class="border px-2 py-1 text-center">1</td>
                    <td class="border px-2 py-1 text-right">$ 888.00</td>
                    <td class="border px-2 py-1 text-right">$ 888.00</td>
                </tr>
                </tbody>
            </table>

            <!-- Totaux -->
            <div class="w-full flex justify-end mt-4">
                <table class="text-sm w-1/2">
                    <tr>
                        <td class="text-right pr-4 py-1">SOUS-TOTAL :</td>
                        <td class="text-right font-semibold">$ 888.00</td>
                    </tr>
                    <tr>
                        <td class="text-right pr-4 py-1">TVA 18% :</td>
                        <td class="text-right font-semibold">$ 160.00</td>
                    </tr>
                    <tr>
                        <td class="text-right pr-4 py-1 border-t font-bold">TOTAL TTC :</td>
                        <td class="text-right font-bold border-t">$ 1,048.00</td>
                    </tr>
                </table>
            </div>

            <!-- Infos bancaires -->
            <div class="mt-15 text-sm">
                <p class="font-semibold underline">Bank details</p>
                <p>Nom de la banque : RAWBANK</p>
                <p>N° compte : 05100 - 05139 - 00703347001-87</p>
                <p>Intitulé du compte : KIT SERVICE SARL</p>
                <p>Swift code : RAWBCDRC</p>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-xs text-gray-600">
                <p>Thank you for your business!</p>
                <p>For any inquiries, please contact us at <a href="mailto:kitservice17@gmail.com" class="underline text-blue-600">kitservice17@gmail.com</a></p>
            </div>
        </div>
    </div>

    <!-- Script html2pdf.js -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('invoice-content');
            const options = {
                filename:     'Facture_KIT_SERVICE_{{$customer->name}}.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(options).from(element).save();
        }
    </script>

@endsection
