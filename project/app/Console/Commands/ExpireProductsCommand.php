<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExpireProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-products-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expired = \App\Models\Product::where('status', '!=', 2)
            ->whereNotNull('activation_expires_at')
            ->where('activation_expires_at', '<', now())
            ->update(['status' => 2]);
    
        $this->info("✅ Expired $expired product(s) based on activation_expires_at.");
    }
    
}
