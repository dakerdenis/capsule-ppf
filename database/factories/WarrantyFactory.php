<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warranty>
 */
class WarrantyFactory extends Factory
{
    protected $model = \App\Models\Warranty::class;

    public function definition(): array
    {
        return [
            'client_name' => $this->faker->name(),
            'client_number' => $this->faker->phoneNumber(),
            'car_model' => $this->faker->word(),
            'car_make' => $this->faker->word(),
            'car_color' => $this->faker->colorName(),
            'manufacture_year' => $this->faker->year(),
            'license_plate_number' => strtoupper($this->faker->bothify('??###??')),
            'service_name' => $this->faker->company(),
            'master_name' => $this->faker->name(),
            'service_phone_number' => $this->faker->phoneNumber(),
            'license_number' => strtoupper($this->faker->bothify('#######')),
            'installation_date' => $this->faker->date(),
            'brand_name' => $this->faker->company(),
            'film_model' => $this->faker->word(),
            'warranty_model' => $this->faker->word(),
            'service_life' => $this->faker->randomDigitNotNull() . ' years',
            'warranty_end_date' => $this->faker->date(),
            'client_code' => strtoupper($this->faker->bothify('??###')),
            'images_array' => $this->faker->words(3), // Array of 3 random words
        ];
    }
}
