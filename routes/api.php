<?php

use App\Http\Controllers\StakingPoolController;
use App\Http\Controllers\InflationController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('supply', SupplyController::class);
Route::get('inflation', InflationController::class);
Route::get('staking', StakingPoolController::class);
Route::get('account', AccountController::class);
Route::get('transaction', [TransactionController::class, 'index']);
Route::get('transaction/total', [TransactionController::class, 'total']);
