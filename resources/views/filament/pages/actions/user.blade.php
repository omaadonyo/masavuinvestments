<div style="

    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.08);
    overflow: hidden;
">

    <!-- Header -->
    <div style="
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        padding: 30px;
        color: white;
        display: flex;
        align-items: center;
        gap: 20px;
    ">
      @if( $record->avatar_url )
<img src="https://masavuinvestments.com/storage/{{ $record->avatar_url }}"
             style="
                width: 90px;
                height: 90px;
                border-radius: 50%;
                border: 3px solid #fff;
                object-fit: cover;
             ">
      @else

      <img src="https://masavuinvestments.com/default-user.png"
             style="
                width: 90px;
                height: 90px;
                border-radius: 50%;
                border: 3px solid #fff;
                object-fit: cover;
             ">

      @endif
        

        <div>
            <h2 style="margin: 0; font-size: 24px;">
                {{ $record->full_name ?? $record->name }}
            </h2>
            <p style="margin: 5px 0; opacity: 0.9;">
                {{ $record->email ?? $record->email_address }}
            </p>

            <span style="
                display: inline-block;
                margin-top: 8px;
                padding: 5px 12px;
                font-size: 12px;
                border-radius: 20px;
                background: {{ $record->status === 'active' ? '#16a34a' : '#dc2626' }};
                color: white;
            ">
                {{ ucfirst($record->status) }}
            </span>
        </div>
    </div>

    <!-- Body -->
    <div style="padding-top: 25px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

        <!-- Personal Info -->
        <div style="background:#f9fafb08; padding:15px; border-radius:12px;">
            <h3 style="margin-bottom:10px;">Personal Information</h3>

            <p><strong>Phone:</strong> {{ $record->phone_number }}</p>
            <p><strong>DOB:</strong> {{ $record->date_of_birth }}</p>
            <p><strong>Residence:</strong> {{ $record->place_of_residence }}</p>
            <p><strong>UUID:</strong> {{ $record->uuid }}</p>
        </div>

        <!-- Account Info -->
        <div style="background:#f9fafb08; padding:15px; border-radius:12px;">
            <h3 style="margin-bottom:10px;">Account Details</h3>

            <p><strong>Member ID:</strong> {{ $record->member_account }}</p>
            <p><strong>Joined:</strong> {{ $record->date_of_joining }}</p>
            <p><strong>Initial Investment:</strong>
                UGX {{ number_format($record->initial_investment ?? 0) }}
            </p>
            <p><strong>Role:</strong> {{ $record->is_admin ? 'Admin' : 'Member' }}</p>
        </div>

        <!-- Financial Info -->
        <div style="background:#f9fafb08; padding:15px; border-radius:12px;">
            <h3 style="margin-bottom:10px;">Financial Profile</h3>

            <p><strong>Income Source:</strong> {{ $record->source_of_income }}</p>
            <p><strong>Bank:</strong> {{ $record->active_bank_account_name }}</p>
            <p><strong>Account No:</strong> {{ $record->active_bank_account_number }}</p>
        </div>

        <!-- Next of Kin -->
        <div style="background:#f9fafb08; padding:15px; border-radius:12px;">
            <h3 style="margin-bottom:10px;">Next of Kin</h3>

            <p><strong>Name:</strong> {{ $record->next_of_kin_name }}</p>
            <p><strong>Relationship:</strong> {{ $record->relationship_next_of_kin }}</p>
            <p><strong>Contact:</strong> {{ $record->contacts_next_of_kin }}</p>
        </div>

        <!-- Verification -->
        <div style="grid-column: span 2; background:#f9fafb08; padding:15px; border-radius:12px;">
            <h3 style="margin-bottom:10px;">Verification & Documents</h3>

            <p><strong>Email Verified:</strong>
                {{ $record->email_verified_at ? 'Yes' : 'No' }}
            </p>

            <p><strong>Education:</strong> {{ $record->highest_level_of_education }}</p>
            <p><strong>Profession:</strong> {{ $record->profession }}</p>
            <p><strong>ID Number:</strong> {{ $record->national_id_passort_number }}</p>

            <div style="margin-top:10px;">
                <strong>Documents:</strong><br>

                @if($record->national_id_photo)
                    <iframe 
    src="{{ $record->national_id_photo 
        ? 'https://masavuinvestments.com/storage/'.$record->national_id_photo 
        : 'https://masavuinvestments.com/default-user.png' }}" 
    style="border:none; width:100%; height:600px;">
</iframe>
                @endif

                @if($record->current_photo)
                    <br>
                    <img src="https://masavuinvestments.com{{ '/storage/'.$record->current_photo ?? 'https://masavuinvestments.com/default-user.png' }}" style="color:#1d4ed8;" />
                @endif
            </div>
        </div>

    </div>
</div>