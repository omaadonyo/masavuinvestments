<div style="width: 100%; margin: 0px auto;">

    <div style="border-radius: 16px; padding: 0px;">

        <!-- HEADER -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h3 style="margin: 0; font-size: 16px; font-weight: 600;">Transaction Details</h3>

            <span style=" color: #059669; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                Approved
            </span>
        </div>

        <!-- USER -->
        <div style="margin-bottom: 15px;">
            <p style="margin: 0; font-size: 13px; color: #777;">Member</p>
            <p style="margin: 3px 0 0; font-weight: 600;"><?php echo e($record->user->name); ?></p>
        </div>

        <!-- REFERENCE -->
        <div style="margin-bottom: 15px;">
            <p style="margin: 0; font-size: 13px; color: #777;">Reference</p>
            <p style="margin: 3px 0 0;"><?php echo e($record->reference); ?></p>
        </div>

        <!-- AMOUNTS -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            
            <div>
                <p style="margin: 0; font-size: 13px; color: #777;">Amount</p>
                <p style="margin: 3px 0 0;">UGX <?php echo e($record->amount); ?></p>
            </div>

            <div>
                <p style="margin: 0; font-size: 13px; color: #777;">Mgt Fees</p>
                <p style="margin: 3px 0 0;">UGX <?php echo e($record->managment_fee); ?></p>
            </div>

        </div>

        <!-- TOTAL -->
        <div style="margin-bottom: 15px;padding: 12px;background: #FFC107;border-radius: 10px;color: #582507;">
            <p style="margin: 0; font-size: 13px;">Total</p>
            <p style="margin: 3px 0 0; font-size: 18px; font-weight: 700;">
                UGX <?php echo e(number_format($record->total_deposit)); ?>

            </p>
        </div>

        <!-- DATE -->
        <div>
            <p style="margin: 0; font-size: 13px; color: #777;">Made On</p>
            <p style="margin: 3px 0 0;">
                <?php echo e($record->created_at); ?>

            </p>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->payment_proof): ?>

         <div>
            <p style="margin: 0; font-size: 13px; color: #777;">Proof Of Payment</p>
            <p style="margin: 3px 0 0;">
                <img src="https://masavuinvestments.com/storage/<?php echo e($record->payment_proof); ?>">
            </p>
        </div>

         <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


    </div>

</div><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pages/actions/contributions.blade.php ENDPATH**/ ?>