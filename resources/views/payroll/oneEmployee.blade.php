@extends('layouts.app')

@section('title', 'Kit Service | Payroll')

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

    <div class="container px-4 md:px-6 mx-auto grid">
        <!-- Tabs -->
        <div class="mb-6">
            <div class="flex border-b dark:border-gray-700 space-x-4">
                <button type="button" class="tab-btn active-tab" data-target="pay-section">
                    <i class="fas fa-dollar-sign mr-2"></i> Pay
                </button>
                <button type="button" class="tab-btn" data-target="overtime-section">
                    <i class="fas fa-clock mr-2"></i> Overtime
                </button>
                <button type="button" class="tab-btn" data-target="sickdays-section">
                    <i class="fas fa-notes-medical mr-2"></i> Sick Days
                </button>
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Full Name</th>
                        <th class="px-4 py-3">Department - Function</th>
                        <th class="px-4 py-3">SALARY BASE</th>
                        <th class="px-4 py-3">Niveau</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                         alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold text-black dark:text-gray-100">{{ $employees->first_name }} {{ $employees->last_name }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $employees->employee_id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm text-black dark:text-gray-300">
                            {{ $employees->department ?? ' ' }} - {{ $employees->function ?? ' ' }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ '$ ' . ($employees->salaire_mensuel_brut ?? 'N/A') }}
                                </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                            {{ $employees->niveau ?? 'N/A' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <form id="employeeForm" action="{{ route('payroll.store', $employees->employee_id) }}" method="POST">
            @csrf

            {{-- Pay Section --}}
            <div id="pay-section" class="tab-content active p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-orange-600 mb-4">Payroll Details</h2>

                <div class="mb-4 text-sm text-gray-700 dark:text-gray-300">
                    <span class="font-medium text-orange-600">Période de la paie :</span>
                    du <strong id="start-period"></strong> au <strong id="end-period"></strong>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-form.input type="number" step="0.01" name="exchange_rate" label="Exchange Rate (USD to CDF)" :value="old('exchange_rate')" required />
                    <div>
                        <label for="worked_days" class="block text-sm font-medium text-gray-700">Worked Days <sup class="text-red-600">*</sup></label>
                        <select name="worked_days" id="worked_days" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                            @for ($i = 0; $i <= 30; $i++)
                                <option value="{{ $i }}" {{ old('worked_days') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            {{-- Overtime Section --}}
            <div id="overtime-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-orange-600 mb-4">Overtime Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-form.input type="number" min="0" name="overtime_hours" label="Overtime Hours" :value="old('overtime_hours')"  />
                </div>
            </div>

            {{-- Sick Days Section --}}
            <div id="sickdays-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-orange-600 mb-4">Sick Days</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-form.input type="number" min="0" name="sick_days" label="Number of Sick Days" :value="old('sick_days')"  />
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end items-center mb-10">
                <button id="submitBtn" type="submit"
                        class="orange-btn hidden">
                    Valid Pay
                </button>
            </div>
        </form>
    </div>

    <style>
        .tab-btn {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-bottom: 2px solid transparent;
            color: #4B5563;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .tab-btn:hover {
            color: #f97316;
        }

        .tab-btn.active-tab {
            border-bottom-color: #f97316;
            color: #f97316;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabSections = document.querySelectorAll('.tab-content');

            function showTab(targetId) {
                tabSections.forEach(section => {
                    section.classList.remove('active');
                    if (section.id === targetId) section.classList.add('active');
                });

                tabButtons.forEach(btn => {
                    btn.classList.remove('active-tab');
                    if (btn.dataset.target === targetId) btn.classList.add('active-tab');
                });
            }

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    showTab(button.dataset.target);
                });
            });

            showTab('pay-section');

            const form = document.getElementById('employeeForm');
            const submitBtn = document.getElementById('submitBtn');

            const checkRequiredFields = () => {
                const requiredFields = form.querySelectorAll('[required]');
                let allFilled = true;

                requiredFields.forEach(input => {
                    if (!input.value.trim()) {
                        allFilled = false;
                    }
                });

                submitBtn.classList.toggle('hidden', !allFilled);
            };

            form.querySelectorAll('[required]').forEach(input => {
                input.addEventListener('input', checkRequiredFields);
            });

            checkRequiredFields();
        });

        // Période de la paie
        const startEl = document.getElementById('start-period');
        const endEl = document.getElementById('end-period');
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();
        const startDate = new Date(year, month, 16);
        const endDate = new Date(year, month + 1, 15);

        const formatDate = (date) => {
            return `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()}`;
        };

        startEl.textContent = formatDate(startDate);
        endEl.textContent = formatDate(endDate);
    </script>
@endsection
