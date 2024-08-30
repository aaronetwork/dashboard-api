<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\StakingPool;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class StakingPoolCommand extends Command
{
    protected $signature = 'staking:get';

    protected $description = 'Staking pool by day';

    public function handle(): int
    {
        $todayDate = now()->format('Y-m-d');
        $actualTotalStakingExists = StakingPool::where('created_at', 'like', "$todayDate%")->exists();

        if ($actualTotalStakingExists) {
            $this->info('Staking pool already exists');

            return self::SUCCESS;
        }

        $response = Http::get(config('app.chain_api_url') . '/cosmos/staking/v1beta1/pool');

        if ($response->successful()) {
            $totalStakingBonded = Arr::get($response->json(), 'pool.bonded_tokens');
            $totalStakingUnbonded = Arr::get($response->json(), 'pool.not_bonded_tokens');
            StakingPool::create([
                'total_bonded' => $totalStakingBonded,
                'total_unbonding' => $totalStakingUnbonded,
            ]);
            $this->info('Staking pool successfully created');

            return self::SUCCESS;
        }

        $this->error('Staking pool error created');

        return self::FAILURE;
    }
}
