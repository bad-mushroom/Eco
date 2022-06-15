<?php

namespace Database\Seeders;

use App\Models\StoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = StoryType::firstOrNew(['slug' => 'post']);
        $post->label = 'Post';
        $post->description = 'A blog post.';
        $post->save();

        $page = StoryType::firstOrNew(['slug' => 'page']);
        $page->label = 'Page';
        $page->description = 'A website page.';
        $page->save();
    }
}
