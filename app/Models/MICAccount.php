<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MICAccount extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'total_contributions',
        'managment_fees',
        'total_withdraw',
        'withdraw_charges',
    ];
}
