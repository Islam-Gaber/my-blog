<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory as FakerFactory;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Get all the posts and users
        $posts = Post::all();
        $users = User::all();

        // Loop through each post
        foreach ($posts as $post) {
            // Create 1 to 5 comments for each post
            $num_comments = $faker->numberBetween(1, 5);
            for ($i = 0; $i < $num_comments; $i++) {
                // Create a new comment
                $comment = new Comment();
                $comment->post_id = $post->id;
                $comment->user_id = $users->random()->id;
                $comment->body = $faker->sentence();
                $comment->approved = $faker->boolean(80);
                $comment->save();
            }
        }
    }
}
