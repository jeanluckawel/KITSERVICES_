<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bulletin de Paie - Kit Service SARL</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f7fafc;
            padding: 2.5rem;
            font-size: 14px;
        }

        .container {
            max-width: 768px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            border-radius: 0.375rem;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #374151;
            margin: 0;
        }

        .title {
            font-size: 0.875rem;
            color: #4b5563;
            margin: 0.25rem 0 0;
        }

        .section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .info-block {
            font-size: 0.875rem;
        }

        .info-block p {
            margin: 0.25rem 0;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding: 1rem 0;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
            font-size: 0.875rem;
        }

        .totals, .net {
            display: grid;
            grid-template-columns: 1fr 1fr;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .net {
            color: #047857;
            font-weight: bold;
        }

        .signature {
            text-align: right;
            margin-top: 2.5rem;
            font-size: 0.875rem;
        }

        .signature-line {
            display: inline-block;
            border-top: 1px solid #4b5563;
            padding-top: 0.5rem;
        }

        img.logo {
            max-height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header avec logo -->
    <div class="section">
        <div>
            <h1>Kit Service SARL</h1>
            <p class="title">Bulletin de Paie</p>
        </div>
        <img src="payroll/img.png" alt="Logo" class="logo">
    </div>

    <!-- Infos Employé / Employeur -->
    <div class="section">
        <div class="info-block">
            <p><strong>Matricule:</strong> CH001</p>
            <p><strong>Nom:</strong> BUNDA KYELA Fidel</p>
            <p><strong>Fonction:</strong> Non qualifié</p>
            <p><strong>Département:</strong> Routes et Accès</p>
            <p><strong>Salaire de Base:</strong> $130.00</p>
            <p><strong>Date d'embauche:</strong> 1/Avr/19</p>
            <p><strong>Point de paie:</strong> KAMOA</p>
            <p><strong>Nombre d'enfants:</strong> 0</p>
            <p><strong>N CNSS:</strong> ..............................</p>
        </div>
        <div class="info-block" style="text-align: right;">
            <p><strong>Employeur:</strong> SABUNI KAFWEKU HENRI</p>
            <p><strong>Adresse:</strong> N°337 Av. Ntambwe Munana</p>
            <p>Quartier Biashara</p>
            <p>Commune de Dilala</p>
            <p>Ville de Kolwezi</p>
            <p><strong>Affiliation CNSS:</strong> 050302727C1</p>
        </div>
    </div>

    <!-- Détails Paie -->
    <div class="grid">
        <div>
            <p><strong>Temps (jours):</strong> 11</p>
            <p><strong>Salaire Brut Mensuel:</strong> 106,442 CDF</p>
            <p><strong>Congé Annuel:</strong> 0</p>
            <p><strong>Congé Maladie:</strong> 0</p>
            <p><strong>Logement (Avantage):</strong> 31,933 CDF</p>
        </div>
        <div>
            <p><strong>INSS 5%:</strong> 5,322 CDF</p>
            <p><strong>IPR:</strong> 1,500 CDF</p>
        </div>
    </div>

    <!-- Totaux -->
    <div class="totals">
        <p><strong>Total Brut:</strong> 138,374 CDF</p>
        <p><strong>Total Déductions:</strong> 6,822 CDF</p>
    </div>

    <!-- Net à payer -->
    <div class="net">
        <p><strong>Net à Payer (USD):</strong> $80.33</p>
        <p><strong>Net à Payer (CDF):</strong> 131,552 CDF</p>
    </div>

    <!-- Signature -->
    <div class="signature">
        <p class="signature-line">Signature de l'agent</p>
    </div>
</div>
</body>
</html>
