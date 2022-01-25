<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cedula' => rand(1, 1000),
            'name' => $this->faker->name(),
            'lastname1' => $this->faker->lastName(),
            'lastname2' => $this->faker->lastName(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'position' => $this->faker->sentence(),
            'description_position' => $this->faker->text(140),
        ];
    }
}
