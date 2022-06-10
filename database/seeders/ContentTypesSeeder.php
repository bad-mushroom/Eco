<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = ContentType::firstOrNew(['slug' => 'post']);
        $post->label = 'Post';
        $post->description = 'A blog post.';
        $post->save();

        $page = ContentType::firstOrNew(['slug' => 'page']);
        $page->label = 'Page';
        $page->description = 'A website page.';
        $page->save();
    }
}
