<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController
{
    public function __invoke()
    {
        $transactions = Transaction::select('created_at', DB::raw('SUM(total_transaction) as total_transaction'))
            ->groupBy('created_at')
            ->get();

        return response()->json($transactions);
    }
}
