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
        'return_fee',
        'total_deposit',
        'payment_proof',
        'notes',
        'status', 
        'approved_by',
        'initial_investment'
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
