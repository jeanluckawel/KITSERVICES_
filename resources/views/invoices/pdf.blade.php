<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture N° {{ $invoice->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header, .footer {
            text-align: center;
        }

        .logo {
            height: 80px;
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #1f4e79;
            margin-top: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .info {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .info div {
            width: 30%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        .table th {
            background-color: #f0f0f0;
            text-transform: uppercase;
        }

        .right {
            text-align: right;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Logo et Titre -->
    <div class="header">
        <img src="{{ public_path('assets/logo/logo.png') }}" class="logo" alt="Logo Kit Service">
        <h2 class="title">FACTURE - {{ $invoice->po_order ?? '' }}</h2>
    </div>

    <!-- Informations -->
    <div class="info section">
        <div>
            <strong>KIT SERVICE SARL</strong><br>
            1627 B Avenue Kamina,<br>
            Q/ Mutoshi Kolwezi<br>
            LUALABA, RDC<br>
            Tél : 00243 977 333 977<br>
            Email : kitservice17@gmail.com<br>
            Site : www.kitservice.net<br>
            ID. Nat: 05-H5300-N87645R<br>
            RCCM: CD/LSH/RCCM/20-8-00584
        </div>
        <div>
            <strong>Client :</strong><br>
            {{ $invoice->client->company ?? 'N/A' }}<br>
            Appartements 3 et 4, Batiment 2404<br>
            RN 39, Route Likasi, Joli-Site<br>
            Kolwezi, Lualaba<br>
            ID NAT : 05-B0500-N37233J<br>
            RCCM : {{ $invoice->client->rccm ?? 'N/A' }}<br>
            NIF : {{ $invoice->client->nif ?? 'N/A' }}
        </div>
        <div>
            <table>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>{{ \Carbon\Carbon::parse($invoice->date)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Montant dû</strong></td>
                    <td>${{ number_format($invoice->balance, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Termes</strong></td>
                    <td>Current</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Tableau -->
    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>PO ORDER</th>
            <th>Description</th>
            <th>N° Facture</th>
            <th>Montant</th>
            <th>Paiement</th>
            <th>Solde</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ \Carbon\Carbon::parse($invoice->date)->format('d/m/Y') }}</td>
            <td>{{ $invoice->po_order }}</td>
            <td>{{ $invoice->description }}</td>
            <td>N 17/04/2025AA009</td>
            <td>${{ number_format($invoice->amount, 2) }}</td>
            <td>${{ number_format($invoice->payment, 2) }}</td>
            <td>${{ number_format($invoice->balance, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <!-- Total -->
    <div class="right section">
        <strong>Total dû : ${{ number_format($invoice->balance, 2) }}</strong>
    </div>
</div>
</body>
</html>
