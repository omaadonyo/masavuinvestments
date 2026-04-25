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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $onboardings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
<div class="page">

    <!-- HEADER -->
    <div class="header">
        <div class="title">MEMBER OFFBOARDING REPORT</div>
    </div>

    <!-- PROFILE -->
    <div style="display:flex; justify-content:space-between;">

        <div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->current_photo): ?>
                <img src="<?php echo e(public_path('/storage/'.$record->current_photo)); ?>" class="photo">
            <?php else: ?>
                <img src="/default-user.png" class="photo">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <p><strong><?php echo e($record->full_name); ?></strong></p>
        </div>

        <!-- QR CODE -->
        <div>
            <?php
                //  \SimpleSoftwareIO\QrCode\Facades\QrCode::size(90)->generate($record->user_id . '-' . $record->full_name);      
            ?>
        </div>

    </div>

    <!-- PERSONAL -->
    <div class="section">
        <h3>Personal Information</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">Phone</div>
                <div class="cell"><?php echo e($record->phone_number); ?></div>
            </div>
            <div class="row">
                <div class="cell label">Email</div>
                <div class="cell"><?php echo e($record->email_address); ?></div>
            </div>
            <div class="row">
                <div class="cell label">Residence</div>
                <div class="cell"><?php echo e($record->place_of_residence); ?></div>
            </div>
        </div>
    </div>

    <!-- KYC -->
    <div class="section">
        <h3>KYC Details</h3>
        <div class="grid">
            <div class="row">
                <div class="cell label">ID Number</div>
                <div class="cell"><?php echo e($record->national_id_passort_number); ?></div>
            </div>
            <div class="row">
                <div class="cell label">Profession</div>
                <div class="cell"><?php echo e($record->profession); ?></div>
            </div>
            <div class="row">
                <div class="cell label">Income</div>
                <div class="cell"><?php echo e($record->source_of_income); ?></div>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $record->user->onboardings ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onboard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($onboard->created_at); ?></td>
                    <td><?php echo e($onboard->status); ?></td>
                    <td><?php echo e($onboard->notes); ?></td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $record->user->transactions ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td><?php echo e($txn->created_at); ?></td>
                    <td><?php echo e($txn->txn_type); ?></td>
                    <td>UGX <?php echo e(number_format($txn->amount, 0)); ?></td>
                    <td><?php echo e($txn->status); ?></td>
                </tr>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
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
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\mic-admin\resources\views\filament\pdfs\onboardings.blade.php ENDPATH**/ ?>