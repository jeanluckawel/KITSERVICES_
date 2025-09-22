@extends('layouts.app')

@section('title', 'Kit Service | Grille Salariale')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-lg" x-data="{ tab: 'add' }">


        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-orange-600 hover:border-orange-600 border-b-2 border-transparent">
            Dashboard
        </a>
        <a  class="px-4 py-2 text-sm font-medium text-orange-600 border-b-2 border-orange-600">
            Grille Salariale
        </a>

        <h2 class="text-2xl font-bold text-orange-600 mt-5 mb-6">Gestion Grille Salariale</h2>

        <!-- Onglets -->
        <nav class="flex border-b border-orange-200 mb-6">
            <button @click="tab = 'add'"
                    :class="tab === 'add' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                    class="px-4 py-2 font-medium border-b-2">
                ➕ Ajouter
            </button>
            <button @click="tab = 'show'"
                    :class="tab === 'show' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                    class="px-4 py-2 font-medium border-b-2">
                📋 Liste
            </button>
        </nav>

        <!-- Add Grille -->
        <div x-show="tab === 'add'" x-transition>
            <!-- Message succès -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Message d'erreur -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-800 p-3 rounded font-semibold">
                    @if ($errors->has('duplicate'))
                        {{ $errors->first('duplicate') }}
                    @else
                        {{ $errors->first() }}
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('salary_grids.store') }}" class="space-y-6">
                @csrf

                <!-- Department -->
                <div>
                    <label class="block mb-2 text-orange-600 font-medium">Department</label>
                    <select id="department" name="department_id"
                            class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Fonction -->
                <div>
                    <label class="block mb-2 text-orange-600 font-medium">Fonction</label>
                    <select id="fonction" name="fonction_id"
                            class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                        <option value="">-- Select Fonction --</option>
                    </select>
                </div>

                <!-- Niveau -->
                <div>
                    <label class="block mb-2 text-orange-600 font-medium">Niveau</label>
                    <select id="niveau" name="niveau_id"
                            class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                        <option value="">-- Select Niveau --</option>
                        @foreach($niveaux as $niveau)
                            <option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Échelon -->
                <div>
                    <label class="block mb-2 text-orange-600 font-medium">Échelon</label>
                    <select id="echelon" name="echelon_id"
                            class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                        <option value="">-- Select Échelon --</option>
                    </select>
                </div>

                <!-- Salaire -->
{{--                <div>--}}
{{--                    <label class="block mb-2 text-orange-600 font-medium">Salaire de Base</label>--}}
{{--                    <input type="number" step="0.01" name="base_salary"--}}
{{--                           class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" >--}}
{{--                </div>--}}

                <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-bold px-6 py-2 rounded-lg shadow">
                    Enregistrer
                </button>
            </form>
        </div>

        <!-- Show Grilles -->
        <div x-show="tab === 'show'" x-transition>
            <div class="overflow-auto max-h-96 border border-orange-300 rounded mt-4">
                <table class="w-full border-collapse">
                    <thead class="bg-orange-100 sticky top-0 z-10">
                    <tr>
                        <th class="border px-4 py-2 text-left text-orange-600">ID</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Department</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Fonction</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Niveau</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Échelon</th>
{{--                        <th class="border px-4 py-2 text-left text-orange-600">Salaire</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($salaryGrids as $grid)
                        <tr class="hover:bg-orange-50">
                            <td class="border px-4 py-2">{{ $grid->id }}</td>
                            <td class="border px-4 py-2">{{ $grid->department->name }}</td>
                            <td class="border px-4 py-2">{{ $grid->fonction->name }}</td>
                            <td class="border px-4 py-2">{{ $grid->niveau->name }}</td>
                            <td class="border px-4 py-2">{{ $grid->echelon->name }}</td>
                           <td class="border px-4 py-2 font-semibold text-gray-700" >{{ number_format($grid->base_salary, 2, ',', ' ') }} $</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script pour dropdowns dynamiques -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let departmentSelect = document.getElementById("department");
            let fonctionSelect = document.getElementById("fonction");
            let niveauSelect = document.getElementById("niveau");
            let echelonSelect = document.getElementById("echelon");

            // Fonction dynamique
            departmentSelect.addEventListener("change", function() {
                let departmentId = this.value;
                fonctionSelect.innerHTML = '<option value="">-- Select Fonction --</option>';
                if (departmentId) {
                    fetch(`/departments/${departmentId}/functions`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(func => {
                                let option = document.createElement("option");
                                option.value = func.id;
                                option.textContent = func.name;
                                fonctionSelect.appendChild(option);
                            });
                        });
                }
            });

            // Échelon dynamique
            niveauSelect.addEventListener("change", function() {
                let niveauId = this.value;
                echelonSelect.innerHTML = '<option value="">-- Select Échelon --</option>';
                if (niveauId) {
                    fetch(`/niveaux/${niveauId}/echelons`)
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(ech => {
                                let option = document.createElement("option");
                                option.value = ech.id;
                                option.textContent = ech.name;
                                echelonSelect.appendChild(option);
                            });
                        });
                }
            });
        });
    </script>
@endsection
