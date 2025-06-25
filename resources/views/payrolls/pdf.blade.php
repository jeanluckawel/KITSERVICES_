<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Paie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 20px;
        }
        #payroll {
            max-width: 800px;
            margin: auto;
            background-color: white;
            border: 1px solid #d1d5db;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 24px;
            border-radius: 8px;
        }
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header {
            flex: 1;
            margin-right: 20px;
        }
        .mb-6 {
            margin-bottom: 24px;
        }
        .border-b {
            border-bottom: 1px solid #d1d5db;
        }
        .pb-4 {
            padding-bottom: 16px;
        }
        .text-2xl {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .uppercase {
            text-transform: uppercase;
        }
        .text-gray-700 {
            color: #374151;
        }
        .text-sm {
            font-size: 0.875rem;
        }
        .text-gray-600 {
            color: #4b5563;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .space-y-1 > * + * {
            margin-top: 8px;
        }
        .text-right {
            text-align: right;
        }
        .grid {
            display: grid;
            gap: 24px;
        }
        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }
        .border-t {
            border-top: 1px solid #d1d5db;
        }
        .font-semibold {
            font-weight: 600;
        }
        .font-bold {
            font-weight: bold;
        }
        .text-green-700 {
            color: #15803d;
        }
        .mt-10 {
            margin-top: 40px;
        }
        .pt-2 {
            padding-top: 8px;
        }
        .inline-block {
            display: inline-block;
        }
    </style>
</head>
<body>
<div id="payroll">
    <div class="flex mb-6 border-b pb-4">
        <div class="header">
            <h1 class="text-2xl font-bold uppercase text-gray-700">Kit Service SARL</h1>
            <p class="text-sm text-gray-600">Bulletin de Paie</p>
        </div>
        <img src="{{ asset('assets/img/logokitservices.png') }}" alt="Logo" class="logo">
    </div>

    <div class="flex justify-between text-sm mb-6">
        <div class="space-y-1">
            <p><strong>Matricule:</strong> {{ ' ' . $employee->employee_id ?? '' }}</p>
            <p><strong>Nom:</strong> {{ ' ' . $employee->first_name ?? '' }} {{ ' ' . $employee->last_name ?? '' }} {{ ' ' . $employee->middle_name ?? '' }}</p>
            <p><strong>Fonction:</strong> {{ ' ' . $employee->function ?? '' }}</p>
            <p><strong>Département:</strong> {{ ' ' . $employee->department ?? '' }}</p>
            <p><strong>Salaire de Base:</strong> {{ ' ' . $employee->salaire_mensuel_brut . '$' ?? '' }}</p>
            <p><strong>Date d'embauche:</strong> {{ ' ' . $employee->created_at ?? '' }}</p>
            <p><strong>Point de paie:</strong> KAMOA</p>
            <p><strong>Nombre d'enfants:</strong> 0</p>
            <p><strong>N CNSS:</strong> ..............................</p>
        </div>
        <div class="space-y-1 text-right">
            <p><strong>Employeur:</strong> Kit Service SARL</p>
            <p><strong>Adresse:</strong> N°1627 B Av. Kamina</p>
            <p>Quartier Mutoshi Kolwezi</p>
            <p>Commune de Manika</p>
            <p>Lualaba RDC</p>
            <p>Ville de Kolwezi</p>
            <p>00243977333977</p>
            <p><strong>Affiliation CNSS:</strong> 050302727C1</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6 text-sm border-t border-b py-4 mb-4">
        <div class="space-y-1">
            <p><strong>Temps (jours):</strong> {{ ' ' . $employee->payroll->worked_days ?? '' }}</p>
            <p><strong>Salaire Brut Mensuel:</strong> {{ ' ' . $employee->payroll->basic_usd_salary ?? '' }}</p>
            <p><strong>Congé Annuel:</strong> 0</p>
            <p><strong>Congé Maladie:</strong> 0</p>
            <p><strong>Logement (Avantage):</strong> {{ ' ' . $employee->payroll->accommodation_allowance ?? '' }}</p>
        </div>
        <div class="space-y-1">
            <p><strong>INSS 5%:</strong> 5,322 CDF {{ ' ' . $employee->payroll->inss_5 ?? '' }}</p>
            <p><strong>IPR:</strong> {{ ' ' . $employee->payroll->ipr_rate ?? '' }}</p>
        </div>
    </div>

    <div class="grid grid-cols-2 text-sm font-semibold mb-4">
        <p><strong>Total Brut:</strong> 138,374 CDF</p>
        <p><strong>Total Déductions:</strong> 6,822 CDF</p>
    </div>

    <div class="grid grid-cols-2 text-sm font-bold text-green-700 mb-6">
        <p><strong>Net à Payer (USD):</strong> $80.33</p>
        <p><strong>Net à Payer (CDF):</strong> 131,552 CDF</p>
    </div>

    <div class="text-right mt-10 text-sm">
        <p class="inline-block border-t border-gray-600 pt-2">Signature de l'agent</p>
    </div>
</div>
</body>
</html>
