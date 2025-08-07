<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber, // Generate a fake phone number
            'city' => $this ->faker->city,
            'country'=>$this->faker->country,
            'cooperation' => $this->faker->boolean,
            'list_of_products' => [], // Default to an empty array
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password for testing
            'logo' => null, // Optional logo can remain null or add a faker URL
        ];
    }
}
