<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Inflation;
use Illuminate\Database\Seeder;

class InflationSeed extends Seeder
{
    public function run(): void
    {
        $days = 300;
        $day = now()->subDays($days);

        for ($i = 0; $i <= $days; $i++) {
            $newInflation = rand(1, 4);

            Inflation::factory()->create([
                'total_inflation' => $newInflation,
                'created_at' => $day->format('Y-m-d H:i:s')
            ]);

            $day->addDay(1);
        }
    }
}
