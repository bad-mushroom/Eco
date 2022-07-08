<?php

namespace Database\Seeders;

use App\Models\SettingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $story = SettingType::firstOrNew(['slug' => 'stories']);
        $story->label = 'Stories & Content';
        $story->description = 'Settings relating to story writing and reading.';
        $story->save();

        $comments = SettingType::firstOrNew(['slug' => 'comments']);
        $comments->label = 'Comments';
        $comments->description = 'Settings relating to visitor commenting.';
        $comments->save();

        $general = SettingType::firstOrNew(['slug' => 'appearance']);
        $general->label = 'Appearance';
        $general->description = 'Appearance related settings';
        $general->save();
    }
}
