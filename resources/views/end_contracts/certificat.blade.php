@extends('layouts.app')

@section('title', 'Certificat de Travail')

@section('content')

    <div class="flex justify-center mt-4">
        <div id="end-contract" class="relative bg-[#fffdf5] border-8 border-double border-orange-500 rounded-lg"
             style="width: 297mm; height: 210mm; padding: 25mm 20mm;">

            <!-- Coins décoratifs -->
            <div class="absolute" style="top: 15px; left: 15px; width:60px; height:60px; border-top:3px solid #FF7F00; border-left:3px solid #FF7F00;"></div>
            <div class="absolute" style="top: 15px; right: 15px; width:60px; height:60px; border-top:3px solid #FF7F00; border-right:3px solid #FF7F00;"></div>
            <div class="absolute" style="bottom: 15px; left: 15px; width:60px; height:60px; border-bottom:3px solid #FF7F00; border-left:3px solid #FF7F00;"></div>
            <div class="absolute" style="bottom: 15px; right: 15px; width:60px; height:60px; border-bottom:3px solid #FF7F00; border-right:3px solid #FF7F00;"></div>

            <!-- Filigrane -->
            <div class="absolute top-1/2 left-1/2 text-orange-500 font-bold opacity-10 select-none pointer-events-none"
                 style="font-size:7rem; transform:translate(-50%, -50%) rotate(-30deg);">
                KIT SERVICE SARL
            </div>

            <!-- Titre -->
            <div class="text-center mt-4">
                <h1 class="text-5xl font-bold uppercase tracking-widest text-orange-600">CERTIFICATE</h1>
                <h2 class="text-3xl font-bold uppercase tracking-wide mt-2 text-gray-700">OF ACHIEVEMENT</h2>
                <div class="mx-auto mt-3 mb-5 h-1 w-4/5 bg-gradient-to-r from-transparent via-orange-500 to-transparent"></div>
            </div>

            <!-- Sous-titre -->
            <div class="text-center mt-8">
                <p class="text-lg italic text-gray-600">THIS CERTIFICATE IS PROUDLY PRESENTED TO</p>
                <hr class="my-4 w-1/3 border-gray-400 mx-auto">
            </div>

            <!-- Corps du certificat -->
            <div class="mt-8 mb-16 text-center text-base text-gray-800 space-y-4">
                <p>
                    Monsieur / Madame <strong>{{ $employee->first_name ?? 'Nom' }} {{ $employee->last_name ?? '' }}</strong>,
                    Titulaire du numéro matricule : <strong>{{ $employee->employee_id ?? 'XXXX' }}</strong>.
                </p>
                <p>
                    A été employé(e) au sein de notre entreprise du <strong>{{ $employee->start_date ?? 'JJ-MM-AAAA' }}</strong>
                    au <strong>{{ $employee->end_date ?? 'JJ-MM-AAAA' }}</strong>, en qualité de
                    <strong>{{ $employee->position ?? 'Poste' }}</strong>.
                </p>
                <p>
                    Pendant toute la durée de son contrat, Monsieur / Madame {{ $employee->first_name ?? 'Nom' }} a fait preuve de
                    <strong>{{ $employee->remarks ?? 'professionnalisme, ponctualité...' }}</strong>.
                </p>
                <p>
                    Ce certificat lui est délivré à sa demande / ou à l'initiative de l'entreprise,
                    en vue de faire valoir ce que de droit, suite à l'expiration du contrat à durée déterminée signé entre les deux parties.
                </p>
            </div>

            <!-- Footer -->
            <div class="absolute bottom-[30mm] w-[calc(100%-40mm)]">
                <div class="border-t-2 border-orange-500 w-3/5 mx-auto"></div>
                <div class="flex justify-between mt-4 items-center">

                    <!-- Human Resources -->
                    <div class="text-center">
                        <p class="font-bold text-gray-700">HUMAN RESOURCES</p>
                        <p class="text-gray-600">BANZA GLORY</p>
                    </div>

                    <!-- Logo + Timbre -->
                    <div class="text-center relative">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 mx-auto relative z-10">
                        <img src="{{ asset('trimbre.png') }}" alt="Timbre"
                             class="absolute top-1/2 left-1/2 z-0 opacity-30 max-h-[200px] max-w-[200px] transform -translate-x-1/2 -translate-y-1/2">
                    </div>

                    <!-- Manager -->
                    <div class="text-center">
                        <p class="font-bold text-gray-700">MANAGER</p>
                        <p class="text-gray-600">KUZO NELLY</p>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Bouton Télécharger PDF -->
    <div class="mt-6 text-center">
        <button onclick="downloadPDF()"
                class="px-6 py-2 bg-orange-600 text-white rounded hover:bg-orange-700">
            Télécharger PDF
        </button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('end-contract');
            const opt = {
                margin: 0.5,
                filename: 'fin_contrat_{{ $employee->first_name ?? "employee" }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, scrollY: 0 },
                jsPDF: { unit: 'cm', format: 'a4', orientation: 'landscape' },
                pagebreak: { mode: ['css', 'legacy'] }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>

@endsection
