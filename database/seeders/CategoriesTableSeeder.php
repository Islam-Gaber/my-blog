<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Category 1',
            'slug' => 'category-1',
        ]);

        Category::create([
            'name' => 'Category 2',
            'slug' => 'category-2',
        ]);

        Category::factory(8)->create();
    }
}
