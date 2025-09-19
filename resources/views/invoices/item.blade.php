@php use App\Models\Invoice; @endphp
@extends('layouts.app')

@section('title', 'Factures - ' . $customer->name)

@section('content')

    <!-- Lucide icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <style>
        .orange-btn {
            background-color: #f97316;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .orange-btn:hover {
            background-color: #ea580c;
        }

        .facture-item:hover {
            background-color: #fef3c7;
            cursor: pointer;
        }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-paid {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-pending {
            background-color: #fef9c3;
            color: #92400e;
        }

        .badge-overdue {
            background-color: #fee2e2;
            color: #991b1b;
        }
    </style>

    <div class="max-w-6xl mx-auto mt-10">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold flex items-center gap-2">
                <i data-lucide="folder-open" class="w-6 h-6 text-orange-500"></i>
                Factures de {{ $customer->name }}
            </h1>

            <a href="{{ route('customers.index') }}" class="orange-btn inline-flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Retour à la liste
            </a>
        </div>
        @php
            $seen = [];
        @endphp

        @foreach($invoices as $invoice)
            @php
                $key = $invoice->numero_invoice . '_' . $invoice->po;
            @endphp

            @if(!in_array($key, $seen))
                @php $seen[] = $key; @endphp

                    <!-- Affichage de la facture unique -->
                <li class="bg-white border rounded px-4 py-4 shadow facture-item">
                    <div class="flex justify-between items-center mb-1">
                <span class="text-gray-800 font-semibold text-lg">
                    Facture N° {{ $invoice->numero_invoice ?? 'N/A' }}
                </span>
                        <span class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y') }}
                </span>
                    </div>

                    <div class="flex justify-between items-start mt-2 text-sm text-gray-700">
                        <div class="flex flex-col gap-1">
                            <span><strong>PO :</strong> {{ $invoice->po ?? 'N/A' }}</span>
                            <span><strong>Description :</strong> {{ $invoice->description }}</span>
                            <span><strong>Total (mois) :</strong> {{ number_format($invoice->pt_mois, 2, ',', ' ') }} </span>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <a href="{{ route('invoices.show', $customer->id) }}"
                               class="text-orange-600 inline-flex items-center gap-1">
                                <i data-lucide="eye" class="w-4 h-4"></i> Voir la facture
                            </a>

                        </div>
                    </div>
                </li>
            @endif
        @endforeach


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>

@endsection
