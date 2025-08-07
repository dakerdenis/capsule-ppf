<?php
// app/Console/Commands/DeactivateExpiredProducts.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;

class DeactivateExpiredProducts extends Command
{
    protected $signature = 'products:deactivate-expired';
    protected $description = 'Deactivate products whose timer has expired';

    public function handle()
    {
        $now = Carbon::now();
        $count = Product::where('is_active', true)
            ->whereNotNull('activation_expires_at')
            ->where('activation_expires_at', '<=', $now)
            ->update(['is_active' => false]);

        $this->info("Deactivated $count expired products.");
    }
}
