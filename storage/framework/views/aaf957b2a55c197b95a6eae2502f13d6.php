<!DOCTYPE html>
<html>
<head>
    <title>User Profile Report</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 8px;
            color: #111827;
        }

        .page {
            page-break-after: always;
        }

        /* HEADER */
        .header {
            padding: 6px;
            margin-bottom: 6px;
            border-left: 4px solid #f59e0b;
            background: #fff7ed;
        }

        .company h3 {
            margin: 0;
            font-size: 11px;
            color: #92400e;
        }

        .company small {
            font-size: 7px;
            color: #6b7280;
        }

        .meta {
            text-align: right;
            font-size: 7px;
            color: #6b7280;
        }

        /* TITLE BAR */
        .title-bar {
            background: #f59e0b;
            color: white;
            padding: 6px;
            font-weight: bold;
            font-size: 10px;
            margin-bottom: 6px;
        }

        /* BADGES */
        .badge {
            padding: 2px 5px;
            font-size: 7px;
            color: white;
            border-radius: 3px;
            background: #16a34a;
        }

        .pending { background: #f59e0b; }
        .inactive { background: #dc2626; }

        /* TABLES */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        td {
            border: 1px solid #fde68a;
            padding: 4px;
            vertical-align: top;
        }

        .label {
            width: 30%;
            background: #fffbeb;
            font-weight: bold;
            color: #92400e;
        }

        /* PHOTO */
        .photo {
            width: 65px;
            height: 65px;
            border: 2px solid #f59e0b;
        }

        /* SECTION TITLE */
        .section-title {
            font-size: 9px;
            font-weight: bold;
            margin: 8px 0 4px;
            padding: 3px;
            background: #fff7ed;
            border-left: 3px solid #f59e0b;
            color: #92400e;
        }

        /* SMALL TEXT */
        .small {
            font-size: 7px;
        }

        /* FOOTER */
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 7px;
            color: #6b7280;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        /* INVESTMENT HIGHLIGHT */
        .investment-box {
            background: #fffbeb;
            border: 1px solid #f59e0b;
            padding: 4px;
            font-weight: bold;
            color: #92400e;
        }
    </style>
</head>

<body>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

<div class="page">

    <!-- HEADER -->
    <div class="header">
        <table width="100%">
            <tr>
                <td>
                    <div class="company">
                        <h3>Masavu Investment Club</h3>
                        <small>
                            Kampala, Uganda<br>
                            +256 789 444 366<br>
                            info@masavuinvestments.com <br>
                            www.masavuinvestments.com <br>
                        </small>
                    </div>
                </td>

                <td class="meta">
                    Generated:<br>
                    <?php echo e(now()->format('Y-m-d H:i')); ?>

                </td>
            </tr>
        </table>
    </div>

    <!-- TITLE -->
    <div class="title-bar">
        USER PROFILE REPORT
        <span style="float:right;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->status === 'active'): ?>
                ACTIVE
            <?php elseif($user->status === 'pending'): ?>
                PENDING
            <?php else: ?>
                INACTIVE
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </span>
    </div>

    <!-- TOP -->
    <table>
        <tr>

            <td class="center" style="width:80px;">
                <?php
                    $imageUrl = $user->avatar_url ? 'https://masavuinvestments.com/storage/' . $user->avatar_url : 'https://admin.masavuinvestments.com/default-user.png';
                ?>

                <img src="<?php echo e($imageUrl); ?>" class="photo">
            </td>

            <td>
                <b style="color:#92400e;"><?php echo e($user->full_name); ?></b><br>
                <?php echo e($user->member_number); ?><br>
                <?php echo e($user->email); ?><br>
                <?php echo e($user->phone_number); ?>

            </td>

            <td class="right">
                <div class="investment-box">
                    TOTAL INVESTMENT<br>
                    UGX <?php echo e(number_format($user->contributions->sum('amount') ?? 0, 0)); ?>

                </div>
            </td>

        </tr>
    </table>

    <!-- PERSONAL -->
    <div class="section-title">PERSONAL INFORMATION</div>
    <table>
        <tr><td class="label">Date of Birth</td><td><?php echo e($user->date_of_birth); ?></td></tr>
        <tr><td class="label">Date Joined</td><td><?php echo e($user->date_of_joining); ?></td></tr>
        <tr><td class="label">Residence</td><td><?php echo e($user->place_of_residence); ?></td></tr>
        <tr><td class="label">Profession</td><td><?php echo e($user->profession); ?></td></tr>
        <tr><td class="label">Income Source</td><td><?php echo e($user->source_of_income); ?></td></tr>
        <tr><td class="label">Education</td><td><?php echo e($user->highest_level_of_education); ?></td></tr>
    </table>

    <!-- KYC -->
    <div class="section-title">KYC INFORMATION</div>
    <table>
        <tr><td class="label">NIN</td><td><?php echo e($user->national_id_passort_number); ?></td></tr>
        <tr><td class="label">Application Status</td><td><?php echo e(strtoupper($user->application_status)); ?></td></tr>
    </table>

    <!-- NEXT OF KIN -->
    <div class="section-title">NEXT OF KIN</div>
    <table>
        <tr><td class="label">Name</td><td><?php echo e($user->next_of_kin_name); ?></td></tr>
        <tr><td class="label">Relationship</td><td><?php echo e($user->relationship_next_of_kin); ?></td></tr>
        <tr><td class="label">Contact</td><td><?php echo e($user->contacts_next_of_kin); ?></td></tr>
    </table>

    <!-- BANKING -->
    <div class="section-title">BANKING DETAILS</div>
    <table>
        <tr><td class="label">Bank</td><td><?php echo e($user->active_bank_account_name); ?></td></tr>
        <tr><td class="label">Account No</td><td><?php echo e($user->active_bank_account_number); ?></td></tr>
    </table>

    <!-- FEES -->
    <div class="section-title">INVESTMENT BREAKDOWN</div>
    <table>
        <tr><td class="label">Initial Investment</td><td>UGX <?php echo e(number_format($user->contributions()->oldest()->value('amount') ?? 0, 0)); ?></td></tr>
        <tr><td class="label">Subscription Fee</td><td>UGX <?php echo e(number_format($user->subscription_fee ?? 0, 0)); ?></td></tr>
     
    </table>

    <!-- FOOTER -->
    <div class="footer">
        © <?php echo e(date('Y')); ?> Masavu Investment Club — Confidential Report
    </div>

</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

</body>
</html><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pdfs/users_full.blade.php ENDPATH**/ ?>