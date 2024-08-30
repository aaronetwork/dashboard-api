<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\StakingPool;

class StakingPoolController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(StakingPool::all());
    }
}
