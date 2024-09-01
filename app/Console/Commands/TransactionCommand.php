<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use App\Models\Transaction;
use Illuminate\Support\Arr;

class TransactionCommand extends Command
{
    protected $signature = 'transaction:get';

    protected $description = 'Get transaction by date';

    public function handle(): int
    {
        $apiUrl = config('app.chain_api_url');
        $latestBlock = Http::get(config('app.chain_api_url') . '/cosmos/base/tendermint/v1beta1/blocks/latest');
        $latestBlockHeight = Arr::get($latestBlock, 'block.header.height');

        for ($i = 1; $i <= $latestBlockHeight; $latestBlockHeight--) {
            $this->info("Start check $latestBlockHeight block");

            $actualTotalTransactionExists = Transaction::where('block_height', $latestBlockHeight)->exists();

            if ($actualTotalTransactionExists) {
                $this->info(' Transaction already exists');

                return self::SUCCESS;
            }

            $response = Http::get("$apiUrl/cosmos/base/tendermint/v1beta1/blocks/$latestBlockHeight");
            $transactions = Arr::get($response, 'block.data.txs');
            $transactionCount  = count($transactions);
            $dateTime = now()->setDateTimeFrom(Arr::get($response, 'block.header.time'))->format('Y-m-d');

            if ($transactionCount > 0) {
                $this->info(" Transactions count: $transactionCount");

                Transaction::create([
                    'block_height' => $latestBlockHeight,
                    'total_transaction' => $transactionCount,
                    'created_at' => $dateTime
                ]);
            }

            $this->info(" Check next block");
        }

        return self::SUCCESS;
    }
}
