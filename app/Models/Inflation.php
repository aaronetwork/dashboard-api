<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inflation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'total_inflation'
    ];

    protected $visible = [
        'total_inflation',
        'created_at',
    ];
}
