@extends('layouts.app')

@section('title', 'Kit Service | Profil')

@section('content')

    <div class="max-w-6xl mx-auto p-4">

        <!-- Main content container for PDF generation -->
        <div id="employee-profile" class="bg-white dark:bg-gray-800 rounded-xl shadow-xl text-[10px] sm:text-[11px] p-4"
             style="width: 21cm; padding: 1.5cm; box-sizing: border-box; font-size: 11px; overflow: visible;">

            <!-- En-tête -->
            <div class="flex items-center justify-between mb-4 border-b border-gray-300 pb-2">
                <div class="text-left">
                    <h1 class="text-xl font-bold text-orange-600">Kit Service Sarl</h1>
                </div>
                <div class="flex-1 text-center">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-white">Fiche de Renseignement du Salarié</h2>
                </div>
                <div class="text-right">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo Kit Service" class="h-20 inline-block">
                </div>
            </div>

            <!-- Photo + tableau -->
            <div class="flex flex-col md:flex-row gap-3 mb-4">
                <div class="md:w-1/5 text-center mb-2 md:mb-0">
                    @if($employee->photo)
                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo"
                             class="w-32 h-40 object-cover border rounded">
                    @else
                        <div class="w-32 h-40 border rounded flex items-center justify-center bg-gray-100 text-gray-400 text-[10px]">
                            Pas de photo
                        </div>
                    @endif
                </div>

                <div class="flex-1 overflow-x-auto">
                    <table class="w-full border border-gray-400 dark:border-gray-600 border-collapse text-[10px]">
                        <tbody>

                        <!-- Informations Personnelles -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-1 py-1 border">Informations Personnelles</th>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Entreprise</td>
                            <td class="border px-1 py-0.5">{{ 'Kit Service sarl' }}</td>
                            <td class="border px-1 py-0.5">Nom</td>
                            <td class="border px-1 py-0.5">{{ $employee->first_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Prénom</td>
                            <td class="border px-1 py-0.5">{{ $employee->last_name ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Situation familiale</td>
                            <td class="border px-1 py-0.5">{{ $employee->marital_status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Post nom</td>
                            <td class="border px-1 py-0.5">{{ $employee->middle_name ?? 'N/A' }}</td>
                            @php
                                $count = $employee->child ? $employee->child->count() : 0;
                            @endphp
                            <td class="border px-1 py-0.5">Nombre d'enfants à charge</td>
                            <td class="border px-1 py-0.5">{{ $count }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Nombre de personnes à charge</td>
                            <td class="border px-1 py-0.5">{{ $count }}</td>
                            <td class="border px-1 py-0.5">Lieu et date de naissance</td>
                            <td class="border px-1 py-0.5">{{ $employee->birth_date ? \Carbon\Carbon::parse($employee->birth_date)->translatedFormat('j F Y') : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Département</td>
                            <td class="border px-1 py-0.5">{{ $employee->department ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Nationalité</td>
                            <td class="border px-1 py-0.5">{{ $employee->nationality ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">N° carte CNSS</td>
                            <td class="border px-1 py-0.5">________________________</td>
                            <td class="border px-1 py-0.5">N° pièce d'identité</td>
                            <td class="border px-1 py-0.5">{{ $employee->personal_id ?? 'N/A' }}</td>
                        </tr>

                        <!-- Informations Familiales -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-1 py-1 border">Informations Familiales</th>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Nom du père</td>
                            <td class="border px-1 py-0.5">{{ $employee->father_name ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Statut</td>
                            <td class="border px-1 py-0.5">{{ $employee->father_name_status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Nom de la mère</td>
                            <td class="border px-1 py-0.5">{{ $employee->mother_name ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Statut</td>
                            <td class="border px-1 py-0.5">{{ $employee->mother_name_status ?? 'N/A' }}</td>
                        </tr>

                        <!-- Informations Professionnelles -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-1 py-1 border">Informations Professionnelles</th>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Adresse complète</td>
                            <td colspan="3" class="border px-1 py-0.5">
                                {{ $employee->address1 ?? 'N/A' }}, {{ $employee->address2 ?? 'N/A' }}, {{ $employee->city ?? 'N/A' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Emploi / Définition du poste</td>
                            <td colspan="3" class="border px-1 py-0.5">{{ $employee->function ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Classification*</td>
                            <td class="border px-1 py-0.5">{{ $employee->department ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Position</td>
                            <td class="border px-1 py-0.5">{{ $employee->function ?? 'N/A' }}</td>
                        </tr>

                        @php
                            $joursParMois = 22;
                            $heuresParJour = 8;
                            $semainesParMois = 4;

                            $heuresParMois = $joursParMois * $heuresParJour;

                            $salaireMensuel = $employee->salaire_mensuel_brut ?? 0;

                            $tauxHoraire = $heuresParMois > 0 ? $salaireMensuel / $heuresParMois : 0;

                            $salaireHebdomadaire = $salaireMensuel / $semainesParMois;
                        @endphp

                        <tr>
                            <td class="border px-1 py-0.5">Niveau</td>
                            <td class="border px-1 py-0.5">{{ $employee->niveau ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Coefficient</td>
                            <td class="border px-1 py-0.5">{{ '$ ' . number_format($salaireMensuel, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Échelon</td>
                            <td class="border px-1 py-0.5">{{ $employee->echelon ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Taux horaire brut (FC)</td>
                            <td class="border px-1 py-0.5">{{'FC ' . number_format($employee->taux_horaire_brut,2)  ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Salaire mensuel brut</td>
                            <td class="border px-1 py-0.5">{{ '$ ' . number_format($salaireMensuel, 2) }}</td>
                            <td class="border px-1 py-0.5">Horaire hebdomadaire & répartition</td>
                            <td class="border px-1 py-0.5">{{ '$ ' . number_format($salaireHebdomadaire, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Date d'embauche</td>
                            <td class="border px-1 py-0.5">{{ $employee->created_at ? \Carbon\Carbon::parse($employee->created_at)->translatedFormat('j F Y') : 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Numéro matricule</td>
                            <td class="border px-1 py-0.5">{{ $employee->employee_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Type de contrat</td>
                            <td class="border px-1 py-0.5">{{ $employee->contract_type ?? 'N/A' }}</td>
                            <td class="border px-1 py-0.5">Situation avant embauche</td>
                            <td class="border px-1 py-0.5">{{ $employee->situation_avant_embauche ?? 'N/A' }}</td>
                        </tr>


                        <!-- Conjoint et Enfants -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-1 py-1 border">Conjoint(e) et Enfants</th>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5">Nom du conjoint(e)</td>
                            <td colspan="3" class="border px-1 py-0.5">{{ $employee->spouse_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5" colspan="4">
                                <div class="overflow-x-auto">
                                    <table class="w-full border border-gray-300 text-[10px]">
                                        <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600">
                                            <th class="border p-1">N°</th>
                                            <th class="border p-1">Prénom</th>
                                            <th class="border p-1">Nom</th>
                                            <th class="border p-1">Date de naissance</th>
                                            <th class="border p-1">☐ Décédé ☐ En vie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($employee->child as $index => $child)
                                            <tr>
                                                <td class="border text-center p-1">{{ $index + 1 }}</td>
                                                <td class="border p-1">{{ $child->first_name }}</td>
                                                <td class="border p-1">{{ $child->last_name }}</td>
                                                <td class="border p-1">{{ $child->birthday ? \Carbon\Carbon::parse($child->birthday)->format('d/m/Y') : '-' }}</td>
                                                <td class="border text-center p-1">
                                                    @if($child->children_status === 'decede')
                                                        ☑ Décédé ☐ En vie
                                                    @else
                                                        ☐ Décédé ☑ En vie
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center p-1 text-gray-500">Aucun enfant enregistré</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                        <!-- Personne à contacter -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-1 py-1 border">Personne à contacter en cas d'urgence</th>
                        </tr>
                        <tr>
                            <td class="border px-1 py-0.5" colspan="4">
                                <div class="overflow-x-auto">
                                    <table class="w-full border border-gray-300 text-[10px]">
                                        <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600">
                                            <th class="border p-1">N°</th>
                                            <th class="border p-1">Nom Complet</th>
                                            <th class="border p-1">Adresse</th>
                                            <th class="border p-1">Numéro Téléphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="border text-center p-1">1</td>
                                            <td class="border p-1">{{ $employee->emergency_relationship ?? '' }} {{ $employee->emergency_full_name ?? '' }}</td>
                                            <td class="border p-1">{{ $employee->emergency_address ?? 'N/A' }}</td>
                                            <td class="border p-1">{{ $employee->emergency_mobile_phone ?? 'N/A' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Notes -->
            <div class="mt-3 p-2 bg-orange-50 dark:bg-gray-700 rounded border border-orange-200 dark:border-gray-600 text-[10px]">
                <p class="font-semibold text-orange-700 dark:text-orange-300 mb-1">Attention :</p>
                <ul class="list-disc pl-4 space-y-0.5 text-orange-600 dark:text-orange-200">
                    <li>Aucun de ceux du salaire ne pourra être établi après retour de cette fiche dûment complétée.</li>
                    <li>Les champs signalés par un calendrier sont obligatoires pour établir la déclaration annuelle des salaires.</li>
                </ul>
            </div>

            <!-- Signatures -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3 text-[10px]">
                <div class="border border-gray-300 dark:border-gray-600 rounded p-2 text-center">
                    <p class="font-semibold mb-2">Date et signature du représentant légal de l'entreprise</p>
                    <div class="h-12 border-t border-gray-300 dark:border-gray-600 mt-1"></div>
                </div>
                <div class="border border-gray-300 dark:border-gray-600 rounded p-2 text-center">
                    <p class="font-semibold mb-2">Date et signature de l'agent</p>
                    <div class="h-12 border-t border-gray-300 dark:border-gray-600 mt-1"></div>
                </div>
            </div>

        </div>

        <!-- Action buttons -->
        <div class="mt-4 flex space-x-3">
            <a href="{{ route('employees.index') }}"
               class="bg-red-600 text-white px-4 py-1.5 rounded hover:bg-red-700 transition text-[12px]">
                Back
            </a>

            <button onclick="downloadPDF()"
                    class="bg-black text-white px-4 py-1.5 rounded hover:bg-orange-700 transition text-[12px]">
                Download PDF
            </button>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            const element = document.getElementById('employee-profile');
            const opt = {
                margin:       0.5,
                filename:     '{{ $employee->first_name ?? "employee" }}_fiche.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, scrollY: 0 },
                jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' },
                pagebreak:    { mode: ['css', 'legacy'] }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>

@endsection
