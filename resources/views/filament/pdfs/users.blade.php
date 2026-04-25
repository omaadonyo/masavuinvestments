<!DOCTYPE html>
<html>
<head>
    <title>Users Report</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
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
            font-size: 8px;
            color: #111827;
        }

        /* HEADER */
        .header {
            border-bottom: 2px solid #f59e0b;
            margin-bottom: 8px;
            padding-bottom: 6px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .company h3 {
            margin: 0;
            font-size: 12px;
            color: #92400e;
        }

        .company small {
            font-size: 7px;
            color: #6b7280;
        }

        .title {
            text-align: left;
            font-size: 12px;
            font-weight: bold;
        }

        .meta {
            text-align: right;
            font-size: 7px;
            color: #6b7280;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px dotted #333;
            padding: 4px;
            font-size: 7px;
            vertical-align: top;
            word-break: break-word;
        }

        thead {
            background: #111827;
            color: white;
        }

        th {
            font-size: 7px;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background: #fffdf5;
        }

        /* AVATAR */
        .avatar {
            width: 24px;
            height: 24px;
            border-radius: 3px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        /* BADGE */
        .badge {
            padding: 2px 4px;
            font-size: 6px;
            border-radius: 3px;
            color: white;
        }

        .active { background: #16a34a; }
        .inactive { background: #dc2626; }
        .pending { background: #f59e0b; }

        /* ICONS */
        .ok { color: #16a34a; font-weight: bold; }
        .warn { color: #f59e0b; font-weight: bold; }
        .bad { color: #dc2626; font-weight: bold; }

        .center { text-align: center; }
        .right { text-align: right; }

        /* FOOTER */
        .footer {
            margin-top: 6px;
            text-align: center;
            font-size: 7px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <table class="header-table">
        <tr>
            <td style="width:25%;">
                <div class="company">
                    <h3>Masavu Investment Club</h3>
                    <small>
                        Kampala, Uganda<br>
                        +256 789 444 366<br>
                        info@masavuinvestments.com<br>
                      www.masavuinvestments.com<br>
                    </small>
                </div>
            </td>

            <td class="title">
                USERS REPORT
            </td>

            <td class="meta">
                Generated:<br>
                {{ now()->format('Y-m-d H:i') }}
            </td>
        </tr>
    </table>
</div>

<!-- TABLE -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>

            <th>Identity</th>
            <th>Contact</th>
            <th>Profile</th>
            <th>Compliance</th>
            <th>Next of Kin</th>
            <th>Banking</th>
            <th class="right">Investment</th>
        </tr>
    </thead>

    <tbody>
        @php $totalInvestment = 0; @endphp

        @foreach ($users as $i => $user)

        @php
            $totalInvestment += $user->initial_investment ?? 0;

            $imageUrl = $user->avatar_url
                ? 'https://masavuinvestments.com/storage/' . $user->avatar_url
                : null;

            $imageData = null;

            if ($imageUrl) {
                try {
                    $response = \Illuminate\Support\Facades\Http::timeout(5)->get($imageUrl);
                    if ($response->successful()) {
                        $imageData = base64_encode($response->body());
                    }
                } catch (\Exception $e) {}
            }
        @endphp

        <tr>

            <!-- INDEX -->
            <td class="center">{{ $i + 1 }}</td>

            <!-- PHOTO -->
            <td class="center">
                @if($imageData)
                    <img src="data:image/jpeg;base64,{{ $imageData }}" class="avatar">
                @else
                    <img src="https://admin.masavuinvestments.com/default-user.png" class="avatar">
                @endif
            </td>

            <!-- IDENTITY -->
            <td>
                <b>{{ $user->full_name }}</b><br>
                {{ $user->member_number }}<br>

                @if($user->status === 'active')
                    <span class="ok">ACTIVE</span>
                @elseif($user->status === 'pending')
                    <span class="warn">PENDING</span>
                @else
                    <span class="bad">INACTIVE</span>
                @endif
            </td>

            <!-- CONTACT -->
            <td>
                Email: {{ $user->email }}<br>
                Phone Number: {{ $user->phone_number }}
            </td>

            <!-- PROFILE -->
            <td>
               Date of Birth: {{ $user->date_of_birth }}<br>
               Profession: {{ $user->profession }}
            </td>

            <!-- COMPLIANCE -->
            <td>
                NIN: {{ $user->national_id_passort_number }}<br>
                Onboard Status: {{ strtoupper($user->application_status) }}
            </td>

            <!-- NEXT OF KIN -->
            <td>
                Next of Kin: {{ $user->next_of_kin_name }}<br>
                Contacts: {{ $user->contacts_next_of_kin }}
            </td>

            <!-- BANKING -->
            <td>
                Bank Account {{ $user->active_bank_account_name }}<br>
                Account Number {{ $user->active_bank_account_number }}
            </td>

            <!-- INVESTMENT -->
            <td class="right">
                UGX {{ number_format($user->contributions->sum('amount') ?? 0, 0) }}
            </td>

        </tr>

        @endforeach

        <!-- TOTAL -->
        <!-- <tr>
            <td colspan="8" class="right"><b>Total Investment</b></td>
            <td class="right"><b>UGX {{ number_format($user->contributions->sum('amount'), 0) }}</b></td>
        </tr> -->
    </tbody>
</table>

<!-- FOOTER -->
<div class="footer">
    © 2024 - 2026 Masavu Investment Club — Confidential Report
</div>

</body>
</html>