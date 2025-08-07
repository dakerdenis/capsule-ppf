<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_number');
            $table->string('car_model');
            $table->string('car_make');
            $table->string('car_color');
            $table->year('manufacture_year');
            $table->string('license_plate_number');
            $table->unsignedBigInteger('service_id')->nullable(); // Make service_id nullable
            $table->string('master_name');
            $table->string('service_phone_number');
            $table->string('service_country');
            $table->string('service_city');           
            $table->string('product_code');
            $table->date('installation_date');
            $table->string('brand_name');
            $table->string('film_model');
            $table->string('warranty_model');
            $table->string('service_life');
            $table->date('warranty_end_date');
            $table->string('client_code');
            $table->json('images_array');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};
