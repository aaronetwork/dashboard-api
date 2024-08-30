<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Inflation;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class InflationCommand extends Command
{
    protected $signature = 'inflation:get';

    protected $description = 'Inflation by day';

    public function handle(): int
    {
        $todayDate = now()->format('Y-m-d');
        $actualTotalInflationExists = Inflation::where('created_at', 'like', "$todayDate%")->exists();

        if ($actualTotalInflationExists) {
            $this->info('Inflation already exists');

            return self::SUCCESS;
        }

        $response = Http::get(config('app.chain_api_url') . '/cosmos/mint/v1beta1/inflation');

        if ($response->successful()) {
            $totalInflation = Arr::get($response->json(), 'inflation');
            Inflation::create(['total_inflation' => $totalInflation]);
            $this->info('Inflation successfully created');

            return self::SUCCESS;
        }

        $this->error('Inflation error created');

        return self::FAILURE;
    }
}
