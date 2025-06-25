<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kit Service | Payroll</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            color: #374151;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            border: 1px solid #d1d5db;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 24px;
            border-radius: 6px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #4b5563;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            color: #6b7280;
            margin: 4px 0 0 0;
        }

        .logo {
            width: 88px;
            height: 80px;
            object-fit: contain;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .info-section div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-section strong {
            font-weight: 600;
        }

        .right-align {
            text-align: right;
        }

        .details-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            font-size: 14px;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 0;
            margin-bottom: 16px;
        }

        .details-section div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .totals-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .net-pay-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            font-size: 14px;
            font-weight: bold;
            color: #047857;
            margin-bottom: 24px;
        }

        .signature {
            text-align: right;
            font-size: 14px;
            margin-top: 40px;
        }

        .signature p {
            display: inline-block;
            border-top: 1px solid #4b5563;
            padding-top: 8px;
        }

        .action-buttons {
            margin-top: 24px;
        }

        .btn {
            display: inline-block;
            padding: 8px 24px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .btn-download {
            background-color: #dc2626;
        }

        .btn-download:hover {
            background-color: #b91c1c;
        }

        .btn-print {
            background-color: #000;
            margin-left: 20px;
        }

        .btn-print:hover {
            background-color: #065f46;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header avec logo -->
    <div class="header">
        <div>
            <h1>Kit Service SARL</h1>
            <p>Bulletin de Paie</p>
        </div>
        <img src="assets/img/logokitservices.png" alt="Logo" class="logo">
    </div>

    <!-- Infos Employé / Employeur -->
    <div class="info-section">
        <div>
            <p><strong>Matricule:</strong> EMP123</p>
            <p><strong>Nom:</strong> John Doe Smith</p>
            <p><strong>Fonction:</strong> Développeur</p>
            <p><strong>Département:</strong> IT</p>
            <p><strong>Salaire de Base:</strong> 1000$</p>
            <p><strong>Date d'embauche:</strong> 2022-01-15</p>
            <p><strong>Point de paie:</strong> KAMOA</p>
            <p><strong>Nombre d'enfants:</strong> 0</p>
            <p><strong>N CNSS:</strong> ..............................</p>
        </div>
        <div class="right-align">
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

    <!-- Détails Paie -->
    <div class="details-section">
        <div>
            <p><strong>Temps (jours):</strong> 30</p>
            <p><strong>Salaire Brut Mensuel:</strong> 1000$</p>
            <p><strong>Congé Annuel:</strong> 0</p>
            <p><strong>Congé Maladie:</strong> 0</p>
            <p><strong>Logement (Avantage):</strong> 200$</p>
        </div>
        <div>
            <p><strong>INSS 5%:</strong> 5,322 CDF</p>
            <p><strong>IPR:</strong> 15%</p>
        </div>
    </div>

    <!-- Totaux -->
    <div class="totals-section">
        <p><strong>Total Brut:</strong> 138,374 CDF</p>
        <p><strong>Total Déductions:</strong> 6,822 CDF</p>
    </div>

    <!-- Net à payer -->
    <div class="net-pay-section">
        <p><strong>Net à Payer (USD):</strong> $80.33</p>
        <p><strong>Net à Payer (CDF):</strong> 131,552 CDF</p>
    </div>

    <!-- Signature -->
    <div class="signature">
        <p>Signature de l'agent</p>
    </div>
</div>

<div class="action-buttons">
    <a href="#" class="btn btn-download">Télécharger PDF</a>
    <a href="#" class="btn btn-print">Imprimer</a>
</div>
</body>
</html>
