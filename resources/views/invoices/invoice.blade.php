@extends('layouts.app')

@section('title', 'Kit Service | Bulletin de Paie')

@section('content')

    <div class="flex justify-end mb-4 mr-10">
        <button onclick="downloadPDF()" class="bg-black text-white font-bold py-2 px-4 rounded">
            Télécharger le PDF
        </button>
        <a href="{{ route('employees.index') }}" class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded ml-2 inline-flex items-center gap-1">
            Retour
        </a>
    </div>

    <div id="payroll-content" class="mx-auto shadow-lg" style="width: 21cm; height: 29.7cm; padding: 2cm; background: white; box-sizing: border-box; font-size: 12px; overflow: hidden;">

        <!-- Header -->
        <div class="flex justify-between border-b pb-4 mb-4">
            <!-- Employeur -->
            <div class="w-1/3 space-y-1" style="font-size: 12px;">
                <h2 class="text-orange-500 font-bold text-sm">KIT SERVICE SARL</h2>
                <p>1627 B Avenue Kamina, Quartier Mutoshi Kolwezi</p>
                <p>LUALABA RDC</p>
                <p>00243 977 333 977</p>
                <p><a href="mailto:kitservice17@gmail.com" class="text-blue-600 underline">kitservice17@gmail.com</a></p>
                <p>ID NAT: 05-H5300-N876458R</p>
                <p>RCCM: CD/LSH/RCCM/20-B-00584</p>
            </div>

            <!-- Infos employé -->
            <div class="w-1/3 space-y-1 text-sm" style="font-size: 12px;">
                <h2 class="text-gray-700 font-semibold">Employé</h2>
                <p><strong>Matricule:</strong> {{ $employee->employee_id ?? '' }}</p>
                <p><strong>Nom:</strong> {{ $employee->first_name ?? '' }} {{ $employee->last_name ?? '' }} {{ $employee->middle_name ?? '' }}</p>
                <p><strong>Fonction:</strong> {{ $employee->function ?? '' }}</p>
                <p><strong>Département:</strong> {{ $employee->department ?? '' }}</p>
                <p><strong>Date d'embauche:</strong> {{ $employee->created_at->format('d/m/Y') ?? '' }}</p>
                <p><strong>Nombre d'enfants:</strong> 0</p>
                <p><strong>N CNSS:</strong> ..............................</p>
            </div>

            <!-- Logo -->
            <div class="w-1/3 text-right">
                <img src="{{ asset('assets/img/logokitservices.png') }}" alt="Logo" class="h-20 inline-block">
                <h3 class="text-sm font-bold text-gray-800 mt-2">Bulletin de Paie</h3>
            </div>
        </div>

        <!-- Détails Salaire -->
        <div class="mb-7">
            <table class="w-full border text-xs mb-4" style="font-size:12px;">
                <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">Libellé</th>
                    <th class="border px-2 py-1 text-right">Montant (USD)</th>
                    <th class="border px-2 py-1 text-right">Montant (CDF)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border px-2 py-1">Salaire Brut Mensuel</td>
                    <td class="border px-2 py-1 text-right">{{ $employee->payroll->basic_usd_salary ?? '' }}</td>
                    <td class="border px-2 py-1 text-right">{{ ($employee->payroll->basic_usd_salary ?? 0) * 2800 }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">Logement (Avantage)</td>
                    <td class="border px-2 py-1 text-right">{{ $employee->payroll->accommodation_allowance ?? 0 }}</td>
                    <td class="border px-2 py-1 text-right">{{ ($employee->payroll->accommodation_allowance ?? 0) * 2800 }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">INSS 5%</td>
                    <td class="border px-2 py-1 text-right">{{ $employee->payroll->inss_5 ?? 0 }}</td>
                    <td class="border px-2 py-1 text-right">{{ ($employee->payroll->inss_5 ?? 0) * 2800 }}</td>
                </tr>
                <tr>
                    <td class="border px-2 py-1">IPR</td>
                    <td class="border px-2 py-1 text-right">{{ $employee->payroll->ipr_rate ?? 0 }}</td>
                    <td class="border px-2 py-1 text-right">{{ ($employee->payroll->ipr_rate ?? 0) * 2800 }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Totaux -->
        <div class="w-full flex justify-end mt-4" style="font-size:12px;">
            <table class="w-1/2 text-sm">
                <tr>
                    <td class="text-right pr-4 py-1">Total Brut :</td>
                    <td class="text-right font-semibold">{{ ($employee->payroll->basic_usd_salary ?? 0 + $employee->payroll->accommodation_allowance ?? 0) }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-4 py-1">Total Déductions :</td>
                    <td class="text-right font-semibold">{{ ($employee->payroll->inss_5 ?? 0 + $employee->payroll->ipr_rate ?? 0) }}</td>
                </tr>
                <tr>
                    <td class="text-right pr-4 py-1 border-t font-bold">Net à Payer :</td>
                    <td class="text-right font-bold border-t">{{ ($employee->payroll->basic_usd_salary ?? 0 + $employee->payroll->accommodation_allowance ?? 0 - ($employee->payroll->inss_5 ?? 0 + $employee->payroll->ipr_rate ?? 0)) }}</td>
                </tr>
            </table>
        </div>

        <!-- Signature -->
        <div class="text-right mt-8">
            <p class="inline-block border-t border-gray-600 pt-2">Signature de l'agent</p>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('payroll-content');
            const options = {
                filename: 'bulletin_{{ $employee->employee_id }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'cm', format: [21, 29.7], orientation: 'portrait' },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };
            html2pdf().set(options).from(element).save();
        }
    </script>

@endsection
