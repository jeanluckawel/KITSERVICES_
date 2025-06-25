@extends('layouts.app')

@section('title', 'Ajouter une entreprise')

@section('content')
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Ajouter une entreprise</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Nom de la société -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">
                        Nom de la société <sup class="text-red-600">*</sup>
                    </label>
                    <input type="text" name="company" required
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <!-- Adresse -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Adresse</label>
                    <input type="text" name="address"
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <!-- Pays -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Pays</label>
                    <input type="text" name="country"
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <!-- ID NAT -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">ID NAT</label>
                    <input type="text" name="id_nat"
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <!-- RCCM -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">RCCM</label>
                    <input type="text" name="rccm"
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>

                <!-- NIF -->
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">NIF</label>
                    <input type="text" name="nif"
                           class="w-full px-4 py-3 text-sm rounded-md border border-gray-300
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                </div>
            </div>

            <!-- Submit -->
            <div class="mt-6">
                <button type="submit"
                        class="bg-black text-white px-6 py-2 rounded hover:bg-orange-700">
                    save
                </button>
            </div>
        </div>
    </form>
@endsection
