<!DOCTYPE html>
<html>
<head>
    <title>User Profiles Report</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 15mm;
        }

        @font-face {
            font-family: 'Inter';
            src: url('{{ public_path("fonts/Inter-Regular.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Inter';
            src: url('{{ public_path("fonts/Inter-Bold.ttf") }}') format('truetype');
            font-weight: bold;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 10px;
            color: #111827;
        }

        .page {
            page-break-after: always;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #f59e0b;
            margin-bottom: 12px;
            padding-bottom: 6px;
        }

        .logo {
            width: 50px;
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
            margin-bottom: 5px;
            font-size: 11px;
            color: #92400e;
            border-bottom: 1px solid #ddd;
            padding-bottom: 2px;
        }

        .grid {
            display: table;
            width: 100%;
        }

        .row {
            display: table-row;
        }

        .cell {
            display: table-cell;
            padding: 4px;
            border: 1px solid #e5e7eb;
        }

        .label {
            font-weight: bold;
            width: 30%;
            background: #f9fafb;
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .status {
            padding: 3px 6px;
            font-size: 9px;
            color: white;
            border-radius: 4px;
        }

        
        .logo {
            width: 50px;
        }

        .company {
            margin-left: 8px;
        }

        .company h3 {
            margin: 0;
            font-size: 13px;
            color: #92400e;
        }

        .company small {
            font-size: 8px;
            color: #6b7280;
        }

        .active { background: #16a34a; }
        .pending { background: #f59e0b; }
        .inactive { background: #dc2626; }

        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 9px;
            color: #6b7280;
        }
    </style>
</head>

<body>

@foreach ($users as $user)
<div class="page">

    <!-- HEADER -->
    <div class="header">
        <img src="{{ public_path('/mic.jpg') }}" class="logo">
        <div class="company">
        <h3>Masavu Investment Club</h3>
        <small>
            Kampala, Uganda<br>
            Tel: +256 789 444 366<br>
            Email: info@masavuinvestments.com<br>
            Website: www.masavuinvestments.com
        </small>
    </div>
        <div class="title">USER PROFILE REPORT</div>
    </div>

    <!-- PROFILE HEADER -->
    <div class="section" style="display:flex; gap:15px; align-items:center;">
        <div>
            <img src="{{ $user->avatar_url ? public_path('/storage/'.$user->avatar_url) : public_path('default-user.png') }}" class="avatar">
        </div>

        <div>
            <h2 style="margin:0;">{{ $user->full_name ?? $user->name }}</h2>
            <p style="margin:2px 0;">Member #: {{ $user->member_number ?? '-' }}</p>

            <span class="status 
                {{ $user->status === 'active' ? 'active' : ($user->status === 'pending' ? 'pending' : 'inactive') }}">
                {{ strtoupper($user->status) }}
            </span>
        </div>
    </div>

    <!-- PERSONAL INFO -->
    <div class="section">
        <h3>Personal Information</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Email</div>
                <div class="cell">{{ $user->email }}</div>
            </div>
            <div class="row">
                <div class="cell label">Phone</div>
                <div class="cell">{{ $user->phone_number }}</div>
            </div>
            <div class="row">
                <div class="cell label">Date of Birth</div>
                <div class="cell">{{ $user->date_of_birth }}</div>
            </div>
            <div class="row">
                <div class="cell label">Residence</div>
                <div class="cell">{{ $user->place_of_residence }}</div>
            </div>
        </div>
    </div>

    <!-- KYC SECTION -->
    <div class="section">
        <h3>KYC & Identity</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">National ID / Passport</div>
                <div class="cell">{{ $user->national_id_passort_number }}</div>
            </div>
            <div class="row">
                <div class="cell label">Source of Income</div>
                <div class="cell">{{ number_format($user->source_of_income) }}</div>
            </div>
            <div class="row">
                <div class="cell label">Education</div>
                <div class="cell">{{ $user->highest_level_of_education }}</div>
            </div>
            <div class="row">
                <div class="cell label">Profession</div>
                <div class="cell">{{ $user->profession }}</div>
            </div>
        </div>
    </div>

    <!-- NEXT OF KIN -->
    <div class="section">
        <h3>Next of Kin</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Name</div>
                <div class="cell">{{ $user->next_of_kin_name }}</div>
            </div>
            <div class="row">
                <div class="cell label">Relationship</div>
                <div class="cell">{{ $user->relationship_next_of_kin }}</div>
            </div>
            <div class="row">
                <div class="cell label">Contacts</div>
                <div class="cell">{{ $user->contacts_next_of_kin }}</div>
            </div>
        </div>
    </div>

    <!-- BANK INFO -->
    <div class="section">
        <h3>Bank Details</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Account Name</div>
                <div class="cell">{{ $user->active_bank_account_name }}</div>
            </div>
            <div class="row">
                <div class="cell label">Account Number</div>
                <div class="cell">{{ $user->active_bank_account_number }}</div>
            </div>
        </div>
    </div>

    <!-- INVESTMENT -->
    <div class="section">
        <h3>Investment</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Initial Investment</div>
                <div class="cell">UGX {{ number_format($user->initial_investment ?? 0, 0) }}</div>
            </div>
            <div class="row">
                <div class="cell label">Date Joined</div>
                <div class="cell">{{ $user->date_of_joining }}</div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} Masavu Investment Club — Confidential Profile
    </div>

</div>
@endforeach

</body>
</html>