<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AccountSeed::class,
            InflationSeed::class,
            StakingPoolSeed::class,
            SupplySeed::class,
            TransactionSeed::class
        ]);
    }
}
