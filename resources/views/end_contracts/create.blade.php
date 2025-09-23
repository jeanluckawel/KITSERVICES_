@extends('layouts.app')

@section('title', 'Fin de Contrat')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-xl font-bold text-orange-600 mb-6">
            Terminer le contrat de {{ $employee->first_name }} {{ $employee->last_name }}
        </h2>

        <form method="POST" action="{{ route('end_contracts.store', $employee->employee_id) }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" name="end_date" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-orange-500 focus:border-orange-500">
                @error('end_date') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Raison</label>
                <input type="text" name="reason" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-orange-500 focus:border-orange-500">
                @error('reason') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Annuler</a>
                <button type="submit" class="ml-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Confirmer la fin
                </button>
            </div>
        </form>
    </div>
@endsection
