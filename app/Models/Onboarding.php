<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onboarding extends Model
{
    //
    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth',
        'date_of_joining',
        'place_of_residence',
        'phone_number',
        'email_address',
        'national_id_passort_number',
        'source_of_income',
        'highest_level_of_education',
        'profession',
        'next_of_kin_name',
        'relationship_next_of_kin',
        'contacts_next_of_kin',
        'active_bank_account_name',
        'active_bank_account_number',
        'national_id_photo',
        'current_photo',
        'agree_tos',
        'status',
        'initial_investment'
    ];
}
