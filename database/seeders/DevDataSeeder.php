<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\StoryType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevDataSeeder extends Seeder
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
            if (rand(0, 1)) {
                $payload = ['published_at' => Carbon::now(),];
            }

            Story::factory(rand(0, 5))
                ->author($author->id)
                ->type()
                ->create($payload);
        });

        StoryType::all()->each(function($type) {
            Story::factory(rand(0, 5))
                ->author()
                ->type($type->id)
                ->create();
        });
    }
}
