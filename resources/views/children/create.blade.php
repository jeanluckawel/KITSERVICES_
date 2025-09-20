@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow border border-orange-200">

        <!-- Navigation -->
        <div class="flex space-x-4 mb-6">
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-orange-600 hover:border-orange-600 border-b-2 border-transparent">
                Dashboard
            </a>
            <span class="px-4 py-2 text-sm font-medium text-orange-600 border-b-2 border-orange-600">
            Enfants de {{ $employee->first_name }} {{ $employee->last_name }}
        </span>
        </div>

        <h2 class="text-2xl font-bold mb-6 text-orange-600">Manage Children</h2>

        <!-- Tabs -->
        <div x-data="{ tab: 'add' }">
            <nav class="flex border-b border-orange-200 mb-4">
                <button @click="tab = 'add'"
                        :class="tab === 'add' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Add Child
                </button>
                <button @click="tab = 'show'"
                        :class="tab === 'show' ? 'border-orange-600 text-orange-600' : 'text-gray-700'"
                        class="px-4 py-2 font-medium border-b-2">
                    Show Children
                </button>
            </nav>

            <!-- Add Child Form -->
            <div x-show="tab === 'add'" x-transition>
                @if(session('success'))
                    <div class="mb-4 bg-green-100 text-green-800 p-3 rounded font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-800 p-3 rounded font-semibold">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('children.store', $employee->employee_id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Prénom <sup class="text-red-600">*</sup></label>
                            <input type="text" name="first_name" required value="{{ old('first_name') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Nom <sup class="text-red-600">*</sup></label>
                            <input type="text" name="last_name" required value="{{ old('last_name') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Deuxième prénom</label>
                            <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Sexe <sup class="text-red-600">*</sup></label>
                            <div class="flex space-x-6 mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="M" required class="text-orange-600 focus:ring-orange-500">
                                    <span class="ml-2">Masculin</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="F" required class="text-orange-600 focus:ring-orange-500">
                                    <span class="ml-2">Féminin</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Date de naissance</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-semibold text-gray-700">Statut <sup class="text-red-600">*</sup></label>
                            <select name="children_status" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">
                                <option value="">-- Choisir --</option>
                                <option value="en vie" {{ old('children_status') == 'en vie' ? 'selected' : '' }}>En vie</option>
                                <option value="decede" {{ old('children_status') == 'decede' ? 'selected' : '' }}>Décédé</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg shadow">
                            Save
                        </button>
                    </div>
                </form>
            </div>

            <!-- Show Children Table -->
            <div x-show="tab === 'show'" x-transition class="overflow-auto max-h-96 border border-orange-300 rounded">
                @if($employee->child->isEmpty())
                    <p class="text-sm text-gray-500 p-4">Aucun enfant enregistré.</p>
                @else
                    <table class="min-w-full border-collapse text-sm">
                        <thead class="bg-orange-100 sticky top-0 z-10">
                        <tr>
                            <th class="border px-4 py-2 text-left text-orange-600">#</th>
                            <th class="border px-4 py-2 text-left text-orange-600">Prénom</th>
                            <th class="border px-4 py-2 text-left text-orange-600">Nom</th>
                            <th class="border px-4 py-2 text-left text-orange-600">Date de naissance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employee->child as $child)
                            <tr class="hover:bg-orange-50">
                                <td class="border px-4 py-2">{{ $child->id }}</td>
                                <td class="border px-4 py-2">{{ $child->first_name }}</td>
                                <td class="border px-4 py-2">{{ $child->last_name }}</td>
                                <td class="border px-4 py-2">
                                    {{ $child->birthday ? \Carbon\Carbon::parse($child->birthday)->format('d/m/Y') : '—' }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
