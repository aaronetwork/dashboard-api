<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use App\Models\Supply;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SupplyCommand extends Command
{
    protected $signature = 'supply:get';

    protected $description = 'Supply by day';

    public function handle(): int
    {
        $todayDate = now()->format('Y-m-d');
        $actualTotalSupplyExists = Supply::where('created_at', 'like', "$todayDate%")->exists();

        if ($actualTotalSupplyExists) {
            $this->info('Supply already exists');

            return self::SUCCESS;
        }

        $response = Http::get(config('app.chain_api_url') . '/cosmos/bank/v1beta1/supply');

        if ($response->successful()) {
            $totalSupply = Arr::get($response->json(), 'supply.0.amount');
            Supply::create(['total_supply' => $totalSupply]);
            $this->info('Supply successfully created');

            return self::SUCCESS;
        }

        $this->error('Supply error created');

        return self::FAILURE;
    }
}
