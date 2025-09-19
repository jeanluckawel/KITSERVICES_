@extends('layouts.app')

@section('title', 'Kit Service | Bulletin de Paie')

@section('content')

    <style>
        #payroll {
            width: 210mm;
            padding: 10mm 15mm;
            background: white;
            margin: auto;
            font-size: 13px;
            box-sizing: border-box;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            #payroll {
                box-shadow: none;
            }

            .no-print {
                display: none;
            }
        }

        .avoid-break {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 6px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 40px;
        }

        .info-grid p {
            margin: 2px 0;
        }
    </style>

    <div id="payroll">
        <!-- En-tête -->
        <div class="flex items-center justify-between mb-4 pb-2 border-b avoid-break">
            <div>
                <h1 class="text-xl font-bold uppercase text-gray-700">Kit Service SARL</h1>
                <p class="text-gray-600">Bulletin de Paie</p>
            </div>
            <img src="{{ asset('assets/img/logokitservices.png') }}" alt="Logo" class="w-22 h-20 object-contain">
        </div>

        <!-- Infos employé -->
        <div class="info-grid avoid-break mb-4">
            <div>
                <div class="section-title">Informations de l'Employé</div>
                <p><strong>Matricule:</strong> {{ $employee->employee_id ?? '' }}</p>
                <p><strong>Nom:</strong> {{ $employee->first_name ?? '' }} {{ $employee->last_name ?? '' }} {{ $employee->middle_name ?? '' }}</p>
                <p><strong>Fonction:</strong> {{ $employee->function ?? '' }}</p>
                <p><strong>Département:</strong> {{ $employee->department ?? '' }}</p>
                <p><strong>Date d'embauche:</strong> {{ $employee->created_at->format('d/m/Y') ?? '' }}</p>
                <p><strong>Point de paie:</strong> KAMOA</p>
                <p><strong>Nombre d'enfants:</strong> 0</p>
                <p><strong>N CNSS:</strong> ..............................</p>
            </div>
            <div>
                <div class="section-title">Employeur</div>
                <p><strong>Raison Sociale:</strong> Kit Service SARL</p>
                <p><strong>Adresse:</strong> N°1627 B Av. Kamina</p>
                <p>Quartier Mutoshi Kolwezi</p>
                <p>Commune de Manika</p>
                <p>Lualaba RDC</p>
                <p>Ville de Kolwezi</p>
                <p>Téléphone: 00243977333977</p>
                <p><strong>Affiliation CNSS:</strong> 050302727C1</p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Données de Paie -->
        <div class="info-grid avoid-break mb-4">
            <div>
                <div class="section-title">Détails du Salaire</div>
                <p><strong>Temps (jours):</strong> {{ $employee->payroll->worked_days ?? '' }}</p>
                <p><strong>Salaire Brut Mensuel:</strong> {{ $employee->payroll->basic_usd_salary ?? '' }} $</p>
                <p><strong>Congé Annuel:</strong> 0</p>
                <p><strong>Congé Maladie:</strong> 0</p>
                <p><strong>Logement (Avantage):</strong> {{ $employee->payroll->accommodation_allowance ?? '' }} $</p>
            </div>
            <div>
                <div class="section-title">Déductions</div>
                <p><strong>INSS 5%:</strong> {{ $employee->payroll->inss_5 ?? '' }} CDF</p>
                <p><strong>IPR:</strong> {{ $employee->payroll->ipr_rate ?? '' }} CDF</p>
            </div>
        </div>

        <!-- Totaux -->
        <div class="info-grid avoid-break mb-3 font-semibold">
            <div><strong>Total Brut:</strong> ${{ $employee->payroll->basic_usd_salary *  2800 ?? '' }}</div>
            <div><strong>Total Déductions:</strong> 6,822 CDF</div>
        </div>

        <!-- Net à payer -->
        <div class="info-grid avoid-break mb-5 font-bold text-green-700">
            <div><strong>Net à Payer (USD):</strong> ${{ $employee->payroll->basic_usd_salary ?? '' }}</div>
            <div><strong>Net à Payer (CDF):</strong> CDF {{ $employee->payroll->basic_usd_salary * 2800  ?? '' }} </div>
        </div>

        <!-- Signature -->
        <div class="text-right mt-8 avoid-break">
            <p class="inline-block border-t border-gray-600 pt-2">Signature de l'agent</p>
        </div>


    </div>

    <!-- Boutons -->


    <div class="no-print mt-6 flex  gap-4">
        <button onclick="generatePDF()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Download
        </button>
{{--        <button onclick="window.print()" class="bg-black text-white px-6 py-2 rounded hover:bg-green-700">--}}
{{--            Print--}}
{{--        </button>--}}

        <button onclick="sendPdfByEmail()" class="bg-black text-white px-6 py-2 rounded hover:bg-green-700">
            Send
        </button>

    </div>





    <!-- Script PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            const element = document.getElementById('payroll');
            const opt = {
                margin: 0,
                filename: 'bulletin_{{ $employee->employee_id }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }


        function sendPdfByEmail() {
            const element = document.getElementById('payroll');

            const opt = {
                margin: 0,
                filename: 'bulletin_{{ $employee->employee_id }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).outputPdf('blob').then(function (pdfBlob) {
                const formData = new FormData();
                formData.append('pdf', pdfBlob, 'bulletin.pdf');
                formData.append('_token', '{{ csrf_token() }}');

                fetch("{{ route('payroll.sendPdf', $employee->id) }}", {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => {
                        if (!response.ok) throw new Error('Erreur lors de l\'envoi');
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message || 'Bulletin envoyé avec succès.');
                    })
                    .catch(error => {
                        alert('Erreur : ' + error.message);
                    });
            });
        }
    </script>

@endsection
