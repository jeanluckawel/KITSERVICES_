@extends('layouts.app')

@section('title', 'Kit Service | Add New Customer')

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

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <!-- Company Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Company Name <sup class="text-red-600">*</sup></span>
                    <input name="company_name" required
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">ID NAT</span>
                    <input name="id_nat"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">RCCM</span>
                    <input name="rccm"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Address -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address <sup class="text-red-600">*</sup></span>
                    <input name="address" required
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">City <sup class="text-red-600">*</sup></span>
                    <input name="city" required
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Province</span>
                    <input name="province"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Contact Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Phone</span>
                    <input name="phone"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input name="email" type="email"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Country</span>
                    <input name="country"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Legal Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">NIF</span>
                    <input name="nif"
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-orange-700">
                    Save Customer
                </button>
            </div>
        </div>
    </form>
@endsection
