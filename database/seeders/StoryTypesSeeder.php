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
        $post->icon = 'file-lines';
        $post->description = 'A blog post.';
        $post->save();

        $page = StoryType::firstOrNew(['slug' => 'page']);
        $page->label = 'Page';
        $page->icon = 'scroll';
        $page->description = 'A website page.';
        $page->save();

        $bookmark = StoryType::firstOrNew(['slug' => 'bookmark']);
        $bookmark->label = 'Bookmark';
        $bookmark->icon = 'book';
        $bookmark->description = 'Link to a website.';
        $bookmark->save();

        $note = StoryType::firstOrNew(['slug' => 'note']);
        $note->label = 'Note';
        $note->icon = 'note-sticky';
        $note->description = 'A note or random thought.';
        $note->save();
    }
}
