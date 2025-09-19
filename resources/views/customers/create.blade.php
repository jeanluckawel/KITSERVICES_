@extends('layouts.app')

@section('title', 'Kit Service | Add New Customer')


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


@section('content')
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
        @csrf

        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Customer Information</h3>

        <div class="flex flex-col md:flex-row gap-6">
            <x-form.input name="name" label="Name" required autocomplete="off"/>
            <x-form.input name="id_nat" label="ID NAT" autocomplete="off"/>
            <x-form.input name="rccm"label="RCCM"/>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mt-4">
            <x-form.input name="nif" label="NIF" autocomplete="off"/>
            <x-form.input name="email" label="Email" type="email" autocomplete="off"/>
            <x-form.input name="telephone" label="Téléphone" autocomplete="off"/>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mt-4">
            <x-form.input name="province" label="Province" autocomplete="off"/>
            <x-form.input name="ville" label="Ville" autocomplete="off"/>
            <x-form.input name="commune" label="Commune" autocomplete="off"/>
        </div>

        <div class="flex flex-col md:flex-row gap-6 mt-4">
            <x-form.input name="quartier" label="Quartier" autocomplete="off"/>
            <x-form.input name="numero" label="Numéro" autocomplete="off"/>
        </div>

        <x-form.input name="adresse_complete" label="Adresse complète" class="mt-4" autocomplete="off"/>

        <div class="mt-6">
            <button type="submit" class="orange-btn">
                Save
            </button>
        </div>
    </form>
@endsection
