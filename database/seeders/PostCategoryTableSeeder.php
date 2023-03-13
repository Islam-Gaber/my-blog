<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $posts = Post::all();
        $categories = Category::all();

        foreach ($posts as $post) {
            $post->categories()->attach($categories->random(2)->pluck('id')->toArray());
        }
    }
}
