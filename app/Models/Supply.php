<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'total_supply'
    ];

    protected $visible = [
        'total_supply',
        'created_at',
    ];
}
