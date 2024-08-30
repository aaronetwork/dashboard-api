<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'total_account'
    ];

    protected $visible = [
        'total_account',
        'created_at',
    ];
}
