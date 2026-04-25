<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kirschbaum\Commentions\Contracts\Commentable;
use Kirschbaum\Commentions\HasComments;

class Project extends Model implements Commentable
{
    use HasComments;
    
    //
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'photos',
        'valuation',
        'active'
    ];

     protected function casts(): array
    { 
        return [
            'photos' => 'array',
        ];
    }
}
