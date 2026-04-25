<?php

namespace App\Models;

use App\Models\Target;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $fillable = [
        'user_id',
        'target_id',
        'reference',
        'amount',
        'managment_fee',
        'management_fee',
        'return_fee',
        'total_deposit',
        'payment_proof',
        'notes',
        'status', 'month',
        'approved_by',
        'initial_investment',
        'subscription_fee'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }


    
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
