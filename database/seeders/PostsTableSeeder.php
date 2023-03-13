<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $posts = Post::factory(5)->create([
                'user_id' => $user->id,
            ]);

            foreach ($posts as $post) {
                $post->categories()->attach([1, 2]);
                $post->tags()->attach([1, 2, 3]);
            }
        }
    }
}
