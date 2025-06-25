

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 24px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .header-section {
            flex: 1;
        }

        .header-center {
            text-align: center;
        }

        .header-right {
            text-align: right;
        }

        .logo-kitservice {
            height: 80px;
            display: block;
            margin: 0 auto 8px auto;
        }

        .font-bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-lg {
            font-size: 18px;
        }

        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .mt-6 { margin-top: 24px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-6 { margin-bottom: 24px; }

        .text-blue-600 { color: #2563eb; }
        .text-blue-700 { color: #1d4ed8; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }

        thead {
            background-color: #f3f4f6;
            color: #4b5563;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .italic {
            font-style: italic;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 16px;
        }

        .btn {
            background-color: #2563eb;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #1d4ed8;
        }
    </style>

</head>
<body>

<div class="container">
    <!-- En-tête -->
    <div class="header">
        <!-- À gauche -->
        <div class="header-section">
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
        <div class="header-section header-center">
            <h2 class="text-lg font-bold uppercase mb-2 text-blue-700">STATEMENT {{ $invoice->po_order ?? ''}}</h2>
            <p class="font-bold">To : {{ $invoice->client->company ?? 'N/A' }} </p>
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
        <div class="header-section header-right">
            <img src="{{ asset('assets/logo/logo.png') }}" class="logo-kitservice" alt="logo kit service">
            <h3 class="font-bold uppercase text-sm">STATEMENT PO5925OS</h3>
            <table class="mt-2">
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
    <p class="mb-2">Client: <br> <span class="uppercase italic font-bold">{{ $invoice->client->company ?? 'KAMOA COPPER' }}</span></p><br>

    <!-- Tableau principal -->
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>PO ORDER</th>
            <th>DESCRIPTION</th>
            <th>N° FACTURE</th>
            <th>MONTANT</th>
            <th>PAIEMENT</th>
            <th>SOLDE</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>le 3/5/2025</th>
            <th>PO 439 OS</th>
            <th>Test</th>
            <th>AA98978SJF</th>
            <th>$120</th>
            <th>$45</th>
            <th>$53</th>
        </tr>
        <tr>
            <td colspan="7" class="text-right pr-4 font-bold">$33,510.08</td>
        </tr>
        </tbody>
    </table>

    <!-- Boutons -->

</div>
</body>
</html>

