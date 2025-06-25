@extends('layouts.app')

@section('title', 'Carte de service')

@section('content')
    <style>
        body {
            background: #f9fafb;
            font-family: 'Segoe UI', sans-serif;
        }

        .id-card-container {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .id-card {
            background: #fff;
            width: 680px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            overflow: hidden;
            border-left: 6px solid #f97316;
        }

        .id-photo-section {
            width: 35%;
            background: #f97316;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 16px;
            color: white;
            justify-content: center;
        }

        .id-photo {
            width: 150px;
            height: 150px;
            border: 3px solid #fff;
            background: #fff;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .id-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .id-no-photo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: #f97316;
            font-size: 14px;
            background: #fff;
        }

        .id-info-section {
            width: 65%;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .id-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .id-logo {
            height: 60px;
        }

        .id-title {
            font-size: 20px;
            font-weight: bold;
            color: #111827;
            text-transform: uppercase;
        }

        .id-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-top: 4px;
        }

        .id-details {
            margin-top: 20px;
        }

        .id-details div {
            margin-bottom: 8px;
            font-size: 14px;
            color: #374151;
        }

        .id-details span.label {
            font-weight: 600;
            color: #f97316;
            display: inline-block;
            width: 100px;
        }

        .id-footer {
            text-align: right;
            font-size: 12px;
            color: #9ca3af;
            margin-top: 20px;
        }

        .id-gender {
            font-size: 13px;
            font-weight: 500;
        }
    </style>


    <div class="id-card-container">
        <div class="id-card" id="cardToDownload">
            <div class="id-photo-section">
                <div class="id-photo">
                    @if(!empty($employee->photo))

                        <img src="{{ asset('storage/photos/' . $employee->photo) }}" alt="Photo">
                    @else
                        <div class="id-no-photo">Aucune photo</div>
                    @endif
                </div>

            </div>

            <div class="id-info-section">
                <div>
                    <div class="id-header">
                        <div>
                            <div class="id-title">{{ strtoupper($employee->first_name) }} {{ strtoupper($employee->last_name) }}</div>
                            <div class="id-subtitle">{{ $employee->function ?? 'Fonction non définie' }}</div>
                        </div>
                        <img src="{{ asset('logo/logo.png') }}" class="id-logo" alt="Logo">
                    </div>

                    <div class="id-details">
                        <div><span class="label">Matricule:</span> {{ $employee->employee_id ?? 'N/A' }}</div>
                        <div><span class="label">Téléphone:</span> {{ $employee->mobile_phone ?? 'N/A' }}</div>
                        <div><span class="label">Email:</span> {{ $employee->email ?? 'N/A' }}</div>
                        <div><span class="label">Département:</span> {{ $employee->department ?? 'N/A' }}</div>
                        <div><span class="label">Naissance:</span> {{ $employee->birth_date ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="id-footer">Carte de service - Kit Service {{ now()->year }}</div>
            </div>
        </div>

    </div>



@endsection
