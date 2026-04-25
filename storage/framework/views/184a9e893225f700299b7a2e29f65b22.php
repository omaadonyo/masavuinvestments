<!DOCTYPE html>
<html>
<head>
    <title>Annual Returns Report</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 12mm 10mm;
        }

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

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid var(--accent);
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        .company h3 {
            margin: 0;
            font-size: 13px;
            color: var(--primary);
        }

        .title {
            flex: 1;
            text-align: center;
        }

        .title h2 {
            margin: 0;
            font-size: 15px;
        }

        .meta {
            text-align: right;
            font-size: 8px;
            color: var(--muted);
        }

        /* SUMMARY */
        .cards {
            width: 100%;
            margin-bottom: 10px;
        }

        .card {
            display: inline-block;
            width: 20%;
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

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px dotted #bdbdbd;
            padding: 4px;
            font-size: 8px;
        }

        thead {
            background: #111827;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background: #fffdf5;
        }

        .right { text-align: right; }
        .center { text-align: center; }

        /* USER CELL */
        .user-box {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fbbf24;
        }

        .avatar-fallback {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #fbbf24;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .name {
            font-weight: 600;
            font-family:'Inter';
        }

        .status-paid {
            background: #dcfce7;
            color: #166534;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 7px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 7px;
        }

        tfoot {
            background: #f3f4f6;
            font-weight: bold;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="company">
        <h3>Annual Returns System</h3>
        <small>Uganda Investment Platform</small>
    </div>

    <div class="title">
        <h2>ANNUAL RETURNS REPORT</h2>
    </div>

    <div class="meta">
        Generated: <?php echo e(now()->format('Y-m-d H:i')); ?>

    </div>
</div>

<!-- SUMMARY -->
<div class="cards">
    <div class="card">
        <h4>Total Records</h4>
        <p><?php echo e(count($records)); ?></p>
    </div>

    <div class="card">
        <h4>Total Amount</h4>
        <p>UGX <?php echo e(number_format($records->sum('amount'), 0)); ?></p>
    </div>

    <div class="card">
        <h4>Paid</h4>
        <p><?php echo e($records->where('status', 'paid')->count()); ?></p>
    </div>

    <div class="card">
        <h4>Pending</h4>
        <p><?php echo e($records->where('status', 'pending')->count()); ?></p>
    </div>
</div>

<!-- TABLE -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Year</th>
            <th class="right">Amount</th>
            <th>Notes</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
      <?php

      $user = \App\Models\User::where('id', $r['user_id'])->first();

      
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

      

      ?>
        <tr>
            <td class="center"><?php echo e($i + 1); ?></td>

            <!-- USER PHOTO -->
            <td>
                <div class="user-box">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageData): ?>
                    <img src="data:image/jpeg;base64,<?php echo e($imageData); ?>" class="avatar">
                <?php else: ?>
                    <img src="https://admin.masavuinvestments.com/default-user.png" class="avatar">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="name">
                        <?php echo e($user->name ?? '-'); ?>

                    </div>
                </div>
            </td>

            <td><?php echo e($r['year']); ?></td>

            <td class="right">
                UGX <?php echo e(number_format($r['amount'], 0)); ?>

            </td>

            <td><?php echo e($r['notes'] ?? '-'); ?></td>

            <td>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($r['status'] === 'paid'): ?>
                    <span class="status-paid">Paid</span>
                <?php else: ?>
                    <span class="status-pending"><?php echo e(ucfirst($r['status'])); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </td>
        </tr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3" class="right">TOTAL</td>
            <td class="right">UGX <?php echo e(number_format($records->sum('amount'), 0)); ?></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
</table>

</body>
</html><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pdfs/annual-returns.blade.php ENDPATH**/ ?>