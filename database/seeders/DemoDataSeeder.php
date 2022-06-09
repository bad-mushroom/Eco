<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $author = User::factory()->create();

        ContentType::factory(3)->create()->each(function($type) use ($author) {
            Content::factory(rand(1, 3))->create([
                'content_type_id' => $type->id,
                'user_id'         => $author->id,
            ]);
        });
    }
}
