<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Explicitly hash passwords during seeding
        Service::factory()->create([
            'name' => 'Test Service',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Hash it once
        ]);

        // Add additional fake services
        Service::factory(9)->create();
    }
}
