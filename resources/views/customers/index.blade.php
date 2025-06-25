@extends('layouts.app')

@section('title', 'Kit Service | Customers List')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Customers List</h2>
            <a href="{{ route('customers.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
                Add New Customer
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Company Name</th>
                    <th class="px-4 py-2 text-left">Address</th>
                    <th class="px-4 py-2 text-left">City</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($customers as $customer)
                    <tr class="border-t border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $customer->company_name }}</td>
                        <td class="px-4 py-3">{{ $customer->address }}</td>
                        <td class="px-4 py-3">{{ $customer->city }}</td>
                        <td class="px-4 py-3">{{ $customer->phone }}</td>
                        <td class="px-4 py-3">{{ $customer->email }}</td>
                        <td class="px-4 py-3 flex space-x-2">
                            <a href="{{ route('customers.show', $customer->id) }}"
                               class="text-orange-600 hover:text-orange-800">
                                View
                            </a>
                            <a href="{{ route('customers.edit', $customer->id) }}"
                               class="text-blue-600 hover:text-blue-800">
                                Edit
                            </a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">No customers found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($customers->hasPages())
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        @endif
    </div>
@endsection
