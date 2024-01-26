<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'user_name' => $this->faker->userName,
            'password' => bcrypt('password'), // Hashed password for demo purposes
            'role' => 'user',
            'stagename' => $this->faker->word,
        ];
    }
}
