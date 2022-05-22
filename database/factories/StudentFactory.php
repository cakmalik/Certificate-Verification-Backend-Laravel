<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => $this->faker->name,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date('Y-m-d'),
            'parents_name' => $this->faker->name,
            'nis' => $this->faker->numberBetween(1, 100),
            'nisn' => $this->faker->numberBetween(1, 100),
        ];
    }
}
