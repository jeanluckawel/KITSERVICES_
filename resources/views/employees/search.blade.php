@extends('layouts.app')

@section('content')

    <style>
        .orange-btn {
            background-color: #f97316; /* orange-500 */
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .orange-btn:hover {
            background-color: #ea580c; /* orange-600 */
        }
    </style>

    <div class="max-w-xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-6">Rechercher un employé</h2>

        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('employees.search') }}" method="post"
              class="bg-white p-6 rounded shadow-md border border-gray-200">
            @csrf

            <label for="search" class="block mb-2 text-sm font-medium text-gray-700">Nom, Matricule ou Département :</label>

            <input type="text" name="search" id="search" placeholder="Entrez un mot-clé..."
                   class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400" required>

            <br>

            <button type="submit" class="orange-btn mt-4">Rechercher</button>
        </form>

        @if(isset($employees) && count($employees) > 0)
            <div class="mt-6 bg-white p-4 rounded shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold mb-4">Résultats de la recherche :</h3>
                <table class="w-full table-auto border border-gray-200 mt-4">
                    <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Matricule</th>
                        <th class="px-4 py-2 border">Nom complet</th>
                        <th class="px-4 py-2 border">Function</th>
                        <th class="px-4 py-2 border">Département</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr class="hover:bg-orange-500 hover:text-white">
                            <td class="px-4 py-2 border">
                                <a href="{{ route('employees.profile', ['employee' => $employee->employee_id]) }}">
                                    {{ $employee->employee_id }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('employees.profile', ['employee' => $employee->employee_id]) }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }} {{ $employee->middle_name }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('employees.profile', ['employee' => $employee->employee_id]) }}">
                                    {{ $employee->function }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('employees.profile', ['employee' => $employee->employee_id]) }}">
                                    {{ $employee->department }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @elseif(isset($employees))
            <div class="mt-6 bg-orange-500 text-white p-3 rounded">
                Aucun résultat trouvé.
            </div>
        @endif
    </div>
@endsection
