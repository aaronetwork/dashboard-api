<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StakingPool extends Model
{
    protected $fillable = [
        'total_bonded',
        'total_unbonding'
    ];

    protected $visible = [
        'total_bonded',
        'total_unbonding',
        'created_at',
    ];
}
