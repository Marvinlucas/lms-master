<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'config_type' => $this->faker->name,
            'position_1' => $this->faker->name,
            'position_2' => $this->faker->name,
            'name_1' => $this->faker->name,
            'name_2' => $this->faker->name,
            'config_category' => $this->faker->name 
        ];
    }
}
