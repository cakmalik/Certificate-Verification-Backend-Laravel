<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->random()->id,
            'a1' => $this->faker->numberBetween(70, 100),
            'a2' => $this->faker->numberBetween(70, 100),
            'a3' => $this->faker->numberBetween(70, 100),
            'a4' => $this->faker->numberBetween(70, 100),
            'a5' => $this->faker->numberBetween(70, 100),
            'a6' => $this->faker->numberBetween(70, 100),
            'b1' => $this->faker->numberBetween(70, 100),
            'b2' => $this->faker->numberBetween(70, 100),
            'b3a' => $this->faker->numberBetween(70, 100),
            'b3b' => $this->faker->numberBetween(70, 100),
            'b3c' => $this->faker->numberBetween(70, 100),
        ];
    }
}
