<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'total_account'
    ];

    protected $visible = [
        'total_account',
        'created_at',
    ];
}
