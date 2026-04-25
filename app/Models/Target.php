<?php

namespace App\Models;

use App\Models\Contribution;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'final_target',
        'target_scores',
        'target_balance',
        'status',
        'starts_on',
        'ends_on',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contributions()
    {
        return $this->belongsTo(Contribution::class);
    }
}
