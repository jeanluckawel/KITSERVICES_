@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Add Salary Grid</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form action="{{ route('salary_grids.store') }}" method="POST">
            @csrf

            <label class="block mb-2">Department</label>
            <select name="department_id" class="w-full border px-3 py-2 rounded mb-4" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Function</label>
            <select name="function_id" class="w-full border px-3 py-2 rounded mb-4" required>
                <option value="">-- Select Function --</option>
                @foreach($functions as $func)
                    <option value="{{ $func->id }}">{{ $func->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Niveau</label>
            <select name="niveau_id" class="w-full border px-3 py-2 rounded mb-4" required>
                <option value="">-- Select Niveau --</option>
                @foreach($niveaux as $niveau)
                    <option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Échelon</label>
            <select name="echelon_id" class="w-full border px-3 py-2 rounded mb-4" required>
                <option value="">-- Select Échelon --</option>
                @foreach($echelons as $echelon)
                    <option value="{{ $echelon->id }}">{{ $echelon->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Base Salary</label>
            <input type="number" name="base_salary" class="w-full border px-3 py-2 rounded mb-4" step="0.01" required>

            <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
