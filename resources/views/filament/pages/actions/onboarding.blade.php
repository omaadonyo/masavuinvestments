<div style="width: 100%; margin: 0 auto;">

    <!-- PROFILE HEADER -->
    <div style="border-radius: 16px;background:#f9fafb08; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 24px; margin-bottom: 20px;">
        
        <div style="display: flex;  flex-wrap: wrap; align-items: center; gap: 20px;">

            <!-- AVATAR -->
            <div style="position: relative;">
                <img src="https://masavuinvestments.com/storage/{{ $record->current_photo }}"
                     style="width: 96px; height: 96px; border-radius: 50%; object-fit: cover; border: 4px solid #f59e0b;">
                
                <span style="position: absolute; bottom: 0; right: 0; background: #3b82f6; color: #fff; font-size: 10px; padding: 3px 6px; border-radius: 10px;">
                    Verified
                </span>
            </div>

            <!-- INFO -->
            <div style="flex: 1;">
                <h2 style="margin: 0; font-size: 24px; font-weight: bold;">
                    {{ $record->full_name }}
                </h2>

                <p style="margin: 5px 0; color: #666;">
                    {{ $record->profession }}
                </p>

                <div style="margin-top: 8px; font-size: 14px; color: #777;">
                    <span style="margin-right: 15px;">📍 {{ $record->place_of_residence }}</span>
                    <span>📧 {{ $record->email_address }}</span>
                </div>
            </div>

        </div>

        <!-- STATS -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 20px; text-align: center; margin-top: 25px; padding-top: 20px; border-top: 1px solid #eeeeee21;">
            
            <div>
                <div style="font-size: 18px; font-weight: bold;">
                    {{ number_format($record->initial_investment) }}
                </div>
                <div style="font-size: 12px; color: #777;">Investment</div>
            </div>

            <div>
                <div style="font-size: 18px; font-weight: bold;">
                    {{ $record->status }}
                </div>
                <div style="font-size: 12px; color: #777;">Status</div>
            </div>

            <div>
                <div style="font-size: 18px; font-weight: bold;">
                    {{ $record->date_of_joining }}
                </div>
                <div style="font-size: 12px; color: #777;">Joined</div>
            </div>

            <div>
                <div style="font-size: 18px; font-weight: bold;">
                    {{ $record->highest_level_of_education }}
                </div>
                <div style="font-size: 12px; color: #777;">Education</div>
            </div>

        </div>
    </div>

    <!-- DETAILS -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">

        <!-- PERSONAL INFO -->
        <div class="bg-white dark:bg-[#000000]" style="background:#f9fafb08;padding: 20px; border-radius: 12px; box-shadow: 0 1px 6px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 12px; font-size: 16px;">Personal Information</h3>
            <p><strong>Date of Birth:</strong> {{ $record->date_of_birth }}</p>
            <p><strong>Phone:</strong> {{ $record->phone_number }}</p>
            <p><strong>National ID:</strong> {{ $record->national_id_passort_number }}</p>
        </div>

        <!-- FINANCIAL -->
        <div class="bg-white dark:bg-[#000000]" style="background:#f9fafb08;padding: 20px; border-radius: 12px; box-shadow: 0 1px 6px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 12px; font-size: 16px;">Financial Details</h3>
            <p><strong>Bank Name:</strong> {{ $record->active_bank_account_name }}</p>
            <p><strong>Account Number:</strong> {{ $record->active_bank_account_number }}</p>
            <p><strong>Source of Income:</strong> {{ 'UGX '.number_format($record->source_of_income) }}</p>
        </div>

        <!-- NEXT OF KIN -->
        <div class="bg-white dark:bg-[#000000]" style="background:#f9fafb08;padding: 20px; border-radius: 12px; box-shadow: 0 1px 6px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 12px; font-size: 16px;">Next of Kin</h3>
            <p><strong>Name:</strong> {{ $record->next_of_kin_name }}</p>
            <p><strong>Relationship:</strong> {{ $record->relationship_next_of_kin }}</p>
            <p><strong>Contact:</strong> {{ $record->contacts_next_of_kin }}</p>
        </div>

        <!-- DOCUMENTS -->
        <div class="bg-white dark:bg-[#000000]" style="background:#f9fafb08;padding: 20px; border-radius: 12px; box-shadow: 0 1px 6px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 12px; font-size: 16px;">Documents</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <img src="https://masavuinvestments.com/storage/{{ $record->national_id_photo }}"
                     style="width: 100%; height: 130px; object-fit: cover; border-radius: 8px;">
                
                <img src="https://masavuinvestments.com/storage/{{ $record->current_photo }}"
                     style="width: 100%; height: 130px; object-fit: cover; border-radius: 8px;">
            </div>
        </div>

    </div>

    

</div>