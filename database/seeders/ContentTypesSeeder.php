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
        ContentType::factory()->create([
            'label'       => 'Post',
            'description' => 'A blog post.',
        ]);

        ContentType::factory()->create([
            'label'       => 'Page',
            'description' => 'A website page.',
        ]);
    }
}
