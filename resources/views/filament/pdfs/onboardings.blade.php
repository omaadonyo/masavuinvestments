<!DOCTYPE html>
<html>
<head>
    <title>Advanced User Profiles</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 14mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #111827;
            position: relative;
        }

        /* ===== WATERMARK ===== */
        .watermark {
            position: fixed;
            top: 40%;
            left: 20%;
            font-size: 80px;
            color: rgba(0,0,0,0.05);
            transform: rotate(-30deg);
            z-index: -1;
        }

        .page {
            page-break-after: always;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #f59e0b;
            margin-bottom: 12px;
        }

        .title {
            flex: 1;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .section {
            margin-bottom: 12px;
        }

        .section h3 {
            font-size: 11px;
            color: #92400e;
            border-bottom: 1px solid #ddd;
        }

        .grid {
            display: table;
            width: 100%;
        }

        .row { display: table-row; }
        .cell {
            display: table-cell;
            border: 1px solid #e5e7eb;
            padding: 5px;
        }

        .label {
            font-weight: bold;
            width: 35%;
            background: #f9fafb;
        }

        .photo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 4px;
        }

        thead {
            background: #111827;
            color: white;
        }

        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .sign-box {
            width: 30%;
            text-align: center;
        }

        .line {
            margin-top: 30px;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>

<div class="watermark">CONFIDENTIAL</div>

@foreach ($onboardings as $record)
<div class="page">

    <!-- HEADER -->
    <div class="header">
        <div class="title">MEMBER OFFBOARDING REPORT</div>
    </div>

    <!-- PROFILE -->
    <div style="display:flex; justify-content:space-between;">

        <div>
            @if($record->current_photo)
                <img src="{{ public_path('/storage/'.$record->current_photo) }}" class="photo">
            @else
                <img src="/default-user.png" class="photo">
            @endif

            <p><strong>{{ $record->full_name }}</strong></p>
        </div>

        <!-- QR CODE -->
        <div>
            @php
                //  \SimpleSoftwareIO\QrCode\Facades\QrCode::size(90)->generate($record->user_id . '-' . $record->full_name);      
            @endphp
        </div>

    </div>

    <!-- PERSONAL -->
    <div class="section">
        <h3>Personal Information</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Phone</div>
                <div class="cell">{{ $record->phone_number }}</div>
            </div>
            <div class="row">
                <div class="cell label">Email</div>
                <div class="cell">{{ $record->email_address }}</div>
            </div>
            <div class="row">
                <div class="cell label">Residence</div>
                <div class="cell">{{ $record->place_of_residence }}</div>
            </div>
        </div>
    </div>

    <!-- KYC -->
    <div class="section">
        <h3>KYC Details</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">ID Number</div>
                <div class="cell">{{ $record->national_id_passort_number }}</div>
            </div>
            <div class="row">
                <div class="cell label">Profession</div>
                <div class="cell">{{ $record->profession }}</div>
            </div>
            <div class="row">
                <div class="cell label">Income</div>
                <div class="cell">{{ $record->source_of_income }}</div>
            </div>
        </div>
    </div>

    <!-- ONBOARDINGS -->
    <div class="section">
        <h3>Onboarding History</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($record->user->onboardings ?? [] as $onboard)
                <tr>
                    <td>{{ $onboard->created_at }}</td>
                    <td>{{ $onboard->status }}</td>
                    <td>{{ $onboard->notes }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TRANSACTIONS -->
    <div class="section">
        <h3>Transaction History</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($record->user->transactions ?? [] as $txn)
                <tr>
                    <td>{{ $txn->created_at }}</td>
                    <td>{{ $txn->txn_type }}</td>
                    <td>UGX {{ number_format($txn->amount, 0) }}</td>
                    <td>{{ $txn->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- SIGNATURES -->
    <div class="signature">
        <div class="sign-box">
            <div class="line"></div>
            <small>Prepared By</small>
        </div>
        <div class="sign-box">
            <div class="line"></div>
            <small>Reviewed By</small>
        </div>
        <div class="sign-box">
            <div class="line"></div>
            <small>Approved By</small>
        </div>
    </div>

</div>
@endforeach

</body>
</html>