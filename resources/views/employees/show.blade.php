@extends('layouts.app')

@section('title', 'Kit Service | Profil')

@section('content')

    <div class="max-w-6xl mx-auto p-5 sm:p-4">
        <!-- Main content container with ID for PDF generation -->
        <div id="employee-profile" class="bg-white dark:bg-gray-800 rounded-xl shadow-xl text-xs sm:text-sm p-5 sm:p-4">

            <!-- En-tête personnalisé -->
            <div class="flex items-center justify-between mb-6 border-b border-gray-300 pb-4">
                <!-- Gauche : Texte Kit Service -->
                <div class="text-left">
                    <h1 class="text-2xl font-bold text-orange-600">Kit Service Sarl</h1>
                </div>

                <!-- Centre : Titre -->
                <div class="flex-1 text-center">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-white">
                        Fiche de Renseignement du Salarié
                    </h2>
                </div>

                <!-- Droite : Logo -->
                <div class="text-right">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo Kit Service" class="h-20 inline-block">
                </div>
            </div>

            <!-- Photo Section (Top on mobile, right on desktop) -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <!-- Main Form Content -->
                <div class="flex-1 overflow-x-auto">
                    <table class="w-full border border-gray-400 dark:border-gray-600 border-collapse">
                        <tbody>
                        <!-- Informations de base -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-2 py-1 border">Informations Personnelles</th>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Entreprise</td>
                            <td class="border px-2 py-1">{{ 'Kit Service sarl' ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">Nom</td>
                            <td class="border px-2 py-1">{{  $employee->first_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Prénom</td>



                            <td class="border px-2 py-1">{{  $employee->last_name ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">Situation familiale</td>
                            <td class="border px-2 py-1">{{  $employee->marital_status ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Post nom</td>
                            <td class="border px-2 py-1">{{  $employee->middle_name ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">Nombre d'enfants à charge</td>
                            <td class="border px-2 py-1">___</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Nombre de personnes à charge</td>
                            <td class="border px-2 py-1">___</td>
                            <td class="border px-2 py-1">Lieu et date de naissance</td>
                            <td class="border px-2 py-1">{{ $employee->birth_date ? \Carbon\Carbon::parse($employee->birth_date)->translatedFormat('j F Y') : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Département</td>
                            <td class="border px-2 py-1">{{  $employee->department ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">Nationalité</td>
                            <td class="border px-2 py-1">{{  $employee->nationality ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">N° carte CNSS</td>
                            <td class="border px-2 py-1">________________________</td>
                            <td class="border px-2 py-1">N° pièce d'identité (si étranger)</td>
                            <td class="border px-2 py-1">{{  $employee->personal_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Date d'expiration</td>
                            <td class="border px-2 py-1">________________________</td>
                            <td class="border px-2 py-1" colspan="2"></td>
                        </tr>

                        <!-- Infos famille -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-2 py-1 border">Informations Familiales</th>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Nom du père</td>
                            <td class="border px-2 py-1">{{  $employee->father_name ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">{{  $employee->father_name_status ?? 'N/A' }}</td>
                            <td class="border px-2 py-1"></td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Nom de la mère</td>
                            <td class="border px-2 py-1">{{ $employee->mother_name ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">{{ $employee->mother_name_status ?? 'N/A' }}</td>
                            <td class="border px-2 py-1"></td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Nom/Date de l'époux(se)</td>
                            <td class="border px-2 py-1">{{ $employee->spouse_name ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">{{ 'alive' }}</td>
                            <td class="border px-2 py-1">{{ $employee->spouse_phone ?? 'N/A' }}</td>
                        </tr>

                        <!-- Emploi -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-2 py-1 border">Informations Professionnelles</th>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Adresse complète</td>
                            <td colspan="3" class="border px-2 py-1">{{ $employee->address1 ?? 'N/A' }},{{ $employee->address2 ?? 'N/A' }},{{ $employee->city ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Emploi / Définition du poste</td>
                            <td colspan="3" class="border px-2 py-1">___________________________________________</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Classification*</td>
                            <td class="border px-2 py-1">___________________</td>
                            <td class="border px-2 py-1">Position</td>
                            <td class="border px-2 py-1">{{ $employee->job_title ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Niveau</td>
                            <td class="border px-2 py-1">{{ $employee->niveau ?? 'N/A' }}</td>
                            <td class="border px-2 py-1">Coefficient</td>
                            <td class="border px-2 py-1">___</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Échelon</td>
                            <td class="border px-2 py-1">___</td>
                            <td class="border px-2 py-1" colspan="2">{{ $employee->echelon ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Taux horaire brut en FC</td>
                            <td class="border px-2 py-1">{{ $employee->entreprise->taux_horaire_brut_fc ?? 'N/A'}}</td>
                            <td class="border px-2 py-1">Salaire mensuel brut</td>
                            <td class="border px-2 py-1">{{'$' .$employee->salaire_mensuel_brut ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Horaire hebdomadaire & répartition</td>
                            <td class="border px-2 py-1" colspan="3">{{ $employee->entreprise->salaire_mesuel_brut  ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Date d'embauche</td>
                            <td class="border px-2 py-1">{{ $employee->created_at ? \Carbon\Carbon::parse($employee->created_at)->translatedFormat('j F Y') : 'N/A' }}</td>
                            <td class="border px-2 py-1">Numéro matricule</td>
                            <td class="border px-2 py-1">{{  $employee->employee_id ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Type de contrat</td>
                            <td class="border px-2 py-1" colspan="3">{{ $employee->contract_type ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Situation avant embauche</td>
                            <td class="border px-2 py-1" colspan="3">{{ $employee->entreprise->situation_avant_debauche ?? 'N/A' }}</td>
                        </tr>

                        <!-- Enfants -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-2 py-1 border">Nom du Conjoint(e) et Enfants</th>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1">Nom du conjoint(e)</td>
                            <td colspan="3" class="border px-2 py-1">{{  $employee->spouse_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1" colspan="4">
                                <div class="overflow-x-auto">
                                    <table class="w-full border border-gray-300 text-xs">
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
                                                <td colspan="5" class="text-center p-2 text-gray-500">Aucun enfant enregistré pour cet agent.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>

                        <!-- Personnes à contacter -->
                        <tr class="bg-gray-100 dark:bg-gray-700 text-black dark:text-white">
                            <th colspan="4" class="text-left px-2 py-1 border">Personne à contacter en cas d'urgence</th>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1" colspan="4">
                                <div class="overflow-x-auto">
                                    <table class="w-full border border-gray-300 text-xs">
                                        <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600">
                                            <th class="border p-1">N°</th>
                                            <th class="border p-1">Nom Complet</th>
                                            <th class="border p-1">Address</th>
                                            <th class="border p-1">Numéro Téléphone</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="border text-center p-1">1</td>
                                            <td class="border p-1">{{ $employee->emergency_relationship ?? 'N/A' }} {{ ' ' }} {{ $employee->emergency_full_name ?? 'N/A' }}</td>
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

            <!-- Signatures -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="border border-gray-300 dark:border-gray-600 rounded p-2 text-center">
                    <p class="font-semibold mb-4">Date et signature du représentant légal de l'entreprise</p>
                    <div class="h-16 border-t border-gray-300 dark:border-gray-600 mt-2"></div>
                </div>
                <div class="border border-gray-300 dark:border-gray-600 rounded p-2 text-center">
                    <p class="font-semibold mb-4">Date et signature de l'agent</p>
                    <div class="h-16 border-t border-gray-300 dark:border-gray-600 mt-2"></div>
                </div>
            </div>

            <!-- Notes -->
            <div class="mt-4 p-3 bg-orange-50 dark:bg-gray-700 rounded border border-orange-200 dark:border-gray-600 text-xs">
                <p class="font-semibold text-orange-700 dark:text-orange-300 mb-1">Attention :</p>
                <ul class="list-disc pl-5 space-y-1 text-orange-600 dark:text-orange-200">
                    <li>Aucun de ceux du salaire ne pourra être établie au après retour de cette fiche dûment complétée.</li>
                    <li>Les champs signalés par un calendrier sont obligatoires pour établir la déclaration annuelle des salaires.</li>
                </ul>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('employees.index') }}"
               class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                Back
            </a>

            <button
                    class="bg-black text-white px-6 py-2 rounded hover:bg-orange-700 transition">
                Download
            </button>

            <button
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Print
            </button>
        </div>
    </div>



@endsection
