<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'firts_name' => fake()->firstName(),
        //     'last_name' => fake()->lastName(),
        //     'email' => 'test@example.com',
        // ]);

        JobListing::factory(20)->create();
    }
}
