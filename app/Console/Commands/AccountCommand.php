<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use App\Models\Account;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class AccountCommand extends Command
{
    protected $signature = 'account:get';

    protected $description = 'Account by day';

    public function handle(): int
    {
        $todayDate = now()->format('Y-m-d');
        $actualTotalAccountExists = Account::where('created_at', 'like', "$todayDate%")->exists();

        if ($actualTotalAccountExists) {
            $this->info('Account already exists');

            return self::SUCCESS;
        }

        $response = Http::get(config('app.chain_api_url') . '/cosmos/auth/v1beta1/accounts?pagination.limit=1&pagination.count_total=true&pagination.reverse=false');

        if ($response->successful()) {
            $totalAccount = Arr::get($response->json(), 'pagination.total');
            Account::create(['total_account' => $totalAccount]);
            $this->info('Account successfully created');

            return self::SUCCESS;
        }

        $this->error('Account error created');

        return self::FAILURE;
    }
}
