<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddEmailPasswordToServicesTable extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('email')->unique()->nullable()->after('description'); // Email (unique, nullable for existing data)
            $table->string('password')->nullable()->after('email'); // Password (hashed, nullable for existing data)
        });
    }
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['email', 'password']);
        });
    }
}
