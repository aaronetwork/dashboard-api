<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\StakingPool;
use Illuminate\Database\Seeder;

class StakingPoolSeed extends Seeder
{
    public function run(): void
    {
        $days = 300;
        $day = now()->subDays($days);

        for ($i = 0; $i <= $days; $i++) {
            $newBonded = rand(1000000000, 9000000000);
            $newUnbonded = rand(1000000, 4000000);

            StakingPool::factory()->create([
                'total_bonded' => $newBonded,
                'total_unbonding' => $newUnbonded,
                'created_at' => $day->format('Y-m-d H:i:s')
            ]);

            $day->addDay(1);
        }
    }
}
