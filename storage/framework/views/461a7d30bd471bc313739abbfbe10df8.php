<!DOCTYPE html>
<html>
<head>
    <title>Contributions Report</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 12mm 10mm;
        }

        /* ===== FONT (LOCAL INTER) ===== */
        @font-face {
            font-family: 'Inter';
            src: url('<?php echo e(public_path("fonts/Inter-Regular.ttf")); ?>') format('truetype');
            font-weight: normal;
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
            --muted: #000000;
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

        /* ===== SUMMARY ===== */
        .cards {
            display: flex;
            gap: 6px;
            margin: 8px 0;
        }

        .card {
            flex: 1;
            padding: 6px;
            border: 1px solid var(--border);
            border-left: 3px solid var(--accent);
            background: var(--bg-soft);
        }

        .card h4 {
            margin: 0;
            font-size: 8px;
            color: var(--muted);
        }

        .card p {
            margin: 2px 0 0;
            font-size: 11px;
            font-weight: bold;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout:auto;
        }

        th, td {
            border: 1px dotted #6d6d6d8d;
            padding: 4px;
            margin:-1px;
            font-size: 8.3px;
            width:fit-content;
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

        /* ===== WIDTHS ===== */
        .col-id { width: 35px; }
        .col-user { width: 110px; }
        .col-target { width: 110px; }
        .col-ref { width: 95px; }
        .col-money { width: 80px; }
        .col-proof { width: 45px; }
        .col-status { width: 85px; }
        .col-approved { width: 100px; }
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
            border-top: 1px solid #828282;
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

    <!-- <?php
       $landing = \App\Models\Landing::findOrfail(1);
    ?>

    <img src="https://admin.masavuinvestments.com/storage/<?php echo e($landing->logo); ?>" class="logo" /> -->

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
        <h2>CONTRIBUTIONS REPORT</h2>
    </div>

    <div class="meta">
        Generated: <?php echo e(now()->format('Y-m-d H:i')); ?>

    </div>

</div>

<!-- SUMMARY -->
<table>
    <td class="card">
        <h4>Total Contributions</h4>
        <p><?php echo e(count($contributions)); ?></p>
    </td>
    <td class="card">
        <h4>Total Amount</h4>
        <p>UGX <?php echo e(number_format($contributions->sum('amount'), 0)); ?></p>
    </td>
    <td class="card">
        <h4>Total Deposits</h4>
        <p>UGX <?php echo e(number_format($contributions->sum('total_deposit'), 0)); ?></p>
    </td>
    <td class="card">
        <h4>Active Users</h4>
        <p><?php echo e($contributions->pluck('user_id')->unique()->count()); ?></p>
    </td>
</table>

<!-- TABLE -->
<table>
    <thead>
        <tr>
            <th  style="width:17px;" class="col-id">#</th>
            <th style="width:50px;"class="col-user">User</th>
            <th class="col-target">Target</th>
            <th class="col-ref">Reference</th>
            <th   style="width:60px;"class="col-money right">Amount</th>
            <th   style="width:60px;"class="col-money right">CBN Month</th>
            <th style="width:25px;" class="col-money right">Mgmt</th>
            <th   style="width:20px;"class="col-money right">Return</th>
            <th   style="width:60px;"class="col-money right">Deposit</th>
            <th   style="width:50px;"class="col-money right">Investment</th>
            <th class="col-proof">Proof</th>
            <th   style="width:20px;"class="col-status">Status</th>
            <th class="col-approved">Approved</th>
            <th style="width:80px;" class="col-notes">Notes</th>
            <th class="col-notes">Txn Date</th>
        </tr>
    </thead>

    <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $contributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <tr>
            <td  style="width:17px;" class="center"><?php echo e($i + 1); ?></td>
            <td style="width:50px;">

              <?php echo e($c->user->name ?? '-'); ?>

            
            </td>
            <td><?php echo e($c->target->title ?? '-'); ?></td>
            <td><?php echo e($c->reference); ?></td>

            <td   style="width:60px;"class="right">UGX <?php echo e(number_format($c->amount, 0)); ?></td>
            <td   style="width:60px;"class="right"> <?php echo e($c->month); ?></td>
            <td   style="width:25px;"class="right"><?php echo e(number_format($c->managment_fee, 0)); ?></td>
            <td   style="width:20px;"class="right"><?php echo e(number_format($c->return_fee, 0)); ?></td>
            <td   style="width:60px;"class="right"><?php echo e(number_format($c->total_deposit, 0)); ?></td>
            <td   style="width:50px;"class="right"><?php echo e(number_format($c->initial_investment, 0)); ?></td>

            <td class="center"><?php echo e($c->payment_proof ? 'Yes' : 'No'); ?></td>
            <td   style="width:20px;"class="center"><?php echo e($c->status); ?></td>
            <td><?php echo e($c->approvedBy->name ?? '-'); ?></td>
            <td style="width:80px;"><?php echo e($c->notes ?? '-'); ?></td>
            <td><?php echo e($c->created_at ?? '-'); ?></td>
        </tr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4" class="right">TOTAL</td>
            <td class="right">UGX <?php echo e(number_format($contributions->sum('amount'), 0)); ?></td>
            <td class="right"><?php echo e(number_format($contributions->sum('managment_fee'), 0)); ?></td>
            <td class="right"><?php echo e(number_format($contributions->sum('return_fee'), 0)); ?></td>
            <td class="right"><?php echo e(number_format($contributions->sum('total_deposit'), 0)); ?></td>
            <td class="right"><?php echo e(number_format($contributions->sum('initial_investment'), 0)); ?></td>
            <td colspan="6"></td>
        </tr>
    </tfoot>
</table>

<!-- SIGNATURES -->
<div class="signatures">
    <div class="sign-box">
        <div class="line"></div>
        <div class="sign-title">Prepared By</div>
    </div>
    <div class="sign-box">
        <div class="line"></div>
        <div class="sign-title">Reviewed By</div>
    </div>
    <div class="sign-box">
        <div class="line"></div>
        <div class="sign-title">Approved By</div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    © <?php echo e(date('Y')); ?> Masavu Investment Club — Confidential Report 2026
</div>

</body>
</html><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pdfs/contributions.blade.php ENDPATH**/ ?>