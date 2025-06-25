@extends('layouts.app')

@section('title', 'Kit Service | Customer Details')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Customer Details</h2>
            <div class="flex space-x-2">
                <a href="{{ route('customers.edit', $customer->id) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Edit
                </a>
                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this customer?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Delete
                    </button>
                </form>
                <a href="{{ route('customers.index') }}"
                   class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Back to List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Company Info -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-4">Company Information</h3>
                <div class="space-y-3">
                    <p><strong>Company Name:</strong> {{ $customer->company_name }}</p>
                    <p><strong>ID NAT:</strong> {{ $customer->id_nat ?? 'N/A' }}</p>
                    <p><strong>RCCM:</strong> {{ $customer->rccm ?? 'N/A' }}</p>
                    <p><strong>NIF:</strong> {{ $customer->nif ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Address -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-4">Address</h3>
                <div class="space-y-3">
                    <p><strong>Address:</strong> {{ $customer->address }}</p>
                    <p><strong>City:</strong> {{ $customer->city }}</p>
                    <p><strong>Province:</strong> {{ $customer->province ?? 'N/A' }}</p>
                    <p><strong>Country:</strong> {{ $customer->country ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-4">Contact Information</h3>
                <div class="space-y-3">
                    <p><strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $customer->email ?? 'N/A' }}</p>
                    <p><strong>Website:</strong>
                        @if($customer->website)
                            <a href="{{ $customer->website }}" target="_blank" class="text-orange-600 hover:underline">
                                {{ $customer->website }}
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </div>

            <!-- Purchase Orders -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg md:col-span-2">
                <h3 class="text-lg font-medium mb-4">Purchase Orders</h3>
                @if($customer->purchaseOrders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead>
                            <tr class="bg-gray-100 dark:bg-gray-600">
                                <th class="px-4 py-2">PO Number</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Amount</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer->purchaseOrders as $order)
                                <tr class="border-t border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-4 py-3">{{ $order->po_number }}</td>
                                    <td class="px-4 py-3">{{ $order->date->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3">${{ number_format($order->amount, 2) }}</td>
                                    <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full
                                                @if($order->status === 'paid') bg-green-100 text-green-800
                                                @elseif($order->status === 'issued') bg-blue-100 text-blue-800
                                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                                @else bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('purchase-orders.show', $order->id) }}"
                                           class="text-orange-600 hover:text-orange-800">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500">No purchase orders found for this customer.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
