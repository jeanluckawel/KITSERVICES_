@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">

        <h2 class="text-2xl font-bold mb-6 text-orange-600">Manage Niveaux</h2>

        <!-- Tabs -->
        <div x-data="{ tab: 'add' }" class="mb-4">
            <nav class="flex border-b border-orange-200 mb-4">
                <button @click="tab = 'add'"
                        :class="tab === 'add' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Add Niveau
                </button>
                <button @click="tab = 'show'"
                        :class="tab === 'show' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Show Niveaux
                </button>
            </nav>

            <!-- Add Niveau Form -->
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
                        {{ $errors->first('name') }}
                    </div>
                @endif

                <form action="{{ route('niveaux.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-2 text-orange-600 font-medium">Niveau Name</label>
                        <input type="text" name="name"
                               class="w-full border border-orange-300 px-3 py-2 rounded focus:ring-2 focus:ring-orange-400"
                               required>
                    </div>

                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded">
                        Save
                    </button>
                </form>
            </div>

            <!-- Show Niveaux -->
            <div x-show="tab === 'show'" x-transition
                 class="overflow-auto max-h-96 border border-orange-300 rounded">
                <table class="w-full border-collapse">
                    <thead class="bg-orange-100 sticky top-0 z-10">
                    <tr>
                        <th class="border px-4 py-2 text-left text-orange-600">#</th>
                        <th class="border px-4 py-2 text-left text-orange-600">Niveau</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($niveaux as $niveau)
                        <tr class="hover:bg-orange-50">
                            <td class="border px-4 py-2">{{ $niveau->id }}</td>
                            <td class="border px-4 py-2">{{ $niveau->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
