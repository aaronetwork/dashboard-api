<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TransactionController
{
    public function index(): JsonResponse
    {
        $transactions = Transaction::select('created_at', DB::raw('SUM(total_transaction) as total_transaction'))
            ->groupBy('created_at')
            ->get();

        return response()->json($transactions);
    }

    public function total(): JsonResponse
    {
        $total = Transaction::sum('total_transaction');

        return response()->json([
            'total' => $total,
        ]);
    }
}
