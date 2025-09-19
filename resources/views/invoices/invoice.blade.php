@extends('layouts.app')

@section('title', 'Facture')

@section('content')

    <div class="flex justify-end mb-4 mr-10">
        <!-- Bouton pour télécharger la facture -->
        <button onclick="downloadPDF()" class="bg-black text-white font-bold py-2 px-4 rounded">
            Télécharger la facture PDF
        </button>

        <!-- Bouton retour -->
        <a href="{{ route('customers.index') }}" class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded ml-2 inline-flex items-center gap-1">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Retour
        </a>
    </div>

    <!-- Contenu de la facture -->
    <div id="invoice-content" class="mx-auto shadow-lg" style="width: 21cm; height: 29.7cm; padding: 2cm; background: white; box-sizing: border-box; font-size: 12px; overflow: hidden;">
        <!-- Header -->
        <div class="flex justify-between items-start border-b pb-4 mt-5 mb-4">
            <!-- KIT SERVICE Infos -->
            <div class="w-1/3 space-y-1 text-sm">
                <h2 class="text-orange-500 font-bold text-base">KIT SERVICE SARL</h2>
                <p>1627 B Avenue Kamina, Q/ Mutoshi Kolwezi</p>
                <p>LUALABA RDC</p>
                <p>00243 977 333 977</p>
                <p><a href="mailto:kitservice17@gmail.com" class="text-blue-600 underline">kitservice17@gmail.com</a></p>
                <p><a href="http://www.kitservice.net" class="text-blue-600 underline">www.kitservice.net</a></p>
                <p>ID NAT: 05-H5300-N876458R</p>
                <p>RCCM: CD/LSH/RCCM/20-B-00584</p>
            </div>

            <!-- Client Infos -->
            <div class="w-1/3 space-y-1 text-sm text-left">
                <h2 class="text-gray-700 font-semibold text-base">To: {{ $customer->name ?? '' }}</h2>
                <p>Avenue {{ $customer->avenue }}, Quartier {{ $customer->quartier }}</p>
                <p>Commune de {{ $customer->commune }}, Ville de {{ $customer->ville }}</p>
                <p>Province du {{ $customer->province }}, RDC</p>
                <p>ID NAT : {{ $customer->id_nat }}</p>
                <p>RCCM : {{ $customer->rccm }}</p>
                <p>NIF : {{ $customer->nif }}</p>
            </div>

            <!-- Logo et info facture -->
            <div class="w-1/3 text-right space-y-1 text-sm">
                <img src="{{ asset('logo/logo (1).png') }}" alt="Kit Service Logo" class="h-20 mx-auto"> <!-- logo agrandi -->
                <h3 class="text-base font-bold text-gray-800 mt-2">INVOICE</h3>
                <p class="text-xs">No. {{ $invoice->numero_invoice }}</p>
                <p class="text-xs">Date: {{ \Carbon\Carbon::parse($invoice->created_at)->format('j/n/Y') }}</p>
                <p class="text-xs">Order No: {{ $invoice->po }}</p>
            </div>
        </div>


        <!-- Client résumé -->
        <div class="mb-7 mt-7" style="font-size: 12px;">
            <h2 class="text-gray-700 font-semibold">Customer</h2>
            <h2 class="text-gray-700 font-semibold"><i>{{ $customer->name }}</i></h2>
            <p><i>{{ $customer->ville }} - {{ $customer->province }}</i></p>
        </div>

        <!-- Table des détails facture -->
        <table class="w-full border text-xs mb-7 mt-7" style="font-size: 12px;">
            <thead class="bg-gray-100 text-left">
            <tr class="border">
                <th class="border px-2 py-1">N°</th>
                <th class="border px-2 py-1">DESCRIPTION</th>
                <th class="border px-2 py-1 text-center">Unité</th>
                <th class="border px-2 py-1 text-center">Quantité</th>
                <th class="border px-2 py-1 text-right">PU</th>
                <th class="border px-2 py-1 text-right">PT/Mois</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach($invoices as $key => $invoice)
                @php $total += $invoice->pt_mois; @endphp
                <tr class="border">
                    <td class="border px-2 py-1">{{ $key + 1 }}</td>
                    <td class="border px-2 py-1">{{ $invoice->description }}</td>
                    <td class="border px-2 py-1 text-center">{{ $invoice->unite }}</td>
                    <td class="border px-2 py-1 text-center">{{ $invoice->quantity }}</td>
                    <td class="border px-2 py-1 text-right">$ {{ number_format($invoice->pu, 2) }}</td>
                    <td class="border px-2 py-1 text-right">$ {{ number_format($invoice->pt_mois, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Totaux -->
        @php
            $tva = $total * 0.16;
            $totalTTC = $total + $tva;
        @endphp
        <div class="w-full flex justify-end mt-4" style="font-size: 12px;">
            <table class="text-sm w-1/2">
                <tr>
                    <td class="text-right pr-4 py-1">SOUS-TOTAL :</td>
                    <td class="text-right font-semibold">$ {{ number_format($total, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-4 py-1">TVA 16% :</td>
                    <td class="text-right font-semibold">$ {{ number_format($tva, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-4 py-1 border-t font-bold">TOTAL TTC :</td>
                    <td class="text-right font-bold border-t">$ {{ number_format($totalTTC, 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Infos bancaires -->
        <div class="mt-48 text-sm" style="font-size: 12px;">
            <p class="font-semibold underline">Bank details</p>
            <p>Nom de la banque : RAWBANK</p>
            <p>N° compte : 05100 - 05139 - 00703347001-87</p>
            <p>Intitulé du compte : KIT SERVICE SARL</p>
            <p>Swift code : RAWBCDRC</p>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-xs text-gray-600" style="font-size: 12px;">
            <p>Thank you for your business!</p>
            <p>For any inquiries, please contact us at <a href="mailto:kitservice17@gmail.com" class="underline text-blue-600">kitservice17@gmail.com</a></p>
        </div>
    </div>

    <!-- Script html2pdf.js -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('invoice-content');
            const options = {
                filename: 'Facture_KIT_SERVICE_{{$customer->name}}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'cm', format: [21, 29.7], orientation: 'portrait' }, // strict A4
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };
            html2pdf().set(options).from(element).save();
        }
    </script>

@endsection
