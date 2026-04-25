<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offboarding extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'date_of_exit',
        'membership_duration',
        'role_in_club',
        'main_reason_leaving',
        'reason_details',
        'overall_experience',
        'liked_most',
        'liked_least',
        'satisfaction_ratings',
        'recommended_improvements',
        'continue_doing',
        'stop_doing',
        'rejoin_future',
        'recommend_to_others',
        'additional_comments',
        'exit_confirmation',
        'cooperation_confirmation',
        'status',
        'total_contribution',
        'total_contribution_withdraw_charges',
        'total_contribution_interest',
    ];

    protected $casts = [
        'satisfaction_ratings' => 'array',
        'exit_confirmation' => 'boolean',
        'cooperation_confirmation' => 'boolean',
        'date_of_exit' => 'date',
    ];
}