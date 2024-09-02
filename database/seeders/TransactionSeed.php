<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeed extends Seeder
{
    public function run(): void
    {
        $blockHeight = 1;
        $days = 300;
        $day = now()->subDays($days);

        for ($i = 0; $i <= $days; $i++) {
            $newTransactionByDay = rand(20, 50);
            $blockHeight = $blockHeight + rand(1, 10);

            Transaction::factory()->create([
                'block_height' => $blockHeight,
                'total_transaction' => $newTransactionByDay,
                'created_at' => $day->format('Y-m-d H:i:s')
            ]);

            $day->addDay(1);
        }
    }
}
