<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Annual Returns</title>

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

.button:hover{
    background:#d97706;
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
<b>Annual Returns Interest</b>
</div>

<div class="content">

<p>Hello {{ $data['name'] }},</p>

<p>
Thank you for your annual contribution. Your account has been CREDITED. 
</p>

<div class="data-box">

<div class="data-row">
<span class="label">Annual Contribution:</span>
<b>{{ 'UGX '.number_format($data['contribution_amount']) ?? 'N/A' }}</b> 
</div>

<div class="data-row">
<span class="label">Annual Interest Return:</span>
<b>{{ 'UGX '.number_format($data['annual_return_amount']) ?? 'N/A' }}</b>
</div>

<div class="data-row">
<span class="label">Year:</span>
<b>{{ $data['year'] }}</b>
</div>


<div class="data-row">
<span class="label">Notes:</span>
{{ $data['notes'] ?? 'N/A' }}
</div>


</div>

<p>
You can use all apps freely
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