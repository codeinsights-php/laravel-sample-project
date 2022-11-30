<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        if (isset($_ENV['DEFAULT_TEST_USER_LOGIN']) && isset($_ENV['DEFAULT_TEST_USER_PASSWORD'])) {
            // Create a hardcoded test user with a fixed password
            $attributes = [
                'name' => 'Default user',
                'username' => 'Default user',
                'email' => $_ENV['DEFAULT_TEST_USER_LOGIN'],
                'password' => $_ENV['DEFAULT_TEST_USER_PASSWORD'],
            ];

            User::create($attributes);
        }
    }
}
