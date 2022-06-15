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
        $story = SettingType::firstOrNew(['slug' => 'content']);
        $story->label = 'Story';
        $story->description = 'Settings relating to story writing and reading.';
        $story->save();

        $general = SettingType::firstOrNew(['slug' => 'general']);
        $general->label = 'General';
        $general->description = 'General website settings';
        $general->save();
    }
}
