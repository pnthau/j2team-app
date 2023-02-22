<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::factory()->count(10)->create();
        $data = [
            [
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl(60, 60, 'avatar'),
                'level' => fake()->boolean(),
                'email' => fake()->unique()->safeEmail(),
                'password' => "123456",
            ],
            [
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl(60, 60, 'avatar'),
                'level' => fake()->boolean(),
                'email' => fake()->unique()->safeEmail(),
                'password' => "123456",
            ],
            [
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl(60, 60, 'avatar'),
                'level' => fake()->boolean(),
                'email' => fake()->unique()->safeEmail(),
                'password' => "123456",
            ],
            [
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl(60, 60, 'avatar'),
                'level' => fake()->boolean(),
                'email' => fake()->unique()->safeEmail(),
                'password' => "123456",
            ],
            [
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl(60, 60, 'avatar'),
                'level' => fake()->boolean(),
                'email' => fake()->unique()->safeEmail(),
                'password' => "123456",
            ],
        ];

        User::insert($data);
    }
}
