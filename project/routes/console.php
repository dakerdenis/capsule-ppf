<?php

use App\Console\Commands\ExpireProductsCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('expire:products', function () {
    $this->call(ExpireProductsCommand::class);
})->purpose('Expire products whose activation time has passed')->hourly();
