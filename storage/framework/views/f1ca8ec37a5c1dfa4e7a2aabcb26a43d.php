<!DOCTYPE html>
<html>
<head>
<title>Executive Member Profile</title>

<style>
@page {
    size: A4 portrait;
    margin: 10mm;
}

body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 9px;
    color: #111827;
    position: relative;
}

/* PAGE WRAPPER */
.page {
    position: relative;
    page-break-after: always;
}

/* 🔥 PER-PAGE WATERMARK (DOMPDF SAFE METHOD) */
.watermark {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-35deg);
    font-size: 90px;
    font-weight: bold;
    color: #dc2626;
    opacity: 0.08;
    z-index: -1;
    letter-spacing: 4px;
}

/* HEADER */
.header {
    text-align: center;
    border-bottom: 2px solid #f59e0b;
    padding-bottom: 5px;
    margin-bottom: 8px;
}

.title {
    font-size: 14px;
    font-weight: bold;
}

/* PROFILE */
.profile-table {
    width: 100%;
    margin-bottom: 8px;
    border-collapse: collapse;
}

.photo {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 1px solid #ddd;
}

/* KPI */
.kpi {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}

.kpi td {
    width: 33%;
    text-align: center;
    padding: 6px;
    background: #f9fafb;
    border: 1px solid #eee;
}

/* SECTION */
.section-title {
    font-size: 10px;
    font-weight: bold;
    margin: 6px 0 3px;
    border-bottom: 1px solid #ddd;
}

/* TABLE */
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 8.5px;
    table-layout: fixed;
}

.table td {
    border: 1px solid #e5e7eb;
    padding: 4px;
    word-wrap: break-word;
}

.label {
    width: 32%;
    background: #f9fafb;
    font-weight: bold;
}

/* FOOTER */
.footer {
    text-align: center;
    font-size: 8px;
    margin-top: 8px;
    color: #6b7280;
}
</style>
</head>

<body>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $onboardings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

<div class="page">

    <!-- 🔥 WATERMARK (ONE PER PAGE, SAFE) -->
    <div class="watermark">CONFIDENTIAL</div>

    <!-- HEADER -->
    <div class="header">
        <div class="title">MEMBER EXECUTIVE PROFILE</div>
        <div style="font-size:9px;"><?php echo e(strtoupper($record->status)); ?></div>
    </div>

    <?php
        $imageUrl = $record->current_photo
            ? 'https://masavuinvestments.com/storage/' . $record->current_photo
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
    ?>

    <!-- PROFILE -->
    <table class="profile-table">
        <tr>
            <td style="width:90px; vertical-align:top;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageData): ?>
                    <img src="data:image/jpeg;base64,<?php echo e($imageData); ?>" class="photo">
                <?php else: ?>
                    <img src="https://admin.masavuinvestments.com/default-user.png" class="photo">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </td>

            <td style="vertical-align:top;">
                <b style="font-size:11px;"><?php echo e($record->full_name); ?></b><br>
                <?php echo e($record->email_address); ?><br>
                <?php echo e($record->phone_number); ?><br>
                <?php echo e($record->place_of_residence); ?>

            </td>
        </tr>
    </table>

    <!-- KPI -->
    <table class="kpi">
        <tr>
            <td><b>Investment</b><br>UGX <?php echo e(number_format($record->initial_investment)); ?></td>
            <td><b>Subscription</b><br>UGX <?php echo e(number_format($record->subscription_fee)); ?></td>
            <td><b>Management</b><br>UGX <?php echo e(number_format($record->management_fee)); ?></td>
        </tr>
    </table>

    <!-- KYC -->
    <div class="section-title">KYC SUMMARY</div>
    <table class="table">
        <tr><td class="label">ID Number</td><td><?php echo e($record->national_id_passort_number); ?></td></tr>
        <tr><td class="label">Profession</td><td><?php echo e($record->profession); ?></td></tr>
        <tr><td class="label">Income</td><td><?php echo e($record->source_of_income); ?></td></tr>
        <tr><td class="label">Next of Kin</td><td><?php echo e($record->next_of_kin_name); ?></td></tr>
        <tr><td class="label">Contact</td><td><?php echo e($record->contacts_next_of_kin); ?></td></tr>
    </table>

    <!-- BANK -->
    <div class="section-title">BANK DETAILS</div>
    <table class="table">
        <tr>
            <td class="label">Bank</td>
            <td><?php echo e($record->active_bank_account_name); ?></td>
        </tr>
        <tr>
            <td class="label">Account</td>
            <td><?php echo e($record->active_bank_account_number); ?></td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Confidential Document • Masavu Investments
    </div>

</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

</body>
</html><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pdfs/onboardings.blade.php ENDPATH**/ ?>