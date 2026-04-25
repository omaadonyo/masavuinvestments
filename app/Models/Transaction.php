<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'txn_id',
        'txn_reference',
        'user_id',
        'txn_type',
        'total_deposit',
        'payment_proof',
        'return_fee',
        'amount',
        'management_fees',
        'subscription_fee',
        'status',
        'notes',
        'approved_by',
        'reviewed_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
