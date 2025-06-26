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
        <h2 class="text-2xl font-semibold mb-6">Importer des employés</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->has('duplicates'))
            <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                {{ $errors->first('duplicates') }}
            </div>
        @endif


        <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data"
              class="bg-white p-6 rounded shadow-md border border-gray-200">
            @csrf

            <label for="file" class="block mb-2 text-sm font-medium text-gray-700">Fichier Excel :</label>

            <div class="w-full border-2 border-dashed border-gray-300 p-4 rounded-lg bg-gray-50 hover:border-orange-400 transition">
                <input type="file" name="file" id="file" required
                       class="w-full text-sm text-gray-700 file:bg-orange-500 file:text-white file:px-4 file:py-2 file:rounded file:cursor-pointer" />
            </div>

            @error('file')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
            <br>

            <button type="submit" class="orange-btn">Cliquer ici</button>

        </form>
    </div>
@endsection
