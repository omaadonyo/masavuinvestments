<!DOCTYPE html>
<html>
<head>
    <title>Users Report</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
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

        body {
            font-family: 'Inter', sans-serif;
            font-size: 8px;
            color: #111827;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #f59e0b;
            margin-bottom: 6px;
            padding-bottom: 4px;
        }

        .logo {
            width: 45px;
        }

        .company {
            margin-left: 6px;
        }

        .company h3 {
            margin: 0;
            font-size: 12px;
            color: #92400e;
        }

        .company small {
            font-size: 7px;
            color: #6b7280;
        }

        .title {
            flex: 1;
            text-align: left;
        }

        .title h2 {
            margin: 0;
            font-size: 12px;
        }

        .meta {
            font-size: 7px;
            text-align: right;
            color: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto; /* ✅ AUTO COLUMNS */
        }

        th, td {
            border: 1px solid #e5e7eb;
            padding: 3px;
            font-size: 7.5px;
            text-align: left;
            vertical-align: top;
            word-break: break-word;
        }

        thead {
            background: #111827;
            color: white;
        }

        th {
            text-transform: capitalize;
            font-size: 7px;
        }

        tbody tr:nth-child(even) {
            background: #fffdf5;
        }

        .center { text-align: left; }
        .right { text-align: right; }

        .avatar {
            width: 28px;
            height: 28px;
            border-radius: 4px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .badge {
            padding: 2px 3px;
            border-radius: 3px;
            font-size: 6.5px;
            color: white;
        }

        .active { background: #16a34a; }
        .inactive { background: #dc2626; }
        .pending { background: #f59e0b; }

        .footer {
            margin-top: 5px;
            text-align: center;
            font-size: 7px;
            color: #6b7280;
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
        <h2>USERS REPORT</h2>
    </div>

    <div class="meta">
        Generated: <?php echo e(now()->format('Y-m-d H:i')); ?>

    </div>
</div>

<!-- TABLE -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            
            <th>No</th>
            <th>Status</th>
            <th>Application</th>
            <th>DOB</th>
            <th>Joined</th>
            <th>Residence</th>
            <th>Profession</th>
            <th>Income</th>
            <th>Education</th>
            <th>NIN</th>
            <th>Next of Kin</th>
            <th>Kin Contact</th>
            <th>Bank Name</th>
            <th>Bank No</th>
            <th>Investment</th>
            <th>Admin</th>
        </tr>
    </thead>

    <tbody>
        <?php $totalInvestment = 0; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php $totalInvestment += $user->initial_investment ?? 0; ?>

            <tr>
                <td class="center"><?php echo e($i + 1); ?></td>

                <!-- AVATAR -->
                <td class="center">
                    <img 
                        src="<?php echo e($user->avatar_url ? public_path('/storage/'.$user->avatar_url) : public_path('default-user.png')); ?>" 
                        class="avatar">
                </td>

                <td><?php echo e($user->full_name ?? $user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                
                <td><?php echo e($user->phone_number ?? '-'); ?></td>
                
                <td><?php echo e($user->member_number ?? '-'); ?></td>

                <td class="center">
                    <span class="badge 
                        <?php echo e($user->status === 'active' ? 'active' : ($user->status === 'pending' ? 'pending' : 'inactive')); ?>">
                        <?php echo e(strtoupper($user->status)); ?>

                    </span>
                </td>

                <td class="center"><?php echo e(strtoupper($user->application_status ?? '-')); ?></td>

                <td><?php echo e($user->date_of_birth ?? '-'); ?></td>
                <td><?php echo e($user->date_of_joining ?? '-'); ?></td>
                <td><?php echo e($user->place_of_residence ?? '-'); ?></td>
                <td><?php echo e($user->profession ?? '-'); ?></td>
                <td><?php echo e($user->source_of_income ?? '-'); ?></td>
                <td><?php echo e($user->highest_level_of_education ?? '-'); ?></td>
                <td><?php echo e($user->national_id_passort_number ?? '-'); ?></td>

                <td>
                    <?php echo e($user->next_of_kin_name ?? '-'); ?><br>
                    <small><?php echo e($user->relationship_next_of_kin ?? ''); ?></small>
                </td>

                <td><?php echo e($user->contacts_next_of_kin ?? '-'); ?></td>
                <td><?php echo e($user->active_bank_account_name ?? '-'); ?></td>
                <td><?php echo e($user->active_bank_account_number ?? '-'); ?></td>

                <td class="right">
                    UGX <?php echo e(number_format($user->initial_investment ?? 0, 0)); ?>

                </td>

                <td class="center">
                    <?php echo e($user->is_admin ? 'YES' : 'NO'); ?>

                </td>
            </tr>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </tbody>

</table>

<div class="footer">
    © <?php echo e(date('Y')); ?> Masavu Investment Club — Users Report
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\mic-admin\resources\views\filament\pdfs\users.blade.php ENDPATH**/ ?>