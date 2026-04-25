<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contribution Confirmation</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    padding:0;
    background:#f9fafb;
    font-family:'Inter', Arial, sans-serif;
}

.wrapper{
    max-width:620px;
    margin:40px auto;
    background:#ffffff;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 6px 20px rgba(0,0,0,0.05);
}

.header{
    background:#f59e0b;
    padding:24px;
    color:white;
    font-size:20px;
    font-weight:600;
}

.content{
    padding:30px;
    color:#374151;
    font-size:15px;
    line-height:1.6;
}

.summary{
    margin-top:20px;
    border:1px solid #f3f4f6;
    border-radius:8px;
    overflow:hidden;
}

.row{
    display:flex;
    justify-content:space-between;
    padding:14px 18px;
    border-bottom:1px solid #f3f4f6;
}

.row:last-child{
    border-bottom:none;
    font-weight:600;
    background:#fffbeb;
}

.label{
    color:#6b7280;
}

.value{
    color:#111827;
}

.button{
    display:inline-block;
    margin-top:25px;
    padding:12px 20px;
    background:#f59e0b;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-weight:500;
}

.footer{
    text-align:center;
    padding:20px;
    font-size:13px;
    color:#9ca3af;
    background:#f9fafb;
}
</style>
</head>

<body>

<div class="wrapper">

<div class="header">
Contribution Received
</div>

<div class="content">

<p>Hello <?php echo e($user->name ?? 'Member'); ?>,</p>

<p>
Thank you for your contribution. Your payment has been successfully recorded.
Below is the summary of your transaction.
</p>

<div class="summary">

<div class="row">
<div class="label">Contribution Amount</div>
<div class="value">UGX <?php echo e(number_format($data['amount'] ?? 0)); ?></div>
</div>

<div class="row">
<div class="label">Management Fee</div>
<div class="value">UGX <?php echo e(number_format($data['management_fee'] ?? 0)); ?></div>
</div>

<div class="row">
<div class="label">Total Deposit</div>
<div class="value">UGX <?php echo e(number_format($data['total_deposit'] ?? 0)); ?></div>
</div>

</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['notes'])): ?>
<p style="margin-top:20px;">
<strong>Notes:</strong><br>
<?php echo e($data['notes']); ?>

</p>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<a href="<?php echo e(url('/dashboard')); ?>" class="button">
View Dashboard
</a>

</div>

<div class="footer">
© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.
</div>

</div>

</body>
</html><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/emails/contribution-submitted.blade.php ENDPATH**/ ?>