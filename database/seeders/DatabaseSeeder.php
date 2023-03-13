<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        $this->call(PostsTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        $this->call(PostCategoryTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
