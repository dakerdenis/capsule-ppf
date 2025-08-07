<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warranty;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warranty::factory()->count(10)->create(); // Seed 50 fake warranties
    }
}
