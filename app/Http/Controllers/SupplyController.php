<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Supply;

class SupplyController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(Supply::all());
    }
}
