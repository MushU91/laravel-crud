<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' =>fake()->name(),
            'position' => fake()->jobTitle(),
            'age' => fake()-> numberBetween(20,30),
            'email' => fake()->unique()->safeEmail(),
            'employer_id' => \App\Models\Employer::factory(),
        ];
    }
}
