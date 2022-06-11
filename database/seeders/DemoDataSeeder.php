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
        $authors = User::factory(3)->create();

        $authors->each(function($author) {
            Content::factory(rand(0, 5))
                ->author($author->id)
                ->type()
                ->create();
        });

        ContentType::all()->each(function($type) {
            Content::factory(rand(0, 5))
                ->author()
                ->type($type->id)
                ->create();
        });
    }
}
