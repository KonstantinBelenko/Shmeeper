<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        \App\Models\Post::factory(10)->create();
        \App\Models\Post::factory(3)->create([
            'is_reply' => true,
            'reply_id' => fake()->numberBetween(1, 10)
        ]);

        \App\Models\Like::factory(12)->create();
    }
}
