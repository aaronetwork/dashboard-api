<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Inflation;

class InflationController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(Inflation::all());
    }
}
