<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Account;

class AccountController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(Account::all());
    }
}
