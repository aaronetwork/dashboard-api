<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Seeder;

class SupplySeed extends Seeder
{
    public function run(): void
    {
        $firstRow = rand(1000, 2000);
        $days = 300;
        $day = now()->subDays($days);

        for ($i = 0; $i <= $days; $i++) {
            $newSupplyByDay = rand(1000000, 10000000);
            $firstRow += $newSupplyByDay;

            Supply::factory()->create([
                'total_supply' => $firstRow,
                'created_at' => $day->format('Y-m-d H:i:s')
            ]);

            $day->addDay(1);
        }
    }
}
