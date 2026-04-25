




Claim offer
make it look professional, <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>OneTime</title>

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
<b>One-Time Login</b>
</div>

<div class="content">

<div class="data-box">


  
Hello <?php echo e($data['name'] ?? 'N/A'); ?>,

Welcome to MASAVU INVESTMENT CLUB 🎉<br><br>

Your account has been created successfully. <br>To start using your account, you need to complete your profile setup.
<br>
Please follow these steps:<br>
<br>
1. Log in to your account: <a href="https://masavuinvestments.com/dashboard/login">https://masavuinvestments.com/dashboard/login</a>
<br>
2. Change your password: For security reasons, please set a new password immediately after logging in.
<br>
3. Update your profile information: Complete your profile details to ensure full access to all features and services.
<br>
👉 Access your account profile: <a href="https://masavuinvestments.com/dashboard/profile">https://masavuinvestments.com/dashboard/profile</a>
 If you are unable to log in or need assistance, please contact our support team (0786 634 306 WA).
<br><br>
For your security:
- Do not share your login credentials
- Always use a strong password
- Log out after using shared devices
<br><br>


<div class="data-row">
<span class="label">Email:</span>
<?php echo e($data['email'] ?? 'N/A'); ?>

</div>

<div class="data-row">
<span class="label">Password:</span>
<?php echo e($data['password'] ?? 'N/A'); ?>

</div>
<br>
We’re excited to have you on board.
<br>
Best regards,  <br>
MASAVU INVESTMENT CLUB | Team


</div>



</div>

<div class="footer">
© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.
</div>

</div>

</body>
</html>
Show more

Here’s a cleaner, more polished, and more professional-looking version of your email template. I kept your structure but improved spacing, hierarchy, wording, and visual balance.

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Account Setup - OneTime</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    padding:0;
    background:#f1f5f9;
    font-family:'Inter', Arial, sans-serif;
}

.container{
    max-width:620px;
    margin:40px auto;
    background:#ffffff;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 8px 30px rgba(0,0,0,0.08);
}

.header{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    color:#ffffff;
    padding:28px 24px;
    text-align:center;
}

.header h1{
    margin:0;
    font-size:20px;
    font-weight:600;
    letter-spacing:0.3px;
}

.content{
    padding:32px 30px;
    color:#1f2937;
    line-height:1.7;
    font-size:15px;
}

.content p{
    margin:12px 0;
}

.data-box{
    background:#fffbeb;
    border:1px solid #fde68a;
    border-radius:10px;
    padding:20px;
    margin:24px 0;
}

.data-row{
    margin-bottom:10px;
    font-size:14px;
}

.label{
    font-weight:600;
    color:#92400e;
}

.button{
    display:inline-block;
    margin-top:22px;
    background:#f59e0b;
    color:#ffffff !important;
    padding:12px 24px;
    text-decoration:none;
    border-radius:8px;
    font-weight:500;
    font-size:14px;
}

.button:hover{
    background:#d97706;
}

.links a{
    color:#f59e0b;
    text-decoration:none;
    font-weight:500;
}

.links a:hover{
    text-decoration:underline;
}

.footer{
    padding:20px;
    font-size:12px;
    color:#6b7280;
    background:#f9fafb;
    text-align:center;
    border-top:1px solid #e5e7eb;
}
</style>

</head>

<body>

<div class="container">

<div class="header">
    <h1>One-Time Account Setup</h1>
</div>

<div class="content">

<p>Hello <strong><?php echo e($data['name'] ?? 'User'); ?></strong>,</p>

<p>Welcome to <strong>MASAVU INVESTMENT CLUB</strong> 🎉</p>

<p>Your account has been created successfully. To get started, please complete your account setup by following the steps below:</p>

<div class="links">
<p><strong>1.</strong> Log in to your account:<br>
<a href="https://masavuinvestments.com/dashboard/login">
masavuinvestments.com/dashboard/login
</a></p>

<p><strong>2.</strong> Change your password immediately for security purposes.</p>

<p><strong>3.</strong> Complete your profile information:<br>
<a href="https://masavuinvestments.com/dashboard/profile">
masavuinvestments.com/dashboard/profile
</a></p>
</div>

<a href="https://masavuinvestments.com/dashboard/login" class="button">
Access Your Account
</a>

<div class="data-box">

<div class="data-row">
<span class="label">Email:</span><br>
<?php echo e($data['email'] ?? 'N/A'); ?>

</div>

<div class="data-row">
<span class="label">Temporary Password:</span><br>
<?php echo e($data['password'] ?? 'N/A'); ?>

</div>

</div>

<p>If you experience any issues logging in, please contact our support team via WhatsApp at <strong>0786 634 306</strong>.</p>

<p><strong>Security Tips:</strong></p>
<ul>
<li>Do not share your login credentials</li>
<li>Use a strong, unique password</li>
<li>Always log out when using shared devices</li>
</ul>

<p>We’re excited to have you with us.</p>

<p>Best regards,<br>
<strong>MASAVU INVESTMENT CLUB Team</strong></p>

</div>

<div class="footer">
© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.
</div>

</div>

</body>
</html>
What I improved (so you can reuse the pattern):
Better visual hierarchy (headings, spacing, sections)

Cleaner CTA button

More corporate wording (less clutter, clearer instructions)

Improved readability (line spacing, font color contrast)

More polished branding feel (gradient header, subtle shadows)

Safer phrasing: “Temporary Password” instead of just “Password”

If you want, I can make a dark mode version, mobile-optimized email (for Gmail/Outlook quirks), or even convert this into a Laravel Mailable Blade template.



<?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/emails/one-time.blade.php ENDPATH**/ ?>