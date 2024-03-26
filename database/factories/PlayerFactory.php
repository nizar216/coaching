<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'age' => $this->faker->numberBetween(10, 20),
            'height' => $this->faker->numberBetween(120, 190),
            'club'=>$this->faker->randomElement(['css','ock','srs']),
            'phone_number'=>$this->faker->phoneNumber,
            'parent_phone_number'=>$this->faker->phoneNumber,
        ];
    }
}
