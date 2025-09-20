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

        /* Carte de service 85mm x 55mm */
        .id-card {
            width: 85mm;
            height: 55mm;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            overflow: hidden;
            border-left: 4px solid #f97316;
            padding: 6px;
            font-size: 10px;
        }

        /* Section photo */
        .id-photo-section {
            width: 35%;
            background: #f97316;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4px;
            border-radius: 8px 0 0 8px;
        }

        /* Photo circulaire avec bordure blanche */
        .id-photo {
            width: 24mm;
            height: 24mm;
            border-radius: 50%;
            border: 2px solid #fff;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .id-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .id-no-photo {
            width: 24mm;
            height: 24mm;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            color: #f97316;
            font-size: 8px;
            border-radius: 50%;
            border: 2px solid #fff;
            text-align: center;
        }

        /* Infos */
        .id-info-section {
            width: 65%;
            padding-left: 4px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .id-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .id-header h2 {
            font-size: 12px;
            font-weight: bold;
            color: #111827;
            text-transform: uppercase;
            margin: 0;
        }

        .id-subtitle {
            font-size: 8px;
            color: #6b7280;
            margin-top: 2px;
        }

        .id-details {
            margin-top: 4px;
            font-size: 8px;
            color: #374151;
        }

        .id-details div {
            margin-bottom: 2px;
        }

        .id-details span.label {
            font-weight: 600;
            color: #f97316;
            width: 28mm;
            display: inline-block;
        }

        .id-footer {
            font-size: 6px;
            color: #9ca3af;
            text-align: right;
        }
    </style>

    <div class="id-card-container">
        <div class="id-card" id="cardToDownload">
            <div class="id-photo-section">
                @if(!empty($employee->photo))
                    <div class="id-photo">
                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="{{ $employee->first_name }}">
                    </div>
                @else
                    <div class="id-no-photo">Aucune photo</div>
                @endif
            </div>

            <div class="id-info-section">
                <div class="id-header">
                    <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo" style="height:12mm;">
                </div>

                <div class="id-subtitle">{{ $employee->function ?? 'Fonction non définie' }}</div>

                <div class="id-details">
                    <div><span class="label">Matricule:</span> {{ $employee->employee_id ?? 'N/A' }}</div>
                    <div><span class="label">Téléphone:</span> {{ $employee->mobile_phone ?? 'N/A' }}</div>
                    <div><span class="label">Email:</span> {{ $employee->email ?? 'N/A' }}</div>
                    <div><span class="label">Département:</span> {{ $employee->department ?? 'N/A' }}</div>
                    <div><span class="label">Naissance:</span> {{ $employee->birth_date ?? 'N/A' }}</div>
                </div>

                <div class="id-footer">Carte de service - Kit Service {{ now()->year }}</div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button id="downloadCard" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">Télécharger la carte</button>
    </div>

    <!-- JS pour télécharger la carte en PDF A4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        document.getElementById('downloadCard').addEventListener('click', function () {
            const card = document.getElementById('cardToDownload');

            html2canvas(card, { scale: 3 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const { jsPDF } = window.jspdf;

                // PDF au format A4
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: 'a4'
                });

                // Centrer l'image carte dans le PDF
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();

                const cardWidth = 85; // mm
                const cardHeight = 55; // mm

                const x = (pdfWidth - cardWidth) / 2;
                const y = (pdfHeight - cardHeight) / 2;

                pdf.addImage(imgData, 'PNG', x, y, cardWidth, cardHeight);

                pdf.save('carte_service_{{ $employee->employee_id }}.pdf');
            });
        });
    </script>
@endsection
