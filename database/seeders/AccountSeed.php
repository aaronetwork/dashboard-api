<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeed extends Seeder
{
    public function run(): void
    {
        $firstRow = rand(1000, 2000);
        $days = 300;
        $day = now()->subDays($days);

        for ($i = 0; $i <= $days; $i++) {
            $newAccountByDay = rand(2, 50);
            $firstRow += $newAccountByDay;

            Account::factory()->create([
                'total_account' => $firstRow,
                'created_at' => $day->format('Y-m-d H:i:s')
            ]);

            $day->addDay(1);
        }
    }
}
