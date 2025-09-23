@extends('layouts.app')

@section('title', 'Notification de fin de contrat')

@section('content')

    <div class="max-w-4xl mx-auto p-4">

        <!-- Contenu à exporter -->
        <div id="end-contract" class="bg-white dark:bg-gray-800 rounded-xl shadow-xl text-[13px] leading-relaxed p-6"
             style="width: 21cm; padding: 2cm; box-sizing: border-box; font-size: 13px;">

            <!-- En-tête -->
            <div class="flex items-center justify-between mb-6 border-b border-gray-300 pb-2">
                <div class="text-left">
                    <h1 class="text-xl font-bold text-orange-600">KIT SERVICE Sarl</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-300">
                        Lualaba, Kolwezi, Avenue Kamina n°1627B, Commune de Manika <br>
                        Email : kitservice17@gmail.com
                    </p>
                </div>
                <div class="text-right">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo Kit Service" class="h-16 inline-block">
                </div>
            </div>

            <!-- Corps de la lettre -->
            <div class="text-gray-800 dark:text-gray-100">
                <p class="mb-2 font-semibold">
                    {{ $employee->first_name }}  {{ $employee->last_name }} {{ $employee->middle_name }}
                </p>
                <p><strong>ID :</strong> {{ $employee->personal_id ?? 'N/A' }}</p>
                <p><strong>Adresse :</strong> {{ $employee->address1 ?? '' }} {{ $employee->address2 ?? '' }} {{ $employee->city ?? '' }}</p>
                <p><strong>Téléphone :</strong> {{ $employee->mobile_phone ?? 'N/A' }}</p>

                <h2 class="text-center font-bold my-8 underline text-[15px]">
                    Notification de fin de contrat à durée déterminée
                </h2>

                @php
                    if ($employee->gender === 'Male') {
                        $salutation = 'Cher';
                    } elseif ($employee->gender === 'Female') {
                        $salutation = 'Chere';
                    } else {
                        $salutation = 'Cher(e)';
                    }

                @endphp

                <p class="mb-4">
    {{$salutation .' '}} {{ $employee->first_name }} {{ $employee->last_name }},
</p>

<p class="mb-4">
    Conformément au contrat de travail à durée déterminée signé le
    <strong>{{ $employee->created_at ? \Carbon\Carbon::parse($employee->created_at)->translatedFormat('d F Y') : 'N/A' }}</strong>,
    arrivé à échéance le <strong>{{ \Carbon\Carbon::parse($employee->end_contract_date)->translatedFormat('d F Y') }}</strong>,
    nous vous notifions par la présente que votre contrat prendra fin à cette date,
    conformément aux dispositions du Code du Travail de la République Démocratique du Congo.
</p>

<p class="mb-4">
    Nous vous remercions sincèrement pour les services rendus au sein de <strong>KIT SERVICE Sarl</strong>
    durant la période de votre engagement. Votre professionnalisme et votre contribution ont été appréciés.
</p>

<p class="mb-4">
    Nous vous invitons à prendre attache avec le service des Ressources Humaines pour la remise
    de vos biens de service, le traitement des formalités administratives et la clôture de vos droits sociaux.
</p>

<p class="mb-4">En vous souhaitant plein succès dans vos projets futurs,</p>

<p class="mb-12">Veuillez agréer, Madame/Monsieur, l’expression de nos salutations distinguées.</p>
</div>

<!-- Signature -->
<div class="flex justify-end mb-16">
<div class="text-right">
    <p class="font-semibold">Madame KUZO Nelly</p>
    <p class="text-sm">MANAGER Général</p>
</div>
</div>

<!-- Accusé de réception -->
<div class="mt-12 border-t border-gray-300 pt-8">
<h3 class="text-center font-bold mb-6 text-[14px] uppercase tracking-wide">ACCUSE DE RECEPTION PAR LE TRAVAILLEUR</h3>

<div class="space-y-3">
    <label class="flex items-center space-x-2">
        <input type="checkbox" class="form-checkbox w-5 h-5 text-orange-600" />
        <span>J’accuse réception de la présente lettre.</span>
    </label>

    <p>En foi de quoi j’ai signé ci-après :</p>

    <p>
        Le <strong>{{ \Carbon\Carbon::parse($employee->created_at)->translatedFormat('d F Y') }}</strong> , à <strong>{{ \Carbon\Carbon::parse($employee->created_at)->translatedFormat('H:i:s') }}</strong>
    </p>

    <p>
        NOM, POST-NOM(S) et Prénom(s) :
        <strong>{{ $employee->first_name ?? '' }} {{ $employee->middle_name ?? '' }} {{ $employee->last_name ?? '' }}</strong>
    </p>
    <br>
    <p>
        Signature : {{ '------------------------------' }}
</div>

<p class="italic text-sm mt-6 text-gray-600 dark:text-gray-300">
    Faire précéder la signature de la mention manuscrite « Pour réception ».
</p>
</div>


</div>

<!-- Boutons -->
<div class="mt-6 flex space-x-3">
<a href="{{ route('employees.index') }}"
class="bg-red-600 text-white px-4 py-1.5 rounded hover:bg-red-700 transition text-[12px]">
Retour
</a>

<button onclick="downloadPDF()"
    class="bg-black text-white px-4 py-1.5 rounded hover:bg-orange-700 transition text-[12px]">
Télécharger PDF
</button>
</div>
</div>

<!-- Script export PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function downloadPDF() {
const element = document.getElementById('end-contract');
const opt = {
margin:       0.5,
filename:     'fin_contrat_{{ $employee->first_name ?? "employee" }}.pdf',
image:        { type: 'jpeg', quality: 0.98 },
html2canvas:  { scale: 2, scrollY: 0 },
jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' },
pagebreak:    { mode: ['css', 'legacy'] }
};
html2pdf().set(opt).from(element).save();
}
</script>

@endsection
