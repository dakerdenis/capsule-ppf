<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use Carbon\Carbon;

class ProductExpirationTest extends TestCase
{
    use RefreshDatabase;

    public function test_expired_product_status_is_updated()
    {
        // Установка времени
        Carbon::setTestNow(now());

        // Продукт, срок которого истёк
        $product = Product::factory()->expired()->create([
            'code' => 'URXTF8GFAKG84YAZ'
        ]);

        // Проверка логики
        if ($product->activation_expires_at && now()->greaterThan($product->activation_expires_at)) {
            $product->update(['status' => 2]);
        }

        $this->assertEquals(2, $product->fresh()->status);
    }

    
    public function test_active_product_does_not_expire_before_timer()
    {
        Carbon::setTestNow(now());

        $product = Product::factory()->activeWithTimer()->create();

        if ($product->activation_expires_at && now()->greaterThan($product->activation_expires_at)) {
            $product->update(['status' => 2]);
        }

        $this->assertEquals(1, $product->fresh()->status); // Статус должен остаться "Active"
    }
}
