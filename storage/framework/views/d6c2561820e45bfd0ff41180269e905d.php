<!DOCTYPE html>
<html>
<head>
    <title>Transactions Report</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 12mm 10mm;
        }

        /* ===== FONT ===== */
        @font-face {
            font-family: 'Inter';
            src: url('<?php echo e(public_path("fonts/Inter-Regular.ttf")); ?>') format('truetype');
        }

        @font-face {
            font-family: 'Inter';
            src: url('<?php echo e(public_path("fonts/Inter-Bold.ttf")); ?>') format('truetype');
            font-weight: bold;
        }

        :root {
            --primary: #92400e;
            --accent: #f59e0b;
            --text: #111827;
            --muted: #6b7280;
            --border: #e5e7eb;
            --bg-soft: #fffbeb;
        }

        body {
            font-family: 'Inter', sans-serif;
            font-size: 9px;
            color: var(--text);
            margin: 0;
        }

        /* ===== HEADER ===== */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 6px;
            margin-bottom: 8px;
        }

        .logo {
            width: 50px;
            height: 50px;
        }

        .company {
            margin-left: 8px;
        }

        .company h3 {
            margin: 0;
            font-size: 13px;
            color: var(--primary);
        }

        .company small {
            font-size: 8px;
            color: var(--muted);
        }

        .title {
            flex: 1;
            text-align: center;
        }

        .title h2 {
            margin: 0;
            font-size: 15px;
            letter-spacing: 0.5px;
        }

        .meta {
            font-size: 8px;
            text-align: right;
            color: var(--muted);
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        th, td {
            border: 1px dotted #00000047;
            padding: 4px;
            font-size: 8.3px;
        }

        thead {
            background: #111827;
            color: white;
        }

        th {
            text-transform: uppercase;
            font-size: 7.8px;
        }

        tbody tr:nth-child(even) {
            background: #fffdf5;
        }

        tfoot {
            background: #f3f4f6;
            font-weight: bold;
        }

        .right { text-align: right; }
        .center { text-align: center; }

        .status {
            font-weight: bold;
        }

        /* ===== COLUMN WIDTHS ===== */
        .col-id { width: 30px; }
        .col-txn { width: 95px; }
        .col-ref { width: 95px; }
        .col-user { width: 110px; }
        .col-type { width: 80px; }
        .col-money { width: 85px; }
        .col-proof { width: 50px; }
        .col-status { width: 90px; }
        .col-approver { width: 110px; }
        .col-reviewer { width: 110px; }
        .col-notes { width: 160px; }

        /* ===== SIGNATURES ===== */
        .signatures {
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
        }

        .sign-box {
            width: 30%;
            text-align: center;
        }

        .line {
            margin-top: 22px;
            border-top: 1px solid #000;
        }

        .sign-title {
            font-size: 8px;
            margin-top: 3px;
            color: var(--muted);
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 6px;
            padding-top: 5px;
            border-top: 1px solid var(--border);
            text-align: center;
            font-size: 8px;
            color: var(--muted);
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">

    <img src="<?php echo e(public_path('/mic.jpg')); ?>" class="logo">

    <div class="company">
        <h3>Masavu Investment Club</h3>
        <small>
            Kampala, Uganda<br>
            Tel: +256 789 444 366<br>
            Email: info@masavuinvestments.com<br>
            Website: www.masavuinvestments.com
        </small>
    </div>

    <div class="title">
        <h2>TRANSACTIONS REPORT</h2>
    </div>

    <div class="meta">
        Generated: <?php echo e(now()->format('Y-m-d H:i')); ?>

    </div>

</div>

<!-- TABLE -->
<table>
    <thead>
        <tr>
            <th style="width:15px;" class="col-id">#</th>
            <th class="col-txn">Txn ID</th>
            <th class="col-ref">Reference</th>
            <th style="width:60px;" class="col-user">User</th>
            <th  style="width:50px;"class="col-type">Type</th>
            <th  style="width:60px;"class="col-money right">Amount</th>
            <th  style="width:55px;"class="col-money right">Deposit</th>
            <th  style="width:40px;"class="col-money right">Mgmt</th>
            <th  style="width:30px;" class="col-money right">Return</th>
            <th class="col-proof">Proof</th>
            <th  style="width:50px;"class="col-status">Status</th>
            <th  style="width:50px;"class="col-approver">Approved</th>
            <th  style="width:50px;"class="col-reviewer">Reviewed</th>
            <th style="width:80px;" class="col-notes">Notes</th>
            <th class="col-notes">CBN Date</th>
        </tr>
    </thead>

    <tbody>
        <?php
            $totalAmount = 0;
            $totalDeposit = 0;
            $totalMgmt = 0;
            $totalReturn = 0;
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $txn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                $totalAmount += $txn->amount;
                $totalDeposit += $txn->total_deposit;
                $totalMgmt += $txn->management_fees;
                $totalReturn += $txn->return_fee;
            ?>

            <tr>
                <td  style="width:15px;" class="center"><?php echo e($index + 1); ?></td>
                <td><?php echo e($txn->txn_id); ?></td>
                <td><?php echo e($txn->txn_reference); ?></td>
                <td style="width:60px;"><?php echo e($txn->user->name ?? '-'); ?></td>
                <td  style="width:50px;"class="center"><?php echo e($txn->txn_type); ?></td>

                <td  style="width:60px;"class="right">UGX <?php echo e(number_format($txn->amount, 0)); ?></td>
                <td  style="width:55px;" class="right">UGX <?php echo e(number_format($txn->total_deposit, 0)); ?></td>
                <td  style="width:40px;" class="right"><?php echo e(number_format($txn->management_fees, 0)); ?></td>
                <td  style="width:30px;"class="right"><?php echo e(number_format($txn->return_fee, 0)); ?></td>

                <td class="center"><?php echo e($txn->payment_proof ? '✔' : '—'); ?></td>
                <td  style="width:50px;"class="status center"><?php echo e($txn->status); ?></td>
                <td  style="width:50px;"><?php echo e($txn->approver->name ?? '-'); ?></td>
                <td style="width:50px;"><?php echo e($txn->reviewer->name ?? '-'); ?></td>
                <td style="width:80px;"><?php echo e($txn->notes ?? '-'); ?></td>
                <td><?php echo e($txn->created_at ?? '-'); ?></td>
            </tr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="5" class="right">TOTAL</td>
            <td class="right">UGX <?php echo e(number_format($totalAmount, 0)); ?></td>
            <td class="right">UGX <?php echo e(number_format($totalDeposit, 0)); ?></td>
            <td class="right"><?php echo e(number_format($totalMgmt, 0)); ?></td>
            <td class="right"><?php echo e(number_format($totalReturn, 0)); ?></td>
            <td colspan="6"></td>
        </tr>
    </tfoot>
</table>

<!-- SIGNATURES -->
<div class="signatures">
    <div class="sign-box">
   
        <div class="sign-title">Prepared By...................................................................</div>
    </div>
    <div class="sign-box">
        
        <div class="sign-title">Reviewed By...................................................................</div>
    </div>
    <div class="sign-box">
       
        <div class="sign-title">Approved By...................................................................</div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    © <?php echo e(date('Y')); ?> Masavu Investment Club — Transactions Report
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\mic-admin\resources\views\filament\pdfs\transactions.blade.php ENDPATH**/ ?>