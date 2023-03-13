<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // assuming you have 10 users in the database
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(rand(3, 10), true),
            'slug' => $this->faker->slug(),
            'image_url' => $this->faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
