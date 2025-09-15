<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class, // Optional if you've added it earlier
            UserSeeder::class,
            ServiceSeeder::class,

        ]);
    }
}
