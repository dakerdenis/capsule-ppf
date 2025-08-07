<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateServicesTable extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Service name
            $table->text('description')->nullable(); // Optional description of the service
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('logo')->nullable(); // Optional Logo of Service
            $table->boolean('cooperation')->default(false); // Indicates cooperation (default 0/false)
            $table->json('list_of_products')->default(json_encode([])); // List of associated products (default empty array)
            $table->timestamps(); // Created at and Updated at
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
}
