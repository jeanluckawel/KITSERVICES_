@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Clock de tous les employés</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-orange-500 text-white">
                <tr>
                    <th class="py-2 px-4">Matricule</th>
                    <th class="py-2 px-4">Nom</th>
                    <th class="py-2 px-4">Start</th>
                    <th class="py-2 px-4">End</th>
                    <th class="py-2 px-4">Heures travaillées</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($employees as $employee)
                    @php
                        $todaySheet = $employee->timeSheets->first();
                    @endphp
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $employee->employee_id }}</td>
                        <td class="py-2 px-4">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td class="py-2 px-4">{{ $todaySheet->start_time ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $todaySheet->end_time ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $todaySheet->hours_worked ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
