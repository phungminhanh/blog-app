<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'teaser' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'title' => $this->faker->sentence,
            'id_author' => User::factory(),
        ];
    }
}
