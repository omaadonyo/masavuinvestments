<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReturn extends Model
{
    //
    protected $fillable = [
        'approved_by',
        'user_id',
        'year',
        'amount',
        'notes',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
