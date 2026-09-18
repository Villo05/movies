<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'film_id' => Film::factory(),
            'user_id' => User::factory(),
            'status' => fake()->randomElement(['főszereplő', 'mellékszereplő', 'statisszta']),
        ];
    }
}
