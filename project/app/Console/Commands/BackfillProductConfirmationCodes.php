<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class BackfillProductConfirmationCodes extends Command
{
    protected $signature = 'products:backfill-confirmation-codes {--dry-run} {--limit=0}';
    protected $description = 'Generate 12-char confirmation codes for products that require it';

    public function handle(): int
    {
        $dry   = (bool) $this->option('dry-run');
        $limit = (int) $this->option('limit');

        // Берём только те, у кого кода ещё нет
        $query = Product::query()->whereNull('product_confirmation_code');
        $total = (int) $query->count();
        $this->info("Missing code: {$total}");

        $updated = 0;
        $processed = 0;

        $query->orderBy('id')->chunkById(500, function ($chunk) use (&$updated, &$processed, $dry, $limit) {
            foreach ($chunk as $product) {
                $processed++;

                if (!$this->needsCode($product)) {
                    continue;
                }

                $code = $this->uniqueCode();
                if (!$dry) {
                    $product->product_confirmation_code = $code;
                    $product->save();
                }
                $updated++;

                if ($limit > 0 && $updated >= $limit) {
                    // Останавливаем ранний выход
                    return false;
                }
            }
        });

        $this->info("Processed: {$processed}; Updated: {$updated}" . ($dry ? ' (dry-run)' : ''));
        return self::SUCCESS;
    }

    /**
     * Нужно ли коду значение?
     * НЕ нужно, если товар просрочен ИЛИ есть гарантия.
     */
    protected function needsCode(Product $p): bool
    {
        $hasWarranty = !empty($p->warranty);

        // Просрочен по статусу?
        $expiredByStatus = ((int) $p->getAttribute('status')) === Product::STATUS_EXPIRED;

        // Просрочен по дате активации?
        $expiredByDate = $p->activation_expires_at && now()->greaterThan($p->activation_expires_at);

        // Код нужен только если НЕ просрочен и НЕТ гарантии
        return !$hasWarranty && !$expiredByStatus && !$expiredByDate;
    }

    /**
     * Генерация уникального 12-символьного кода (A-Z, 0-9)
     */
    protected function uniqueCode(int $length = 12): string
    {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            $code = $this->randomFromAlphabet($alphabet, $length);
        } while (
            Product::where('product_confirmation_code', $code)->exists()
        );

        return $code;
    }

    protected function randomFromAlphabet(string $alphabet, int $len): string
    {
        $max = strlen($alphabet) - 1;
        $s = '';
        for ($i = 0; $i < $len; $i++) {
            $s .= $alphabet[random_int(0, $max)];
        }
        return $s;
    }
}
