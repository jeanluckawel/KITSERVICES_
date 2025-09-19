@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">

        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-orange-600 hover:border-orange-600 border-b-2 border-transparent">
            Dashboard
        </a>
        <a  class="px-4 py-2 text-sm font-medium text-orange-600 border-b-2 border-orange-600">
            Échelons
        </a>

        <h2 class="text-2xl font-bold mt-5 mb-6 text-orange-600">Manage Échelons</h2>

        <div x-data="{ tab: 'add' }" class="mb-4">
            <nav class="flex border-b border-orange-200 mb-4">
                <button @click="tab = 'add'"
                        :class="tab === 'add' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Add Échelon
                </button>
                <button @click="tab = 'show'"
                        :class="tab === 'show' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Show Échelons
                </button>
            </nav>

            <!-- Add Échelon Form -->
            <div x-show="tab === 'add'" x-transition>
                <!-- Message de succès -->
                @if(session('success'))
                    <div class="mb-4 bg-green-100 text-green-800 p-3 rounded font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Message d'erreur -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-800 p-3 rounded font-semibold">
                        {{ $errors->first('niveau_id') ?? $errors->first('name') }}
                    </div>
                @endif

                <form action="{{ route('echelons.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block mb-2 text-orange-600 font-medium">Select Niveau</label>
                        <select name="niveau_id" class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                            <option value="">-- Choose Niveau --</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-orange-600 font-medium">Échelon Name</label>
                        <input type="text" name="name" class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400" required>
                    </div>

                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>

            <!-- Show Échelons -->
            <div x-show="tab === 'show'" x-transition class="overflow-auto max-h-96 border border-orange-300 rounded">
                <table class="w-full border-collapse">
                    <thead class="bg-orange-100 sticky top-0 z-10">
                    <tr>
                        <th class="border px-4 py-2 text-left text-orange-600">#</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Niveau</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Échelon</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($echelons as $echelon)
                        <tr class="hover:bg-orange-50">
                            <td class="border px-4 py-2">{{ $echelon->id }}</td>
                            <td class="border px-4 py-2">{{ $echelon->niveau->name }}</td>
                            <td class="border px-4 py-2">{{ $echelon->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
