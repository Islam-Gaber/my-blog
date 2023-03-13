<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        Tag::create([
            'name' => 'Tag 1',
            'slug' => 'tag-1',
        ]);

        Tag::create([
            'name' => 'Tag 2',
            'slug' => 'tag-2',
        ]);

        Tag::create([
            'name' => 'Tag 3',
            'slug' => 'tag-3',
        ]);

        Tag::factory(7)->create();
    }
}
