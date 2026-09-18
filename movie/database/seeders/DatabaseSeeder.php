<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $male = Gender::create(['title' => 'Férfi']);
        $female = Gender::create(['title' => 'Nő']);

        // Felhasználók/Színészek létrehozása nemekkel
        $users = User::factory(10)->create([
            'gender_id' => fn () => fake()->randomElement([$male->id, $female->id]),
        ]);

        
        $films = Film::factory(5)->create([
            'director_id' => fn () => $users->random()->id,
        ]);


        foreach ($films as $film) {
            Role::create([
                'film_id' => $film->id,
                'user_id' => $users->random()->id,
                'status' => 'főszereplő',
            ]);
            Role::create([
                'film_id' => $film->id,
                'user_id' => $users->random()->id,
                'status' => 'mellékszereplő',
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
