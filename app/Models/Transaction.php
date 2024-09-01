<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'block_height',
        'total_transaction',
        'created_at'
    ];

    protected $visible = [
        'block_height',
        'total_transaction',
        'created_at'
    ];
}
