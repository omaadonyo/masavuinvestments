<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Onboarding</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    padding:0;
    background:#f8fafc;
    font-family:'Inter', Arial, sans-serif;
}

.container{
    max-width:620px;
    margin:40px auto;
    background:#ffffff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 6px 24px rgba(0,0,0,0.06);
}

.header{
    background:#f59e0b;
    color:#ffffff;
    padding:24px;
    font-size:20px;
    font-weight:600;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.content{
    padding:30px;
    color:#272a30;
    line-height:1.6;
    font-size:15px;
}

.data-box{
    background:#fffbeb;
    border:1px solid #fde68a;
    border-radius:8px;
    padding:18px;
    margin:20px 0;
}

.data-row{
    margin-bottom:10px;
}

.label{
    font-weight:600;
    color:#78350f;
}

.button{
    display:inline-block;
    margin-top:20px;
    background:#f59e0b;
    color:#ffffff;
    padding:12px 22px;
    text-decoration:none;
    border-radius:8px;
    font-weight:500;
}

.footer{
    padding:20px;
    font-size:13px;
    color:#000000;
    background:#fafafa;
    text-align:center;
}
</style>

</head>

<body>

<div class="container">

<div class="header">
<img src="{{ asset('/wlogo.png') }}" style="width:170px;">
<b>New Onboarding</b>
</div>

<div class="content">

<p>Hello {{ $data['full_name'] ?? 'Client' }},</p>

<p>
Thank you for your interest in investing with Masavu Investments Platform. Your application has been successfully received.
</p>

<div class="data-box">

<div class="data-row">
<span class="label">Full Name:</span>
{{ $data['full_name'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Date of Birth:</span>
{{ $data['date_of_birth'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Date of Joining:</span>
{{ $data['date_of_joining'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Place of Residence:</span>
{{ $data['place_of_residence'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Phone Number:</span>
{{ $data['phone_number'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Email Address:</span>
{{ $data['email_address'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">National ID / Passport:</span>
{{ $data['national_id_passort_number'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Source of Income:</span>
{{ $data['source_of_income'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Education Level:</span>
{{ $data['highest_level_of_education'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Profession:</span>
{{ $data['profession'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Next of Kin:</span>
{{ $data['next_of_kin_name'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Relationship:</span>
{{ $data['relationship_next_of_kin'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Next of Kin Contact:</span>
{{ $data['contacts_next_of_kin'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Bank Account Name:</span>
{{ $data['active_bank_account_name'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Bank Account Number:</span>
{{ $data['active_bank_account_number'] ?? 'N/A' }}
</div>

<div class="data-row">
<span class="label">Initial Investment:</span>
{{ isset($data['initial_investment']) ? number_format($data['initial_investment']).' UGX' : 'N/A' }}
</div>

<div class="data-row">
<span class="label">Status:</span>
{{ $data['status'] ?? 'Pending' }}
</div>

</div>

<p>
Make your payments on this Bank Account:
<strong>903 002 720 258 5</strong>
</p>

<a href="{{ url('/app') }}" class="button">
Access Dashboard
</a>

</div>

<div class="footer">
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
</div>

</div>

</body>
</html>