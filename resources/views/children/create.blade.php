@extends('layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Ajouter un enfant - {{ $employee->first_name }} {{ $employee->last_name }}</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('children.store', $employee->employee_id) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm text-gray-700">First Name <sup class="text-red-600">*</sup></label>
                    <input type="text" name="first_name" required value="{{ old('first_name') }}"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-orange-500" />
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-700">Last Name <sup class="text-red-600">*</sup></label>
                    <input type="text" name="last_name" required value="{{ old('last_name') }}"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-orange-500" />
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-700">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-orange-500" />
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-700">Gender <sup class="text-red-600">*</sup></label>
                    <div class="flex space-x-4 mt-1">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="M" required class="text-orange-600 form-radio">
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="F" required class="text-orange-600 form-radio">
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm text-gray-700">Birth Date</label>
                    <input type="date" name="birthday" value="{{ old('birthday') }}"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-orange-500" />
                </div>


                <div>
                    <label class="block mb-2 text-sm text-gray-700">Children Status</label>
                    <select name="children_status" required class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-orange-500">
                        <option value="">-- Choisir --</option>
                        <option value="en vie" {{ old('children_status') == 'en vie' ? 'selected' : '' }}>En vie</option>
                        <option value="decede" {{ old('children_status') == 'decede' ? 'selected' : '' }}>Décédé</option>
                    </select>
                </div>
            </div>
            <div class="mt-6 flex space-x-4">
                <!-- Bouton Enregistrer -->
                <button type="submit"
                        class="bg-black text-white px-6 py-2 rounded hover:bg-orange-600 transition">
                    Save
                </button>

                <!-- Bouton Retour -->
                <a href="{{ route('employees.index') }}"
                   class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Back
                </a>
            </div>

        </form>

{{--        <div class="mt-10">--}}
{{--            <h3 class="text-lg font-semibold text-gray-600 mb-4">Liste des enfants enregistrés</h3>--}}
{{--            @if($children->isEmpty())--}}
{{--                <p class="text-sm text-gray-500">Aucun enfant enregistré.</p>--}}
{{--            @else--}}
{{--                <li>--}}
{{--                    {{ $child->first_name }} {{ $child->last_name }}--}}
{{--                    - {{ $child->gender == 'M' ? 'Masculin' : 'Féminin' }}--}}
{{--                    @if($child->calculated_age)--}}
{{--                        - Âge : {{ $child->calculated_age }} ans--}}
{{--                    @endif--}}
{{--                </li>--}}

{{--            @endif--}}
{{--        </div>--}}
    </div>
@endsection
