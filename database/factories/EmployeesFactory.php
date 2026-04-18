<?php

namespace Database\Factories;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'companies_id' => Companies::factory(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber()
        ];
    }
}
