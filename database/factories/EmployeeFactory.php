<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'nik' => fake()->unique()->numerify(),
      'full_name' => fake()->name(),
      'position' => fake()->jobTitle(),
      'wages' => fake()->numberBetween(1000000, 20000000),
      'incentive' => fake()->numberBetween(50000, 500000),
    ];
  }
}
