<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // 12-символьный код, уникальный, допускает NULL
            $table->char('product_confirmation_code', 12)
                  ->nullable()
                  ->unique()
                  ->after('activation_expires_at');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // имя индекса будет products_product_confirmation_code_unique
            $table->dropUnique('products_product_confirmation_code_unique');
            $table->dropColumn('product_confirmation_code');
        });
    }
};
