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
            <p style="margin: 3px 0 0; font-weight: 600;">{{ $record->user->name }}</p>
        </div>

        <!-- REFERENCE -->
        <div style="margin-bottom: 15px;">
            <p style="margin: 0; font-size: 13px; color: #777;">Reference</p>
            <p style="margin: 3px 0 0;">{{ $record->reference }}</p>
        </div>

        <!-- AMOUNTS -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
            
            <div>
                <p style="margin: 0; font-size: 13px; color: #777;">Amount</p>
                <p style="margin: 3px 0 0;">UGX {{ $record->amount }}</p>
            </div>

            <div>
                <p style="margin: 0; font-size: 13px; color: #777;">Mgt Fees</p>
                <p style="margin: 3px 0 0;">UGX {{ $record->managment_fee }}</p>
            </div>

        </div>

        <!-- TOTAL -->
        <div style="margin-bottom: 15px;padding: 12px;background: #FFC107;border-radius: 10px;color: #582507;">
            <p style="margin: 0; font-size: 13px;">Total</p>
            <p style="margin: 3px 0 0; font-size: 18px; font-weight: 700;">
                UGX {{ number_format($record->total_deposit) }}
            </p>
        </div>

        <!-- DATE -->
        <div>
            <p style="margin: 0; font-size: 13px; color: #777;">Made On</p>
            <p style="margin: 3px 0 0;">
                {{ $record->created_at }}
            </p>
        </div>

        <div>
            <p style="margin: 0; font-size: 13px; color: #777;">Payment Proof</p>
            <p style="margin: 3px 0 0;">
                <img src="{{ Storage::url($record->payment_proof) }}">
            </p>
        </div>


    </div>

</div>