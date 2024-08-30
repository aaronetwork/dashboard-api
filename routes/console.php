<?php

namespace App\Console;

use App\Console\Commands\AccountCommand;
use App\Console\Commands\InflationCommand;
use App\Console\Commands\StakingPoolCommand;
use App\Console\Commands\SupplyCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(SupplyCommand::class)
    ->withoutOverlapping(10)
    ->runInBackground()
    ->everyTwoHours();

Schedule::command(AccountCommand::class)
    ->withoutOverlapping(10)
    ->runInBackground()
    ->everyTwoHours();

Schedule::command(InflationCommand::class)
    ->withoutOverlapping(10)
    ->runInBackground()
    ->everyTwoHours();

Schedule::command(StakingPoolCommand::class)
    ->withoutOverlapping(10)
    ->runInBackground()
    ->everyTwoHours();

